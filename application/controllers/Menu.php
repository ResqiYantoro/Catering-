<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

	//load model
	public function __construct()
			{
				parent::__construct();
				$this->load->model('menu_model');
				$this->load->model('kategori_model');
				
			}

	//listing data menu
	public function index()
	{
			$site 								= $this->konfigurasi_model->listing();
			$listing_kategori 					= $this->menu_model->listing_kategori();
			//ambil data total
			$total								= $this->menu_model->total_menu();
			//paginasi star
			$this->load->library('pagination');
			
			$config['base_url'] 			=  base_url().'menu/index/';
			$config['total_rows'] 			= $total;
			$config['use_page_numbers'] 	= TRUE;
			$config['per_page'] 			= 3 ;
			$config['uri_segment'] 			= 3;
			$config['num_links'] 			= 5;
			$config['first_link']       = 'First';
			$config['last_link']        = 'Last';
			$config['next_link']        = 'Next';
			$config['prev_link']        = 'Prev';
			$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
			$config['full_tag_close']   = '</ul></nav></div>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close']  = '</span>Next</li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close']  = '</span></li>';
			$config['first_url'] 		= base_url().'/menu/';

			
			
			$this->pagination->initialize($config);
			
			//ambil data menu
			$page 			=$this->uri->segment(3);
			$menu 			=$this->menu_model->menu($config['per_page'],$page);

			//paginasi end
			$data  = array('title' 				=> 'DAFTAR KATEGORI MENU',
							'site'				=> $site,
							'listing_kategori'	=> $listing_kategori,
							'menu'				=> $menu,
							'pagin'				=> $this->pagination->create_links(),
							'isi'				=> 'menu/list');
			$this->load->view('layout/wrapper', $data, FALSE);


	}
	//listing data kategori menu
	public function kategori($slug_kategori)
	{
			//kategori detail
			$kategori 							= $this->kategori_model->read($slug_kategori);
			$id_kategori						= $kategori->id_kategori;
			$site 								= $this->konfigurasi_model->listing();
			$listing_kategori 					= $this->menu_model->listing_kategori();
			//ambil data total
			$total								= $this->menu_model->total_kategori($id_kategori);
			//paginasi star
			$this->load->library('pagination');
			
			$config['base_url'] 			=  base_url().'menu/kategori/'.$slug_kategori.'/index/';
			$config['total_rows'] 			= $total;
			$config['use_page_numbers'] 	= TRUE;
			$config['per_page'] 			= 3 ;
			$config['uri_segment'] 			= 5;
			$config['num_links'] 			= 5;
			$config['first_link']       = 'First';
			$config['last_link']        = 'Last';
			$config['next_link']        = 'Next';
			$config['prev_link']        = 'Prev';
			$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
			$config['full_tag_close']   = '</ul></nav></div>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close']  = '</span>Next</li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close']  = '</span></li>';
			$config['first_url'] 		= base_url().'/menu/kategori/'.$slug_kategori;

			
			
			$this->pagination->initialize($config);
			
			//ambil data menu
			$page 			=$this->uri->segment(5);
			$menu 			=$this->menu_model->kategori($id_kategori,$config['per_page'],$page);

			//paginasi end
			$data  = array('title' 				=> $kategori->nama_kategori,
							'site'				=> $site,
							'listing_kategori'	=> $listing_kategori,
							'menu'				=> $menu,
							'pagin'				=> $this->pagination->create_links(),
							'isi'				=> 'menu/list');
			$this->load->view('layout/wrapper', $data, FALSE);


	}

	//detail
	public function detail($slug_menu)
{
	$site 	= $this->konfigurasi_model->listing();
	$menu 	= $this->menu_model->read($slug_menu);
	$id_menu	= $menu->id_menu;

$data  = array(				'title' 			=> $menu->nama_menu,
							'site'				=> $site,
							
							'menu'				=> $menu,
							
							'isi'				=> 'menu/detail'
						);
			$this->load->view('layout/wrapper', $data, FALSE);
}
}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */