<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pesanan_model;

class Pesanan extends BaseController
{
    public function index()
    {
        $username = session()->get('usernameuser');
        $modelpesanan = new Pesanan_model;
        $data['pesanan'] = $modelpesanan->getPesananPemesan($username);

        return view('pesanan', $data);
    }
}