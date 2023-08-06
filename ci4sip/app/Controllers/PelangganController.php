<?php

namespace App\Controllers;

use App\Models\SecurityModel;
use App\Models\MasterModel;
use App\Models\PelangganModel;

class PelangganController extends BaseController
{
    protected $security;
    protected $master;
    protected $data;
    public function __construct()
    {
        $this->master = new MasterModel();
        $this->data = new PelangganModel();
        // filter hak akses halaman
        $this->security = new SecurityModel();
        $menu_id = '030200';
        $this->security->get($menu_id);
    }

    public function index()
    {
        $data = [
            'content' => 'v_pelanggan',
            'title' => 'Pelanggan',
            'breadcrumb' => '<li>Data</li><li class="active">Pelanggan</li>',
            'menu1' => '030000',
            'menu2' => '030200',
            'data' => $this->data->getdata(),
            'action' => 'view',
            'action_link' => '/pelanggan/save',
            'cancel_link' => '/pelanggan',
        ];

        return view('layouts/main', $data);
    }
    public function create()
    {
        $instansi_id = session()->get('sip_instansi_id');
        $data = [
            'content' => 'v_pelanggan',
            'title' => 'Pelanggan',
            'breadcrumb' => '<li>Data</li><li class="active">Pelanggan</li>',
            'menu1' => '030000',
            'menu2' => '030200',
            'action' => 'create',
            'action_link' => '/pelanggan/save',
            'cancel_link' => '/pelanggan',

            'id' => $instansi_id . "P" . $this->master->get_id6('tb_pelanggan', "where instansi_id like '$instansi_id%'"),
            'name' => '',
            'address' => '',
            'phone' => '',
        ];

        return view('layouts/main', $data);
    }

    public function save()
    {
        $data_insert = [
            'id' => $this->request->getVar('id'),
            'instansi_id' => session()->get('sip_instansi_id'),
            'name' => $this->request->getVar('name'),
            'address' => $this->request->getVar('address'),
            'phone' => $this->request->getVar('phone'),
        ];
        $this->data->insert($data_insert);
        session()->setFlashdata('pesan', 'Data berhasil disimpan.');
        return redirect()->to('/pelanggan');
    }

    public function change($id)
    {
        $rs = $this->data->getdata($id);
        if (empty($rs)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        }
        $data = [
            'content' => 'v_pelanggan',
            'title' => 'Pelanggan Change',
            'breadcrumb' => '<li>Data</li><li class="active">Pelanggan</li>',
            'menu1' => '030000',
            'menu2' => '030200',
            'action' => 'change',
            'action_link' => '/pelanggan/update/' . $id,
            'cancel_link' => '/pelanggan',

            'data' => $this->data->getdata(),
            'id' => $rs['id'],
            'name' => $rs['name'],
            'address' => $rs['address'],
            'phone' => $rs['phone'],
        ];
        return view('layouts/main', $data);
    }
    public function update($id)
    {
        $data_update = [
            'id' => $this->request->getVar('id'),
            'name' => $this->request->getVar('name'),
            'address' => $this->request->getVar('address'),
            'phone' => $this->request->getVar('phone'),
        ];
        $this->data->update($id, $data_update);
        session()->setFlashdata('pesan', 'Perubahan berhasil disimpan.');
        return redirect()->to('/pelanggan');
    }

    public function delete($id)
    {
        $this->data->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di hapus.');
        return redirect()->to('/pelanggan');
    }
}
