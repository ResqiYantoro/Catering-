<br>
	<h3 class="m-text5 t-center">
		Daftar Riwayat Pesanan
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
									<th>Transaksi</th> 
									<th>Item</th>
									<th>Status Pesanan</th>
									<th>Opsi</th>
								</thead>
								<tbody>
									<?php $no=1; foreach ($pembayaran as $a) {?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td align="left">
												Kode Transaksi : <b><?php echo $a->kode_transaksi ?></b><br>
												Tanggal Transaksi : <b><?php echo date("d F Y",strtotime($a->tanggal_transaksi ))?></b><br>
												Tanggal Pengiriman : <b><?php echo date("d F Y",strtotime($a->tanggal_pengiriman ))?></b><br>
												Jenis Pembayaran : <b><?php echo $a->jenis_pembayaran ?></b><br>
												Total Transaksi : <b>Rp. <?php echo number_format($a->jumlah_transaksi,'0',',','.') ?></b><br>
												Jumlah Pembayaran : <b>Rp. <?php echo number_format($a->jumlah_bayar,'0',',','.') ?></b><br>
												Kekurangan Pembayaran : <b>Rp. <?php echo number_format($a->jumlah_transaksi - $a->jumlah_bayar,'0',',','.') ?></b>
											</td>
											<?php $data = $this->db->query("select * from transaksi join menu on transaksi.id_menu = menu.id_menu where kode_transaksi = '$a->kode_transaksi' ")->result();
											?>
												<td align="left">
												<?php $no=1; foreach ($data as $b) {
													 echo $no++; echo ". "; echo $b->nama_menu; echo " (x"; echo $b->jumlah; echo ")"; echo "<br>";
												 } ?>
												</td>
											<td><?php echo $a->status_transaksi ?></td>
											<td>
												<?php if ($a->status_transaksi == 'Dikirim') { ?>
													<a onclick="return confirm('Anda yakin sudah menerima pesanan ini?')" href="<?php echo base_url('home/terima/'.$a->id_header_transaksi) ?>" class="btn btn-primary">Terima Pesanan</a>
												<?php } ?>
												
													
												</a></td>
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