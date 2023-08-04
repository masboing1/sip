<?php

namespace App\Controllers;

use App\Models\SecurityModel;
use App\Models\MasterModel;
use App\Models\OperasionalModel;

class OperasionalController extends BaseController
{
    protected $security;
    protected $master;
    protected $data;
    public function __construct()
    {
        $this->master = new MasterModel();
        $this->data = new OperasionalModel();
        // filter hak akses halaman
        $this->security = new SecurityModel();
        $menu_id = '040600';
        $data = $this->security->get($menu_id);
        if ($data->getNumRows() == 0) {
            session()->setFlashdata('error', 'Akses ditolak!');
            header('Location: /');
            exit;
        }
        // akhir filter
    }

    public function index()
    {
        $bulan = date('Y-m');
        return redirect()->to("/operasional/view/$bulan");
    }

    public function view($bulan =  false)
    {
        if ($bulan == false) {
            $bulan = date('Y-m');
        }

        $data = [
            'content' => 'v_operasional',
            'title' => 'Operasional',
            'breadcrumb' => '<li>Transaksi</li><li class="active">Operasional</li>',
            'menu1' => '040000',
            'menu2' => '040600',
            'action' => 'view',
            'action_link' => '',
            'bulan_selected' => $bulan,
            'data_bulan' => $this->master->get_bulan('tb_operasional'),
            'data' => $this->data->getdata($bulan),
        ];

        return view('layouts/main', $data);
    }

    public function create($jenis_operasional_id)
    {
        $data = [
            'content' => 'v_operasional',
            'title' => 'Operasional',
            'breadcrumb' => '<li>Transaksi</li><li class="active">Operasional</li>',
            'menu1' => '040000',
            'menu2' => '040600',
            'action' => 'form',
            'action_link' => "/operasional/save/$jenis_operasional_id",
            'cancel_link' => '/operasional',

            //'id' => $instansi_id . "S" . $this->master->get_id6('tb_operasional', "where instansi_id = '$instansi_id'"),
            'jenis_operasional_id' => $jenis_operasional_id,
            'tanggal' => date('Y-m-d'),
            'data_jenis' => db_connect()->query("SELECT * from tm_jenis_operasional where jenis = '$jenis_operasional_id'"),
            'jenis_selected' => '',
            'detail' => '',
            'biaya' => '0',
        ];

        return view('layouts/main', $data);
    }

    public function save($jenis_operasional_id)
    {
        $bulan = substr($this->request->getVar('tanggal'), 0, 7);
        $bulan_id = str_replace("-", "", $bulan);
        $instansi_id = session()->get('sip_instansi_id');
        $jenis = substr($this->request->getVar('jenis'), 0, 1);
        $biaya = $this->request->getVar('biaya');
        $data_insert = [
            'id' => $instansi_id . $jenis . $bulan_id . "-" . $this->master->get_id3('tb_operasional', "where LEFT(id,11) = '$instansi_id$jenis$bulan_id'"),
            'tanggal' => $this->request->getVar('tanggal'),
            'jenis_operasional_id' => $this->request->getVar('jenis'),
            'detail' => $this->request->getVar('detail'),
            'biaya' => str_replace('.', '', $biaya),
        ];
        $this->data->insert($data_insert);
        session()->setFlashdata('pesan', 'Data berhasil disimpan.');
        return redirect()->to("/operasional/view/$bulan");
    }

    public function change($id)
    {

        $rs = $this->data->getdetail($id);
        if (empty($rs)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        }
        if (substr($rs['jenis_operasional_id'], 0, 1) == 'D') {
            $jenis = 'pemasukan';
        } else {
            $jenis = 'pengeluaran';
        }

        $data = [
            'content' => 'v_operasional',
            'title' => 'Operasional Change',
            'breadcrumb' => '<li>Transaksi</li><li class="active">Operasional</li>',
            'menu1' => '040000',
            'menu2' => '040600',
            'action' => 'change',
            'action_link' => '/operasional/update/' . $id,
            'cancel_link' => '/operasional',

            'data_jenis' => db_connect()->query("SELECT * from tm_jenis_operasional where jenis = '$jenis'"),
            'jenis_selected' => $rs['jenis_operasional_id'],
            'tanggal' => $rs['tanggal'],
            'detail' => $rs['detail'],
            'biaya' => number_format($rs['biaya'], 0, ".", ""),
        ];
        return view('layouts/main', $data);
    }
    public function update($id)
    {
        $bulan = substr($this->request->getVar('tanggal'), 0, 7);
        $jenis = $this->request->getVar('jenis');
        $biaya = $this->request->getVar('biaya');
        $data_update = [
            'tanggal' => $this->request->getVar('tanggal'),
            'jenis_operasional_id' => $jenis,
            'detail' => $this->request->getVar('detail'),
            'biaya' => str_replace('.', '', $biaya),
        ];
        $this->data->update($id, $data_update);
        session()->setFlashdata('pesan', 'Perubahan berhasil disimpan.');
        return redirect()->to("/operasional/view/$bulan");
    }

    public function delete($id)
    {
        $bulan = date('Y-m');
        $this->data->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di hapus.');
        return redirect()->to("/operasional/view/$bulan");
    }
}
