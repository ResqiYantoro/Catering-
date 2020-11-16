<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller{
	//load model 
	public function __construct()
		{
		parent::__construct();
		$this->load->model('transaksi_model');
	}
	//halaman utama dasbor
	public function index()
	{ 
		$transaksi = $this->transaksi_model->transaksi();
		$data = array( 'title' => 'Halaman Transaksi', 
					 	'isi'  => 'admin/transaksi/list',
					 	'transaksi'=> $transaksi,

						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	// verifikasi pembayaran
	public function verifikasi($id)
	{
		$this->db->query("update header_transaksi set status_bayar = 'Sudah Bayar' where id_header_transaksi = '$id' ");
		$this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert"><center><span>Pembayaran berhasil diverifikasi</span></center></div>');
            redirect(base_url('admin/transaksi'), 'refresh');
	}
	// proses transaksi
	public function proses($id)
	{
		$this->db->query("update header_transaksi set status_transaksi = 'Diproses' where id_header_transaksi = '$id' ");
		$this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert"><center><span>Pembayaran berhasil diverifikasi</span></center></div>');
            redirect(base_url('admin/transaksi'), 'refresh');
	}
	// kirim pesanan
	public function kirim($id)
	{
		$this->db->query("update header_transaksi set status_transaksi = 'Dikirim' where id_header_transaksi = '$id' ");
		$this->session->set_flashdata('sukses', '<div class="alert alert-success" role="alert"><center><span>Pembayaran berhasil diverifikasi</span></center></div>');
            redirect(base_url('admin/transaksi'), 'refresh');
	}
	// data transaksi yang sudah selesai
	public function histori()
	{ 
		$transaksi = $this->transaksi_model->histori();
		$data = array( 'title' => 'Halaman Histori Transaksi', 
					 	'isi'  => 'admin/transaksi/histori',
					 	'transaksi'=> $transaksi,

						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	// menu laporan
	public function laporan()
	{
		$data = array( 'title' => 'Halaman Cetak Laporan Transaksi', 
					 	'isi'  => 'admin/transaksi/laporan',

						);
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
}