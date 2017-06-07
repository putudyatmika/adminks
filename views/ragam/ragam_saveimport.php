<?php
if ($_POST['submit']) {
	$tema_id=$_POST['tema_id'];
	$var_id=$_POST['var_id'];
	$max_value=$_POST['max_value'];
	$data=$_POST['data']; ?>
	<!--html-->
	<div class="row">
				<div class="col-md-6">
          <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Simpan import file excel</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <p>Tema : <?php echo '('.$tema_id.') '.get_nama_ragamtema($tema_id);?> <br />
			Kategori : <?php echo '('.get_kategori_var($var_id).') '.get_nama_kategori(get_kategori_var($var_id));?><br />
			Variabel : <?php echo '('.$var_id.') '.get_nama_variabel($var_id);?>
			</p>
              <table class="table table-bordered table-striped">
                <tr>
                  <th>waktu</th>
                  <th>Nilai</th>
                  <th>Posisi</th>
                  <th>Keterangan</th>
                </tr>
	
	<?php
	for ($i=1;$i<=$max_value;$i++) {
		if (cek_VarValue($var_id,$data["waktu"][$i])==TRUE) {
		   $hasilKeterangan='<span class="badge bg-red">Error! sudah ada</span>';
		}
		else {
			if (save_newvalue($var_id,$data["waktu"][$i],$data["nilai"][$i],$data["posisi"][$i])==TRUE) { $hasilKeterangan='<span class="badge bg-green">OK! Berhasil</span>'; }
			else { $hasilKeterangan='<span class="badge bg-red">Error!</span>';}
		}
		echo '
		<tr>
			<td>'.$data["waktu"][$i].'</td>
			<td>'.$data["nilai"][$i].'</td>
			<td>'.$data["posisi"][$i].'</td>
			<td>'.$hasilKeterangan.'</td>
		</tr>
		';
		
	} ?>
			</table>
			</div>
            <!-- /.box-body -->
            </div>
          </div>
          <!-- /.box -->
<?php 
}
?>