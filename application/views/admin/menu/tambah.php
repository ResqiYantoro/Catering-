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
echo form_open_multipart(base_url('admin/menu/tambah'), ' class="form-horizontal"');

?>

<div class="form-group">
    <label class="col-md-2 control-label">Nama Menu</label>
    <div class="col-md-5">
        <input type="text" name="nama_menu" class="form-control" placeholder="Nama Menu" value="<?= set_value('nama') ?>" required>
    </div>
</div>
<?php
    $q = $this->db->query("SELECT MAX(kode_menu) AS kd_max FROM menu")->row();
    $noUrut = (int) substr($q->kd_max, 3, 4);
    $noUrut++;
    $char = "M";
    $kode_transaksi = $char . sprintf("%04s", $noUrut);
?>
<div class="form-group">
    <label class="col-md-2 control-label">Kode Menu</label>
    <div class="col-md-5">
        <input type="text" name="kode_menu" class="form-control" placeholder="Kode Menu" value="<?php echo $kode_transaksi ?>" readonly>
        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>



<div class="form-group">                                                    
<label class="col-md-2 control-label">Kategori Menu </label>
<div class="col-md-5"> 
<select class="form-control" name="kategori">
<option value="">- Pilih Kategori</option>
<?php foreach($kategori as $k){ ?>
<option <?php if(set_value('kategori') == $k->id_kategori){echo "selected='selected'";} ?> value="<?php echo $k->id_kategori ?>"><?php echo $k->nama_kategori; ?> </option>
<?php } ?>
</select>
<br/>
<?php echo form_error('kategori'); ?>
</div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Harga Menu</label>
    <div class="col-md-5">
        <input type="number" name="harga" class="form-control" placeholder="Harga menu" value="<?= set_value('harga') ?>">
        <?= form_error('harga', '<small class="text-danger pl-3">', '</small>'); ?>
    </div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label"> Keterangan menu</label>
    <div class="col-md-10">
        <textarea name="Keterangan" class="form-control" placeholder="Keterangan" id="editor"><?php echo set_value('Keterangan') ?></textarea>
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Upload Gambar Menu </label>
    <div class="col-md-10">
    <input type="file" name="image" class="form-control" required="required">
</div>
</div>

<div class="form-group">
    <label class="col-md-2 control-label">Status Menu</label>
    <div class="col-md-10">
        <select name="Status_menu" class="form-control">
            <option value="Publish"> Publikasikan</option>
            <option value="Draft">Simpan Sebagai Draft</option>
        </select>
        
    </div>

</div>

<div class="form-group">
    <label class="col-md-2 control-label"></label>
    <div class="col-md-5">
        <button class="btn btn-success btn-lg" name="submit" type="submit">
            <i class="fa fa-save"></i> Simpan
        </button>
    </div>
</div>




<?= form_close();?>
