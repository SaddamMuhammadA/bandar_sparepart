<?php
namespace App\Controllers;

use TCPDF;

class Transaksi extends BaseController
{
	public function __construct()
	{
		helper('form');
		$this->validation = \Config\Services::validation();
		$this->session = session();
		$this->email = \Config\Services::email();
	}

	public function view()
	{
		$id = $this->request->uri->getSegment(3);

		$transaksiModel = new \App\Models\TransaksiModel();
		$transaksi = $transaksiModel->select('*, transaksi.id AS id_trans')->join('barang', 'barang.id=transaksi.id_barang')
					->join('user', 'user.id=transaksi.id_pembeli')
					->where('transaksi.id', $id)
					->first();

		return view('transaksi/view',[
			'transaksi'=>$transaksi,
		]);
	}

	public function index(){
		$transaksiModel = new \App\Models\TransaksiModel();
		$model = $transaksiModel->findAll();
		return view('transaksi/index',[
			'model' => $model,
		]);
	}

	public function invoice()
	{
		$id = $this->request->uri->getSegment(3);

		$transaksiModel = new \App\Models\TransaksiModel();  //ambil data transaksi
		$transaksi = $transaksiModel->find($id);				//ambil transaksi berdasarkan id yg di passing dari view index

		$userModel = new \App\Models\UserModel();				//menampilkan id pembeli
		$pembeli = $userModel->find($transaksi->id_pembeli);		//memanggil pembeli berdasarkan id pembeli

		$barangModel = new \App\Models\BarangModel();			//memanggil row barang
		$barang = $barangModel->find($transaksi->id_barang);

		$html = view('transaksi/invoice',[			//passing data ke view
			'transaksi'=> $transaksi,
			'pembeli' => $pembeli,
			'barang' => $barang,
		]);

		$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);  //menggunakan library TCPDF

		//identitas dokumen
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Saddam Gilang');
		$pdf->SetTitle('Invoice');
		$pdf->SetSubject('Invoice');

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->addPage();

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
		//line ini penting
		//$this->response->setContentType('application/pdf');
		//Close and output PDF document
		//$pdf->Output('invoice.pdf', 'I');

		$pdf->Output(__DIR__.'/../../public/uploads/invoice.pdf', 'F');		//akan membuat file di direktori yg ditentukan

		$attachment = base_url('uploads/Invoice.pdf');			//memanggil invoice.pdf

		$message = "<h1>Invoice Pembelian</h1><p>Kepada ".$pembeli->username." Berikut Invoice atas pembelian ".$barang->nama. 
		". Untuk Melanjutkan Proses transaksi dapat melakukan pembayaran ke no Rekening 0096047479100 Atas Nama (SaddamMuhammad) 
		dan Reply pesan ini untuk mengirimkan bukti resinya.";

		$this->sendEmail($attachment, 'gsaddam855@gmail.com', 'Invoice', $message);

		return redirect()->to(site_url('transaksi/index'));
		
	}

	private function sendEmail($attachment, $to, $title, $message)
	{
		$this->email->setFrom('gsaddam855@gmail.com','Saddam Muhammad A');
		$this->email->setTo($to);

		$this->email->attach($attachment);		//set judulnya

		$this->email->setSubject($title);

		$this->email->setMessage($message);

		if(! $this->email->send()){		//send email
			return false;
		}else{
			return true;
		}

	}
}