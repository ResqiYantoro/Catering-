<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Belanja extends CI_Controller
{
	//LOAD MODEL
	public function __construct()
	{
		parent::__construct();
		$this->load->model('menu_model');
		$this->load->model('kategori_model');
		$this->load->model('konfigurasi_model');
		$this->load->model('pelanggan_model');
		$this->load->model('header_transaksi_model');
		$this->load->model('transaksi_model');
		//load HELPER RANDOM STRING
		$this->load->helper('string');
	}

	//halaman belanja
	public function index()
	{
		$keranjang = $this->cart->contents();



		$data = array ('title'		=>'KERANJANG PESANANAN',
						'keranjang'	=> $keranjang,
						'isi' 		=> 'belanja/list'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	//sukses belanja
	public function sukses()
	{

		$bayar =  $this->uri->segment(3);
		$jumlah = $this->uri->segment(4);
		$data = array ('title'		=>'Belanja berhasil',

						'isi' 		=> 'belanja/sukses',
						'bayar'=> $bayar,
						'jumlah'=>$jumlah,
						'data' => $this->db->get('konfigurasi')->row()
					);
		$this->load->view('layout/wrapper', $data, FALSE);
	}
	//checkout
	public function checkout()
	{
		//pelanggan sudah login apa blom ?jika blom harus registrasi dan harus login dg session email
		if($this->session->userdata('email')){
			$email 			= $this->session->userdata('email');
			$nama_pelanggan	=$this->session->userdata('nama_pelanggan');
			$pelanggan 		=$this->pelanggan_model->sudah_login($email,$nama_pelanggan);
			$keranjang 	    = $this->cart->contents();


		$data = array ('title'		=>'checkout',
						'keranjang'	=> $keranjang,
						'pelanggan'	=> $pelanggan,
						'isi' 		=> 'belanja/checkout'
					);
		$this->load->view('layout/wrapper', $data, FALSE);
			 //Validasi Input, Membuat variabel valid
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_pelanggan',
            'Nama lengkap',
            'required',
            array('required' => '%s Harus diisi')
        );

        $valid->set_rules(
            'telepon',
            'Nomor Telepon',
            'required',
            array('required' => '%s Harus diisi')
        );

        $valid->set_rules(
            'alamat',
            'Alamat',
            'required',
            array('required' => '%s Harus diisi')
        );



        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email',
            array(
                'required' => '%s Harus di isi',
                'valid_email' => '%s Email tidak valid'
                
            	)
        );

        

        if ($valid->run() == false) {
            //End Validasi

			$data = array ('title'		=>'Lanjutkan Pembayaran',
							'keranjang'	=> $keranjang,
							'pelanggan'	=> $pelanggan,
							'isi' 		=> 'belanja/checkout'
						);
			$this->load->view('layout/wrapper', $data, FALSE);
			//masuk database
		} else {
            $i = $this->input;
            //jika barang dipesan lebih dari pada 0
            if ($i->post('jumlah_transaksi') != 0) {
            $data = array(

                'id_pelanggan'		=> $pelanggan->id_pelanggan,
                'tanggal_pengiriman'=> $i->post('booking'),
                'kode_transaksi'    => $i->post('kode_transaksi'),
                'tanggal_transaksi' => $i->post('tanggal_transaksi'),
                'jenis_pembayaran' => $i->post('pembayaran'),
                'status_bayar'		=>'Belum Bayar',
                'status_transaksi'		=>'Belum Diproses',
                'jumlah_transaksi'  => $i->post('jumlah_transaksi')
            );
            //proses masuk ke header transaksi
            $this->header_transaksi_model->tambah($data);
            //proses masuk ketabel transaksi
            foreach ($keranjang as $key){
            	$sub_total = $key['price'] *$key['qty'];
            	$data 	=array(
            					'kode_transaksi'	=> $i->post('kode_transaksi'),
            					'id_menu'			=>$key['id'],
            					'jumlah'			=>$key['qty'],
            					'total_harga'			=>$sub_total
            				);
            	$this->transaksi_model->tambah($data);
            }
            //end proses masuk ke tabel transaksi
            $this->cart->destroy();
            redirect('belanja/sukses/'.$i->post('pembayaran').'/'.$i->post('jumlah_transaksi'));
        	}
        	else
        	{

			$this->session->set_flashdata('msg', 'silahkan masukan item yang akan dipesan');
			redirect(base_url('belanja'),'refresh');
        	}
        }

			//end masuk database


		}else{

				//kalau belom harus registrasi

				
			
			$this->session->set_flashdata('sukses', 'silahkan login atau registrasi terlebih dahulu');
			redirect(base_url('registrasi'),'refresh');
		}


	}

	//tambahkan ke keranjang belanja
	public function add()
	{
		//ambil data dari form
		$id 			= $this->input->post('id');
		$qty 			= $this->input->post('qty');
		$price 			= $this->input->post('price');
		$name 			= $this->input->post('name');
		$img   			= $this->input->post('img');
		$redirect_page 	= $this->input->post('redirect_page');

		//proses masukan ke keranjang belanja
		$data = array(
			'id'		=> $id,
			'qty'		=> $qty,
			'price'		=> $price,
			'name'		=> $name,
			'img' 		=> $img,
		);
		$this->cart->insert($data);
		// redirect page
		redirect($redirect_page, 'refresh');
	}

	//update data cart
	public function update_cart()
	{
		if($this->input->post('rowid')){
			$data = array( 'rowid'		=>$this->input->post('rowid'),
							'qty'		=>$this->input->post('qty'));
			$this->cart->update($data);
			$this->session->set_flashdata('sukses', 'Data keranjang telah diapdet');
			redirect(base_url('belanja'),'refresh');
		}else{
			//jika gada row id
			redirect(base_url('belanja'),'refresh');
		}
	}

	//hapus semua isi keranjang belanja
	public function hapus($rowid='')
	{
		if($rowid){
			//hapus per item
		$this->cart->remove($rowid);
		$this->session->flashdata('sukses', 'Data Keranjang belanja telah dihapus');
		redirect(base_url('belanja'),'refresh');
		}else{
			//hapus semua 
		$this->cart->destroy();
		$this->session->flashdata('sukses', 'Data Keranjang belanja telah dihapus');
		redirect(base_url('belanja'),'refresh');
		}
	}
}