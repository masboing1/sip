<?php

namespace App\Controllers;

use App\Models\UsersModel;
use App\Models\SecurityModel;
use App\Models\MasterModel;

class UsersController extends BaseController
{
    protected $user;
    protected $security;
    protected $master;
    public function __construct()
    {
        $this->user = new UsersModel();
        $this->master = new MasterModel();
        // filter hak akses halaman
        $this->security = new SecurityModel();
        $menu_id = '010200';
        $this->security->get($menu_id);
    }

    public function index()
    {
        $data = [
            'content' => 'v_users',
            'title' => 'User Registration',
            'breadcrumb' => '<li>Data Master</li><li class="active">User</li>',
            'menu1' => '010000',
            'menu2' => '010200',
            'user' => $this->user->getdata(),
            'action' => 'view',
        ];

        return view('layouts/main', $data);
    }
    public function create()
    {
        $validation = \Config\Services::validation();
        $data = [
            'content' => 'v_users',
            'title' => 'User Registration Create',
            'breadcrumb' => '<li>Data Master</li><li class="active">User</li>',
            'menu1' => '010000',
            'menu2' => '010200',
            'action' => 'create',
            'action_link' => '/users/save',
            'cancel_link' => '/users',
            'validation' => $validation,

            'data_level' => $this->master->get('tm_level'),
            'level_selected' => '',
            'data_instansi' => $this->master->get('tm_instansi'),
            'instansi_selected' => '',
            'username' => '',
            'name' => '',
            'password' => '',
            'level' => 'operasional',
            'foto' => 'default.jpg'

        ];

        return view('layouts/main', $data);
    }
    public function save()
    {
        //dd($this->request->getVar());
        $valid = $this->validate([
            'name' => 'required',
            'username' => [
                'rules' => 'required|is_unique[tm_users.username]',
                'errors' => [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} Sudah ada'
                ]
            ],
            'password' => 'required',
            'level' => 'required',
            'foto' => 'max_size[foto,2048]|is_image[foto]|mime_in[foto,image/jpg,image/jpeg,image/png]'
        ]);

        if (!$valid) {
            $validation = \Config\Services::validation();
            $data = [
                'content' => 'v_users',
                'title' => 'User Registration Create',
                'breadcrumb' => '<li>Data Master</li><li class="active">User</li>',
                'menu1' => '010000',
                'menu2' => '010200',
                'action' => 'create',
                'action_link' => '/users/save',
                'cancel_link' => '/users',
                'validation' => $validation,
                'data_level' => $this->master->get('tm_level'),
                'level_selected' => '',
                'data_instansi' => $this->master->get('tm_instansi'),
                'instansi_selected' => '',

                'name' => $this->request->getVar('name'),
                'username' => $this->request->getVar('username'),
                'password' => '',
                'foto' => '',
                'level' => $this->request->getVar('level')

            ];

            return view('layouts/main', $data);
        } else {
            $filefoto = $this->request->getFile('foto');
            if ($filefoto->getError() == 4) {
                $filename = 'default.jpg';
            } else {
                $filename = $filefoto->getRandomName();
                $filefoto->move('adminlte/dist/img', $filename);
            }

            $data_insert = [
                'instansi_id' => $this->request->getVar('instansi_id'),
                'name' => $this->request->getVar('name'),
                'username' => $this->request->getVar('username'),
                'password' => md5($this->request->getVar('password')),
                'level' => $this->request->getVar('level'),
                'foto' => $filename
            ];
            $this->user->insert($data_insert);
            session()->setFlashdata('pesan', 'Data berhasil disimpan.');
            return redirect()->to('/users');
        }
    }

    public function change($id)
    {
        $validation = \Config\Services::validation();
        $rs = $this->user->getdata($id);
        if (empty($rs)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Username ' . $id . ' tidak ditemukan');
        }
        $data = [
            'content' => 'v_users',
            'title' => 'User Registration Change',
            'breadcrumb' => '<li>Data Master</li><li class="active">User</li>',
            'menu1' => '010000',
            'menu2' => '010200',
            'action' => 'change',
            'action_link' => '/users/update/' . $id,
            'cancel_link' => '/users',
            'validation' => $validation,
            'data_level' => $this->master->get('tm_level'),
            'data_instansi' => $this->master->get('tm_instansi'),

            'name' => $rs['name'],
            'instansi_selected' => $rs['instansi_id'],
            'level_selected' => $rs['level'],
            'foto' => $rs['foto'],

        ];

        return view('layouts/main', $data);
    }
    public function update($id)
    {
        $valid = $this->validate([
            'name' => 'required',
            'level' => 'required'
        ]);
        if (!$valid) {
            $validation = \Config\Services::validation();
            $data = [
                'content' => 'v_user',
                'title' => 'User Registration Change',
                'breadcrumb' => '<li>Data Master</li><li class="active">User</li>',
                'menu1' => '010000',
                'menu2' => '010200',
                'action' => 'change',
                'action_link' => '/users/update',
                'cancel_link' => '/users',
                'validation' => $validation,

                'instansi' => $this->request->getVar('instansi_id'),
                'name' => $this->request->getVar('name'),
                'level' => $this->request->getVar('level'),
                'foto' => ''
            ];

            return view('layouts/main', $data);
        } else {
            $filefoto = $this->request->getFile("foto");
            $fotolama = $this->request->getVar("fotolama");
            if ($filefoto->getError() == 4) {
                $filename = $fotolama;
            } else {
                $filename = $filefoto->getRandomName();
                $filefoto->move('adminlte/dist/img', $filename);
                if ($fotolama != 'default.jpg') {
                    unlink('adminlte/dist/img/' . $fotolama);
                }
            }
            $this->user->save([
                'username' => $id,
                'instansi_id' => $this->request->getVar('instansi_id'),
                'name' => $this->request->getVar('name'),
                'level' => $this->request->getVar('level'),
                'foto' => $filename
            ]);
            session()->setFlashdata('pesan', 'Perubahan berhasil disimpan.');
            return redirect()->to('/users');
        }
    }

    public function delete($username)
    {
        $user = $this->user->find($username);
        $foto = $user['foto'];
        if ($foto != 'default.jpg') {
            unlink('adminlte/dist/img/' . $foto);
        }
        $this->user->delete($username);
        session()->setFlashdata('pesan', 'Data berhasil di hapus.');
        return redirect()->to('/users');
    }
}
