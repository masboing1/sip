<?php

namespace App\Controllers;

use App\Models\MasterModel;
use App\Models\SecurityModel;

class PenjualanlistController extends BaseController
{
    protected $db;
    protected $master;
    protected $security;
    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->master = new MasterModel();
        // filter hak akses halaman
        $this->security = new SecurityModel();
        $menu_id = '040400';
        $data = $this->security->get($menu_id);
        if ($data->getNumRows() == 0) {
            session()->setFlashdata('error', 'Akses ditolak!');
            header('Location: /');
            exit;
        }
    }

    public function index()
    {
        $tanggal1 = date('Y-m') . "-01";
        $tanggal2 = date('Y-m-d');
        return view('layouts/main', [
            'content' => 'v_penjualan_list',
            'title' => 'Data Penjualan Barang',
            'breadcrumb' => '<li>Transaksi</li><li class="active">Penjualan List</li>',
            'menu1' => '040000',
            'menu2' => '040400',
            'action_link' => '',
            'cancel_link' => '',
            'display' => 'form',
            'tanggal1' => $tanggal1,
            'tanggal2' => $tanggal2,
        ]);
    }
    public function getdata()
    {
        $instansi_id = session()->get('sip_instansi_id');
        $tanggal1 = $this->request->getPost('tanggal1');
        $tanggal2 = $this->request->getPost('tanggal2');
        $query = db_connect()->query("SELECT v_penjualan_detail.* FROM v_penjualan_detail 
        where tanggal between '$tanggal1' and '$tanggal2' and instansi_id = '$instansi_id'")->getresultarray();
        $data = [
            'data' => $query,
            'display' => 'table',
        ];
        return view('v_penjualan_list', $data);
    }
    public function cetak($tanggal1, $tanggal2)
    {
        $instansi_id = session()->get('sip_instansi_id');
        $query = db_connect()->query("SELECT tb_penjualan_detail.*,tanggal,pelanggan_name,operator FROM tb_penjualan,tb_penjualan_detail 
        where tb_penjualan_detail.faktur = tb_penjualan.faktur and tanggal between '$tanggal1' and '$tanggal2' and instansi_id = '$instansi_id'")->getresultarray();
        $data = [
            'title' => 'LAPORAN PENJUALAN',
            'instansi_name' => session()->get('sip_instansi_name'),
            'content' => 'v_penjualan_list',
            'display' => 'cetak',
            'data' => $query,
            'tanggal1' => $tanggal1,
            'tanggal2' => $tanggal2,
        ];
        return view('layouts/cetak', $data);
    }
}
