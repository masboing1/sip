<?php

namespace App\Controllers;

use App\Models\SecurityModel;
use App\Models\MasterModel;
use App\Models\JenisOperasionalModel;

class JenisOperasionalController extends BaseController
{
    protected $security;
    protected $master;
    protected $data;
    public function __construct()
    {
        $this->master = new MasterModel();
        $this->data = new JenisOperasionalModel();
        // filter hak akses halaman
        $this->security = new SecurityModel();
        $menu_id = '020300';
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
        $data = [
            'content' => 'v_jenis_operasional',
            'title' => 'Jenis Operasional',
            'breadcrumb' => '<li>Data Master</li><li class="active">Jenis Operasional</li>',
            'menu1' => '020000',
            'menu2' => '020300',
            'data' => $this->data->getdata(),
            'action' => 'view',
            'action_link' => '/jenisoperasional/save',
            'cancel_link' => '/jenisoperasional',

            'id' => $this->master->get_id_master('tm_jenis_operasional', 'id'),
            'uraian' => '',
            'jenis' => '',
        ];

        return view('layouts/main', $data);
    }
    public function create()
    {
        $data = [
            'content' => 'v_jenis_operasional',
            'title' => 'Jenis Operasional Form',
            'breadcrumb' => '<li>Data Master</li><li class="active">Jenis Operasional</li>',
            'menu1' => '020000',
            'menu2' => '020300',
            'action' => 'create',
            'action_link' => '/jenisoperasional/save',
            'cancel_link' => '/jenisoperasional',

            'uraian' => '',
            'jenis' => '',
        ];

        return view('layouts/main', $data);
    }

    public function save()
    {
        $jenis = $this->request->getVar('jenis');
        if ($jenis == 'pemasukan') {
            $jenis_id = 'D';
        } else {
            $jenis_id = 'K';
        }
        $data_insert = [
            'id' => $jenis_id . $this->master->get_id3('tm_jenis_operasional', "where jenis = '$jenis'"),
            'uraian' => $this->request->getVar('uraian'),
            'jenis' => $this->request->getVar('jenis'),
        ];
        $this->data->insert($data_insert);
        session()->setFlashdata('pesan', 'Data berhasil disimpan.');
        return redirect()->to('/jenisoperasional');
    }

    public function change($id)
    {
        $rs = $this->data->getdata($id);
        if (empty($rs)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        }
        $data = [
            'content' => 'v_jenis_operasional',
            'title' => 'Jenis Operasional Change',
            'breadcrumb' => '<li>Data Master</li><li class="active">Jenis Operasional</li>',
            'menu1' => '020000',
            'menu2' => '020300',
            'data' => $this->data->getdata(),
            'action' => 'change',
            'action_link' => '/jenisoperasional/update/' . $id,
            'cancel_link' => '/jenisoperasional',

            'id' => $rs['id'],
            'uraian' => $rs['uraian'],
            'jenis' => $rs['jenis'],
        ];
        return view('layouts/main', $data);
    }
    public function update($id)
    {
        $data_update = [
            'id' => $this->request->getVar('id'),
            'uraian' => $this->request->getVar('uraian'),
            'jenis' => $this->request->getVar('jenis')
        ];
        $this->data->update($id, $data_update);
        session()->setFlashdata('pesan', 'Perubahan berhasil disimpan.');
        return redirect()->to('/jenisoperasional');
    }

    public function delete($id)
    {
        $this->data->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di hapus.');
        return redirect()->to('/jenisoperasional');
    }
}
