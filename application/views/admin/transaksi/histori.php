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
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($transaksi as  $a) {?>
			
		
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
			</td>
			<?php
			$data = $this->transaksi_model->join_transaksi($a->kode_transaksi); ?>
			<td>
				<?php $i=1; foreach ($data as $b) { ?>
				<?php echo $no++; echo ". "; echo $b->nama_menu; echo " (x"; echo $b->jumlah; echo ")";?><br>
				<?php } ?>	
			</td>	
			<td >
				Pembayaran : <b><?php echo $a->status_bayar?></b><br>
				Transaksi : <b><?php echo $a->status_transaksi?></b>
			</td>
 
		</tr>

<?php $no++; } ?>
	</tbody>
</table>