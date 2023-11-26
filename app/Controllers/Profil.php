<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengguna_model;

class Profil extends BaseController
{
    public function index()
    {
        $username = session()->get('usernameuser');

        $modelpengguna = new Pengguna_model;

        $data['profil'] = $modelpengguna->getPenggunaUsername($username);

        return view('profil', $data);
    }

    public function editProfil()
    {
        $session = \Config\Services::session();
        $request = \Config\Services::request();
        $id = $request->getPost('id');
        $username = $request->getPost('username');
        $usernamebaru = $request->getPost('usernamebaru');
        $telepon = $request->getPost('telepon');
        $email = $request->getPost('email');
        $alamat = $request->getPost('alamat');
        $nama = $request->getPost('nama');

        if ($username == $usernamebaru){
            $modelpengguna = new Pengguna_model;
            $modelpengguna->ubahProfil($id, $usernamebaru, $nama, $alamat, $telepon, $email);

            $session->set([
                'usernameuser' => $usernamebaru,
                'nama' => $nama
            ]);

            $session->setFlashdata('berhasilprofil', 'Berhasil Edit Profil');
        }else{
            $modelpengguna = new Pengguna_model;

            $data = $modelpengguna->getPenggunaUsername($usernamebaru);
            if ($data){
                $session->setFlashdata('gagalprofil', 'Gagal Edit Profil! Username Sudah Tersedia.');
            }else{
                $modelpengguna = new Pengguna_model;
                $modelpengguna->ubahProfil($id, $usernamebaru, $nama, $alamat, $telepon, $email);

                $session->set([
                    'usernameuser' => $usernamebaru,
                    'nama' => $nama
                ]);

                $session->setFlashdata('berhasilprofil', 'Berhasil Edit Profil');
            }
        }
        return redirect()->back();
    }

    public function editFoto()
    {
        $session = \Config\Services::session();
        $request = \Config\Services::request();

        $username = session()->get('usernameuser');
        $foto = $this->request->getFile('foto');

        if ($foto->isValid() && !$foto->hasMoved())
        {
            $newfoto = $foto->getRandomName();
            $foto->move(ROOTPATH.'public/assets/images/profile/pengguna/', $newfoto);

            $modelpengguna = new Pengguna_model;
            $modelpengguna->ubahFoto($username, $newfoto);
            $session->setFlashdata('berhasilprofil', 'Berhasil Edit Foto Profil');
            $session->set([
                'foto' => $newfoto
            ]);
        }
        else
        {
            $session->setFlashdata('gagalprofil', 'Gagal Edit Foto Profil, '.$file->getErrorString());
        }
        return redirect()->back();
    }

    public function editPassword()
    {
        $session = \Config\Services::session();
        $request = \Config\Services::request();
        $pass = $request->getPost('pass');
        $username = $request->getPost('username');
        $passwordLama = crypt($request->getPost('passwordLama'), 'login');
        $passwordBaru = crypt($request->getPost('passwordBaru'), 'login');
        $confirm_password = crypt($request->getPost('confirm_password'), 'login');

        if ($pass != $passwordLama){
            $session->setFlashdata('gagalprofil', 'Gagal Edit Password! Password Lama Anda Salah.');
        }else{
            if($passwordBaru != $confirm_password){
                $session->setFlashdata('gagalprofil', 'Gagal Edit Password! Password Baru Anda Berbeda.');
            }else{
                $modelpengguna = new Pengguna_model;
                $modelpengguna->ubahPassword($username, $passwordBaru);
                $session->setFlashdata('berhasilprofil', 'Berhasil Edit Password.');
            }
        }
        return redirect()->back();
    }

    public function delete($username)
    {
        $modelpengguna = new Pengguna_model;
        $modelpengguna->deletePengguna($username);

        return redirect()->to('Out');
    }
}
