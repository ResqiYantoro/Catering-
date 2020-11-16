<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_pelanggan
{
	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
		//load data model user
		$this->CI->load->model('pelanggan_model');
	}

	//fungsi login
	public function login($email,$password) 
	{
		$check = $this->CI->pelanggan_model->login($email,$password); 
		//jika ada data usernya maka create sesion login
	if($check){
		$id_pelanggan 		= $check->id_pelanggan;
		$nama_pelanggan		=$check->nama_pelanggan;
		//create season
		$this->CI->session->set_userdata('id_pelanggan',$id_pelanggan);
		$this->CI->session->set_userdata('nama_pelanggan',$nama_pelanggan);
		$this->CI->session->set_userdata('email',$email);
		//redirect ke halaman admin yang diproteksi
		redirect(base_url('dasbor'),'refresh');
	}else{
		//kalau tidak ada maka suruh login lg
		$this->CI->session->set_flashdata('warning', 'Username atau password salah');
		redirect(base_url('masuk'),'refresh');
	}
 
	}
	


	//fungsi cek login
	public function cek_login()
{
	//memeriksa  apakah sesion sudah atau belum , jika belum alihkan ke halaman login 
	if($this->CI->session->userdata('email')=="") {
	$this->CI->session->set_flashdata('warning', 'anda belum login ');
		redirect(base_url('masuk'),'refresh');	
	}
}

//fungsi logout
public function logout()
{
	//membuang  semua  session yang telah  diset pada saat login
	$this->CI->session->unset_userdata('id_pelanggan');
	$this->CI->session->unset_userdata('nama_pelanggan');
	$this->CI->session->unset_userdata('email');
	$this->CI->session->set_flashdata("msg", "<div id='myalert' class='alert alert-success alert-dismissible fade show' role='alert'>
        <span class='alert-inner--icon'><i class='ni ni-like-2'></i></span>
        <span class='alert-inner--text'><strong>Success!</strong> Berhasil Logout</span>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
		</div>");
	redirect(base_url('masuk'),'refresh');
}

}