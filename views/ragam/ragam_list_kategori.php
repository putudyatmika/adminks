<div class="row">
	<div class="col-md-4">
          <div class="box box-solid box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Kategori <span class="label label-danger"><?php echo get_jumlah_kategori($lvl3); ?></span> </h3><span class="pull-right"><a href="<?php echo $app_url.'/'.$page.'/addkat/'.$lvl3; ?>" class="btn btn-flat btn-xs btn-info"><i class="fa fa-plus" aria-hidden="true"></i></a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama</th>
                  <th style="width: 20px">Pos</th>
                  <th style="width: 100px">Aksi</th>
                </tr>
                <?php
					$r_kat=list_ragam_kategori($lvl3);
					if ($r_kat["error"]==false) {
						$i=1;
						$max_kat=$r_kat["tema_kat_total"];
						$jml_var="";
						for ($i=1;$i<=$max_kat;$i++) {
							//$jml_var=get_jumlah_variabel_kategori($r_kat["item"][$i]["tema_kat_id"]);
							echo '
							<tr>
								<td>'.$i.'</td>
								<td>'.$r_kat["item"][$i]["tema_kat_nama"].' <span class="label label-success pull-right" title="'.$r_kat["item"][$i]["jumlah_variabel"].' Variabel">'.$r_kat["item"][$i]["jumlah_variabel"].'</span></td>
								<td>'.$r_kat["item"][$i]["tema_kat_posisi"].'</td>
								<td><div class="text-center"><div class="text-center"><a href="'.$app_url.'/'.$page.'/viewonly/'.$lvl3.'/'.$r_kat["item"][$i]["tema_kat_id"].'" class="btn btn-xs btn-warning"><i class="fa fa-search" aria-hidden="true"></i></a> <a href="'.$app_url.'/'.$page.'/editkat/'.$lvl3.'/'.$r_kat["item"][$i]["tema_kat_id"].'" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
								<a href="'.$app_url.'/'.$page.'/hapuskat/'.$lvl3.'/'.$r_kat["item"][$i]["tema_kat_id"].'" class="btn btn-xs btn-danger" data-confirm="Apakah data kategori ini akan di hapus?"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div></td>
							</tr>
						';	
						}
						
					}
					else {
						echo '
						<tr>
						<td colspan="3"><p class="text-center">'.$r_kat["pesan_error"].'</p></td>
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
          <div class="col-md-8">
          <div class="box box-solid box-success">
            <div class="box-header">
              <h3 class="box-title">Variabel <span class="label label-info"><?php echo get_jumlah_variabel_ragam($lvl3); ?></span></h3> <span class="pull-right"><button class="btn btn-xs btn-success" data-widget="collapse"><i class="fa fa-minus"></i></button> <a href="<?php echo $app_url.'/'.$page.'/addvar/'.$lvl3; ?>" class="btn btn-flat btn-xs btn-warning"><i class="fa fa-plus" aria-hidden="true"></i></a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
              <table id="tabelVariabel2" class="table table-striped table-hover">
                <thead>
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama</th>
                  <th>Kategori</th>
                  <th>Ket</th>
                  <th>Pos</th>
                  <th>&nbsp;</th>
                  <th style="width: 100px">Aksi</th>
                </tr>
                </thead>
                <tbody>
        		<?php
                $r_var=list_ragam_variabel($lvl3);
                if ($r_var["error"]==false) {
						$i=1;
						$max_var=$r_var["tema_var_total"];
						for ($i=1;$i<=$max_var;$i++) {
							$modal_metadata='';
						    	$konten_md='';
							if ($r_var["item"][$i]["tema_var_indikator"] != "") { $indikator='<span class="label label-danger">strategis</span>'; } 
						    else { $indikator="";}

						    if ($r_var["item"][$i]["tema_var_metadata"] != "") { 

                  $metadata='<span><button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#'.$r_var["item"][$i]["tema_var_metadata"].'">'.$r_var["item"][$i]["tema_var_metadata"].'</a></span>'; 
						    	
						    	$md_view=get_metadata($r_var["item"][$i]["tema_var_metadata"]);
						    	if ($md_view["error"]==FALSE) {
						    		$konten_md='
						    		<div class="box box-solid box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Konsep dan Definisi</h3>
          </div>
          <div class="box-body">
            '.$md_view["items"]["md_kondef"].'
          </div>
          </div>
						    				<div class="box box-solid box-danger">
          <div class="box-header with-border">
            <h3 class="box-title">Kegunaan</h3>
          </div>
          <div class="box-body">
            '.$md_view["items"]["md_kegunaan"].'
          </div>
          </div>	    		
						    	<div class="box box-solid box-success">
          <div class="box-header with-border">
            <h3 class="box-title">Interprestasi</h3>
          </div>
          <div class="box-body">
            '.$md_view["items"]["md_interpretasi"].'
          </div>
          </div>';
						    	}
						    	else {
						    		$konten_md=$md_view["pesan_error"];
						    	}
						    	$modal_metadata='<div class="modal fade" tabindex="-1" role="dialog" id="'.$r_var["item"][$i]["tema_var_metadata"].'">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title class="text-green">Metadata '.$md_view["items"]["md_nama"].'</h4>
              </div>
              <div class="modal-body">
                '.$konten_md.'
              </div>
              <div class="modal-footer">
              <a href="'.$app_url.'/metadata/editmd/'.$r_var["item"][$i]["tema_var_metadata"].'" class="btn btn-success pull-left">Edit</a>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->';
							}
						    else { $metadata=""; }
							echo '
							<tr>
								<td>'.$i.'</td>
								<td>'.$r_var["item"][$i]["tema_var_nama"].' <span class="label label-danger pull-right" title="'.$r_var["item"][$i]["jumlah_value"].' Variabel">'.$r_var["item"][$i]["jumlah_value"].'</span></td>
								<td>'.$r_var["item"][$i]["tema_var_kat_nama"].'</td>
								<td>'.$r_var["item"][$i]["tema_var_ket"].'  ('.$r_var["item"][$i]["tema_var_satuan"].')</td>
								<td>'.$r_var["item"][$i]["tema_var_posisi"].'</td>
								<td>'.$indikator.' '.$metadata.'</td>
								<td><!---<div class="text-center"><a href="#" class="btn btn-xs btn-warning" data-lihat="'.$lvl3.'/'.$r_var["item"][$i]["tema_var_id"].'"><i class="fa fa-search" aria-hidden="true"></i></a>---> 
								<a href="'.$app_url.'/'.$page.'/view/'.$lvl3.'/'.$r_var["item"][$i]["tema_var_id"].'" class="btn btn-xs btn-warning"><i class="fa fa-search" aria-hidden="true"></i></a> 
								<a href="'.$app_url.'/'.$page.'/editvar/'.$lvl3.'/'.$r_var["item"][$i]["tema_var_id"].'" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
								<a href="'.$app_url.'/'.$page.'/hapusvar/'.$lvl3.'/'.$r_var["item"][$i]["tema_var_id"].'" class="btn btn-xs btn-danger" data-confirm="Apakah data variabel ini akan di hapus?"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
								</td>
							</tr>
						';
						echo $modal_metadata;
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
                </tbody>
                <tfoot>
        		<tr>
                  <th style="width: 10px">#</th>
                  <th>Nama</th>
                  <th>Kategori</th>
                  <th>Ket</th>
                  <th>Pos</th>
                  <th>&nbsp;</th>
                  <th style="width: 100px">Aksi</th>
                </tr>
                </tfoot>
              </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
          <!--box untuk view-->
           <?php if ($lvl4 != "") { 
          	$var_id=$lvl4;
			if (cek_varID($var_id)==FALSE) {
			     $var_nama="Variabel ID ini tidak ada";
			 }
			else {
			  $var_edit=get_ragam_variabel($var_id);
			  $var_nama=$var_edit["var_nama"];
			  $var_satuan=$var_edit["var_satuan"];
			  $var_ket=$var_edit["var_ket"];
			  $var_kat_id=$var_edit["var_kat_id"];
			  $var_posisi=$var_edit["var_posisi"];
			}
          	?>
          <div class="box box-solid box-warning">
            <div class="box-header">
              <h3 class="box-title">Value</h3> <span class="pull-right"><a href="<?php echo $app_url.'/'.$page.'/imporvalue/'.$lvl3.'/'.$lvl4; ?>" class="btn btn-flat btn-xs btn-success">Impor Excel</a> <a href="<?php echo $app_url.'/'.$page.'/addvalue/'.$lvl3.'/'.$lvl4; ?>" class="btn btn-flat btn-xs btn-success"><i class="fa fa-plus" aria-hidden="true"></i></a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            <div class="table-responsive">
              <table id="tabelValue" class="table table-bordered table-striped table-hover">
                
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Variabel</th>
                  <th>Waktu</th>
                  <th>Nilai</th>
                  <th>Posisi</th>
                   <th>Turunan Variabel</th>
                  <th style="width: 100px">Aksi</th>
                </tr>
                <?php
                $r_var_value=list_variabel_value($lvl4);
                if ($r_var_value["error"]==false) {
						$i=1;
						$max_var_value=$r_var_value["var_value_total"];
						for ($i=1;$i<=$max_var_value;$i++) {
							if (!is_null($r_var_value["item"][$i]["var_value_wilayah"])) {
								$wilayah='<span class="label label-danger">ada turunan</span>';
							}
							else { $wilayah=''; }
							echo '
							<tr>
								<td>'.$i.'</td>
								<td>'.$r_var_value["item"][$i]["var_value_nama"].'</td>
								<td>'.$r_var_value["item"][$i]["var_value_waktu"].'</td>
								<td>'.$r_var_value["item"][$i]["var_value_nilai"].'</td>
								<td>'.$r_var_value["item"][$i]["var_value_posisi"].'</td>
								<td>'.$wilayah.'</td>
								<td><div class="text-center">
								<a href="'.$app_url.'/diff/add/'.$lvl3.'/'.$lvl4.'/'.urlencode($r_var_value["item"][$i]["var_value_waktu"]).'" class="btn btn-xs btn-primary"><i class="fa fa-plus" aria-hidden="true"></i></a>
								<a href="'.$app_url.'/'.$page.'/editvalue/'.$lvl3.'/'.$lvl4.'/'.urlencode($r_var_value["item"][$i]["var_value_waktu"]).'" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
								<a href="'.$app_url.'/'.$page.'/hapusvalue/'.$lvl3.'/'.$lvl4.'/'.urlencode($r_var_value["item"][$i]["var_value_waktu"]).'" class="btn btn-xs btn-danger" data-confirm="Apakah data value ini akan di hapus?"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
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
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box value view-->
          <?php } ?>
        </div>
        <!-- /.col -->
</div>