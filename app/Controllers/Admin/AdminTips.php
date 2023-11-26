<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use CodeIgniter\Controller;
use App\Models\Tips_model;

class AdminTips extends BaseController
{
    public function index()
    {
        $modeltips = new Tips_model;
        $data['tips'] = $modeltips->getAllTips();

        return view('admin_tips', $data);
    }

    public function save()
    {
        $session = \Config\Services::session();
        $request = \Config\Services::request();
        
        $id = $request->getPost('id');
        $judul = $request->getPost('judul');
        $isi = $request->getPost('isi');
        $penulis = session()->get('nama');

        $modeltips = new Tips_model;
        $modeltips->saveTips($id, $judul, $isi, $penulis);
        $session->setFlashdata('berhasiltips', 'Berhasil Simpan Tips');

        return redirect()->back();
    }

    public function delete($id)
    {
        $session = \Config\Services::session();
        $modeltips = new Tips_model;
        $modeltips->deleteTips($id);
        $session->setFlashdata('berhasiltips', 'Berhasil Hapus Tips');

        return redirect()->back();
    }
}
