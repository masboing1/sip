<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function index()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/');
        }
        return view('v_login');
    }

    public function dologin()
    {
        $session = session();
        $u = $this->request->getVar('username');
        $pwd = md5($this->request->getVar('password'));

        $db = db_connect();
        $query = $db->query("SELECT tm_instansi.*,username,level,password,foto, tm_users.name as u_name from tm_users,tm_instansi WHERE username = '$u' and password = '$pwd' and tm_users.instansi_id = tm_instansi.id");
        if ($query->getNumRows() > 0) {
            foreach ($query->getResult() as $row) {
                $login = [
                    'logged_in'         => true,
                    'sip_username'      => $row->username,
                    'sip_name'          => $row->u_name,
                    'sip_level'         => $row->level,
                    'sip_foto'          => $row->foto,
                    'sip_instansi_id'   => $row->id,
                    'sip_instansi_name' => $row->name,
                    'sip_instansi_address' => $row->address,
                ];
            }
            $session->set($login);
            return redirect()->to('/');
        } else {
            $session->setFlashdata('error', 'Username/Password salah!');
            return redirect()->to('/login');
        }
    }

    public function dologout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
