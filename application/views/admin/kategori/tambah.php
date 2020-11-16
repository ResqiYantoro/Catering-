<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
<?php

// Form Open
echo form_open(base_url('admin/kategori/tambah'), ' class="form-horizontal"');

?>

<div class="form-group">
    <label class="col-md-2 control-label">Nama Kategori</label>
    <div class="col-md-5">
        <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" value="<?= set_value('Slug kategori') ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">urutan</label>
    <div class="col-md-5">
        <input type="number" name="urutan" class="form-control" placeholder="Urutan kategori" value="<?= set_value('urutan') ?>">
        <?= form_error('kategoriname', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>





<div class="form-group">
    <label class="col-md-2 control-label"></label>
    <div class="col-md-5">
        <button class="btn btn-success btn-lg" name="submit" type="submit">
            <i class="fa fa-save"></i> Simpan
        </button>
        <button class="btn btn-info btn-lg" name="reset" type="submit">
            <i class="fa fa-times"></i> Reset
        </button>
    </div>
</div>




<?= form_close(); ?>