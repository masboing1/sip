<?php

namespace App\Controllers;

use App\Models\SecurityModel;
use App\Models\MasterModel;
use App\Models\LevelModel;

class LevelController extends BaseController
{
    protected $security;
    protected $master;
    protected $data;
    public function __construct()
    {
        $this->master = new MasterModel();
        $this->data = new levelModel();
        // filter hak akses halaman
        $this->security = new SecurityModel();
        $menu_id = '010300';
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
            'content' => 'v_level',
            'title' => 'Level',
            'breadcrumb' => '<li>Data Master</li><li class="active">Level</li>',
            'menu1' => '010000',
            'menu2' => '010300',
            'data' => $this->data->getdata(),
            'action' => 'view',
            'action_link' => '/level/save',
            'cancel_link' => '/level',

            'level' => ''
        ];

        return view('layouts/main', $data);
    }
    public function create()
    {
        $data = [
            'content' => 'v_level',
            'title' => 'Level',
            'breadcrumb' => '<li>Data Master</li><li class="active">Level</li>',
            'menu1' => '010000',
            'menu2' => '010300',
            'action' => 'create',
            'action_link' => '/level/save',
            'cancel_link' => '/level',

            'level' => ''
        ];

        return view('layouts/main', $data);
    }

    public function save()
    {
        $data_insert = [
            'level' => $this->request->getVar('level')
        ];
        $this->data->insert($data_insert);
        session()->setFlashdata('pesan', 'Data berhasil disimpan.');
        return redirect()->to('/level');
    }

    public function change($id)
    {
        $rs = $this->data->getdata($id);
        if (empty($rs)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        }
        $data = [
            'content' => 'v_level',
            'title' => 'Level Change',
            'breadcrumb' => '<li>Data Master</li><li class="active">Level</li>',
            'menu1' => '010000',
            'menu2' => '010300',
            'action' => 'change',
            'action_link' => '/level/update/' . $id,
            'cancel_link' => '/level',
            'data' => $rs,
            'level' => $rs['level']
        ];
        return view('layouts/main', $data);
    }
    public function update($id)
    {
        $data_update = [
            'level' => $this->request->getVar('level')
        ];
        $this->data->update($id, $data_update);
        session()->setFlashdata('pesan', 'Perubahan berhasil disimpan.');
        return redirect()->to('/level');
    }

    public function delete($id)
    {
        $this->data->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di hapus.');
        return redirect()->to('/level');
    }
}
