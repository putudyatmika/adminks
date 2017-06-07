<div class="row">
<div class="col-md-6">
          <!-- Horizontal Form -->
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Tambah Variabel Regional</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal" action="<?php echo $app_url.'/'.$page.'/savevar/'; ?>" method="post" role="form">
<div class="box-body">
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
<div class="col-sm-10">
<input type="text" name="var_nama" class="form-control" id="inputNama" placeholder="Nama variabel" required="">
</div>
</div>
<div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Satuan</label>
  <div class="col-sm-8">
  <input type="text" name="var_satuan" class="form-control" id="inputPosisi" placeholder="satuan variabel" required="">
  </div>
  </div>
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Keterangan</label>
  <div class="col-sm-8">
  <input type="text" name="var_ket" class="form-control" id="inputPosisi" placeholder="keterangan">
  </div>
  </div>
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Posisi</label>
  <div class="col-sm-4">
  <input type="number" name="var_posisi" class="form-control" id="inputPosisi" placeholder="Posisi variabel" required="">
  </div>
  </div>
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Lingkup</label>
  <div class="col-sm-10">
  		<label>
            <input type="radio" name="var_lingkup" value="nas" class="flat-red"> Nasional 
        </label>
        <label>
        	<input type="radio" name="var_lingkup" value="kab" class="flat-red" checked="checked"> Kabupaten/Kota
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
</form>
</div>
<!-- /.box -->
</div>
</div>