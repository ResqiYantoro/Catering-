
<!-- Cart -->
<section class="bgwhite p-t-70 p-b-100">
<div class="container">
<!-- Cart item -->
<div class="pos-relative">
<div class="bgwhite">
	<h1><?php echo $title ?></h1><hr>
	<br><br>
	
	<div class="clearfix"></div>
<div class="alert alert-success text-center">
	Chekout berhasil, Silahkan lakukan pembayaran pada rekening dibawah ini : <br> 
	Nama Rekening : <b><?php echo $data->nama_rekening ?></b><br>
	No Rekening : <b><?php echo $data->rekening_pembayaran ?></b><br>
	Anda dapat melakukan pembayaran dengan ketentuan sebagai berikut :<br><br>
	<?php if ($bayar == 'DP') { ?>
	'Anda diharuskan melakukan pembayaran minimal sebesar <b>Rp. <?php echo number_format($jumlah/2,'0',',','.') ?></b> dari total pembelian untuk DP, dan selebihnya jika pesanan sudah selesai.'
	<?php
	}
	else
	{ ?>
		'Anda diharuskan melakukan pembayaran secara penuh sebesar <b>Rp. <?php echo number_format($jumlah,'0',',','.') ?></b> untuk orderan ini agar orderan segera diproses.'
	<?php } ?>
	<br><br>
	<b>Note : Jika sudah melakukan pembayaran, anda dapat mengupload bukti pembayaran dibagian dahsboard pelanggan / Mengghubungi nomor yang tertera di menu Kontak Kami.</b>
</div>
</div>
</div>

</div>
</section>
