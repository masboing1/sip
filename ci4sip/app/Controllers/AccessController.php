<?php

namespace App\Controllers;

use App\Models\SecurityModel;
use App\Models\MasterModel;
use App\Models\AccessModel;

class AccessController extends BaseController
{
    protected $security;
    protected $master;
    protected $data;
    public function __construct()
    {
        $this->master = new MasterModel();
        $this->data = new AccessModel();
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

    public function change($id)
    {
        $rs = $this->data->findAll();
        if (empty($rs)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Data ' . $id . ' tidak ditemukan');
        }
        $data = [
            'content' => 'v_access',
            'title' => 'Hak Akses Level Change',
            'breadcrumb' => '<li>Data Master</li><li class="active">Hak Akses Level</li>',
            'menu1' => '010000',
            'menu2' => '010300',
            'action' => 'change',
            'action_link' => '/access/update/' . $id,
            'cancel_link' => '/level',
            'data_level' => $this->master->get('tm_level'),
            'level_selected' => $id,
            'data' => $rs,
        ];
        return view('layouts/main', $data);
    }
    public function update($id)
    {
        db_connect()->query("DELETE FROM tb_access where level = '$id'");
        if (!empty($_POST['check_list1'])) {
            foreach ($_POST['check_list1'] as $selected) {
                $sql = "INSERT INTO tb_access (level, menu_id) VALUES ('$id','$selected')";
                db_connect()->query($sql);
            }
        }
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
