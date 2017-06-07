<?php
$var_id=$lvl3;
if (cek_regVarID($var_id)==FALSE) {
    echo "Variabel ID ini tidak ada";
 }
else {
  $var_edit=get_reg_variabel($var_id);
  $var_nama=$var_edit["var_nama"];
  $var_satuan=$var_edit["var_satuan"];
  $var_ket=$var_edit["var_ket"];
  $var_lingkup=$var_edit["var_lingkup"];
  $var_posisi=$var_edit["var_posisi"];
?>
<div class="row">
<div class="col-md-6">
          <!-- Horizontal Form -->
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Edit Variabel Regional</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal" action="<?php echo $app_url.'/'.$page.'/updatevar/'; ?>" method="post" role="form">
<div class="box-body">
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
<div class="col-sm-10">
<input type="text" name="var_nama" class="form-control" id="inputNama" placeholder="Nama variabel" value="<?php echo $var_nama;?>" required="">
</div>
</div>
<div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Satuan</label>
  <div class="col-sm-8">
  <input type="text" name="var_satuan" class="form-control" id="inputPosisi" placeholder="satuan variabel" value="<?php echo $var_satuan;?>" required="">
  </div>
  </div>
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>
  <div class="col-sm-8">
  <input type="text" name="var_ket" class="form-control" id="inputPosisi" placeholder="keterangan" value="<?php echo $var_ket;?>">
  </div>
  </div>
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Posisi</label>
  <div class="col-sm-4">
  <input type="number" name="var_posisi" class="form-control" id="inputPosisi" placeholder="Posisi variabel" value="<?php echo $var_posisi;?>" required="">
  </div>
  </div>
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Lingkup</label>
  <div class="col-sm-10">
  		<label>
            <input type="radio" name="var_lingkup" value="nas" class="flat-red control-label" <?php if ($var_lingkup=="nas") echo "checked";?> > Nasional 
        </label>
        <label>
        	<input type="radio" name="var_lingkup" value="kab" class="flat-red control-label" <?php if ($var_lingkup=="kab") echo "checked";?> > Kabupaten/Kota
        </label>
        
  </div>
  </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
<button type="reset" class="btn btn-default">Reset</button>
<button type="submit" name="submit" value="simpanvar" class="btn btn-info pull-right">Simpan</button>
</div>
<!-- /.box-footer -->
<input type="hidden" name="var_id" value="<?php echo $var_id;?>" />
</form>
</div>
<!-- /.box -->
</div>
</div>
<?php } ?>