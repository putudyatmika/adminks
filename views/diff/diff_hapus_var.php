<?php
$var_diff_id=$lvl3;
$r_diff=get_variabel_diff_full($var_diff_id);
$var_id=$r_diff["item"]["diff_var_id"];
$var_diff_nama=$r_diff["item"]["diff_nama"];
$value_id=$r_diff["item"]["diff_var_waktu"];
$kat_id=get_kategori_var($var_id);
$tema_id=get_ragam_kat($kat_id);
if (cekDiffVarValue($var_diff_id,false,0)==FALSE) {
	//hapus variabel
	//$var_lama=get_nama_variabel($var_id);
	
	if (hapus_diff_variabel($var_diff_id,$var_id,$value_id)==TRUE)  {
		echo "Variabel Diff <strong>".$var_diff_nama."</strong> berhasil dihapus";
	}
	else {
		echo "Variabel Diff <strong>".$var_diff_nama."</strong> tidak bisa dihapus";
	}
}
else { ?>
<div class="row">
<div class="col-md-8">

	 <div class="box box-solid box-warning">
            <div class="box-header">
              <h3 class="box-title">Value Diff</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            <p class="text-center">Variabel Diff <strong><?php echo $var_diff_nama;?></strong> tidak dapat dihapus karena masih ada value dibawah ini</p>
              <div class="table-responsive">
            	  <table id="tabelValue" class="table table-bordered table-striped table-hover">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Rincian</th>
                  <th>Nilai</th>
                  <th>Posisi</th>
                  <th style="width: 100px">Aksi</th>
                </tr>
                <?php
                $r_val=list_value_diff($var_diff_id);
                if ($r_val["error"]==false) {
                	$i=1;
					$max_val=$r_val["diff_total"];
					for ($i=1;$i<=$max_val;$i++) {
						echo '
							<tr>
								<td>'.$i.'</td>
								<td>'.$r_val["item"][$i]["diff_rincian"].'</td>
								<td>'.$r_val["item"][$i]["diff_nilai"].'</td>
								<td>'.$r_val["item"][$i]["diff_posisi"].'</td>
								<td><div class="text-center">
								<a href="'.$app_url.'/'.$page.'/editvalue/'.$lvl3.'/'.urlencode($r_val["item"][$i]["diff_rincian"]).'" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
								<a href="'.$app_url.'/'.$page.'/hapusvalue/'.$lvl3.'/'.urlencode($r_val["item"][$i]["diff_rincian"]).'" class="btn btn-xs btn-danger" data-confirm="Apakah data value ini akan di hapus?"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
								</td>
							</tr>';

					}
                }
                else {
                	echo '
						<tr>
						<td colspan="5">'.$r_val["pesan_error"].'</td>
						</tr>
						';
                }
                ?>
                </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box value view-->
          </div>
          </div>
<?php
}
?>