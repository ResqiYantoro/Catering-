<?php 

defined('BASEPATH') OR exit ('No direct script access allowed');

//Halaman 	Utama Website -Homepage
class Home extends CI_Controller{
	
	//LOAD MODEL
	public function __construct(){
		parent::__construct();
		$this->load->model('menu_model');
		$this->load->model('kategori_model'); 
		$this->load->model('konfigurasi_model');
		$this->load->model('pelanggan_model');
	}

	//HALAMAN UTAMA WEBSITE
	public function index ()
	{
		$site		= $this->konfigurasi_model->listing();
		
		$kategori 	= $this->konfigurasi_model->nav_menu();

		$menu 		= $this->menu_model->home();
		$data= array('title' => $site->namaweb, 
						'site'		=> $site,
						'kategori'	=> $kategori,
						'menu'		=> $menu,
						'isi'		=> 'home/list'
						);

		$this->load->view('layout/wrapper',$data, FALSE);
	}
	//halaman konfirmasi pembayaran
	public function pembayaran()
	{
		$site		= $this->konfigurasi_model->listing();
		
		$kategori 	= $this->konfigurasi_model->nav_menu();
		$id = $this->session->userdata('id_pelanggan');
		$pembayaran = $this->db->query("select * from header_transaksi where id_pelanggan = '$id' && status_bayar = 'Belum Bayar' ")->result();
		$menu 		= $this->menu_model->home();
		$data= array('title' => $site->namaweb,
						'site'		=> $site,
						'kategori'	=> $kategori,
						'menu'		=> $menu,
						'pembayaran' => $pembayaran,
						'isi'		=> 'home/pembayaran'
						);

		$this->load->view('layout/wrapper',$data, FALSE);
	}
	//lakukan upload bukti pembayaran
	public function bayar()
	{
		$config['upload_path']   = './assets/upload/bukti/';
	    $config['allowed_types'] = '*';
	    $config['overwrite'] = true;

	    $this->load->library('upload', $config);
	    if ($this->upload->do_upload('bukti_bayar')) {
	    	$gambar = $this->upload->data();
	    	$foto = $gambar['file_name'];
	    	$data = array(
	    		'jumlah_bayar' => $this->input->post('jumlah_bayar'),
	    		'bukti_bayar' => $foto,
	    		'status_bayar'=>'Sudah Bayar'
	    	);
	    	$where = array('kode_transaksi'=>$this->input->post('kode_transaksi'));
	    	$this->pelanggan_model->bayar($where,$data,'header_transaksi');
	    	$this->session->set_flashdata("msg", "<div id='myalert' class='alert alert-success alert-dismissible fade show' role='alert'>
	        <span class='alert-inner--icon'><i class='ni ni-like-2'></i></span>
	        <span class='alert-inner--text'><strong>Berhasil!</strong> Upload bukti pembayaran</span>
	        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	            <span aria-hidden='true'>&times;</span>
	        </button>
			</div>");
			redirect('home/pembayaran');
	    }
	    else
	    {
	    	$this->session->set_flashdata("msg", "<div id='myalert' class='alert alert-danger alert-dismissible fade show' role='alert'>
	        <span class='alert-inner--icon'><i class='ni ni-like-2'></i></span>
	        <span class='alert-inner--text'><strong>Gagal!</strong> Upload bukti pembayaran</span>
	        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	            <span aria-hidden='true'>&times;</span>
	        </button>
			</div>");
			redirect('home/pembayaran');
	    }  
	}
	//halaman riwayat belanja
	public function riwayat_belanja()
	{
		$site		= $this->konfigurasi_model->listing();
		
		$kategori 	= $this->konfigurasi_model->nav_menu();
		$id = $this->session->userdata('id_pelanggan');
		$pembayaran = $this->db->query("select * from header_transaksi where id_pelanggan = '$id' && status_bayar = 'Sudah Bayar' ")->result();
		$menu 		= $this->menu_model->home();
		$data= array('title' => $site->namaweb,
						'site'		=> $site,
						'kategori'	=> $kategori,
						'menu'		=> $menu,
						'pembayaran' => $pembayaran,
						'isi'		=> 'home/riwayat'
						);

		$this->load->view('layout/wrapper',$data, FALSE);
	}
	//halaman kontak kami
	public function kontak()
	{
		$site		= $this->konfigurasi_model->listing();
		$kategori 	= $this->konfigurasi_model->nav_menu();
		$menu 		= $this->menu_model->home();
		$data= array('title' => $site->namaweb,
						'site'		=> $site,
						'kategori'	=> $kategori,
						'menu'		=> $menu,
						'isi'		=> 'home/kontak'
						);

		$this->load->view('layout/wrapper',$data, FALSE);
	}
	public function panduan()
	{
		$data= array('title'	 => 'CARA PEMESANAN',
					'isi'		=> 'home/panduan'
						);

		$this->load->view('layout/wrapper',$data, FALSE);
	}
	public function terima($id)
	{
		$this->db->query("update header_transaksi set status_transaksi = 'Diterima' where id_header_transaksi = '$id' ");
		$this->session->set_flashdata("msg", "<div id='myalert' class='alert alert-success alert-dismissible fade show' role='alert'>
	        <span class='alert-inner--icon'><i class='ni ni-like-2'></i></span>
	        <span class='alert-inner--text'><strong>Berhasil!</strong> Menerima barang</span>
	        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
	            <span aria-hidden='true'>&times;</span>
	        </button>
			</div>");
			redirect('home/riwayat_belanja');
	}

}

 ?>