<?php 

 class Login_model extends CI_Model{
 	public function cek_login($username,$password)
 	{
 		$this->db->where("username",$username);
 		$this->db->where("password",$password);
 		return $this->db->get('user');

 	}

 	public function getloginData($user,$pass)
 	{
 		$u =$user;
 		$p =MD5($pass);

 		$query_cekLogin =$this->get_where('user', array('username' => $u,'password' => $p));

 		if (count($query_cekLogin->result()) >0) {
 			foreach ($query_cekLogin->result() as $qck){
 				foreach ($query_cekLogin->result() as $ck) {
 					$sess_data ['loged_in'] = TRUE;
 					$sess_data ['username'] = $ck->username;
 					$sess_data ['password'] = $ck->password;
 					$this->session->set_userdata($sess_data);
 					
 				}
 				redirect('administrator/dashboard');
 			}
 		}	else{
 			$this->session->set_flashdata('pesan','<div class="alert alert-warning alert-dismissible fade show" role="alert">
username atau password salah
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>');
 				redirect('administrator/auth');
 		}
 	}
 }