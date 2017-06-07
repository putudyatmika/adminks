<?php
$var_id=$lvl4;
$waktu=$lvl5;
if (cek_VarValue($var_id,urldecode($waktu))==FALSE) {
    echo "Variabel ID ini tidak ada";
 }
else {
  $value_edit=get_value_variabel($var_id,urldecode($waktu));
  $value_nilai=$value_edit["value_nilai"];
  $value_waktu=$value_edit["value_waktu"];
  $value_posisi=$value_edit["value_posisi"];
}

?>
<div class="row">
<div class="col-md-6">
          <!-- Horizontal Form -->
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Edit Value</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal" action="<?php echo $app_url.'/'.$page.'/updatevalue/'; ?>" method="post" role="form">
<div class="box-body">
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Tema</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="inputNama" placeholder="Nama Kategori" value="<?php echo get_nama_ragamtema($lvl3);?>" disabled>
</div>
</div>
<div class="form-group">
<label for="var_kat_id" class="col-sm-2 control-label">Kategori</label>
<div class="col-sm-10">
	<input type="text" class="form-control" id="inputNama" value="<?php echo get_nama_kategori(get_kategori_var($lvl4));?>" disabled>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Variabel</label>
<div class="col-sm-10">
<input type="text" class="form-control" id="inputNama" value="<?php echo get_nama_variabel($var_id);?>" disabled>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Waktu</label>
<div class="col-sm-6">
<input type="text" name="value_waktu" class="form-control" id="inputNama" value="<?php echo $value_waktu;?>" disabled>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Nilai</label>
<div class="col-sm-6">
<input type="text" name="value_nilai" class="form-control" id="inputNama" placeholder="Nilai" value="<?php echo $value_nilai;?>">
</div>
</div>
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Posisi</label>
  <div class="col-sm-4">
  <input type="number" name="value_posisi" class="form-control" id="inputPosisi" placeholder="Posisi" value="<?php echo $value_posisi;?>">
  </div>
  </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
<button type="reset" class="btn btn-default">Reset</button>
<button type="submit" name="submit" value="updatevalue" class="btn btn-info pull-right">Update</button>
</div>
<!-- /.box-footer -->
<input type="hidden" name="tema_id" value="<?php echo $lvl3; ?>" />
<input type="hidden" name="var_id" value="<?php echo $var_id; ?>" />
<input type="hidden" name="value_waktu" value="<?php echo $value_waktu; ?>" />
</form>
</div>
<!-- /.box -->
</div>
</div>