<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin_model;

class AdminProfil extends BaseController
{
    public function index()
    {
        $username = session()->get('username');

        $modeladmin = new Admin_model;

        $data['profil'] = $modeladmin->getAdminUsername($username);

        return view('admin_profil', $data);
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
            $modeladmin = new Admin_model;
            $modeladmin->ubahProfil($id, $usernamebaru, $nama, $alamat, $telepon, $email);

            $session->set([
                'username' => $usernamebaru,
                'nama' => $nama
            ]);

            $session->setFlashdata('berhasilprofil', 'Berhasil Edit Profil');
        }else{
            $modeladmin = new Admin_model;

            $data = $modeladmin->getAdminUsername($usernamebaru);
            if ($data){
                $session->setFlashdata('gagalprofil', 'Gagal Edit Profil! Username Sudah Tersedia.');
            }else{
                $modeladmin = new Admin_model;
                $modeladmin->ubahProfil($id, $usernamebaru, $nama, $alamat, $telepon, $email);

                $session->set([
                    'username' => $usernamebaru,
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

        $username = session()->get('username');
        $foto = $this->request->getFile('foto');

        if ($foto->isValid() && !$foto->hasMoved())
        {
            $newfoto = $foto->getRandomName();
            $foto->move(ROOTPATH.'public/assets/images/profile/admin/', $newfoto);

            $modeladmin = new Admin_model;
            $modeladmin->ubahFoto($username, $newfoto);
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
                $modeladmin = new Admin_model;
                $modeladmin->ubahPassword($username, $passwordBaru);
                $session->setFlashdata('berhasilprofil', 'Berhasil Edit Password.');
            }
        }
        return redirect()->back();
    }

    public function delete($username)
    {
        $modeladmin = new Admin_model;
        $modeladmin->deleteAdmin($username);

        return redirect()->to('Admin/Out');
    }
}
