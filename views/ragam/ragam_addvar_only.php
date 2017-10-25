<div class="row">
<div class="col-md-6">
          <!-- Horizontal Form -->
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Tambah Variabel</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal" action="<?php echo $app_url.'/'.$page.'/savevar/'; ?>" method="post" role="form">
<div class="box-body">
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Tema</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="inputNama" placeholder="Nama Ragam" value="<?php echo get_nama_ragamtema($lvl3);?>" disabled>
</div>
</div>
<div class="form-group">
<label for="var_kat_id" class="col-sm-2 control-label">Kategori</label>
<div class="col-sm-6">
<input type="text" class="form-control" id="inputNama" placeholder="Nama Kategori" value="<?php echo get_nama_kategori($lvl4);?>" disabled>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
<div class="col-sm-10">
<input type="text" name="var_nama" class="form-control" id="inputNama" placeholder="Nama Variabel" required="">
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Satuan</label>
<div class="col-sm-6">
<input type="text" name="var_satuan" class="form-control" id="inputNama" placeholder="Satuan variabel" required="">
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Ket</label>
<div class="col-sm-6">
<input type="text" name="var_ket" class="form-control" id="inputNama" placeholder="keterangan variabel">
</div>
</div>
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Posisi</label>
  <div class="col-sm-4">
  <input type="number" name="var_posisi" class="form-control" id="inputPosisi" placeholder="Posisi variabel" required="">
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
        echo '
        <option value="'.$r_md["item"][$i]["md_id"].'">'.$r_md["item"][$i]["md_nama"].'</option>
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
  <label><input type="checkbox" class="minimal-red" name="var_indikator" value="1"> Apakah masuk <strong>Indikator Strategis?</strong>
                </label>
  </div>
  </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
<button type="reset" class="btn btn-default">Reset</button>
<button type="submit" name="submit" value="simpankat" class="btn btn-info pull-right">Simpan</button>
</div>
<!-- /.box-footer -->
<input type="hidden" name="tema_id" value="<?php echo $lvl3; ?>" />
<input type="hidden" name="var_kat_id" value="<?php echo $lvl4; ?>" />
</form>
</div>
<!-- /.box -->
</div>
</div>