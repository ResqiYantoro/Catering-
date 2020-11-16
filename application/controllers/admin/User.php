<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

	//load model
		public function __construct()
		{
			parent::__construct();
			$this->load->model('user_model');
            //PROTEKSI halaman 
            $this->simple_login->cek_login();
		}
		//Data user
	public function index()
	{
		$user = $this->user_model->listing();

		$data = array( 'title'  => 'Data  Pengguna',
						 'user' => $user,
						 'isi'  => 'admin/user/list'

						);

		$this->load->view('admin/layout/wrapper' ,$data, FALSE);
	
	}

   //delete user 
    public function delete($id_pelanggan)
    {
    	$data  = array('id_pelanggan' => $id_pelanggan );
    	 $this->user_model->delete($data);
         $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert"><center><span>Data telah dihapus!</span></center></div>');
            redirect('admin/user', 'refresh');
    }



}