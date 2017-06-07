<div class="row">
<div class="col-md-6">
          <!-- Horizontal Form -->
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Import Value via Excel</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal" action="<?php echo $app_url.'/'.$page.'/confirmimport/'; ?>" enctype="multipart/form-data"  method="post" role="form">
<div class="box-body">
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Variabel</label>
<div class="col-sm-10" >
<input type="text" name="value_var" class="form-control" id="inputNama" placeholder="Waktu" value="<?php echo get_reg_namavar($lvl3);?>" disabled="">
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
<input type="hidden" name="value_var_id" value="<?php echo $lvl3; ?>" />
</form>
</div>
<!-- /.box -->
</div>
</div>