<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
<?php
//eror uplod
if(isset($error)){
    echo '<p class="alert alert-warning">';
    echo $error;
    echo '</p>';
}
// Form Open
echo form_open_multipart(base_url('admin/menu/gambar/'.$menu->id_menu), ' class="form-horizontal"');

?>

<div class="form-group">
    <label class="col-md-2 control-label">Judul Gambar</label>
    <div class="col-md-5">
        <input type="text" name="judul_gambar" class="form-control" placeholder="Judul Gambar" value="<?= set_value('judul_gambar') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">UnggaH Gambar</label>
    <div class="col-md-4">
        <input type="file" name="image" class="form-control" placeholder="Gambar" value="<?= set_value('gambar') ?>" required>
    </div>
    <div class="col-md-4">
    <button class="btn btn-success btn-lg" name="submit" type="submit">
            <i class="fa fa-save"></i> Simpan dan unggah gambar 
        </button>
        <button class="btn btn-info btn-lg" name="reset" type="submit">
            <i class="fa fa-times"></i> Reset
        </button>	
    </div>
</div>
<?php 	echo form_close(); ?>

<?php
//Notifikasi
if($this->session->flashdata('sukses')){
	echo '<p class="alert alert-success">';
	echo $this->session->flashdata('sukses');
	echo '<div>';

}
?>
<table class="table table-bordered" id="example1">

	<thead>
		
		<tr>
			<th>NO</th>
			<th>GAMBAR</th>
			<th>JUDUL GAMBAR</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>

		<tr>
			<td>1</td>
			<td>
				<img src="<?php echo base_url('assets/upload/image/thumbs/'.$menu->gambar) ?>" class="img-img-responsive " widht="60" height="60">
				
			</td>
			<td> <?php echo $menu->nama_menu ?></td>
			
			<td>

				</td>	
 
		</tr>
		<?php $no=2; foreach ($gambar as  $gambar ) {?>
			
		
		<tr>


			<td> <?php echo $no ?></td>
			<td>
				<img src="<?php echo base_url('assets/upload/image/thumbs/'.$gambar->gambar) ?>" class="img-img-responsive" widht="60" height="60">
				
			</td>
			<td> <?php echo $gambar->judul_gambar ?></td>
			
			<td>

				
				<a href="<?php echo base_url('admin/menu/delete_gambar/' .$menu->id_menu.'/'.$gambar->id_gambar) ?>"class="btn btn-danger btn-xs" onclick="return confirm('yakin ingin menghapus gambar ini?')"> <i class="fa fa-trash-o"></i>hapus</a>
				
				</td>	
 
		</tr>

<?php $no++; } ?>
	</tbody>
</table>
