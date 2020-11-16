<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
<p>
	<a href="<?php echo base_url('admin/kategori/tambah') ?>" class="btn btn-success">
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
			<th>NAMA</th>
			<th>SLUG</th>
			<th>urutan</th>
			<th>ACTION</th>
				
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($kategori as  $kategori ) {?>
			
		
		<tr>
			<td> <?php echo $no ?></td>
			<td> <?php echo $kategori->nama_kategori ?></td>
			<td> <?php echo $kategori->slug_kategori ?></td>
			<td> <?php echo $kategori->urutan ?></td>
			
			<td>
				<a href="<?php echo base_url('admin/kategori/edit/' .$kategori->id_kategori) ?>"class="btn btn-warning btn-xs"> <i class="fa fa-edit"></i>edit</a>
				
				<a href="<?php echo base_url('admin/kategori/delete/' .$kategori->id_kategori) ?>"class="btn btn-danger btn-xs" onclick="return confirm('yakin ingin menghapus data ini?)"> <i class="fa fa-trash-o"></i>delete</a>
			</td>	
 
		</tr>

<?php $no++; } ?>
	</tbody>
</table>
