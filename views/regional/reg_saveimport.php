<?php
if ($_POST['submit']) {
	$value_var_id=$_POST['value_var_id'];
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
            <p>Variabel : <?php echo '<strong>'.get_reg_namavar($value_var_id).'</strong>';?>
			</p>
              <table class="table table-bordered table-striped">
                <tr>
                  <th>Wilayah</th>
                  <th>Nilai</th>
                  <th>Posisi</th>
                  <th>Keterangan</th>
                </tr>
	
	<?php
	for ($i=1;$i<=$max_value;$i++) {
		if (cek_value_regVarID($value_var_id,$data["wilayah"][$i])==TRUE) {
		   $hasilKeterangan='<span class="badge bg-red">Error! sudah ada</span>';
		}
		else {
			if (save_reg_newvalue($value_var_id,$data["wilayah"][$i],$data["nilai"][$i],$data["posisi"][$i])==TRUE) { $hasilKeterangan='<span class="badge bg-green">OK! Berhasil</span>'; }
			else { $hasilKeterangan='<span class="badge bg-red">Error!</span>';}
		}
		echo '
		<tr>
			<td>'.$data["wilayah"][$i].'</td>
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