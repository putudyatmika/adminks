<?php
 $tema_id=$lvl3;
 $kat_id=$lvl4;
 if (cek_katID($kat_id)==FALSE) {
    echo "Kategori ID ini tidak ada";
 }
else {
  $kat_edit=get_ragam_kategori($kat_id);
  $kat_nama=$kat_edit["kat_nama"];
  $kat_posisi=$kat_edit["kat_posisi"];
?>
<div class="row">
<div class="col-md-6">
          <!-- Horizontal Form -->
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Edit Kategori</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal" action="<?php echo $app_url.'/'.$page.'/updatekat/'; ?>" method="post" role="form">
<div class="box-body">
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Tema</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="inputNama" placeholder="Nama Kategori" value="<?php echo get_nama_ragamtema($lvl3);?>" disabled>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
<div class="col-sm-10">
<input type="text" name="kat_nama" class="form-control" id="inputNama" placeholder="Nama Kategori" value="<?php echo $kat_nama;?>">
</div>
</div>
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Posisi</label>
  <div class="col-sm-4">
  <input type="number" name="kat_posisi" class="form-control" id="inputPosisi" placeholder="Posisi Kategori" value="<?php echo $kat_posisi;?>">
  </div>
  </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
<button type="reset" class="btn btn-default">Reset</button>
<button type="submit" name="submit" value="updatekat" class="btn btn-info pull-right">Update</button>
</div>
<!-- /.box-footer -->
<input type="hidden" name="tema_id" value="<?php echo $lvl3; ?>" />
<input type="hidden" name="kat_id" value="<?php echo $kat_id; ?>" />
</form>
</div>
<!-- /.box -->
</div>
</div>
<?php }
?>