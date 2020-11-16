
<!-- Cart -->
<section class="cart bgwhite p-t-70 p-b-100">
<div class="container">
<!-- Cart item -->
<div class="container-table-cart pos-relative">
<div class="wrap-table-shopping-cart bgwhite">
	<h1><?php echo $title ?></h1><hr>
	<?php if($this->session->flashdata('sukses')){
		echo '<div class="alert alert-warning">';
		echo $this->session->flashdata('sukses');
		echo'</div>';
	} ?>

	<table class="table-shopping-cart">
		<tr class="table-head">
			<th class="column-1">GAMBAR</th>
			<th class="column-2">MENU</th>
			<th class="column-3">HARGA</th>
			<th class="column-4 p-l-70">JUMLAH</th>
			<th class="column-5" width="15%">SUB TOTAL</th>
			<th class="column-6" width="20%">ACTION</th>
		</tr>
		<?php

			//form update
			echo form_open(base_url('belanja/update_cart/'));
		 ?>
			


			<?php foreach ($keranjang as $k => $v): ?>
			<input type="hidden" name="rowid" value="<?php echo $v['rowid'] ?>">



			
		<tr class="table-row">
			<td class="column-1">
				<div class="cart-img-product b-rad-4 o-f-hidden">
					<img src="<?php echo base_url('assets/upload/image/thumbs/'.$v['img']) ?>" alt="<?php echo $v['name'] ?>">
				</div>
			</td>
			<td class="column-2"><?php echo $v['name'] ?></td>
			<td class="column-3"><?php echo $v['price'] ?></td>
			<td class="column-4">
				<div class="flex-w bo5 of-hidden w-size17">
					<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
						<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
					</button>

					<input class="size8 m-text18 t-center num-product" type="number" name="qty" value="<?php echo $v['qty'] ?>">

					<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
						<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
					</button>
				</div>
			</td>
			<td class="column-5">Rp.
					<?php 
					$sub_total = $v['price'] *$v['qty'];
					echo number_format($sub_total,'0',',','.');
					 ?>
			</td>
				<td>
					<button type="submit" name="update" class="btn btn-success btn-sm">
						<i class="fa fa-edit"></i>Update
					</button>
					
					<a href="<?php echo base_url('belanja/hapus/'.$v['rowid']) ?>"  class="btn btn-warning btn-sm">
						<i class="fa fa-trash-o"></i>Hapus
					</a>
				</td>
		</tr>
		<?php  
		// echo form close
		echo form_close(); 
		?>
			<?php endforeach ?>
	<tr class="table-row">
		<td colspan="4" class="column-1"><strong>Total Belanja</strong></td>
		<td colspan="2" class="column-2"><strong> Rp. <?php echo number_format($this->cart->total(),'0',',','.') ?></strong></td>
	</tr>
	</table>
		<br>
		<?php 
		echo form_open(base_url('belanja/checkout'));
		$q = $this->db->query("SELECT MAX(kode_transaksi) AS kd_max FROM header_transaksi")->row();
            $noUrut = (int) substr($q->kd_max, 3, 4);
            $noUrut++;
            $char = "TRS";

			$kode_transaksi =  $char . date('dmY'). sprintf("%04s", $noUrut) ;

		 ?>
				<input type="hidden" name="id_pelanggan" value="<?php echo $pelanggan->id_pelanggan; ?>">
				<input type="hidden" name="jumlah_transaksi" value="<?php echo $this->cart->total() ?>">
				<input type="hidden" name="tanggal_transaksi" value="<?php echo date('Y-m-d'); ?>">

				<table class="table">
			<thead>
				<tr>
					<th widht="25%">Kode Transaksi </th>
					<th><input type="text" name="kode_transaksi" class="form-control" value="<?php  echo $kode_transaksi ?>" readonly required></th>
				</tr>
				<tr>
					<th widht="25%">Nama Penerima </th>
					<th><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap"
					value="<?php echo $pelanggan->nama_pelanggan ?>" readonly></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Email Penerima</td>
					<td><input type="text" name="email" class="form-control" placeholder="Email"
					value="<?php echo $pelanggan->email ?>" readonly></td>
				</tr>
				
				<tr>
					<td>telepon Penerima</td>
					<td><input type="text" name="telepon" class="form-control" placeholder="Telepon"
					value="<?php echo $pelanggan->telepon ?>" readonly></td>
				</tr>
				
				<tr>
					<td>Alamat Lengkap Pengiriman</td>
					<td><textarea name="alamat" class="form-control" placeholder="Alamat Lengkap Pengiriman" readonly><?php echo $pelanggan->alamat ?></textarea></td>
				</tr>
				<tr>
					<td>Tanggal Pengiriman / Boking</td>
					<td><input type="date" name="booking" class="form-control" required></td></td>
				</tr>
				<tr>
					<td>Metode Pembayaran</td>
					<td>
						<select name="pembayaran" class="form-control" required="">
							<option value="">Pilih Metode Pembayaran</option>
							<option value="DP">DP (Pelunasan Diakhir)</option>
							<option value="Lunas">Lunas</option>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td style="float: right">
						<button class="btn btn-success btn-lg" type="submit"><i class="fa fa-save"> Lanjutkan Pembayaran</i></button>
						
					</td>
				</tr>
				
			</tbody>
		</table>

		<?php echo form_close(); ?>

</div>

<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
</div>

</div>
</section>
