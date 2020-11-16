<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
<?php
//Notifikasi
echo $this->session->flashdata('sukses'); 
?>
<table class="table table-bordered" id="example1">

	<thead>
		
		<tr>
			<th>NO</th>
			<th>DETAIL TRANSAKSI</th>
			<th>ITEM PESANAN</th>
			<th>STATUS</th>
			<th >ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1;  foreach ($transaksi as  $a) {?>
			
		
		<tr>


			<td> <?php echo $no ?></td>
			<td>
				Kode Transaksi : <b><?php echo ucfirst($a->kode_transaksi)  ?></b><br>
				Nama Pelanggan : <b><?php echo ucfirst($a->nama_pelanggan)  ?></b><br>
				CP : <b><?php echo $a->telepon;echo " / ";echo $a->email  ?></b><br>
				Alamat : <b><?php echo $a->alamat ?></b><br>
				Tanggal Pemesanan : <b><?php echo date('d F Y',strtotime($a->tanggal_transaksi))  ?></b><br>
				Tanggal Pengiriman : <b><?php echo date('d F Y',strtotime($a->tanggal_pengiriman))  ?></b><br>
				Jenis Pembayaran : <b><?php echo $a->jenis_pembayaran ?></b><br>
				Total Transaksi : <b>Rp. <?php echo number_format($a->jumlah_transaksi,'0',',','.') ?></b><br>
				Jumlah Pembayaran : <b>Rp. <?php echo number_format($a->jumlah_bayar,'0',',','.') ?></b><br>
				Kurangan Pembayaran : <b>Rp. <?php echo number_format($a->jumlah_transaksi - $a->jumlah_bayar,'0',',','.') ?></b><br>
			</td>
			<?php
			$data = $this->transaksi_model->join_transaksi($a->kode_transaksi); ?>
			<td>
				<?php $i=1; foreach ($data as $b) { ?>
				<?php echo $i++; echo ". "; echo $b->nama_menu; echo " (x"; echo $b->jumlah; echo ")";?><br>
				<?php } ?>	
			</td>	
			<td >
				Pembayaran : <b><?php echo $a->status_bayar?></b><br>
				Transaksi : <b><?php echo $a->status_transaksi?></b>
			</td>
			<td align="center">
				<?php if ($a->status_bayar == 'Belum Bayar') { ?>
					<a onclick="return confirm('apakah anda yakin ingin mengkonfirmasi pembayaran transaksi ini ?')" href="<?php echo base_url('admin/transaksi/verifikasi/'.$a->id_header_transaksi) ?>"class="btn btn-success "> <i class="fa fa-dollar"></i> Verifikasi Pembayaran</a><br><br>
				<?php } ?>
				<?php if ($a->status_transaksi == 'Belum Diproses' && $a->status_bayar == 'Sudah Bayar') { ?>
					<a onclick="return confirm('apakah anda yakin ingin memproses transaksi ini ?')" href="<?php echo base_url('admin/transaksi/proses/'.$a->id_header_transaksi) ?>"class="btn btn-primary "> <i class="fa fa-refresh"></i> Proses Transaksi</a><br><br>
				<?php } ?>
				<?php if ($a->status_transaksi == 'Diproses') { ?>
					<a onclick="return confirm('apakah anda yakin ingin mengirim pesanan ini ?')" href="<?php echo base_url('admin/transaksi/kirim/'.$a->id_header_transaksi) ?>"class="btn btn-info "> <i class="fa fa-truck"></i> Kirim Pesanan</a><br><br>
				<?php } ?>
				<?php if ($a->status_bayar == 'Sudah Bayar') { ?>
					<a target="_blank"  href="<?php echo base_url('admin/Struk/index/'.$a->kode_transaksi) ?>"class="btn btn-danger "> <i class="fa fa-print"></i> Cetak Struk</a><br><br>
				<?php } ?>
				<?php if ( $a->status_bayar == 'Sudah Bayar') { ?>
					<a target="_blank" href="<?php echo base_url('assets/upload/bukti/'.$a->bukti_bayar) ?>" class="btn btn-warning "> <i class="fa fa-eye"></i> Lihat bukti bayar</a><br><br>
				<?php } ?>
			</td>
 
		</tr>

<?php $no++; } ?>
	</tbody>
</table>