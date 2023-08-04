<?php

namespace App\Controllers;

use App\Models\SecurityModel;
use App\Models\MasterModel;
use App\Models\InstansiModel;

class InstansiController extends BaseController
{
    protected $security;
    protected $master;
    protected $data;
    public function __construct()
    {
        $this->master = new MasterModel();
        $this->data = new InstansiModel();
        // filter hak akses halaman
        $this->security = new SecurityModel();
        $menu_id = '010100';
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
            'content' => 'v_instansi',
            'title' => 'Instansi Registration',
            'breadcrumb' => '<li>Data Master</li><li class="active">Instansi</li>',
            'menu1' => '010000',
            'menu2' => '010100',
            'data' => $this->data->getdata(),
            'action' => 'view',
        ];

        return view('layouts/main', $data);
    }
    public function create()
    {
        $data = [
            'content' => 'v_instansi',
            'title' => 'Instansi Registration Create',
            'breadcrumb' => '<li>Data Master</li><li class="active">Instansi</li>',
            'menu1' => '010000',
            'menu2' => '010100',
            'action' => 'create',
            'action_link' => '/instansi/save',
            'cancel_link' => '/instansi',

            'id' => '',
            'name' => '',
            'address' => '',
            'phone' => ''
        ];
        return view('layouts/main', $data);
    }
    public function save()
    {
        $data_insert = [
            'id' => $this->request->getVar('id'),
            'name' => $this->request->getVar('name'),
            'address' => $this->request->getVar('address'),
            'phone' => $this->request->getVar('phone')
        ];
        $this->data->insert($data_insert);
        session()->setFlashdata('pesan', 'Data berhasil disimpan.');
        return redirect()->to('/instansi');
    }

    public function change($id)
    {
        $rs = $this->data->getdata($id);
        if (empty($rs)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        }
        $data = [
            'content' => 'v_instansi',
            'title' => 'Instansi Registration Change',
            'breadcrumb' => '<li>Data Master</li><li class="active">Instansi</li>',
            'menu1' => '010000',
            'menu2' => '010100',
            'action' => 'change',
            'action_link' => '/instansi/update/' . $id,
            'cancel_link' => '/instansi',

            'id' => $rs['id'],
            'name' => $rs['name'],
            'address' => $rs['address'],
            'phone' => $rs['phone']
        ];
        return view('layouts/main', $data);
    }
    public function update($id)
    {
        $data_update = [
            'id' => $this->request->getVar('id'),
            'name' => $this->request->getVar('name'),
            'address' => $this->request->getVar('address'),
            'phone' => $this->request->getVar('phone')
        ];
        $this->data->update($id, $data_update);
        session()->setFlashdata('pesan', 'Perubahan berhasil disimpan.');
        return redirect()->to('/instansi');
    }

    public function delete($id)
    {
        $this->data->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di hapus.');
        return redirect()->to('/instansi');
    }
}
