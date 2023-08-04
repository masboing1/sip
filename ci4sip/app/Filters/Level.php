<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Level implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('toko_level') != 'superadmin') {
            session()->setFlashdata("error", "Akses ditolak!");
            header('Location: /');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
