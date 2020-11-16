<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dasbor extends CI_Controller {
	//load model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('pelanggan_model');
		//halaman diproteksi dg simple pelanggan
		$this->simple_pelanggan->cek_login();
	}
	// halaman dasbor
	public function index()
	{
			$data =array( 'title'		=>'Halaman Dasbor Pelanggan',
						  'isi'			=>'dasbor/list'
							);
			$this->load->view('layout/wrapper', $data, FALSE);
	}

}

/* End of file Dasbor.php */
/* Location: ./application/controllers/Dasbor.php */