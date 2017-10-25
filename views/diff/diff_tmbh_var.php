<?php
$tema_id=$lvl3;
$var_id=$lvl4;
$value_id=urldecode($lvl5);
$kat_id=get_kategori_var($var_id);
?>
<div class="row">
<div class="col-md-6">
          <!-- Horizontal Form -->
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Tambah Variabel Diff</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal" action="<?php echo $app_url.'/'.$page.'/savevar/'; ?>" method="post" role="form">
<div class="box-body">
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Ragam</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="inputNama" value="<?php echo get_nama_ragamtema($tema_id); ?>" placeholder="Nama Ragam" disabled>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Kategori</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="inputNama" value="<?php echo get_nama_kategori($kat_id); ?>" placeholder="Nama Kategori" disabled>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Variabel</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="inputNama" value="<?php echo get_nama_variabel($var_id); ?>" placeholder="Nama Kategori" disabled>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Value</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="inputNama" value="<?php echo $value_id; ?>" placeholder="Value" disabled>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
<div class="col-sm-6">
<input type="text" name="diff_var_nama" class="form-control" id="inputNama" placeholder="Nama variabel diff" required="">
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Satuan</label>
<div class="col-sm-6">
<input type="text" name="diff_var_satuan" class="form-control" id="inputNama" placeholder="Satuan variabel diff">
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Ket </label>
<div class="col-sm-6">
<input type="text" name="diff_var_ket" class="form-control" id="inputNama" placeholder="keterangan variabel diff">
</div>
</div>
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Posisi</label>
  <div class="col-sm-4">
  <input type="number" name="diff_var_posisi" class="form-control" id="inputPosisi" placeholder="Posisi variabel diff" required="">
  </div>
  </div>
 </div>
<!-- /.box-body -->
<div class="box-footer">
<button type="reset" class="btn btn-default">Reset</button>
<button type="submit" name="submit" value="simpankat" class="btn btn-info pull-right">Simpan</button>
</div>
<!-- /.box-footer -->
<input type="hidden" name="var_id" value="<?php echo $var_id; ?>" />
<input type="hidden" name="waktu_id" value="<?php echo $value_id; ?>" />
</form>
</div>
<!-- /.box -->
</div>
</div>