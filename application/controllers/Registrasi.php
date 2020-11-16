<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {

    //load model
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pelanggan_model'); 

    }
    //halaman registrasi
    public function index()
    {

         //Validasi Input, Membuat variabel valid
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_pelanggan',
            'Nama lengkap',
            'required',
            array('required' => '%s Harus diisi')
        );

        $valid->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[pelanggan.email]',
            array(
                'required' => '%s Harus di isi',
                'valid_email' => '%s Email tidak valid',
                'is_unique' => '%s ini sudah terdaftar!'
                )
        );
        $valid->set_rules(
            'password',
            'Password',
            'required',
            array('required' => '%s Harus diisi')
        );
        $valid->set_rules(
            'telepon',
            'Telepon',
            'required',
            array('required' => '%s Harus diisi')
        );
        $valid->set_rules(
            'alamat',
            'Alamat',
            'required',
            array('required' => '%s Harus diisi')
        );

        if ($valid->run() == false) {
            //End Validasi
        $data   = array(    'title'     =>'Registrasi Pelanggan',
                            'isi'       => 'registrasi/list');
        $this->load->view('layout/wrapper', $data, FALSE);

        //Masuk database
        } else {
            $i = $this->input;
            $data = array(
                'nama_pelanggan'    => $i->post('nama_pelanggan'),
                'email'             => $i->post('email'),
                'password'          => SHA1($i->post('password')),
                'telepon'           => $i->post('telepon'),
                'alamat'            => $i->post('alamat') 
            );
            $this->pelanggan_model->tambah($data);
            //create session login pelanggan
            $this->session->set_userdata('email',$i->post('email'));
            $this->session->set_userdata('nama_pelanggan',$i->post('nama_pelanggan'));
            
            //end create session 
            $this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert"><center><span>Registrasi sukses</span></center></div>');
            redirect('registrasi/sukses','refresh');
        }
    }
    //sukses
    public function sukses()
    {
        $data = array( 'title'      =>'Registrasi berhasil',
                        'isi'       => 'registrasi/sukses');
        $this->load->view('layout/wrapper', $data, FALSE);

    }

}

/* End of file Registrasi.php */
/* Location: ./application/controllers/Registrasi.php */