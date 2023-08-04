<?php

namespace App\Controllers;

use App\Models\SecurityModel;
use App\Models\MasterModel;
use App\Models\BarangModel;

class BarangController extends BaseController
{
    protected $security;
    protected $master;
    protected $data;
    public function __construct()
    {
        $this->master = new MasterModel();
        $this->data = new BarangModel();
        // filter hak akses halaman
        $this->security = new SecurityModel();
        $menu_id = '030100';
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
        $instansi_id = session()->get('sip_instansi_id');
        $instansi_name = session()->get('sip_instansi_name');
        $data = [
            'content' => 'v_barang',
            'title' => 'Data Barang',
            'breadcrumb' => '<li>Data</li><li class="active">Barang</li>',
            'menu1' => '030000',
            'menu2' => '030100',
            'action' => 'view',
            'action_link' => '/barang/save',
            'cancel_link' => '/barang',
            'data' => $this->data->getdata(),
            'instansi_id' => $instansi_id,
            'instansi_name' => $instansi_name,
            'data_kategori' => $this->master->get('tm_kategori'),
            'kategori_selected' => '',
        ];

        return view('layouts/main', $data);
    }
    public function create()
    {
        $data = [
            'content' => 'v_barang',
            'title' => 'Barang Create',
            'breadcrumb' => '<li>Data Master</li><li class="active">Barang</li>',
            'menu1' => '030000',
            'menu2' => '030100',
            'action' => 'create',
            'action_link' => '/barang/save',
            'cancel_link' => '/barang',

            'data_instansi' => $this->master->get('tm_instansi'),
            'instansi_selected' => '',
            'instansi_id'   => session()->get('sip_instansi_id'),
            'instansi_name' => session()->get('sip_instansi_name'),
            'name' => '',
            'deskripsi' => '',
            'data_kategori' => $this->master->get('tm_kategori'),
            'data_satuan' => $this->master->get('tm_satuan'),
            'kategori_selected' => '',
            'satuan_selected' => '',
            'jumlah' => '',
            'hp' => '',
            'hj' => '',
        ];
        return view('layouts/main', $data);
    }

    public function save()
    {
        $instansi_id = session()->get('sip_instansi_id');
        $kategori = $this->request->getVar('kategori');
        $satuan = $this->request->getVar('satuan');
        $id = $instansi_id . $kategori . $this->master->get_id3('tb_barang', "where left(id,7) = '$instansi_id$kategori'");
        $data_insert = [
            'id' => $id,
            'instansi_id' => $instansi_id,
            'name' => $this->request->getVar('name'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'kategori_id' => $this->request->getVar('kategori'),
            'satuan_id' => $this->request->getVar('satuan'),
            'jumlah' => $this->request->getVar('jumlah'),
            'hp' => str_replace(".", "", $this->request->getVar('hp')),
            'hj' => str_replace(".", "", $this->request->getVar('hj')),
        ];
        //dd($data_insert);
        $this->data->insert($data_insert);
        session()->setFlashdata('pesan', 'Data berhasil disimpan.');
        return redirect()->to('/barang');
    }

    public function change($id)
    {
        $rs = $this->data->getdata($id);
        if (empty($rs)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        }
        $data = [
            'content' => 'v_barang',
            'title' => 'Barang Change',
            'breadcrumb' => '<li>Data Master</li><li class="active">Barang</li>',
            'menu1' => '030000',
            'menu2' => '030100',
            'action' => 'change',
            'action_link' => '/barang/update/' . $id,
            'cancel_link' => '/barang',

            'data_instansi' => $this->master->get('tm_instansi'),
            'instansi_selected' => $rs['instansi_id'],
            'data_kategori' => $this->master->get('tm_kategori'),
            'data_satuan' => $this->master->get('tm_satuan'),

            'instansi_id'   => session()->get('sip_instansi_id'),
            'instansi_name' => session()->get('sip_instansi_name'),
            'name'          => $rs['name'],
            'deskripsi'     => $rs['deskripsi'],
            'kategori_selected'      => $rs['kategori_id'],
            'satuan_selected'        => $rs['satuan_id'],
            'jumlah'        => $rs['jumlah'],
            'hp'        => number_format($rs['hp'], 0, ",", "."),
            'hj'        => number_format($rs['hj'], 0, ",", "."),
        ];
        return view('layouts/main', $data);
    }
    public function update($id)
    {
        $kategori = $this->request->getVar('kategori');
        $satuan = $this->request->getVar('satuan');
        $data_update = [
            'name' => $this->request->getVar('name'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'kategori_id' => $kategori,
            'satuan_id' => $satuan,
            'jumlah' => $this->request->getVar('jumlah'),
            'hp' => str_replace(".", "", $this->request->getVar('hp')),
            'hj' => str_replace(".", "", $this->request->getVar('hj')),
        ];
        //dd($data_update);
        $this->data->update($id, $data_update);
        session()->setFlashdata('pesan', 'Perubahan berhasil disimpan.');
        return redirect()->to('/barang');
    }

    public function delete($id)
    {
        $this->data->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di hapus.');
        return redirect()->to('/barang');
    }
}
