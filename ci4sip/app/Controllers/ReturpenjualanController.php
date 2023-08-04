<?php

namespace App\Controllers;

use App\Models\SecurityModel;
use App\Models\MasterModel;

class ReturpenjualanController extends BaseController
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
        // filter hak akses halaman
        $this->security = new SecurityModel();
        $menu_id = '040500';
        $data = $this->security->get($menu_id);
        if ($data->getNumRows() == 0) {
            session()->setFlashdata('error', 'Akses ditolak!');
            header('Location: /');
            exit;
        }
    }

    public function index()
    {
        return view('layouts/main', [
            'content' => 'v_retur_penjualan',
            'title' => 'Retur Penjualan Barang',
            'breadcrumb' => '<li>Transaksi</li><li class="active">Retur Penjualan</li>',
            'menu1' => '040000',
            'menu2' => '040500',
            'action_link' => 'returpenjualan/save',
            'cancel_link' => 'returpenjualan',
            'display' => 'form',
            'tanggal' => date('Y-m-d'),
        ]);
    }

    public function cart_read()
    {
        $data = [
            'cart' => $this->cart,
            'display' => 'table',
        ];
        return view('v_retur_penjualan', $data);
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
    public function getfaktur()
    {
        $faktur = $this->request->getPost('faktur');
        $where = "where faktur = '$faktur'";
        $data = db_connect()->query("SELECT * from tb_penjualan_detail where faktur = '$faktur'")->getresult();
        return $this->response->setJSON($data);
    }
    public function getbarang()
    {
        $faktur = $this->request->getPost('faktur');
        $id = $this->request->getPost('id');
        $data = db_connect()->query("SELECT * from tb_penjualan_detail where faktur = '$faktur' and barang_id = '$id'")->getFirstRow();
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
        return redirect('returpenjualan');
    }

    public function cart_reset()
    {
        $this->cart->destroy();
        return redirect('returpenjualan');
    }

    function save()
    {
        $instansi_id = session()->get('sip_instansi_id');
        $tanggal = $this->request->getpost('tanggal');
        $pelanggan = $this->request->getpost('pelanggan');
        $total = $this->request->getpost('total');
        $bayar = $this->request->getpost('bayar');
        $faktur = $instansi_id . $this->master->get_faktur('tb_retur_penjualan', $tanggal);
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
                        'faktur'        => $faktur,
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
                $this->cart->destroy();
            } else {
                session()->setFlashdata('error', "Data Gagal disimpan. $tanggal $pelanggan");
            }
        } else {
            session()->setFlashdata('error', 'Cart kosong.');
        }
        return redirect()->to('/returpenjualan');
    }
}
