<?php
$var_id=$lvl3;
if (cek_regVar_on_value($var_id)==FALSE) {
	//hapus variabel
	$var_lama=get_reg_namavar($var_id);
	if (hapus_reg_variabel($var_id)==TRUE)  {
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
            <p class="text-center">Variabel <strong><?php echo get_reg_namavar($var_id);?></strong> tidak dapat dihapus karena masih ada value dibawah ini</p>
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Variabel</th>
                  <th>Wilayah</th>
                  <th>Nilai</th>
                  <th>Posisi</th>
                  <th style="width: 100px">Aksi</th>
                </tr>
                <?php
                $r_value=reg_var_value_list($lvl3);
                if ($r_value["error"]==false) {
						$i=1;
						$max_var=$r_value["reg_value_total"];
						$nama_variabel=get_reg_namavar($lvl3);
						for ($i=1;$i<=$max_var;$i++) {
							echo '
							<tr>
								<td>'.$i.'</td>
								<td>'.$nama_variabel.'</td>
								<td>'.$r_value["item"][$i]["reg_value_wilayah"].'</td>
								<td>'.$r_value["item"][$i]["reg_value_nilai"].'</td>
								<td>'.$r_value["item"][$i]["reg_value_posisi"].'</td>
								<td>
								<a href="'.$app_url.'/'.$page.'/editvalue/'.$r_value["item"][$i]["reg_value_id"].'/'.urlencode($r_value["item"][$i]["reg_value_wilayah"]).'" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
								<a href="'.$app_url.'/'.$page.'/hapusvalue/'.$r_value["item"][$i]["reg_value_id"].'/'.urlencode($r_value["item"][$i]["reg_value_wilayah"]).'" class="btn btn-xs btn-danger" data-confirm="Apakah data value ini akan di hapus?"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
								</td>
							</tr>
						';	
						}
						
					}
					else {
						echo '
						<tr>
						<td colspan="4"><p class="text-center">'.$r_value["pesan_error"].'</p></td>
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