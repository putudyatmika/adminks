<div class="row">
	<div class="col-md-6">
          <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Variabel Diff </h3><span class="pull-right"><a href="<?php echo $app_url.'/'.$page.'/add/'.$lvl3; ?>" class="btn btn-flat btn-xs btn-info"><i class="fa fa-plus" aria-hidden="true"></i></a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
             	<table class="table table-bordered table-striped" id="tabelVariabel2">
             	<thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Var Nama</th>
                  <th>Waktu</th>
                  <th>Nama</th>
                  <th style="width: 20px">posisi</th>
                  <th style="width: 100px">Aksi</th>
                </tr>
                 </thead>
                <tbody>
                <?php
					$r_diff=list_variabel_diff();
					if ($r_diff["error"]==false) {
						$i=1;
						$max_dif=$r_diff["diff_total"];
						for ($i=1;$i<=$max_dif;$i++) {
							if ($r_diff["item"][$i]["diff_id"]==$lvl3) {
                $var_nama='<strong>'.$r_diff["item"][$i]["diff_var_nama"].'</strong>';
                $var_waktu='<strong>'.$r_diff["item"][$i]["diff_var_waktu"].'</strong>';
                $diff_nama='<strong>'.$r_diff["item"][$i]["diff_nama"].'</strong>';
                $diff_nama_select=$r_diff["item"][$i]["diff_nama"];
                $var_waktu_select=$r_diff["item"][$i]["diff_var_waktu"];
              }
              else {
                $var_nama=$r_diff["item"][$i]["diff_var_nama"];
                $var_waktu=$r_diff["item"][$i]["diff_var_waktu"];
                $diff_nama=$r_diff["item"][$i]["diff_nama"];
              }
							echo '
							<tr>
								<td>'.$i.'</td>
								<td>'.$var_nama.'</td>
								<td>'.$var_waktu.'</td>
								<td>'.$diff_nama.' <p><small>'.$r_diff["item"][$i]["diff_ket"].' ('.$r_diff["item"][$i]["diff_satuan"].')</small></p></td>
								<td>'.$r_diff["item"][$i]["diff_posisi"].'</td>
								<td><div class="text-center"><div class="text-center"><a href="'.$app_url.'/'.$page.'/view/'.$r_diff["item"][$i]["diff_id"].'" class="btn btn-xs btn-warning"><i class="fa fa-search" aria-hidden="true"></i></a> <a href="'.$app_url.'/'.$page.'/edit/'.$r_diff["item"][$i]["diff_id"].'" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
								<a href="'.$app_url.'/'.$page.'/hapus/'.$r_diff["item"][$i]["diff_id"].'" class="btn btn-xs btn-danger" data-confirm="Apakah data variabel diff ini akan di hapus?"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div></td>
							</tr>
						';	
						}
						
					}
					else {
						echo '
						<tr>
						<td colspan="3"><p class="text-center">'.$r_diff["pesan_error"].'</p></td>
						</tr>
						';
					}
				?>
				 </tbody>
                <tfoot>
                 <tr>
                  <th style="width: 10px">#</th>
                  <th>Var Nama</th>
                  <th>Waktu</th>
                  <th>Nama</th>
                  <th style="width: 20px">posisi</th>
                  <th style="width: 100px">Aksi</th>
                </tr>
                </tfoot>
              </table>
              </div>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->
          </div>
          <?php
          if ($act=="view") {
          //act view tampilan ini
          ?>
          <div class="col-md-6">
          <div class="box box-solid box-success">
            <div class="box-header">
              <h3 class="box-title">Value Diff : <?php echo $diff_nama_select .' '.$var_waktu_select; ?></h3> <span class="pull-right"><button class="btn btn-xs btn-success" data-widget="collapse"><i class="fa fa-minus"></i></button> <a href="<?php echo $app_url.'/'.$page.'/addvar/'.$lvl3; ?>" class="btn btn-flat btn-xs btn-warning"><i class="fa fa-plus" aria-hidden="true"></i></a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
                $r_val=list_value_diff($lvl3);
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
          <!-- /.box -->
          
        </div>
        <?php } ?>
        <!-- /.col -->
        <!---batas act view-->
</div>