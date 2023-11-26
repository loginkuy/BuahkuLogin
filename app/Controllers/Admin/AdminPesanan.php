<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use CodeIgniter\Controller;
use App\Models\Pesanan_model;
use TCPDF;

class AdminPesanan extends BaseController
{
    public function index()
    {
        $modelpesanan = new Pesanan_model;
        $data['pesanan'] = $modelpesanan->getAllPesanan();

        return view('admin_pesanan', $data);
    }

    public function edit()
    {
        $session = \Config\Services::session();
        $request = \Config\Services::request();
        
        $nopes = $request->getPost('nopes2');
        $status = $request->getPost('status');
        
        $modelpesanan = new Pesanan_model;
        $modelpesanan->editPesanan($nopes, $status);
        $session->setFlashdata('berhasilpesanan', 'Berhasil Edit Pesanan');

        return redirect()->back();
    }

    public function resi($nopes)
	{
        $modelpesanan = new Pesanan_model;
        
        $data['pesanan'] = $modelpesanan->getPesananByNopes($nopes);

		$html = view('admin_resi', $data);

		$pdf = new TCPDF('L', PDF_UNIT, 'A5', true, 'UTF-8', false);

		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('BuahKu');
		$pdf->SetTitle('Resi Pesanan '.$nopes);
		$pdf->SetSubject('Resi Pesanan');

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->addPage();

		$pdf->writeHTML($html, true, false, true, false, '');
		$this->response->setContentType('application/pdf');
		$pdf->Output('Resi-'.$nopes.'.pdf', 'I');
		
	}
}
