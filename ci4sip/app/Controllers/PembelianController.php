<?php

namespace App\Controllers;

use App\Models\SecurityModel;
use App\Models\BarangModel;
use App\Models\PembelianModel;
use App\Models\MasterModel;

class PembelianController extends BaseController
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
        $this->data = new PembelianModel();
        // filter hak akses halaman
        $this->security = new SecurityModel();
        $menu_id = '040100';
        $data = $this->security->get($menu_id);
        if ($data->getNumRows() == 0) {
            session()->setFlashdata('error', 'Akses ditolak!');
            header('Location: /');
            exit;
        }
    }

    public function index()
    {
        // $this->cart->insert(array(
        //     'id'      => '011001000001',
        //     'name'    => 'Mikrotiksjfk, ( 123 )',
        //     'qty'     => '1',
        //     'price'   => '0',
        //     'satuan'   => 'pcs',
        // ));
        $instansi_id = session()->get('sip_instansi_id');
        $barang = new BarangModel();
        return view('layouts/main', [
            'content' => 'v_pembelian',
            'title' => 'Pembelian Barang',
            'breadcrumb' => '<li>Transaksi</li><li class="active">Pembelian</li>',
            'menu1' => '040000',
            'menu2' => '040100',
            'action_link' => 'pembelian/save',
            'cancel_link' => 'pembelian',
            'display' => 'form',
            'barang' => $barang->getdata(),
            'tanggal' => date('Y-m-d'),
            'data_suplier' => $this->master->get('tb_suplier', "where instansi_id = '$instansi_id'"),
        ]);
    }
    public function cart_read()
    {
        $data = [
            'cart' => $this->cart,
            'display' => 'table',
        ];
        return view('v_pembelian', $data);
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
        $jumlah = $this->request->getPost('jumlah');
        $this->cart->insert(array(
            'id'      => $id,
            'name'    => $name,
            'qty'     => $jumlah,
            'price'   => $hp,
            'satuan'   => $satuan,
        ));
    }

    public function cart_delete($id)
    {
        $this->cart->remove($id);
        return redirect('pembelian');
    }

    public function cart_reset()
    {
        $this->cart->destroy();
        return redirect('pembelian');
    }

    function save()
    {
        $instansi_id = session()->get('sip_instansi_id');
        $tanggal = $this->request->getpost('tanggal');
        $suplier = $this->request->getpost('suplier');
        $faktur = $instansi_id . $this->master->get_faktur('tb_pembelian', $tanggal);
        if (!empty($this->cart->contents())) {
            if (!empty($tanggal) && !empty($suplier)) {
                $data_pembelian = array(
                    'faktur'    => $faktur,
                    'instansi_id' => $instansi_id,
                    'tanggal'   => $tanggal,
                    'suplier_name' => $suplier,
                    'operator'  => session()->get('sip_username'),
                );
                $this->data->insert($data_pembelian);
                foreach ($this->cart->contents() as $rs) {
                    $data_cart = array(
                        'pembelian_faktur'        => $faktur,
                        'barang_id'     => $rs['id'],
                        'name'          => $rs['name'],
                        'satuan'        => $rs['satuan'],
                        'hp'            => $rs['price'],
                        'jumlah'        => $rs['qty']
                    );
                    //dd($data_cart);
                    $this->db->table('tb_pembelian_detail')->insert($data_cart);
                }
                session()->setFlashdata('pesan', 'Data berhasil disimpan.');
                $this->cart->destroy();
            } else {
                session()->setFlashdata('error', 'Data Gagal disimpan.');
            }
        } else {
            session()->setFlashdata('error', 'Cart kosong.');
        }
        return redirect()->to('/pembelian');
    }
}
