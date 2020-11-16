<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
<?=

    form_open('admin/kategori/edit/' . $kategori->id_kategori, 'class="form-horizontal" enctype="multipart/form-data"'); ?>



<div class="form-group">
    <label class="col-md-2 control-label">Nama_kategori</label>
    <div class="col-md-5">
        <input type="text" name="nama_kategori" class="form-control" placeholder="Nama kategori" value="<?= $kategori->nama_kategori ?>" required>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">urutan</label>
    <div class="col-md-5">
        <input type="number" name="urutan" class="form-control" placeholder="urutan" value="<?= $kategori->urutan ?>" required>

    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"></label>
    <div class="col-md-5">
        <button class="btn btn-success btn-lg" name="submit" type="submit">
            <i class="fa fa-save"></i> Simpan
        </button>
        <button class="btn btn-info btn-lg" name="reset" type="reset">
            <i class="fa fa-times"></i> Reset
        </button>
    </div>
</div>




<?= form_close(); ?>