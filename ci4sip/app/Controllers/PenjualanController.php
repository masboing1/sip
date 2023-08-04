<?php

namespace App\Controllers;

use App\Models\SecurityModel;
use App\Models\BarangModel;
use App\Models\PenjualanModel;
use App\Models\MasterModel;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;

class penjualanController extends BaseController
{
    protected $cart;
    protected $db;
    protected $master;
    protected $data;
    protected $security;
    public function __construct()
    {
        $this->cart = \Config\Services::cart();
        $this->db = \Config\Database::connect();
        $this->master = new MasterModel();
        $this->data = new PenjualanModel();
        // filter hak akses halaman
        $this->security = new SecurityModel();
        $menu_id = '040300';
        $data = $this->security->get($menu_id);
        if ($data->getNumRows() == 0) {
            session()->setFlashdata('error', 'Akses ditolak!');
            header('Location: /');
            exit;
        }
    }


    public function index()
    {
        $instansi_id = session()->get('sip_instansi_id');
        $barang = new BarangModel();
        return view('layouts/main', [
            'content' => 'v_penjualan',
            'title' => 'Penjualan Barang',
            'breadcrumb' => '<li>Transaksi</li><li class="active">Penjualan</li>',
            'menu1' => '040000',
            'menu2' => '040300',
            'action_link' => 'penjualan/save',
            'cancel_link' => 'penjualan',
            'display' => 'form',
            'barang' => $barang->getdata(),
            'tanggal' => date('Y-m-d'),
            'data_pelanggan' => $this->master->get('tb_pelanggan', "where instansi_id = '$instansi_id'"),
        ]);
    }
    public function cart_read()
    {
        $data = [
            'cart' => $this->cart,
            'display' => 'table',
        ];
        return view('v_penjualan', $data);
    }

    public function total()
    {
        $tot_potongan = 0;
        foreach ($this->cart->contents() as $rs) {
            $tot_potongan = $tot_potongan + $rs['potongan'];
        }
        $total = $this->cart->total() - $tot_potongan;
        return $this->response->setJSON($total);
    }

    public function getbarang()
    {
        $id = $this->request->getPost('id');
        $barang = new BarangModel();
        $data = $barang->getdata($id);
        return $this->response->setJSON($data);
    }

    public function cart_add()
    {
        $id = $this->request->getPost('id');
        $name = $this->request->getPost('name');
        $satuan = $this->request->getPost('satuan');
        $hp = $this->request->getPost('hp');
        $hj = $this->request->getPost('hj');
        $potongan = $this->request->getPost('potongan');
        $stok = $this->request->getPost('stok');
        $jumlah = $this->request->getPost('jumlah');

        $this->cart->insert(array(
            'id'      => $id,
            'name'    => $name,
            'qty'     => str_replace('.', '', $jumlah),
            'price'   => str_replace('.', '', $hj),
            'potongan'   => str_replace('.', '', $potongan),
            'hp'      => str_replace('.', '', $hp),
            'satuan'  => $satuan,
        ));
    }

    public function cart_delete($id)
    {
        $this->cart->remove($id);
        return redirect('penjualan');
    }

    public function cart_reset()
    {
        $this->cart->destroy();
        return redirect('penjualan');
    }

    function save()
    {
        $instansi_id = session()->get('sip_instansi_id');
        $tanggal = $this->request->getpost('tanggal');
        $pelanggan = $this->request->getpost('pelanggan');
        $total = $this->request->getpost('total');
        $bayar = $this->request->getpost('bayar');
        $faktur = $instansi_id . $this->master->get_faktur('tb_penjualan', $tanggal);
        if (!empty($this->cart->contents())) {
            if (!empty($tanggal) && !empty($pelanggan)) {
                $data_penjualan = array(
                    'faktur'    => $faktur,
                    'instansi_id' => $instansi_id,
                    'tanggal'   => $tanggal,
                    'pelanggan_name' => $pelanggan,
                    'total' => $total,
                    'bayar' => str_replace('.', '', $bayar),
                    'operator'  => session()->get('sip_username'),
                );
                $this->data->insert($data_penjualan);
                foreach ($this->cart->contents() as $rs) {
                    $id = $rs['id'];
                    $qty = $rs['qty'];
                    $data_cart = array(
                        'penjualan_faktur'        => $faktur,
                        'barang_id'     => $id,
                        'name'          => $rs['name'],
                        'satuan'        => $rs['satuan'],
                        'hj'            => $rs['price'],
                        'jumlah'        => $qty,
                        'hp'            => $rs['hp'],
                        'potongan'      => $rs['potongan'],
                    );
                    $this->db->table('tb_penjualan_detail')->insert($data_cart);
                }
                session()->setFlashdata('pesan', 'Data berhasil disimpan.');
                $this->struk($faktur);
                $this->cart->destroy();
            } else {
                session()->setFlashdata('error', "Data Gagal disimpan. $tanggal $pelanggan");
            }
        } else {
            session()->setFlashdata('error', 'Cart kosong.');
        }
        return redirect()->to("/penjualan");
    }

    function struk($faktur)
    {
        $data = db_connect()->query("SELECT * from v_penjualan_detail where penjualan_faktur = '$faktur'");
        $instansi_name = session()->get('sip_instansi_name');
        $instansi_address = session()->get('sip_instansi_address');
        $sip_username = session()->get('sip_username');
        function baris3kolom($kolom1, $kolom2, $kolom3)
        {
            // Mengatur lebar setiap kolom (dalam satuan karakter)
            $lebar_kolom_1 = 10;
            $lebar_kolom_2 = 24;
            $lebar_kolom_3 = 12;

            // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n 
            $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
            $kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
            $kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);

            // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
            $kolom1Array = explode("\n", $kolom1);
            $kolom2Array = explode("\n", $kolom2);
            $kolom3Array = explode("\n", $kolom3);

            // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
            $jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array));

            // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
            $hasilBaris = array();

            // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris 
            for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {

                // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan, 
                $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
                // memberikan rata kanan pada kolom 3 dan 4 karena akan kita gunakan untuk harga dan total harga
                $hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ", STR_PAD_LEFT);

                $hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_LEFT);

                // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
                $hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3;
            }

            // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
            return implode($hasilBaris) . "\n";
        }
        try {
            /**
             * Printer Harus Dishare
             * Nama Printer Contoh: Generic
             */
            $connector = new WindowsPrintConnector("EPSON1");
            $printer = new Printer($connector);

            /* mulai cetak */
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text("$instansi_name \n");
            $printer->text("$instansi_address\n");
            $printer->text("------------------------------------------------\n"); //48
            $printer->text("KASIR : $sip_username | " . date('Y:m:d h:i:s') . " \n");
            $printer->text("NO TRANSAKSI : $faktur \n");
            $printer->text("------------------------------------------------\n");

            /* buat perulangan data transaksi */
            $tot_barang = 0;
            $tot_jual = 0;
            $tot_potongan = 0;
            $total = 0;
            $bayar = 0;
            foreach ($data->getresultArray() as $rs) {
                $id = substr($rs['barang_id'], -6);
                $name = $rs['name'];
                $jumlah = $rs['jumlah'];
                $satuan = $rs['satuan'];
                $hj = number_format($rs['hj'], 0, ",", ".");
                $potongan = number_format($rs['potongan'], 0, ",", ".");
                $bayar = number_format($rs['bayar'], 0, ",", ".");

                $subtotal = $jumlah * $rs['hj'] - $rs['potongan'];
                $tot_barang += $rs['jumlah'];
                $tot_jual += $rs['jumlah'] * $rs['hj'];
                $tot_potongan += $rs['potongan'];
                $printer->setJustification(Printer::JUSTIFY_LEFT);
                $printer->text("$id $name  \n");
                $printer->text(baris3kolom("", "$jumlah $satuan X $hj    ", number_format($subtotal, 0, ",", ".")));
                if ($rs['potongan'] > 0) {
                    $printer->text(baris3kolom("", "Diskon promo $potongan    ", ""));
                }
            }
            /* bagian footer */
            $printer->setJustification(Printer::JUSTIFY_RIGHT);
            $printer->text("------------------------------------------------\n");
            $printer->text(baris3kolom("$tot_barang item", "TOTAL BELANJA RP.", number_format($tot_jual - $tot_potongan, 0, ",", ".")));
            $printer->text(baris3kolom(" ", "TUNAI RP.", $bayar));
            $printer->text(baris3kolom(" ", "KEMBALI RP.", number_format($rs['bayar'] - ($tot_jual - $tot_potongan), 0, ",", ".")));
            $printer->setJustification(Printer::JUSTIFY_CENTER);
            $printer->text("------------------------------------------------\n");
            $printer->text("TERIMA KASIH \n");
            $printer->text("Ada Diskon pembelian setiap akhir pekan \n");
            $printer->text(" \n");
            $printer->text(" \n");
            $printer->text(" \n");

            //potong kertas
            $printer->cut();

            /* Close printer */
            $printer->close();
        } catch (Exception $e) {
            echo "Couldn't print to this printer: " . $e->getMessage() . "\n";
        }
    }
}
