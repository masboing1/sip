<?php

namespace App\Controllers;

use App\Models\MasterModel;
use App\Models\SecurityModel;

class LappenjualanController extends BaseController
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
            'content' => 'v_lap_penjualan',
            'title' => 'Laporan Penjualan',
            'breadcrumb' => '<li>Laporan</li><li class="active">Penjualan</li>',
            'menu1' => '050000',
            'menu2' => '050200',
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
        $query = db_connect()->query("SELECT * FROM v_penjualan_detail 
        where tanggal between '$tanggal1' and '$tanggal2' and instansi_id = '$instansi_id'")->getresultarray();
        $data = [
            'data' => $query,
            'display' => 'table',
        ];
        return view('v_lap_penjualan', $data);
    }
    public function cetak($tanggal1, $tanggal2)
    {
        $instansi_id = session()->get('sip_instansi_id');
        $query = db_connect()->query("SELECT * FROM v_penjualan_detail
        where tanggal between '$tanggal1' and '$tanggal2' and instansi_id = '$instansi_id'")->getresultarray();
        $data = [
            'title' => 'LAPORAN PENJUALAN',
            'instansi_name' => session()->get('sip_instansi_name'),
            'content' => 'v_lap_penjualan',
            'display' => 'cetak',
            'data' => $query,
            'tanggal1' => $tanggal1,
            'tanggal2' => $tanggal2,
        ];
        return view('layouts/cetak', $data);
    }
}
