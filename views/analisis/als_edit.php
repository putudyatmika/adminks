<?php
$als_edit=get_als($lvl3);
if ($als_edit["error"]==TRUE) {
  echo "Analisis lintas Sekotral ID ini tidak tersedia";
}
else {
?>
<div class="row">
<div class="col-md-10">
          <!-- Horizontal Form -->
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Edit Analisis Linstas Sektoral</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal" action="<?php echo $app_url.'/'.$page.'/updateals/'; ?>" method="post" role="form">
<div class="box-body">
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
<div class="col-sm-10">
<input type="text" name="als_judul" class="form-control" id="inputNama" placeholder="Judul Analisis" value="<?php echo $als_edit["item"]["als_judul"];?>" required="">
</div>
</div>
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Isi</label>
  <div class="col-sm-10"><textarea id="editorCK" name="als_isi" rows="10" cols="80"><?php echo $als_edit["item"]["als_isi"];?></textarea>
  </div>
  </div>
 
</div>
<!-- /.box-body -->
<div class="box-footer">
<button type="reset" name="reset" class="btn btn-default">Reset</button>
<button type="submit" name="submit" value="simpanmd" class="btn btn-info pull-right">Simpan</button>
</div>
<!-- /.box-footer -->
<input type="hidden" name="als_id" value="<?php echo $lvl3;?>" />
</form>
</div>
<!-- /.box -->
</div>
</div>
<?php } ?>