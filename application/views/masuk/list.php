
<!-- Cart -->
<section class="bgwhite p-t-70 p-b-100">
<div class="container">
<!-- Cart item -->
<div class="pos-relative">
<div class="bgwhite">
	<h1><?php echo $title ?></h1><hr>
	<br><br>
	
	<div class="clearfix"></div>
	
	<?php if($this->session->flashdata('sukses')){
		echo '<div class="alert alert-warning">';
		echo $this->session->flashdata('sukses');
		echo'</div>';
	} ?>
<p class="alert alert-success">Belum memiliki akun ? Silahkan <a href="<?php echo base_url('registrasi') ?>" class="btn btn-info btn-sm" >Silahkan registrasi disini</a></p>
	<div class="col-md-8 col-md-offset-2">
		<?php 
		//notif eror login pelanggan
		if($this->session->flashdata('warning')){
			echo '<div class="alert alert-warning">';
			echo $this->session->flashdata('warning');
			echo '</div>';
		}
		//notif sukses login pelanggan
		if($this->session->flashdata('sukses')){
			echo '<div class="alert alert-success">';
			echo $this->session->flashdata('sukses');
			echo '</div>';
		}
		//form open
		echo form_open(base_url('masuk') ,'class="leave-comment"'); ?>
		<table class="table">
			
			<tbody>
				 <div class="form-group has-feedback">
        <input type="text" name="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      <?php echo form_error('email') ; ?></div> 
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      <?php echo form_error('password') ;?></div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
					<td>
						<button class="btn btn-success btn-lg" type="submit"><i class="fa fa-save">Login</i></button>
						<button class="btn btn-default btn-lg" type="submit"><i class="fa fa-times">Reset</i></button>
					</td>
				</tr>
				
			</tbody>
		</table>

		<?php echo form_close(); ?>
		
	</div>
	
</div>
</div>

<div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
<div class="flex-w flex-m w-full-sm">
	
	
</div>

<div class="size10 trans-0-4 m-t-10 m-b-10">
	<!-- Button -->

</div>
</div>

</div>
</section>