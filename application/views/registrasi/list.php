
<!-- Cart -->
<section class="bgwhite p-t-70 p-b-100">
<div class="container">
<!-- Cart item -->
<div class="pos-relative">
<div class="bgwhite">
	<h1><?php echo $title ?></h1><hr>
	<br><br>
	
	<div class="clearfix"></div>
<p class="alert alert-success">sudah memiliki akun ? Silahkan <a href="<?php echo base_url('masuk') ?>" class="btn btn-info btn-sm" >Login di sini</a></p>
	<div class="col-md-12">
		<?php 
		//form open
		echo form_open(base_url('registrasi') ); ?> 
		<table class="table">
			<tbody>
				<tr>
					<td widht="25%">Nama </th>
					<td><input type="text" name="nama_pelanggan" class="form-control" placeholder="Nama Lengkap"
					value="<?php echo set_value('nama_pelanggan') ?>" >
					<?php echo form_error('nama_pelanggan') ;?>
					</td>
					
				</tr>
				<tr>
					<td>Email</td>
					<td><input type="text" name="email" class="form-control" placeholder="Email"
					value="<?php echo set_value('email') ?>" >
					<?php echo form_error('email') ;?>
					</td>
					
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" class="form-control" placeholder="Password"
					value="<?php echo set_value('password') ?>" >
					<?php echo form_error('password') ;?>
					</td>
					
				</tr>
				<tr>
					<td>telepon</td>
					<td><input type="text" name="telepon" class="form-control" placeholder="Telepon"
					value="<?php echo set_value('telepon') ?>" >
					<?php echo form_error('telepon') ;?>
					</td>
					
				</tr>
				
				<tr>
					<tr>
					<td>Alamat Lengkap</td>
					<td><input type="text" name="alamat" class="form-control" placeholder="Alamat Lengkap"
					value="<?php echo set_value('alamat') ?>" >
					<?php echo form_error('alamat') ;?>
					</td>


				</tr>
				<tr>
					
					<td>
						<button class="btn btn-success btn-lg" type="submit"><i class="fa fa-save">Submit</i></button>
						<button class="btn btn-default btn-lg" type="reset"><i class="fa fa-times">Reset</i></button>
					</td>
				</tr>
				
			</tbody>
		</table>

		<?php echo form_close(); ?>
		
	</div>
	
</div>
</div>

</div>
</section>
