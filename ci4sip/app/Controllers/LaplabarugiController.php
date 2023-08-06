<?php

namespace App\Controllers;

use App\Models\SecurityModel;
use App\Models\MasterModel;
use App\Models\LabarugiModel;

class LaplabarugiController extends BaseController
{
    protected $security;
    protected $master;
    protected $data;
    public function __construct()
    {
        $this->master = new MasterModel();
        // filter hak akses halaman
        $this->security = new SecurityModel();
        $this->data = new LabarugiModel();
        $menu_id = '050300';
        $this->security->get($menu_id);
    }

    public function index()
    {
        $tanggal1 = date('Y-m') . "-01";
        $tanggal2 = date('Y-m-d');
        $data = [
            'content' => 'v_lap_labarugi',
            'title' => 'Laporan Laba Rugi',
            'breadcrumb' => '<li>Laporan</li><li class="active">Laba Rugi</li>',
            'menu1' => '050000',
            'menu2' => '050300',
            'display' => 'form',
            'action_link' => '',
            'cancel_link' => '',

            'tanggal1' => $tanggal1,
            'tanggal2' => $tanggal2,
        ];

        return view('layouts/main', $data);
    }
    public function getdata()
    {
        $instansi_id = session()->get('sip_instansi_id');
        $tanggal1 = $this->request->getPost('tanggal1');
        $tanggal2 = $this->request->getPost('tanggal2');
        $total_pembelian = $this->data->total_pembelian($tanggal1, $tanggal2)->getFirstRow();
        $total_penjualan = $this->data->total_penjualan($tanggal1, $tanggal2, '')->getFirstRow();
        $data_pemasukan = $this->data->total_operasional($tanggal1, $tanggal2, 'pemasukan')->getresultarray();
        $data_pengeluaran = $this->data->total_operasional($tanggal1, $tanggal2, 'pengeluaran')->getresultarray();
        $data = [
            'rsb' => $total_pembelian,
            'rsj' => $total_penjualan,
            'data_pemasukan' => $data_pemasukan,
            'data_pengeluaran' => $data_pengeluaran,
            'total_retur' => 0,
            'display' => 'table',
        ];
        //echo "$total_penjualan->tot_penjualan $total_penjualan->modal $total_penjualan->potongan ";
        //dd($data);
        return view('v_lap_labarugi', $data);
    }
    public function cetak($tanggal1, $tanggal2)
    {
        $instansi_id = session()->get('sip_instansi_id');
        $query = db_connect()->query("SELECT tb_pembelian_detail.*,tanggal,suplier_name,operator FROM tb_pembelian,tb_pembelian_detail 
        where tb_pembelian_detail.faktur = tb_pembelian.faktur and tanggal between '$tanggal1' and '$tanggal2' and instansi_id = '$instansi_id'")->getresultarray();
        $data = [
            'title' => 'LAPORAN PEMBELIAN',
            'instansi_name' => session()->get('sip_instansi_name'),
            'content' => 'v_pembelian_list',
            'display' => 'cetak',
            'data' => $query,
            'tanggal1' => $tanggal1,
            'tanggal2' => $tanggal2,
        ];
        return view('layouts/cetak', $data);
    }
}
