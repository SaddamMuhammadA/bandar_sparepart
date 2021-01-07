<?php
namespace App\Controllers;

class Barang extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->validation = \Config\Services::validation();
        $this->session = session();
    }

    public function index()
    {
        $barangModel = new \App\Models\BarangModel();
        $barangs = $barangModel->findAll();


        return view('barang/index',[
            'barangs'=>$barangs,
        ]);
    }

	public function view()
	{
		$id = $this->request->uri->getSegment(3);

		$barangModel = new \App\Models\BarangModel();

		$barang = $barangModel->find($id);

		return view('barang/view',[
			'barang' => $barang,
		]);
	}

    public function create()
	{
		if($this->request->getPost())
		{
			//jika ada data yang di post
			$data = $this->request->getPost();
			$this->validation->run($data, 'barang');
			$errors = $this->validation->getErrors();

			if(!$errors)
			{
				//simpan datanya
				$barangModel = new \App\Models\BarangModel();

				$barang = new \App\Entities\Barang();

				$barang->fill($data);
				$barang->gambar = $this->request->getFile('gambar');
				$barang->created_by = $this->session->get('id');
				$barang->created_date = date("Y-m-d H:i:s");

				$barangModel->save($barang);

				$id = $barangModel->insertID();

				$segments = ['barang', 'view', $id];
				// /barang/view/$id
				return redirect()->to(site_url($segments));

			}
		}
		return view('barang/create');
	}

    public function update()
    {
        $id = $this->request->uri->getSegment(3);

		$barangModel = new \App\Models\BarangModel();

		$barang = $barangModel->find($id);

		if($this->request->getPost())
		{
			$data = $this->request->getPost();
			$this->validation->run($data, 'barangupdate'); //panggil validationnya
			$errors = $this->validation->getErrors();  //kita cek apakah ada errors

			if(!$errors) //jika tidak ada errors
			{
				$b = new \App\Entities\Barang();  //memberi entities
				$b->id = $id;       //passing id nya biar bisa mendetekesi bahwa barang sudah di update
				$b->fill($data);

				if($this->request->getFile('gambar')->isValid()){  //mendeteksi apakah ada gambar atau tidak
					$b->gambar = $this->request->getFile('gambar'); //jika ada gambar kita assign gambar yang baru di update
				}

				$b->updated_by = $this->session->get('id');  //agar tahu siapa yang update
				$b->updated_date = date("Y-m-d H:i:s");  //agar tahu kapan terakhir update

				$barangModel->save($b);     //menyimpan data yang sudah di update
				
				$segments = ['Barang','view',$id];  //mengarahkan hasil update ke view

				return redirect()->to(base_url($segments));
			}
		}

		return view('barang/update',[
			'barang' => $barang,
		]);
    }

    public function delete()
    {
        $id = $this->request->uri->getSegment(3);  //ambil id di segmentnya

		$modelBarang = new \App\Models\BarangModel();  //panggil model dan inisialisasi
		$delete = $modelBarang->delete($id);  //lalu kita hapus dengan method delete dengan kita passing primary nya

		return redirect()->to(site_url('barang/index'));
    }
}