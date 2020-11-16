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
echo form_open_multipart(base_url('admin/konfigurasi'), ' class="form-horizontal"');

?>

<div class="form-group">
    <label class="col-md-3 control-label">Nama Website</label>
    <div class="col-md-5">
        <input type="text" name="namaweb" class="form-control" placeholder="Nama Website" value="<?php echo $konfigurasi->namaweb ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Email</label>
    <div class="col-md-5">
        <input type="email" name="email" class="form-control" placeholder="Email" value="<?php echo $konfigurasi->email ?>" required>
        
    </div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Website</label>
    <div class="col-md-5">
        <input type="text" name="website" class="form-control" placeholder="website" value="<?php echo $konfigurasi->website ?>" required>
        
    </div>
</div>



<div class="form-group">
    <label class="col-md-3 control-label">Alamat Facebook</label>
    <div class="col-md-5">
        <input type="text" name="facebook" class="form-control" placeholder="facebook" value="<?php echo $konfigurasi->facebook ?>" required>
        
    </div>
</div>


<div class="form-group">
    <label class="col-md-3 control-label">Alamat Instagram</label>
    <div class="col-md-5">
        <input type="text" name="instagram" class="form-control" placeholder="Instagram" value="<?php echo $konfigurasi->instagram ?>" required>
        
    </div>
</div>


<div class="form-group">
    <label class="col-md-3 control-label">telpon/wa</label>
    <div class="col-md-5">
        <input type="text" name="telepon" class="form-control" placeholder="telepon" value="<?php echo $konfigurasi->telepon ?>" required>
        
    </div>
</div>


<div class="form-group">
    <label class="col-md-3 control-label">ALAMAT</label>
    <div class="col-md-5">
    <textarea name="alamat" class="form-control" placeholder="Alamat"><?php echo $konfigurasi->alamat ?></textarea>
</div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label">Nama Rekening Pembayaran</label>
    <div class="col-md-5">
    <textarea name="nama_rekening" class="form-control" placeholder="Rekening Pembayaran"><?php echo $konfigurasi->nama_rekening ?></textarea>
</div>
</div>
<div class="form-group">
    <label class="col-md-3 control-label">Rekening Pembayaran</label>
    <div class="col-md-5">
    <textarea name="rekening_pembayaran" class="form-control" placeholder="Rekening Pembayaran"><?php echo $konfigurasi->rekening_pembayaran ?></textarea>
</div>
</div>

<div class="form-group">
    <label class="col-md-3 control-label"></label>
    <div class="col-md-5">
        <button class="btn btn-success btn-lg" name="submit" type="submit">
            <i class="fa fa-save"></i> Simpan
        </button>
    </div>
</div>




<?= form_close();?>
