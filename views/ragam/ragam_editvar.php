<?php
$var_id=$lvl4;
if (cek_varID($var_id)==FALSE) {
    echo "Variabel ID ini tidak ada";
 }
else {
  $var_edit=get_ragam_variabel($var_id);
  $var_nama=$var_edit["var_nama"];
  $var_satuan=$var_edit["var_satuan"];
  $var_ket=$var_edit["var_ket"];
  $var_kat_id=$var_edit["var_kat_id"];
  $var_posisi=$var_edit["var_posisi"];
  $var_indikator=$var_edit["var_indikator"];
  $var_metadata=$var_edit["var_metadata"];
  if (empty($var_indikator)) $v_stra="";
  else $v_stra="checked";
}
?>
<div class="row">
<div class="col-md-6">
          <!-- Horizontal Form -->
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Edit Variabel</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal" action="<?php echo $app_url.'/'.$page.'/updatevar/'; ?>" method="post" role="form">
<div class="box-body">
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Tema</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="inputNama" placeholder="Nama Kategori" value="<?php echo get_nama_ragamtema($lvl3);?>" disabled>
</div>
</div>
<div class="form-group">
<label for="var_kat_id" class="col-sm-2 control-label">Kategori</label>
<div class="col-sm-10" id="select2">
	<select name="var_kat_id" id="var_kat_id" class="form-control" style="width: 100%;">
     <?php
     	$r_kat=list_ragam_kategori($lvl3);
     	if ($r_kat["error"]==FALSE) {
     		$i=1;
			$max_kat=$r_kat["tema_kat_total"];
			for ($i=1;$i<=$max_kat;$i++) {
				if ($r_kat["item"][$i]["tema_kat_id"]==$var_kat_id) { $selected='selected="selected"'; }
				else { $selected=''; }
				echo '
				<option value="'.$r_kat["item"][$i]["tema_kat_id"].'" '.$selected.'>'.$r_kat["item"][$i]["tema_kat_nama"].'</option>
			';	
			}
     	}
     	else {
     		echo '
     		<option value="">'.$r_kat["pesan_error"].'</option>
     		';
     	}
     ?>
    </select>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
<div class="col-sm-10">
<input type="text" name="var_nama" class="form-control" id="inputNama" placeholder="Nama Variabel" value="<?php echo $var_nama;?>">
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Satuan</label>
<div class="col-sm-6">
<input type="text" name="var_satuan" class="form-control" id="inputNama" placeholder="Satuan variabel" value="<?php echo $var_satuan;?>">
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Ket</label>
<div class="col-sm-6">
<input type="text" name="var_ket" class="form-control" id="inputNama" placeholder="keterangan variabel" value="<?php echo $var_ket;?>">
</div>
</div>
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Posisi</label>
  <div class="col-sm-4">
  <input type="number" name="var_posisi" class="form-control" id="inputPosisi" placeholder="Posisi variabel" value="<?php echo $var_posisi;?>">
  </div>
  </div>
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Metadata</label>
  <div class="col-sm-10" id="select2">
  <select name="var_metadata" id="var_metadata" class="form-control" style="width: 100%;">
     <option value="">Tidak ada Metadata</option>
     <?php
      $r_md=list_metadata_all();
      if ($r_md["error"]==false) {
       $i=1;
      $max_md=$r_md["md_total"];
      for ($i=1;$i<=$max_md;$i++) {
        if ($r_md["item"][$i]["md_id"]==$var_metadata) { $selected='selected="selected"'; }
        else { $selected=''; }
        echo '
        <option value="'.$r_md["item"][$i]["md_id"].'" '.$selected.'>'.$r_md["item"][$i]["md_nama"].'</option>
      ';  
      }
      }
      else {
        echo '
        <option value="">'.$r_md["pesan_error"].'</option>
        ';
      }
     ?>
    </select>
</div>
  </div>
   <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">&nbsp;</label>
  <div class="col-sm-10">
  <label><input type="checkbox" class="minimal-red" name="var_indikator" value="1" <?php echo $v_stra;?>> Apakah masuk <strong>Indikator Strategis?</strong>
                </label>
  </div>
  </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
<button type="reset" class="btn btn-default">Reset</button>
<button type="submit" name="submit" value="updatevar" class="btn btn-info pull-right">Update</button>
</div>
<!-- /.box-footer -->
<input type="hidden" name="tema_id" value="<?php echo $lvl3; ?>" />
<input type="hidden" name="var_id" value="<?php echo $var_id; ?>" />

</form>
</div>
<!-- /.box -->
</div>
</div>