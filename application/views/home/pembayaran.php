<br>
	<h3 class="m-text5 t-center">
		Daftar Pembayaran Pesanan
	</h3>
	<section class="banner bgwhite p-t-40 p-b-40">
		<div class="container">
			<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 ">
						<?php echo $this->session->flashdata('msg'); ?>
						<div class="table-responsive">
							<table id="myTable" class="table table-bordered text-center">
								<thead >
									<th>No</th>
									<th>Kode Transaksi</th>
									<th>Tanggal Transaksi</th>
									<th>Jenis Pembayaran</th>
									<th>Total</th>
									<th>opsi</th>
								</thead>
								<tbody>
									<?php $no=1; foreach ($pembayaran as $a) {?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $a->kode_transaksi ?></td>
											<td><?php echo date("d F Y",strtotime($a->tanggal_transaksi ))?></td>
											<td><?php echo $a->jenis_pembayaran ?></td>
											<td align="right">Rp. <?php echo number_format($a->jumlah_transaksi,'0',',','.') ?></td>
											<td>
												<?php if ($a->status_bayar == 'Belum Bayar') { ?>
													<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $a->id_header_transaksi ?>">Bayar</a>
												<?php } ?>
											</td>
										</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<?php $no=1; foreach ($pembayaran as $a) {?>
	<div class="modal fade" id="exampleModal<?php echo $a->id_header_transaksi ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload bukti pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?php echo base_url('home/bayar') ?>" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="form-group">
        	<label>Kode Transaksi</label>
        	<input type="text" class="form-control" name="kode_transaksi" value="<?php echo $a->kode_transaksi ?>" readonly>
        </div>
        <div class="form-group">
        	<label>Jumlah Pembayaran</label>
        	<input type="text" class="form-control" name="jumlah_bayar" placeholder="Masukan jumlah bayar" required="">
        </div>
        <div class="form-group">
        	<label>Bukti Pembayaran</label>
        	<input type="file" class="form-control" name="bukti_bayar" required="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input  type="submit" name="submit" class="btn btn-primary" value="Submit">
      </div>
      </form>
    </div>
  </div>
</div>
<?php } ?>