<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use CodeIgniter\Controller;
use App\Models\Produk_model;

class AdminProduk extends BaseController
{
    public function index()
    {
        $modelproduk = new Produk_model;
        $data['produk'] = $modelproduk->getAllProduk();

        return view('admin_produk', $data);
    }

    public function add()
    {
        $session = \Config\Services::session();
        $request = \Config\Services::request();
        
        $nama_produk = $request->getPost('nama_produk');
        $stok = $request->getPost('stok');
        $harga = $request->getPost('harga');
        $nama_latin = $request->getPost('nama_latin');
        $deskripsi = $request->getPost('deskripsi');
        $khasiat = $request->getPost('khasiat');
        $gizi = $request->getPost('gizi');
        $budidaya = $request->getPost('budidaya');
        $suhu = $request->getPost('suhu');
        $tanah =  implode(',', $request->getPost('tanah'));

        $foto = $this->request->getFile('foto');

        if ($foto->isValid() && !$foto->hasMoved())
        {
            $newfoto = $foto->getRandomName();
            $foto->move(ROOTPATH.'public/assets/images/produk/', $newfoto);

            $modelproduk = new Produk_model;
            $modelproduk->addProduk($nama_produk, $stok, $harga, $nama_latin, $deskripsi, $khasiat, $gizi, $budidaya, $tanah, $suhu, $newfoto);
            $session->setFlashdata('berhasilproduk', 'Berhasil Tambah Produk');
        }
        else
        {
            $session->setFlashdata('gagalproduk', 'Gagal Tambah Produk, '.$file->getErrorString());
        }

        return redirect()->back();
    }

    public function edit()
    {
        $session = \Config\Services::session();
        $request = \Config\Services::request();
        
        $id = $request->getPost('id');
        $nama_produk = $request->getPost('nama_produk');
        $stok = $request->getPost('stok');
        $harga = $request->getPost('harga');
        $nama_latin = $request->getPost('nama_latin');
        $deskripsi = $request->getPost('deskripsi');
        $khasiat = $request->getPost('khasiat');
        $gizi = $request->getPost('gizi');
        $budidaya = $request->getPost('budidaya');

        $modelproduk = new Produk_model;
        $modelproduk->editProduk($id, $nama_produk, $stok, $harga, $nama_latin, $deskripsi, $khasiat, $gizi, $budidaya);
        $session->setFlashdata('berhasilproduk', 'Berhasil Edit Produk');

        return redirect()->back();
    }

    public function delete($id)
    {
        $session = \Config\Services::session();
        $modelproduk = new Produk_model;
        $modelproduk->deleteProduk($id);
        $session->setFlashdata('berhasilproduk', 'Berhasil Hapus Produk');

        return redirect()->back();
    }


}
