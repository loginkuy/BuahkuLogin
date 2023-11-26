<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class Admin_model extends Model
{
    public function getAdminUsernamePassword($username, $password)
    {
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL =>'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/getAdminByUsernamePassword?username='.$username.'&password='.crypt($password, "login").'',
            CURLOPT_CUSTOMREQUEST =>'GET',
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        $data = json_decode ($response);

        curl_close($cUrl);
        
        return $data;
    }
 
    public function getAdminUsername($username)
    {
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/getAdminByUsername?username=' . $username . '',
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        $data = json_decode($response);

        curl_close($cUrl);

        return $data;
    }

    public function addAdmin($username, $nama, $alamat, $telepon, $email, $password){
        $passenc = crypt($password, 'login');

        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/daftarAdmin',
            CURLOPT_CUSTOMREQUEST =>'POST',
            CURLOPT_POSTFIELDS => http_build_query(array(
                'username' => $username,
                'nama' => $nama,
                'email' => $email,
                'alamat' => $alamat,
                'telepon' => $telepon,
                'password' => $passenc
            ))
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        curl_close($cUrl);
    }

    public function ubahProfil($id, $usernamebaru, $nama, $alamat, $telepon, $email){
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/editProfileAdmin',
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => http_build_query(array(
                'id' => $id,
                'username' => $usernamebaru,
                'nama' => $nama,
                'email' => $email,
                'alamat' => $alamat,
                'telepon' => $telepon
            ))
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        curl_close($cUrl);
    }

    public function ubahPassword($username, $password){
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/editPasswordAdmin',
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => http_build_query(array(
                'username' => $username,
                'password' => $password
            ))
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        curl_close($cUrl);
    }

    public function ubahFoto($username, $foto){
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/editFotoProfileAdmin',
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => http_build_query(array(
                'username' => $username,
                'foto' => $foto
            ))
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        curl_close($cUrl);
    }

    public function deleteAdmin($username){
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL =>'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/deleteAdminByUsername?username='.$username,
            CURLOPT_CUSTOMREQUEST =>'DELETE'
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        curl_close($cUrl);
    }
}
