<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller{

	//load model
		public function __construct()
		{
			parent::__construct();
			$this->load->model('menu_model');
            $this->load->model('kategori_model');
            
            //PROTEKSI halaman 
            $this->simple_login->cek_login();
		}
		//Data menu
	public function index()
	{
		$menu = $this->menu_model->listing();

		$data = array( 'title'  => 'Data  menu',
						 'menu' => $menu,
						 'isi'  => 'admin/menu/list',
                         

						);

		$this->load->view('admin/layout/wrapper' ,$data, FALSE);
	
	}

        //gambar
    public function gambar($id_menu)
    {
        $menu           = $this->menu_model->detail($id_menu);

        //ambil data kategori 
        $kategori = $this->kategori_model->listing();
        //Validasi Input, Membuat variabel valid
        $valid = $this->form_validation;
        $valid->set_rules(
            'judul_gambar',
            'Judul/Nama Gambar',
            'required',
            array('required' => '%s Harus diisi'));

      
            
    

       
        if ($valid->run()) {
            $config['upload_path']      = './assets/upload/image/thumbs';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_widht']        = '2024';
            $config['max_height']       = '2024';
            $config['overwrite']        = true;
            $config['max_size']         = 1024;

            $name = $_FILES['image']['name']; // get file name from form
            $fileNameParts = explode('.', $name); // explode file name to two part
            $default_name = $fileNameParts[0]; // get raw name from client
            $config['file_name'] = $default_name . "_jiosdesired_name"; //constructing a new name


            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('image')){

            //End Validasi
            $data =  array(  'title'         => 'Tambah Gambar Menu:'.$menu->nama_menu,
                            'menu'      => $menu,
                            'gambar'    => $gambar,
                            'error'         => $this->upload->display_errors(),
                            'isi'           => 'admin/menu/gambar'
                        );
            
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            //Masuk database
        } else {
            $upload_gambar = array('uploads_data' => $this->upload->data());

            //create thumbnail gambar
                $config['image_library']        = 'gd2';
                $config['source_image']         = './assets/upload/image/thumbs'.$upload_gambar['uploads_data']
                ['file_name'];
                //lokasi folder thumbnail
                $config['new_image']            ='./assets/upload/image/thumbs/'; 
                $config['create_thumb']         = TRUE;
                $config['maintain_ratio']       = TRUE;
                $config['width']                = 250;//pixel
                $config['height']               = 250;//pixel
                $config['thumb_marker']         = '';

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

            // end thumbnail 

            $i = $this->input;
            
            $data = array(  'id_menu'           =>$id_menu,
                            'judul_gambar'      =>$i->post('judul_gambar'),
                            // disimpan nama file gambarnya
                            'gambar'            => $upload_gambar['uploads_data']['file_name'],
                            
                        );

           
            $this->menu_model->tambah_gambar($data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert"><center><span>Data gambar berhasil ditambahkan!</span></center></div>');
            redirect(base_url('admin/menu/gambar/'.$id_menu),'refresh');
        }}
        //End menu database
          $data =  array(  'title'         => 'Tambah Gambar menu: '.$menu->nama_menu,
                            'menu'         => $menu,
                            'gambar'       => $gambar,
                            'isi'          => 'admin/menu/gambar'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

public function tambah()
    {

        //ambil data kategori 
        $kategori = $this->kategori_model->listing();
        //Validasi Input, Membuat variabel valid
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_menu',
            'Nama menu',
            'required', 
            array('required' => '%s Harus diisi')
        );

        $valid->set_rules('kode_menu','kode menu ','required|is_unique[menu.kode_menu]',
          array ('required'  => '%s harus  disi',
                'is_unique'     => '$s sudah ada. Buat Kode produk baru')); 
            
    

       
        if ($valid->run()) {
            $config['upload_path']      = './assets/upload/image/thumbs';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config['max_widht']        = '2024';
            $config['max_height']       = '2024';
            $config['overwrite']        = true;
            $config['max_size']         = 1024;

            $name = $_FILES['image']['name']; // get file name from form
            $fileNameParts = explode('.', $name); // explode file name to two part
            $default_name = $fileNameParts[0]; // get raw name from client
            $config['file_name'] = $default_name . "_jiosdesired_name"; //constructing a new name


            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('image')){

            //End Validasi
            $data =  array(  'title'         => 'Tambah menu',
                            'kategori'      => $kategori,
                            'error'         => $this->upload->display_errors(),
                            'isi'           => 'admin/menu/tambah'
                        );
            
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            //Masuk database
        } else {
            $upload_gambar = array('uploads_data' => $this->upload->data());

            //create thumbnail gambar
                $config['image_library']        = 'gd2';
                $config['source_image']         = './assets/upload/image/thumbs'.$upload_gambar['uploads_data']
                ['file_name'];
                //lokasi folder thumbnail
                $config['new_image']            ='./assets/upload/image/thumbs/'; 
                $config['create_thumb']         = TRUE;
                $config['maintain_ratio']       = TRUE;
                $config['width']                = 250;//pixel
                $config['height']               = 250;//pixel
                $config['thumb_marker']         = '';

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

            // end thumbnail 

            $i = $this->input;
            //slug menu 
             $slug_menu = url_title($this->input->post('nama_menu').'-'.$this->input->post('kode_menu'), 'dash', TRUE);
            $data = array(
                           'id_kategori'        => $i->post('kategori'),
                           'kode_menu'          => $i->post('kode_menu'),
                            'nama_menu'         => $i->post('nama_menu'),
                            'slug_menu'         => $slug_menu,
                            'keterangan'        => $i->post('Keterangan'),
                            'harga'             => $i->post('harga'),
                            // disimpan nama file gambarnya
                            'gambar'            => $upload_gambar['uploads_data']['file_name'],
                            'status_menu'       => $i->post('Status_menu'),
                        );

           
            $this->menu_model->tambah($data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert"><center><span>Data berhasil ditambahkan!</span></center></div>');
            redirect('admin/menu', 'refresh');
        }}
        //End menu database
          $data =  array(  'title'         => 'Tambah menu',
                            'kategori'     => $kategori,
                            'isi'          => 'admin/menu/tambah'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
    }


//Edit USER
    public function edit($id_menu)
    {
        //ambil data menu yg akan diedit
        $menu       = $this->menu_model->detail($id_menu);
        $kategori   = $this->kategori_model->listing();

        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_menu',
            'Nama menu',
            'required',
            array('required' => '%s Harus diisi')
        );

        $valid->set_rules('kode_menu','kode menu ','required',
          array ('required'  => '%s harus  disi')); 
            
    

       
        if ($valid->run()) {
            //cek jika gamabar diganti
            if(!empty($_FILES['gambar']['name'])) {


            $config['upload_path']      = './assets/upload/image/thumbs';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
           // $config['max_widht']        = '2024';
            //$config['max_height']       = '2024';
            $config['overwrite']        = true;
            $config['max_size']         = 1024;

            $name = $_FILES['image']['name']; // get file name from form
            $fileNameParts = explode('.', $name); // explode file name to two part
            $default_name = $fileNameParts[0]; // get raw name from client
            $config['file_name'] = $default_name . "_jiosdesired_name"; //constructing a new name


            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('image')){

            //End Validasi
            $data =  array(  'title'         => 'Edit menu: '.$menu->nama_menu,
                            'kategori'      => $kategori,
                            'menu'          =>$menu,
                            'error'         => $this->upload->display_errors(),
                            'isi'           => 'admin/menu/edit'
                        );
            
            $this->load->view('admin/layout/wrapper', $data, FALSE);
            //Masuk database
        } else {
            $upload_gambar = array('uploads_data' => $this->upload->data());

            //create thumbnail gambar
                $config['image_library']        = 'gd2';
                $config['source_image']         = './assets/upload/image/thumbs'.$upload_gambar['uploads_data']
                ['file_name'];
                //lokasi folder thumbnail
                $config['new_image']            ='./assets/upload/image/thumbs/'; 
                $config['create_thumb']         = TRUE;
                $config['maintain_ratio']       = TRUE;
                $config['width']                = 2450;//pixel
                $config['height']               = 250999;//pixel
                $config['thumb_marker']         = '';

                $this->load->library('image_lib', $config);
                $this->image_lib->resize();

            // end thumbnail 

            $i = $this->input;
            //slug menu 
             $slug_menu = url_title($this->input->post('nama_menu').'-'.$this->input->post('kode_menu'), 'dash', TRUE);
            $data = array( 'id_menu'            => $id_menu,
                           'id_kategori'        => $i->post('kategori'),
                           'kode_menu'          => $i->post('kode_menu'),
                            'nama_menu'         => $i->post('nama_menu'),
                            'slug_menu'         => $slug_menu,
                            'keterangan'        => $i->post('keterangan'),
                            'harga'             => $i->post('harga'),
                            // disimpan nama file gambarnya
                            'gambar'            => $upload_gambar['uploads_data']['file_name'],
                            'status_menu'       => $i->post('Status_menu')
                            
                        );

           
            $this->menu_model->edit($data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert"><center><span>Data berhasil diedit!</span></center></div>');
            redirect('admin/menu', 'refresh');
        }}else{
            //edit menu tanpa ganti gambar
             $i = $this->input;
            //slug menu 
             $slug_menu = url_title($this->input->post('nama_menu').'-'.$this->input->post('kode_menu'), 'dash', TRUE);
            $data = array( 'id_menu'            => $id_menu, 
                           'id_kategori'        => $i->post('kategori'),
                           'kode_menu'          => $i->post('kode_menu'),
                            'nama_menu'         => $i->post('nama_menu'),
                            'slug_menu'         => $slug_menu,
                            'keterangan'        => $i->post('keterangan'),
                            'harga'             => $i->post('harga'),
                            // disimpan nama file gambarnya(gambar ga diganti)
                            //'gambar'            => $upload_gambar['uploads_data']['file_name'],
                            'status_menu'       => $i->post('Status_menu')
                            
                        );

           
            $this->menu_model->edit($data);
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert"><center><span>Data berhasil diedit!</span></center></div>');
            redirect('admin/menu', 'refresh'); 
        }}
        //End menu database
          $data =  array(  'title'         => 'Edit menu:'.$menu->nama_menu,
                            'kategori'     => $kategori,
                            'menu'         => $menu,
                            'isi'          => 'admin/menu/edit'
                        );
            $this->load->view('admin/layout/wrapper', $data, FALSE);
    
    }    //delete menu 
    public function delete($id_menu)
    {
    	$data  = array('id_menu' => $id_menu );
    	 $this->menu_model->delete($data);
         $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert"><center><span>Data telah dihapus!</span></center></div>');
            redirect('admin/menu', 'refresh');
    }


 //delete gambar menu 
    public function delete_gambar($id_menu,$id_gambar)
    {

        //proses hapus gambar
        $gambar = $this->menu_model->detail_gambar($id_gambar);
        unlink('./assets/upload/image/'.$gambar->gambar);
        unlink('./assets/upload/image/thumbs/'.$gambar->gambar);
        
        $data  = array('id_gambar' => $id_gambar );
         $this->menu_model->delete_gambar($data);
         $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert"><center><span>Data gambar telah dihapus!</span></center></div>');
            redirect(base_url('admin/menu/gambar/'.$id_menu), 'refresh');
    }



}