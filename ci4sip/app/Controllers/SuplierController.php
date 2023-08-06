<?php

namespace App\Controllers;

use App\Models\SecurityModel;
use App\Models\MasterModel;
use App\Models\SuplierModel;

class SuplierController extends BaseController
{
    protected $security;
    protected $master;
    protected $data;
    public function __construct()
    {
        $this->master = new MasterModel();
        $this->data = new SuplierModel();
        // filter hak akses halaman
        $this->security = new SecurityModel();
        $menu_id = '030200';
        $this->security->get($menu_id);
    }

    public function index()
    {
        $data = [
            'content' => 'v_suplier',
            'title' => 'Suplier',
            'breadcrumb' => '<li>Data</li><li class="active">Suplier</li>',
            'menu1' => '030000',
            'menu2' => '030300',
            'data' => $this->data->getdata(),
            'action' => 'view',
            'action_link' => '/suplier/save',
            'cancel_link' => '/suplier',
        ];

        return view('layouts/main', $data);
    }
    public function create()
    {
        $instansi_id = session()->get('sip_instansi_id');
        $data = [
            'content' => 'v_suplier',
            'title' => 'Suplier',
            'breadcrumb' => '<li>Data</li><li class="active">suplier</li>',
            'menu1' => '030000',
            'menu2' => '030300',
            'action' => 'create',
            'action_link' => '/suplier/save',
            'cancel_link' => '/suplier',

            'id' => $instansi_id . "S" . $this->master->get_id6('tb_suplier', "where instansi_id = '$instansi_id'"),
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
        return redirect()->to('/suplier');
    }

    public function change($id)
    {
        $rs = $this->data->getdata($id);
        if (empty($rs)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        }
        $data = [
            'content' => 'v_suplier',
            'title' => 'suplier Change',
            'breadcrumb' => '<li>Data</li><li class="active">Suplier</li>',
            'menu1' => '030000',
            'menu2' => '030300',
            'action' => 'change',
            'action_link' => '/suplier/update/' . $id,
            'cancel_link' => '/suplier',

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
            'name' => $this->request->getVar('name'),
            'address' => $this->request->getVar('address'),
            'phone' => $this->request->getVar('phone'),
        ];
        $this->data->update($id, $data_update);
        session()->setFlashdata('pesan', 'Perubahan berhasil disimpan.');
        return redirect()->to('/suplier');
    }

    public function delete($id)
    {
        $this->data->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di hapus.');
        return redirect()->to('/suplier');
    }
}
