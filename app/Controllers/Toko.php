<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Produk_model;

class Toko extends BaseController
{
    public function index()
    {
        $modelproduk = new Produk_model;
        $data['toko'] = $modelproduk->getAllProduk();

        return view('toko', $data);
    }

    public function detail($id)
    {
        $modelproduk = new Produk_model;
        $data['produk'] = $modelproduk->getProdukId($id);

        return view('detail-produk', $data);
    }
}