<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
		$this->CI =& get_instance();
		//load data model user
		$this->CI->load->model('user_model');
	}

	//fungsi login
	public function login($username,$password)
	{
		$check = $this->CI->user_model->login($username,$password);
		//jika ada data usernya maka create sesion login
	if($check){
		$id_user 	= $check->id_user;
		$nama		=$check->nama;
		//create season
		$this->CI->session->set_userdata('id_user',$id_user);
		$this->CI->session->set_userdata('nama',$nama);
		$this->CI->session->set_userdata('username',$username);
		//redirect ke halaman admin yang diproteksi
		redirect(base_url('admin/dasbor'),'refresh');
	}else{
		//kalau tidak ada maka suruh login lg
		$this->CI->session->set_flashdata('warning', 'Username atau password salah');
		redirect(base_url('login'),'refresh');
	}

	}
	


	//fungsi cek login
	public function cek_login()
{
	//memeriksa  apakah sesion sudah atau belum , jika belum alihkan ke halaman login 
	if($this->CI->session->userdata('username')=="") {
	$this->CI->session->set_flashdata('warning', 'anda belum login ');
		redirect(base_url('login'),'refresh');	
	}
}

//fungsi logout
public function logout()
{
	//membuang  semua  session yang telah  diset pada saat login
	$this->CI->session->unset_userdata('id_user');
	$this->CI->session->unset_userdata('nama');
	$this->CI->session->unset_userdata('username');
	$this->CI->session->unset_userdata('akses_level');
	redirect(base_url('login'),'refresh'); 
}

}