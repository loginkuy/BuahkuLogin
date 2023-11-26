<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Produk_model;

class Budidaya extends BaseController
{
    public function index()
    {
        $modelproduk = new Produk_model;
        $data['budidaya'] = $modelproduk->getAllProduk();

        return view('budidaya', $data);
    }

    public function detail($id)
    {
        $modelproduk = new Produk_model;
        $data['budidaya'] = $modelproduk->getProdukId($id);

        return view('detail-budidaya', $data);
    }
}