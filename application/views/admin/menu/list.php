<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
<p>
	<a href="<?php echo base_url('admin/menu/tambah') ?>" class="btn btn-success">
		<i class="fa fa-plus"></i> Tambah Baru
	</a>
</p>
<?php
//Notifikasi
echo $this->session->flashdata('sukses');
?>
<table class="table table-bordered" id="example1">

	<thead>
		
		<tr>
			<th>NO</th>
			<th>GAMBAR</th>
			<th>NAMA</th>
			<th>KATEGORI</th>
			<th>HARGA</th>
			<th>STATUS</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($menu as  $menu ) {?>
			
		
		<tr>


			<td> <?php echo $no ?></td>
			<td>
				<img src="<?php echo base_url('assets/upload/image/thumbs/'.$menu->gambar) ?>" class="img-img-responsive" widht="60" height="60">
				
			</td>
			<td> <?php echo $menu->nama_menu ?></td>
			<td> <?php echo $menu->nama_kategori ?></td>
			<td> <?php echo number_format($menu->harga,'0',',','.') ?></td>
			<td> <?php echo $menu->status_menu ?></td>
			<td>

				
				
				<a href="<?php echo base_url('admin/menu/edit/' .$menu->id_menu) ?>"class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i>edit</a>
				
				<a href="<?php echo base_url('admin/menu/delete/' .$menu->id_menu) ?>"class="btn btn-danger btn-xs" onclick="return confirm('yakin ingin menghapus data ini?)"> <i class="fa fa-trash-o"></i>delete</a>
			</td>	
 
		</tr>

<?php $no++; } ?>
	</tbody>
</table>
