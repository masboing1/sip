<?php

namespace App\Controllers;

use App\Models\SecurityModel;
use App\Models\MasterModel;
use App\Models\SatuanModel;

class SatuanController extends BaseController
{
    protected $security;
    protected $master;
    protected $data;
    public function __construct()
    {
        $this->master = new MasterModel();
        $this->data = new SatuanModel();
        // filter hak akses halaman
        $this->security = new SecurityModel();
        $menu_id = '020100';
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
            'content' => 'v_satuan',
            'title' => 'Satuan',
            'breadcrumb' => '<li>Data Master</li><li class="active">Satuan</li>',
            'menu1' => '020000',
            'menu2' => '020100',
            'data' => $this->data->getdata(),
            'action' => 'view',
            'action_link' => '/satuan/save',
            'cancel_link' => '/satuan',
        ];

        return view('layouts/main', $data);
    }
    public function create()
    {
        $data = [
            'content' => 'v_satuan',
            'title' => 'Satuan Create',
            'breadcrumb' => '<li>Data Master</li><li class="active">Satuan</li>',
            'menu1' => '020000',
            'menu2' => '020100',
            'action' => 'create',
            'action_link' => '/satuan/save',
            'cancel_link' => '/satuan',

            'id' => $this->master->get_id('tm_satuan', 'id'),
            'satuan' => ''
        ];
        return view('layouts/main', $data);
    }

    public function save()
    {
        $data_insert = [
            'id' => $this->request->getVar('id'),
            'satuan' => $this->request->getVar('satuan')
        ];
        $this->data->insert($data_insert);
        session()->setFlashdata('pesan', 'Data berhasil disimpan.');
        return redirect()->to('/satuan');
    }

    public function change($id)
    {
        $rs = $this->data->getdata($id);
        if (empty($rs)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        }
        $data = [
            'content' => 'v_satuan',
            'title' => 'Satuan Change',
            'breadcrumb' => '<li>Data Master</li><li class="active">Satuan</li>',
            'menu1' => '020000',
            'menu2' => '020100',
            'data' => $this->data->getdata(),
            'action' => 'change',
            'action_link' => '/satuan/update/' . $id,
            'cancel_link' => '/satuan',

            'id' => $rs['id'],
            'satuan' => $rs['satuan']
        ];
        return view('layouts/main', $data);
    }
    public function update($id)
    {
        $data_update = [
            'id' => $this->request->getVar('id'),
            'satuan' => $this->request->getVar('satuan')
        ];
        $this->data->update($id, $data_update);
        session()->setFlashdata('pesan', 'Perubahan berhasil disimpan.');
        return redirect()->to('/satuan');
    }

    public function delete($id)
    {
        $this->data->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di hapus.');
        return redirect()->to('/satuan');
    }
}
