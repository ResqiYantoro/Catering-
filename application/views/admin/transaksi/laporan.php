<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
<form method="post" action="<?php echo base_url('admin/Laporan'); ?>">
<div class="form-group">
    <label class="col-md-3 control-label">Pilih Bulan</label>
    <div class="col-md-5">
        <select name="bulan" class="form-control" required="">
        	<option value="">Pilih Bulan</option>
        	<option value="1">Januari</option>
        	<option value="2">Februari</option>
        	<option value="3">Maret</option>
        	<option value="4">April</option>
        	<option value="5">Mei</option>
        	<option value="6">Juni</option>
        	<option value="7">Juli</option>
        	<option value="8">Agustus</option>
        	<option value="9">September</option>
        	<option value="10">Oktober</option>
        	<option value="11">November</option>
        	<option value="12">Desember</option>
        </select>
    </div>
    <div class="col-md-4">
        <input type="submit" name="submit" value="Priview" class="btn btn-primary">
    </div>
</div>
</form>