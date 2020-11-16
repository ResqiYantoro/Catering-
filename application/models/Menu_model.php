<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');

 class Menu_model extends CI_Model{
 	public function __construct()
 	{
 		parent::__construct();
 		$this->load->database();
 	}
 	//listing all menu
 	public function listing()
 	{
 		$this->db->select('menu.*,
 						kategori.nama_kategori,
 						kategori.slug_kategori');
 		$this->db->from('menu');
 		//join

 		$this->db->join('kategori','menu.id_kategori = kategori.id_kategori','left');
 		//end join
        $this->db->group_by('menu.id_menu');
 		$this->db->order_by('id_menu', 'desc');
 		$query = $this->db->get();
		return $query->result(); 		
 	}
//listing all menu home
    public function home()
    {
        $this->db->select('menu.*,
                        kategori.nama_kategori,
                        kategori.slug_kategori');
        $this->db->from('menu');
        //join
        $this->db->join('kategori','menu.id_kategori = kategori.id_kategori','left');
        //end join
        $this->db->where('menu.status_menu', 'Publish');
        $this->db->group_by('menu.id_menu');
        $this->db->order_by('id_menu', 'desc');
        $this->db->limit(12);
        $query = $this->db->get();
        return $query->result();        
    }


//read menu
    public function read($slug_menu)
    {
        $this->db->select('menu.*,
                        kategori.nama_kategori,
                        kategori.slug_kategori');
        $this->db->from('menu');
        //join
        $this->db->join('kategori','menu.id_kategori = kategori.id_kategori','left');
        //end join
        $this->db->where('menu.status_menu', 'Publish');
        $this->db->where('menu.slug_menu', $slug_menu);
        
        $this->db->group_by('menu.id_menu');
        $this->db->order_by('id_menu', 'desc');
       
        $query = $this->db->get();
        return $query->row();        
    }


    //tampil data menu di kategori menu
    public function menu($limit,$start)
    {
        $this->db->select('menu.*,
                        kategori.nama_kategori,
                        kategori.slug_kategori');
        $this->db->from('menu');
        //join
        $this->db->join('kategori','menu.id_kategori = kategori.id_kategori','left');
        //end join
        $this->db->where('menu.status_menu', 'Publish');
        $this->db->group_by('menu.id_menu');
        $this->db->order_by('id_menu', 'desc');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query->result();        
    }
    //total menu
    public function total_menu()
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->where('status_menu', 'Publish');
        $query = $this->db->get();
        return $query->num_rows();
    }

     //tampil data  kategori menu
    public function kategori($id_kategori,$limit,$start)
    {
        $this->db->select('menu.*,
                        kategori.nama_kategori,
                        kategori.slug_kategori');
        $this->db->from('menu');
        //join
        $this->db->join('kategori','menu.id_kategori = kategori.id_kategori','left');
        //end join
        $this->db->where('menu.status_menu', 'Publish');
        $this->db->where('menu.id_kategori', $id_kategori);
        $this->db->group_by('menu.id_menu');
        $this->db->order_by('id_menu', 'desc');
        $this->db->limit($limit,$start);
        $query = $this->db->get();
        return $query->result();        
    }
    //total kategor menu
    public function total_kategori($id_kategori)
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->where('status_menu', 'Publish');
        $this->db->where('id_kategori', $id_kategori);
        $query = $this->db->get();
        return $query->num_rows();
    }



    //listing  kategori
    public function listing_kategori()
    {
        $this->db->select('menu.*,
                        kategori.nama_kategori,
                        kategori.slug_kategori');
        $this->db->from('menu');
        //join
        $this->db->join('kategori','menu.id_kategori = kategori.id_kategori','left');
        //end join
        $this->db->group_by('menu.id_kategori');
        $this->db->order_by('id_menu', 'desc');
        $query = $this->db->get();
        return $query->result();        
    }
//detail menu
    public function detail($id_menu)
    {
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->where('id_menu', $id_menu);
        $this->db->order_by('id_menu', 'desc');
        $query = $this->db->get();
        return $query->row();       
    }
 	//Tambah
    public function tambah($data)
    {
        //
        $this->db->insert('menu', $data);
    }

//edit
public function edit($data)
 	{
 		$this->db->where('id_menu', $data['id_menu']);
 		$this->db->update('menu', $data);
 		
 	}

//delete
 	public function delete($data)
 	{
 		$this->db->where('id_menu', $data['id_menu']);
 		$this->db->delete('menu', $data);
 		
 	}
 }