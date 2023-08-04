<?php

namespace App\Controllers;

use App\Models\UsersModel;

class PasswordController extends BaseController
{
    protected $user;
    public function __construct()
    {
        $this->user = new UsersModel();
    }

    public function index()
    {
        $username = session()->get('toko_username');

        $data = [
            'content' => 'v_password',
            'title' => 'Password Change',
            'menu1' => '0',
            'menu2' => '',

            'action' => 'change',
            'action_link' => '/password/update/' . $username,
            'cancel_link' => '/',
        ];
        return view('layouts/main', $data);
    }
    public function reset($username)
    {
        $data = [
            'content' => 'v_password',
            'title' => 'Password Reset',
            'menu1' => '0',
            'menu2' => '',

            'action' => 'reset',
            'action_link' => '/password/doreset/' . $username,
            'cancel_link' => '/user',
        ];
        return view('layouts/main', $data);
    }

    public function update($id)
    {
        $rs = $this->user->getdata($id);
        if (empty($rs)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Username ' . $id . ' tidak ditemukan');
        } else {
            $password = $rs['password'];
            $password_lama = md5($this->request->getVar('password_lama'));
            if ($password == $password_lama) {
                $password_baru = md5($this->request->getVar('password_baru'));
                $konfirmasi_password = md5($this->request->getVar('konfirmasi_password'));
                if ($password_baru == $konfirmasi_password) {
                    db_connect()->query("update tm_pengguna set password = '$password_baru' where username = '$id'");
                    session()->setFlashdata('pesan', 'Perubahan berhasil disimpan.');
                    return redirect()->to('/');
                } else {
                    session()->setFlashdata('error', 'Konfirmasi password tidak sesuai.');
                    return redirect()->to('/password');
                }
            } else {
                session()->setFlashdata('error', 'Password lama salah !!!.');
                return redirect()->to('/password');
            }
        }
    }
    public function doreset($id)
    {
        $rs = $this->user->getdata($id);
        if (empty($rs)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Username ' . $id . ' tidak ditemukan');
        } else {
            $password_baru = md5($this->request->getVar('password_baru'));
            $konfirmasi_password = md5($this->request->getVar('konfirmasi_password'));
            if ($password_baru == $konfirmasi_password) {
                db_connect()->query("update tm_pengguna set password = '$password_baru' where username = '$id'");
                session()->setFlashdata('pesan', 'Perubahan berhasil disimpan.');
                return redirect()->to('/user');
            } else {
                session()->setFlashdata('error', 'Konfirmasi password tidak sesuai.');
                return redirect()->to('/password');
            }
        }
    }
}
