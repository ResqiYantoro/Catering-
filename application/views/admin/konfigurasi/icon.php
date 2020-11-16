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
<?php
// Form Open
echo form_open_multipart(base_url('admin/konfigurasi/icon'), ' class="form-horizontal"');

?>

<div class="form-group">
    <label class="col-md-3 control-label">Nama Website</label>
    <div class="col-md-5">
        <input type="text" name="namaweb" class="form-control" placeholder="Nama Website" value="<?php echo $konfigurasi->namaweb ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">upload icon baru</label>
    <div class="col-md-5">
    <input type="file" name="icon" class="form-control" placeholder="Upload icon baru" value="<?php echo $konfigurasi->icon ?>" required>
Logo lama: <br>
 <img src="<?php echo base_url('assets/upload/image/thumbs/'.$konfigurasi->icon) ?> "class="img img-responsive img-thumbnail" widht="200">        
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label"></label>
    <div class="col-md-5">
        <button class="btn btn-success btn-lg" name="submit" type="submit">
            <i class="fa fa-save"></i> Simpan
        </button>
        <button class="btn btn-info btn-lg" name="reset" type="submit">
            <i class="fa fa-times"></i> Reset
        </button>
    </div>
</div>




<?= form_close();?>