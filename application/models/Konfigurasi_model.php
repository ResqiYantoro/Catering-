<?php 
defined("BASEPATH") OR exit('No direct script access allowed ');

class Konfigurasi_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	//listing
	public function listing()
	{
		$query =$this->db->get('konfigurasi');
		return $query->row();

	}

	// Edit
	public function edit($data)
	{
		$this->db->where('id_konfigurasi', $data['id_konfigurasi']);
		$this->db->update('konfigurasi', $data);
	}

	//LOAD MENU KATEGORI MENU
	public function nav_menu()
	{
		$this->db->select('menu.*,
 						kategori.nama_kategori,
 						kategori.slug_kategori,');
 		$this->db->from('menu');
 		//join
		$this->db->join('kategori','menu.id_kategori = kategori.id_kategori','left');
        //end join
        $this->db->group_by('menu.id_kategori');
 		$this->db->order_by('kategori.urutan', 'ASC');
 		$query = $this->db->get();
		return $query->result(); 	
	}
}