<?php
Class Struk extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('transaksi_model');
    }
    
    function index($id){
        $site = $this->db->get('konfigurasi')->row();
        $data = $this->db->query("select * from header_transaksi join pelanggan on header_transaksi.id_pelanggan = pelanggan.id_pelanggan where kode_transaksi = '$id'")->row();
        $query = $this->db->query("select * from transaksi join menu on transaksi.id_menu = menu.id_menu where transaksi.kode_transaksi = '$id' ")->result();
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
        $pdf->Cell(190,7,'INVOICE',0,1,'C');
        $pdf->SetFont('Arial','',10);
        $pdf->Cell(190,5,'',0,1);
        $pdf->Cell(40,5,'Kode Transaksi',0,0);
        $pdf->Cell(2,5,':',0,0);
        $pdf->Cell(70,5,$data->kode_transaksi,0,0);
        $pdf->Cell(40,5,'Tanggal Transaksi',0,0);
        $pdf->Cell(2,5,':',0,0);
        $pdf->Cell(40,5,date('d F Y',strtotime($data->tanggal_transaksi)) ,0,1);
        $pdf->Cell(40,5,'Nama Pelanggan',0,0);
        $pdf->Cell(2,5,':',0,0);
        $pdf->Cell(70,5,ucfirst($data->nama_pelanggan) ,0,0);
        $pdf->Cell(40,5,'Tanggal Pengiriman',0,0);
        $pdf->Cell(2,5,':',0,0);
        $pdf->Cell(40,5,date('d F Y',strtotime($data->tanggal_pengiriman)) ,0,1);
        $pdf->Cell(40,5,'No Telepon',0,0);
        $pdf->Cell(2,5,':',0,0);
        $pdf->Cell(40,5,$data->telepon ,0,1);
        $pdf->Cell(40,5,'Alamat',0,0);
        $pdf->Cell(2,5,':',0,0);
        $pdf->Cell(140,5,$data->alamat ,0,1);
        $pdf->Cell(190,5,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,7,'No',1,0,'C');
        $pdf->Cell(70,7,'List Item',1,0,'C');
        $pdf->Cell(40,7,'Satuan',1,0,'C');
        $pdf->Cell(30,7,'Jumlah',1,0,'C');
        $pdf->Cell(40,7,'Harga Total',1,1,'C');
        $pdf->SetFont('Arial','',10);
        $no=1;
        foreach ($query as $a) {
        $pdf->Cell(10,7,$no++,1,0,'C');
        $pdf->Cell(70,7,$a->nama_menu,1,0,'C');
        $pdf->Cell(40,7,'Rp. '.number_format($a->harga,'0',',','.'),1,0,'C');
        $pdf->Cell(30,7,$a->jumlah,1,0,'C');
        $pdf->Cell(40,7,'Rp. '.number_format($a->total_harga,'0',',','.'),1,1,'C');
        }
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(150,7,'Total Harga',1,0,'C');
        $pdf->Cell(40,7,'Rp. '.number_format($data->jumlah_transaksi,'0',',','.'),1,1,'C');
        $pdf->Cell(150,7,'Pembayaran Masuk',1,0,'C');
        $pdf->Cell(40,7,'Rp. '.number_format($data->jumlah_bayar,'0',',','.'),1,1,'C');
        $pdf->Cell(150,7,'Jumlah Kekurangan Pembayaran',1,0,'C');
        $pdf->Cell(40,7,'Rp. '.number_format($data->jumlah_transaksi - $data->jumlah_bayar,'0',',','.'),1,1,'C');

        
        $pdf->Output();
    }
}