<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Tips_model;
use App\Models\Produk_model;

class Beranda extends BaseController
{
    public function index()
    {
        $modeltips = new Tips_model;
        $modelproduk = new Produk_model;
        $data['tips'] = $modeltips->getAllTips();
        $data['toko'] = $modelproduk->getAllProduk();

        return view('beranda', $data);
    }
}