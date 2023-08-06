<?php

namespace App\Controllers;

use App\Models\SecurityModel;
use App\Models\MasterModel;
use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    protected $security;
    protected $master;
    protected $data;
    public function __construct()
    {
        $this->master = new MasterModel();
        $this->data = new KategoriModel();
        // filter hak akses halaman
        $this->security = new SecurityModel();
        $menu_id = '020200';
        $this->security->get($menu_id);
    }

    public function index()
    {
        $data = [
            'content' => 'v_kategori',
            'title' => 'Kategori',
            'breadcrumb' => '<li>Data Master</li><li class="active">Kategori</li>',
            'menu1' => '020000',
            'menu2' => '020200',
            'data' => $this->data->getdata(),
            'action' => 'view',
            'action_link' => '/kategori/save',
            'cancel_link' => '/kategori',
        ];

        return view('layouts/main', $data);
    }
    public function create()
    {
        $data = [
            'content' => 'v_kategori',
            'title' => 'Kategori',
            'breadcrumb' => '<li>Data Master</li><li class="active">Kategori</li>',
            'menu1' => '020000',
            'menu2' => '020200',
            'action' => 'create',
            'action_link' => '/kategori/save',
            'cancel_link' => '/kategori',

            'id' => $this->master->get_id('tm_kategori', 'id'),
            'kategori' => ''
        ];

        return view('layouts/main', $data);
    }

    public function save()
    {
        $data_insert = [
            'id' => $this->request->getVar('id'),
            'kategori' => $this->request->getVar('kategori')
        ];
        $this->data->insert($data_insert);
        session()->setFlashdata('pesan', 'Data berhasil disimpan.');
        return redirect()->to('/kategori');
    }

    public function change($id)
    {
        $rs = $this->data->getdata($id);
        if (empty($rs)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        }
        $data = [
            'content' => 'v_kategori',
            'title' => 'Kategori Change',
            'breadcrumb' => '<li>Data Master</li><li class="active">Kategori</li>',
            'menu1' => '020000',
            'menu2' => '020200',
            'data' => $this->data->getdata(),
            'action' => 'change',
            'action_link' => '/kategori/update/' . $id,
            'cancel_link' => '/kategori',

            'id' => $rs['id'],
            'kategori' => $rs['kategori']
        ];
        return view('layouts/main', $data);
    }
    public function update($id)
    {
        $data_update = [
            'id' => $this->request->getVar('id'),
            'kategori' => $this->request->getVar('kategori')
        ];
        $this->data->update($id, $data_update);
        session()->setFlashdata('pesan', 'Perubahan berhasil disimpan.');
        return redirect()->to('/kategori');
    }

    public function delete($id)
    {
        $this->data->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di hapus.');
        return redirect()->to('/kategori');
    }
}
