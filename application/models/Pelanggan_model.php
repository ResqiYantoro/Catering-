<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Pelanggan_model extends CI_Model{
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->database();
 	}
 	//login
 	public function login($username,$password)
 	{
 		$this->db->select('*');
 		$this->db->from('pelanggan');
 		$this->db->where(array('email' => $username,
 						        'password' => SHA1($password)));
 								//'password' => $password));
 		$this->db->order_by('id_pelanggan', 'desc');
 		$query = $this->db->get();
		return $query->row(); 		
 	}
 	//listing all pelanggan
 	public function listing() 
 	{
 		$this->db->select('*');
 		$this->db->from('pelanggan');
 		$this->db->order_by('id_pelanggan', 'desc');
 		$query = $this->db->get();
		return $query->result(); 		
 	}
//detail pelanggan
 	public function detail($id_pelanggan)
 	{
 		$this->db->select('*');
 		$this->db->from('pelanggan');
 		$this->db->where('id_pelanggan', $id_pelanggan);
 		$this->db->order_by('id_pelanggan', 'desc');
 		$query = $this->db->get();
		return $query->row(); 		
 	}
 	
	//detail pelanggan
 	public function sudah_login($email,$nama_pelanggan)
 	{
 		$this->db->select('*');
 		$this->db->from('pelanggan');
 		$this->db->where('email', $email);
 		$this->db->where('nama_pelanggan', $nama_pelanggan);
 		$this->db->order_by('id_pelanggan', 'desc');
 		$query = $this->db->get();
		return $query->row(); 		
 	}
 	
 
 	//Tambah
    public function tambah($data)
    {
        //
        $this->db->insert('pelanggan', $data);
    }
//edit
public function edit($data)
 	{
 		$this->db->where('id_pelanggan', $data['id_pelanggan']);
 		$this->db->update('pelanggan', $data);
 		
 	}

//delete
 	public function delete($data)
 	{
 		$this->db->where('id_pelanggan', $data['id_pelanggan']);
 		$this->db->delete('pelanggan', $data);
 		
 	}
 	//function update pembayaran pelanggan
 	public function bayar($where,$data,$table)
 	{
 		$this->db->where($where);
 		$this->db->update($table, $data);
 	}
 }