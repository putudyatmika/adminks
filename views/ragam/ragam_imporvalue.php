<div class="row">
<div class="col-md-6">
          <!-- Horizontal Form -->
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Import Value via Excel</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal" action="<?php echo $app_url.'/'.$page.'/confirmimport/'; ?>" enctype="multipart/form-data" method="post" role="form">
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
<div class="col-sm-10" id="select2">
<select name="var_id" id="var_id" class="form-control" style="width: 100%;">
     <?php
      $r_var=list_variabel_kategori(get_kategori_var($lvl4));
      if ($r_var["error"]==FALSE) {
        $i=1;
      $max_var=$r_var["var_kat_total"];
      for ($i=1;$i<=$max_var;$i++) {
        if (empty($r_var["item"][$i]["var_ket"])) { $ket_var=''; }
        else { $ket_var='('.$r_var["item"][$i]["var_ket"].')'; }
        echo '
        <option value="'.$r_var["item"][$i]["var_id"].'">'.$r_var["item"][$i]["var_nama"].' '.$ket_var.'</option>
      ';  
      }
      }
      else {
        echo '
        <option value="">'.$r_var["pesan_error"].'</option>
        ';
      }
     ?>
    </select>
</div>
</div>
<div class="form-group">
<label for="InputFile" class="col-sm-2 control-label">File</label>
<div class="col-sm-6">
      <input type="file" id="InputFile" name="file_excel" required="">
</div>
</div>
<div class="form-group">
<label for="InputFile" class="col-sm-2 control-label"></label>
<div class="col-sm-6"><a href="<?php echo $app_url.'/template_data_value.xlsx';?>">Template file xlsx</a>
</div>
</div>
<!-- /.box-body -->
<div class="box-footer">
<button type="reset" class="btn btn-default">Reset</button>
<button type="submit" name="submit" value="simpanvalue" class="btn btn-info pull-right">Import Data</button>
</div>
<!-- /.box-footer -->
<input type="hidden" name="tema_id" value="<?php echo $lvl3; ?>" />
</form>
</div>
<!-- /.box -->
</div>
</div>