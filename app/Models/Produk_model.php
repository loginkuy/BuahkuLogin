<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class Produk_model extends Model
{
    public function getAllProduk()
    {
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL =>'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/getAllProduk',
            CURLOPT_CUSTOMREQUEST =>'GET',
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        $data = json_decode ($response, true);

        curl_close($cUrl);
        
        return $data;
    }

    public function getProdukId($id)
    {
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/getProdukById?id=' . $id . '',
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        $data = json_decode($response, true);

        curl_close($cUrl);
        
        return $data;
    }
 
    public function addProduk($nama_produk, $stok, $harga, $nama_latin, $deskripsi, $khasiat, $gizi, $budidaya, $tanah, $suhu, $foto){
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/inputProduk',
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query(array(
                'nama_produk' => $nama_produk,
                'stok' => $stok,
                'harga' => $harga,
                'nama_latin' => $nama_latin,
                'deskripsi' => $deskripsi,
                'khasiat' => $khasiat,
                'gizi' => $gizi,
                'budidaya' => $budidaya,
                'tanah' => $tanah,
                'suhu' => $suhu,
                'foto' => $foto
            ))
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        curl_close($cUrl);
    }

    public function editProduk($id, $nama_produk, $stok, $harga, $nama_latin, $deskripsi, $khasiat, $gizi, $budidaya){
        $cUrl = curl_init();

            $options = array(
                CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/editproduk',
                CURLOPT_CUSTOMREQUEST => 'PUT',
                CURLOPT_POSTFIELDS => http_build_query(array(
                    'id' => $id,
                    'nama_produk' => $nama_produk,
                    'stok' => $stok,
                    'harga' => $harga,
                    'nama_latin' => $nama_latin,
                    'deskripsi' => $deskripsi,
                    'khasiat' => $khasiat,
                    'gizi' => $gizi,
                    'budidaya' => $budidaya
                ))
            );

            curl_setopt_array($cUrl, $options);

            $response = curl_exec($cUrl);

            curl_close($cUrl);
    }

    public function deleteProduk($id){
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL =>'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/deleteProdukById?id='.$id,
            CURLOPT_CUSTOMREQUEST =>'DELETE'
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        curl_close($cUrl);
    }
}