<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller{

	//load model
		public function __construct()
		{
			parent::__construct();
			$this->load->model('kategori_model');
            //PROTEKSI halaman 
            $this->simple_login->cek_login();
		}
		//Data kategori
	public function index()
	{
		$kategori = $this->kategori_model->listing();

		$data = array( 'title'  => 'Data  Kategori Menu ',
						 'kategori' => $kategori,
						 'isi'  => 'admin/kategori/list'

						);

		$this->load->view('admin/layout/wrapper' ,$data, FALSE);
	
	}

//TAMBAH USER
    public function tambah()
    {
        //Validasi Input, Membuat variabel valid
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_kategori',
            'Nama kategori',
            'required|is_unique[kategori.nama_kategori]',
            array('required' => '%s Harus diisi',
                   'is_unique'   =>'%s sudah ada, Buat Kategori baru !!!')
        );

        

        if ($valid->run() == false) {
            //End Validasi
            $data['title'] = 'Tambah Kategori Menu ';
            $data['isi'] = 'admin/kategori/tambah';
            $this->load->view('admin/layout/wrapper', $data);
            //Masuk database
        } else {
            $i                  = $this->input;
            $slug_kategori      = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
            $data = array(
                'slug_kategori' => $slug_kategori,
                'nama_kategori' => $i->post('nama_kategori'),
                'urutan'   => $i->post('urutan')
            );
            $this->kategori_model->tambah($data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert"><center><span>Data berhasil ditambahkan!</span></center></div>');
            redirect('admin/kategori', 'refresh');
        }
    }


//Edit USER
    public function edit($id_kategori)
    {
        $kategori = $this->kategori_model->detail($id_kategori);

        //Validasi Input, Membuat variabel valid
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_kategori',
            'Nama kategori',
            'required',
            array('required' => '%s Harus diisi'));


        if ($valid->run() == false) {
            //End Validasi
            $data['title'] = 'Edit Kategori Menu ';
            $data['kategori'] = $kategori;
            $data['isi'] = 'admin/kategori/edit';
            $this->load->view('admin/layout/wrapper', $data);
            //Masuk database
        } else {
            $i = $this->input;
            $slug_kategori      = url_title($this->input->post('nama_kategori'), 'dash', TRUE);
            $data               = array(
                'id_kategori'   => $id_kategori,
                'slug_kategori' => $slug_kategori,
                'nama_kategori' => $i->post('nama_kategori'),
                'urutan'        => $i->post('urutan')  
         );
            $this->kategori_model->edit($data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert"><center><span>Data berhasil diedit!</span></center></div>');
            redirect('admin/kategori');
        }
    }    //delete kategori 
    public function delete($id_kategori)
    {
    	$data  = array('id_kategori' => $id_kategori );
    	 $this->kategori_model->delete($data);
         $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert"><center><span>Data telah dihapus!</span></center></div>');
            redirect('admin/kategori', 'refresh');
    }



}