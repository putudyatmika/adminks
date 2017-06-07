<?php
$var_id=$lvl4;
$tema_id=$lvl3;
if (cekVarValue($var_id)==FALSE) {
	//hapus variabel
	$var_lama=get_nama_variabel($var_id);
	if (hapus_variabel($var_id)==TRUE)  {
		echo "Variabel <strong>".$var_lama."</strong> berhasil dihapus";
	}
	else {
		echo "Variabel <strong>".$var_lama."</strong> tidak bisa dihapus";
	}
}
else { ?>
<div class="row">
<div class="col-md-8">

	 <div class="box box-solid box-warning">
            <div class="box-header">
              <h3 class="box-title">Value</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            <p class="text-center">Variabel <strong><?php echo get_nama_variabel($var_id);?></strong> tidak dapat dihapus karena masih ada value dibawah ini</p>
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Variabel</th>
                  <th>Waktu</th>
                  <th>Nilai</th>
                  <th>Posisi</th>
                  <th style="width: 100px">Aksi</th>
                </tr>
                <?php
                $r_var_value=list_variabel_value($lvl4);
                if ($r_var_value["error"]==false) {
						$i=1;
						$max_var_value=$r_var_value["var_value_total"];
						for ($i=1;$i<=$max_var_value;$i++) {
							echo '
							<tr>
								<td>'.$i.'</td>
								<td>'.$r_var_value["item"][$i]["var_value_nama"].'</td>
								<td>'.$r_var_value["item"][$i]["var_value_waktu"].'</td>
								<td>'.$r_var_value["item"][$i]["var_value_nilai"].'</td>
								<td>'.$r_var_value["item"][$i]["var_value_posisi"].'</td>
								<td><div class="text-center">
								<a href="'.$app_url.'/'.$page.'/editvalue/'.$lvl3.'/'.$lvl4.'/'.$r_var_value["item"][$i]["var_value_waktu"].'" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
								<a href="'.$app_url.'/'.$page.'/hapusvalue/'.$lvl3.'/'.$lvl4.'/'.$r_var_value["item"][$i]["var_value_waktu"].'" class="btn btn-xs btn-danger" data-confirm="Apakah data value ini akan di hapus?"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
								</td>
							</tr>
						';	
						}
						
					}
					else {
						echo '
						<tr>
						<td colspan="4">'.$r_var_value["pesan_error"].'</td>
						</tr>
						';
					}
                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box value view-->
          </div>
          </div>
<?php
}
?>