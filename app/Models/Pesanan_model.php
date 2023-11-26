<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class Pesanan_model extends Model
{
    public function getAllPesanan()
    {
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/getAllPesanan',
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        $data = json_decode($response);

        curl_close($cUrl);
        
        return $data;
    }

    public function getPesananByNopes($nopes){
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL =>'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/getPesananByNopes?nopes='.$nopes.'',
            CURLOPT_CUSTOMREQUEST =>'GET',
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        $data = json_decode ($response, true);

        curl_close($cUrl);

        return $data;
    }

    public function getPesananPemesan($pemesan){
        $cUrl = curl_init();

        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/getPesananByPemesan?pemesan=' . $pemesan . '',
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        $data = json_decode($response, true);

        curl_close($cUrl);


        return $data;
    }

    public function editPesanan($nopes, $status){
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/editPesananByNopes',
            CURLOPT_CUSTOMREQUEST =>'PUT',
            CURLOPT_POSTFIELDS => http_build_query(array(
                'nopes' => $nopes,
                'status' => $status
            ))
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        curl_close($cUrl);
    }

    public function addPesanan($nopes, $tanggal, $pemesan, $alamat, $nama_produk, $qty, $pembayaran, $total, $foto){
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/addPesanan',
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query(array(
                'nopes' => $nopes,
                'tanggal' => $tanggal,
                'pemesan' => $pemesan,
                'alamat' => $alamat,
                'produk' => $nama_produk,
                'qty' => $qty,
                'pembayaran' => $pembayaran,
                'total' => $total,
                'foto' => $foto
            ))
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        curl_close($cUrl);
    }

}