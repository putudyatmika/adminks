<div class="row">
<div class="col-md-12">
          <!-- Horizontal Form -->
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Tambah Metadata</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal" action="<?php echo $app_url.'/'.$page.'/savemd/'; ?>" method="post" role="form">
<div class="box-body">
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Judul</label>
<div class="col-sm-10">
<input type="text" name="md_nama" class="form-control" id="inputNama" placeholder="Judul Metadata" required="">
</div>
</div>
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Kondef</label>
  <div class="col-sm-10"><textarea id="editorCK" name="md_kondef" rows="8" cols="80" required=""></textarea>
  </div>
  </div>
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Kegunaan</label>
  <div class="col-sm-10"><textarea id="editorCK2" name="md_kegunaan" rows="10" cols="80"></textarea>
  </div>
  </div>
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Interpretasi</label>
  <div class="col-sm-10"><textarea id="editorCK3" name="md_interpretasi" rows="10" cols="80"></textarea>
  </div>
  </div>
</div>
<!-- /.box-body -->
<div class="box-footer">
<button type="reset" name="rese" class="btn btn-default">Reset</button>
<button type="submit" name="submit" value="simpanmd" class="btn btn-info pull-right">Simpan</button>
</div>
<!-- /.box-footer -->
</form>
</div>
<!-- /.box -->
</div>
</div>