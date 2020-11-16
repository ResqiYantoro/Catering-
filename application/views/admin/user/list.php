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

	<thead >
		
		<tr >
			<th>NO</th>
			<th>NAMA</th>
			<th>EMAIL</th>
			<th>ALAMAT</th>
			<!-- <th>ACTION</th> -->
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($user as  $user ) {?>
			
		
		<tr >
			<td> <?php echo $no ?></td>
			<td> <?php echo $user->nama_pelanggan ?></td>
			<td> <?php echo $user->email ?></td>
			<td> <?php echo $user->alamat ?></td>
			
				
				<!-- <a href="<?php //echo base_url('admin/user/delete/' .$user->id_pelanggan) ?>"class="btn btn-danger btn-xs" onclick="return confirm('yakin ingin menghapus data ini?)"> <i class="fa fa-trash-o"></i>delete</a> -->
			</td>	
 
		</tr>

<?php $no++; } ?>	
</tbody>
</table>
