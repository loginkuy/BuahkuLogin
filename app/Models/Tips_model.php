<?php
 
namespace App\Models;
 
use CodeIgniter\Model;
 
class Tips_model extends Model
{
    public function getAllTips()
    {
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL =>'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/getAllTips',
            CURLOPT_CUSTOMREQUEST =>'GET',
            CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        $data = json_decode ($response, true);

        curl_close($cUrl);
        
        return $data;
    }

    public function getTipsId($id)
    {
        $cUrl = curl_init();

        $options = array(
        CURLOPT_URL => 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/getTipsById?id=' . $id . '',
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_RETURNTRANSFER => true
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        $data = json_decode($response, true);

        curl_close($cUrl);
        
        return $data;
    }

    public function deleteTips($id){
        $cUrl = curl_init();

        $options = array(
            CURLOPT_URL =>'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/deleteTipsById?id='.$id,
            CURLOPT_CUSTOMREQUEST =>'DELETE'
        );

        curl_setopt_array($cUrl, $options);

        $response = curl_exec($cUrl);

        curl_close($cUrl);
    }

    public function saveTips($id, $judul, $isi, $penulis){
        $tanggal = date("d/m/Y H:i:s");

        if(empty($id)){
            //Tambah
            $url ='https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/addTips';
            $customrequest ='POST';
            $cUrl = curl_init();
    
            $options = array(
                CURLOPT_URL => $url,
                CURLOPT_CUSTOMREQUEST =>$customrequest,
                CURLOPT_POSTFIELDS => http_build_query(array(
                    'id' => $id,
                    'judul' => $judul,
                    'tanggal' => $tanggal,
                    'isi' => $isi,
                    'penulis' => $penulis
                ))
            );
    
            curl_setopt_array($cUrl, $options);
    
            $response = curl_exec($cUrl);
    
            curl_close($cUrl);
        } else{
            // Update / Edit
            $url ='https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/editTips';
            $customrequest ='PUT';
            $cUrl = curl_init();
    
            $options = array(
                CURLOPT_URL => $url,
                CURLOPT_CUSTOMREQUEST =>$customrequest,
                CURLOPT_POSTFIELDS => http_build_query(array(
                    'id' => $id,
                    'tanggal' => $tanggal,
                    'judul' => $judul,
                    'isi' => $isi,
                    'penulis' => $penulis
                ))
            );
    
            curl_setopt_array($cUrl, $options);
    
            $response = curl_exec($cUrl);
    
            curl_close($cUrl);
        }
    }
}