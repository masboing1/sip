<?php

namespace App\Controllers;

use App\Models\BarangModel;

class AjaxController extends BaseController
{
    protected $cart;
    public function __construct()
    {
        $this->cart = new \CodeIgniterCart\Cart();
        //helper(['common_helper', 'aws_helper']);
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
            'content' => 'v_ajax',
            'title' => 'Ajax',
            'breadcrumb' => '',
            'menu1' => '040100',
            'menu2' => '0',
            'display' => 'form',
            'barang' => $barang->getdata_instansi($instansi_id),
        ]);
    }
    public function cart_read()
    {
        $data = [
            'cart' => $this->cart,
            'display' => 'table',
        ];
        return view('v_ajax', $data);
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
        $hb = $this->request->getPost('hb');
        $jumlah = $this->request->getPost('jumlah');
        echo "$id $name $satuan $hb $jumlah";
        $this->cart->insert(array(
            'id'      => $id,
            'name'    => $name,
            'qty'     => $jumlah,
            'price'   => $hb,
            'satuan'   => $satuan,
        ));
    }

    public function cart_delete($id)
    {
        $this->cart->remove($id);
        return redirect('ajax');
    }

    public function cart_reset()
    {
        $this->cart->destroy();
        return redirect('ajax');
    }
}
