<?php

namespace App\Controllers;
use App\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $session = session();

        // Verificar si el usuario está autenticado
        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('/login'));
        }

        return view('dashboard');
    }
}