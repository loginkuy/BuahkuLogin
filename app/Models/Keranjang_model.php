<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class Keranjang_model extends Model
{
    public function getKeranjangUsername($username)
    {
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/getKeranjangByUsername2?username=' . $username . '',
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        $data = json_decode($response, true);

        curl_close($cUrl);
        
        return $data;
    }
 
    public function getKeranjangUsernameId($username, $id)
    {
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL =>'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/getKeranjangUsernameId?username='.$username.'&idPro='.$id.'',
            CURLOPT_CUSTOMREQUEST =>'GET',
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        $data = json_decode ($response);

        curl_close($cUrl);

        return $data;
    }

    public function addKeranjang($id, $produk, $harga, $username){
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/addKeranjang',
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query(array(
                'id_produk' => $id,
                'produk' => $produk,
                'harga' => $harga,
                'qty' => 1,
                'subtotal' => $harga,
                'username' => $username
            ))
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        curl_close($cUrl);
    }

    public function deleteProdukKeranjang($id){
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL =>'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/deleteProdukKeranjangById?id='.$id.'',
            CURLOPT_CUSTOMREQUEST =>'DELETE'
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        curl_close($cUrl);
    }

    public function editJumlah($id, $qty, $subtotal){
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/editProdukKeranjang',
            CURLOPT_CUSTOMREQUEST => 'PUT',
            CURLOPT_POSTFIELDS => http_build_query(array(
                'id' => $id,
                'qty' => $qty,
                'subtotal' => $subtotal
            ))
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        curl_close($cUrl);
    }

    public function deleteAllKeranjangUser($username){
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL =>'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/deleteAllKeranjangByUsername?username='.$username.'',
            CURLOPT_CUSTOMREQUEST =>'DELETE'
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        curl_close($cUrl);
    }
}