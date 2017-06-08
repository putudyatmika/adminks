<div class="row">
<div class="col-md-12">
          <div class="box box-solid box-success">
            <div class="box-header">
              <h3 class="box-title">Metadata</h3> <span class="pull-right"><button class="btn btn-xs btn-success" data-widget="collapse"><i class="fa fa-minus"></i></button> <a href="<?php echo $app_url.'/'.$page.'/addmd/'; ?>" class="btn btn-flat btn-xs btn-warning"><i class="fa fa-plus" aria-hidden="true"></i></a></span>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding table-responsive">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Judul</th>
                  <th>Kondef</th>
                  <th>Kegunaan</th>
                  <th>Interpretasi</th>
                  <th style="width: 100px">Aksi</th>
                </tr>
                <?php
                $r_md=list_metadata_all();
                if ($r_md["error"]==false) {
						$i=1;
						$max_var=$r_md["md_total"];
						for ($i=1;$i<=$max_var;$i++) {
							echo '
							<tr>
								<td>'.$i.'</td>
								<td>'.$r_md["item"][$i]["md_nama"].'</td>
								<td>'.truncate($r_md["item"][$i]["md_kondef"],50).'</td>
								<td>'.truncate($r_md["item"][$i]["md_kegunaan"],50).'</td>
								<td>'.truncate($r_md["item"][$i]["md_interpretasi"],50).'</td>
								<td><div class="text-center"><a href="'.$app_url.'/'.$page.'/view/'.$r_md["item"][$i]["md_id"].'" class="btn btn-xs btn-warning"><i class="fa fa-search" aria-hidden="true"></i></a> 
								<a href="'.$app_url.'/'.$page.'/editmd/'.$r_md["item"][$i]["md_id"].'" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
								<a href="'.$app_url.'/'.$page.'/hapusmd/'.$r_md["item"][$i]["md_id"].'" class="btn btn-xs btn-danger" data-confirm="Apakah data metadata ini akan di hapus?"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
								</td>
							</tr>
						';	
						}
						
					}
					else {
						echo '
						<tr>
						<td colspan="4"><p class="text-center">'.$r_md["pesan_error"].'</p></td>
						</tr>
						';
					}
                ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
</div>
</div>
<?php
if ($act=="view") {
	require "metadata_view.php";
}
?>