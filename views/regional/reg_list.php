<div class="row">
	<div class="col-md-12">
          <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Variabel</h3> <span class="pull-right"><button type="button" class="btn btn-primary btn-xs" data-widget="collapse"><i class="fa fa-minus"></i>
                </button> <a href="<?php echo $app_url.'/'.$page.'/addvar/'; ?>" class="btn btn-flat btn-xs btn-info"><i class="fa fa-plus" aria-hidden="true"></i></a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama</th>
                  <th>Satuan</th>
                  <th>Ket</th>
                  <th style="width: 20px">Posisi</th>
                  <th>Lingkup</th>
                  <th style="width: 100px">Aksi</th>
                </tr>
               	<?php
                $r_var=reg_variabel_list();
                if ($r_var["error"]==false) {
						$i=1;
						$max_var=$r_var["reg_var_total"];
						for ($i=1;$i<=$max_var;$i++) {
							echo '
							<tr>
								<td>'.$i.'</td>
								<td>'.$r_var["item"][$i]["reg_var_nama"].'</td>
								<td>'.$r_var["item"][$i]["reg_var_satuan"].'</td>
								<td>'.$r_var["item"][$i]["reg_var_ket"].'</td>
								<td>'.$r_var["item"][$i]["reg_var_posisi"].'</td>
								<td>'.$LingkupRegional[$r_var["item"][$i]["reg_var_lingkup"]].'</td>
								<td><div class="text-center"><a href="'.$app_url.'/'.$page.'/view/'.$r_var["item"][$i]["reg_var_id"].'" class="btn btn-xs btn-warning"><i class="fa fa-search" aria-hidden="true"></i></a> 
								<a href="'.$app_url.'/'.$page.'/editvar/'.$r_var["item"][$i]["reg_var_id"].'" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
								<a href="'.$app_url.'/'.$page.'/hapusvar/'.$r_var["item"][$i]["reg_var_id"].'" class="btn btn-xs btn-danger" data-confirm="Apakah data variabel ini akan di hapus?"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
								</td>
							</tr>
						';	
						}
						
					}
					else {
						echo '
						<tr>
						<td colspan="4"><p class="text-center">'.$r_var["pesan_error"].'</p></td>
						</tr>
						';
					}
                ?>
              </table>
            </div>
            <!-- /.box-body -->

          </div>
          <!-- /.box -->
          </div>
</div>
<?php
//akan muncul bila mode view dan ada id variabel
if (!empty($lvl3)) {
?>
<div class="row">
          <div class="col-md-10">
          <div class="box box-solid box-success">
            <div class="box-header">
              <h3 class="box-title">Value</h3> <span class="pull-right"><a href="<?php echo $app_url.'/'.$page.'/imporvalue/'.$lvl3; ?>" class="btn btn-flat btn-xs btn-success">Impor Excel</a> <a href="<?php echo $app_url.'/'.$page.'/addvalue/'.$lvl3; ?>" class="btn btn-flat btn-xs btn-warning"><i class="fa fa-plus" aria-hidden="true"></i></a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
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
          <!-- /.box -->
          <!--box untuk view-->
</div>
</div>
<?php } //batas view lvl4 ?>