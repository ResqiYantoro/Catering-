<?php
Class Laporan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('transaksi_model');
    }
    
    function index(){
        $bulan = $this->input->post('bulan');
        $tahun = date("Y");
        $site = $this->db->get('konfigurasi')->row();
        $data = $this->db->query("select * from header_transaksi join pelanggan on header_transaksi.id_pelanggan = pelanggan.id_pelanggan where MONTH(tanggal_transaksi) = '$bulan' && YEAR(tanggal_transaksi) = '$tahun' ")->result();
        $c = $this->db->query("select sum(jumlah_transaksi) as total from header_transaksi where MONTH(tanggal_transaksi) = '$bulan' && YEAR(tanggal_transaksi) = '$tahun' ")->row();
        $pdf = new FPDF('P','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $path = base_url('assets/upload/image/thumbs/'.$site->logo);
        $pdf->Image($path,10,10,-300); 
        $pdf->Cell(190,7,strtoupper($site->namaweb),0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(190,5,ucfirst($site->alamat).' - Email : '.$site->email,0,1,'C');
        $pdf->Cell(190,5,' HP : '.$site->telepon.' - Website : '.$site->website,0,1,'C');
        $pdf->SetLineWidth(1);
        $pdf->Line(10,30,200,30);
        $pdf->SetLineWidth(0);
        $pdf->Line(10,31,200,31);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,5,'',0,1);
        $pdf->Cell(190,7,'Laporan Transaksi',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(190,5,'',0,1);
        
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25,7,'',0,0,'C');
        $pdf->Cell(10,7,'No',1,0,'C');
        $pdf->Cell(50,7,'Nama Pelanggan',1,0,'C');
        $pdf->Cell(40,7,'Waktu Transaksi',1,0,'C');
        $pdf->Cell(40,7,'Harga Total',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $no=1;
        foreach ($data as $a) {
        $pdf->Cell(25,7,'',0,0,'C');
        $pdf->Cell(10,7,$no++,1,0,'C');
        $pdf->Cell(50,7,$a->nama_pelanggan,1,0,'C');
        $pdf->Cell(40,7,date('d F Y',strtotime($a->tanggal_transaksi)),1,0,'C');
        $pdf->Cell(40,7,'Rp. '.number_format($a->jumlah_transaksi,'0',',','.'),1,1,'R');
        }
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(25,7,'',0,0,'C');
        $pdf->Cell(100,7,'Total Pemasukan',1,0,'C');
        $pdf->Cell(40,7,'Rp. '.number_format($c->total,'0',',','.'),1,1,'R');
        
        $pdf->Output();
    }
}