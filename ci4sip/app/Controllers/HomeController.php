<?php

namespace App\Controllers;

class HomeController extends BaseController
{

    public function index()
    {
        //session()->setFlashdata('pesan', 'Selamat data di Sistem Informasi Managemen.');
        return view('layouts/main', [
            'content' => 'home',
            'title' => 'Home',
            'breadcrumb' => '',
            'menu1' => '000100',
            'menu2' => '0'
        ]);
    }
    public function cetak_struk()
    {
        //session()->setFlashdata('pesan', 'Selamat data di Sistem Informasi Managemen.');
        return view('layouts/cetak_struk', [
            'data' => db_connect()->query("SELECT * from tb_penjualan_detail where faktur = '20211004-001'"),
            'instansi_name' => session()->get('sip_instansi_name'),
            'instansi_address' => session()->get('sip_instansi_address'),
            'sip_name' => session()->get('sip_name'),
        ]);
    }
}
