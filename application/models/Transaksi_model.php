<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Transaksi_model extends CI_Model{
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->database();
 	}
 	//listing all transaksi
 	public function listing()
 	{
 		$this->db->select('*');
 		$this->db->from('transaksi');
 		$this->db->order_by('id_transaksi', 'desc');
 		$query = $this->db->get();
		return $query->result(); 		
 	}

//detail transaksi
 	public function detail($id_transaksi)
 	{
 		$this->db->select('*');
 		$this->db->from('transaksi');
 		$this->db->where('id_transaksi', $id_transaksi);
 		$this->db->order_by('id_transaksi', 'desc');
 		$query = $this->db->get();
		return $query->row(); 		
 	}

 	//detail slug transaksi
 	public function read($slug_transaksi)
 	{
 		$this->db->select('*');
 		$this->db->from('transaksi');
 		$this->db->where('slug_transaksi', $slug_transaksi);
 		$this->db->order_by('id_transaksi', 'desc');
 		$query = $this->db->get();
		return $query->row(); 		
 	}

 	//login transaksi
 	public function login($transaksiname,$password)
 	{
 		$this->db->select('*');
 		$this->db->from('transaksi');
 		$this->db->where(array('transaksiname' => $transaksiname,
 						        'password' => SHA1($password)));
 		$this->db->order_by('id_transaksi', 'desc');
 		$query = $this->db->get();
		return $query->row(); 		
 	}

 	//Tambah
    public function tambah($data)
    {
        //
        $this->db->insert('transaksi', $data);
    }
//edit
public function edit($data)
 	{
 		$this->db->where('id_transaksi', $data['id_transaksi']);
 		$this->db->update('transaksi', $data);
 		
 	}

//delete
 	public function delete($data)
 	{
 		$this->db->where('id_transaksi', $data['id_transaksi']);
 		$this->db->delete('transaksi', $data);
 		
 	}
 	//ambil data transaksi yang belum selesai
 	public function transaksi()
 	{
 		
 		$this->db->select('*');
 		$this->db->from('header_transaksi');
 		$this->db->join('pelanggan','header_transaksi.id_pelanggan = pelanggan.id_pelanggan');
 		$this->db->where('status_transaksi !=','Diterima');
 		$this->db->order_by('id_header_transaksi', 'desc');
 		$query = $this->db->get();
		return $query->result(); 		
 	}
 	public function histori()
 	{
 		
 		$this->db->select('*');
 		$this->db->from('header_transaksi');
 		$this->db->join('pelanggan','header_transaksi.id_pelanggan = pelanggan.id_pelanggan');
 		$this->db->where('status_transaksi ','Diterima');
 		$this->db->order_by('id_header_transaksi', 'desc');
 		$query = $this->db->get();
		return $query->result(); 		
 	}
 	public function join_transaksi($where)
 	{
 		
 		$this->db->select('*');
 		$this->db->from('transaksi');
 		$this->db->join('menu','transaksi.id_menu = menu.id_menu');
 		$this->db->where('kode_transaksi',$where);
 		$query = $this->db->get();
		return $query->result(); 		
 	}

 	 public function kodetransaksi()
    {
        $query = $this->db->query("SELECT MAX(kode_transaksi) as kodetransaksi from transaksi");
        $hasil = $query->row();
        return $hasil->kodetransaksi;
    }
     public function simpan()
    {
        $this->kode_transaksi    = $_POST['kodetransaksi'];
        $this->id_menu  = $_POST['idmenu'];
        $this->db->insert('transaksi', $this);
    }
 }