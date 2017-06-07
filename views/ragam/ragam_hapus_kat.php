<?php
$kat_id=$lvl4;
$tema_id=$lvl3;
$kat_lama=get_nama_kategori($kat_id);
if (cekKatVar($kat_id)==FALSE) {
	//hapus variabel
	if (hapus_kategori($kat_id)==TRUE) {
		echo "Kategori <strong>".$kat_lama."</strong> berhasil dihapus";
	}
	else {
		echo "Kategori <strong>".$kat_lama."</strong> tidak bisa dihapus";
	}
	
}
else { ?>
<div class="row">
<div class="col-md-8">
<div class="box box-solid box-success">
            <div class="box-header">
              <h3 class="box-title">Variabel</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
            <p class="text-center">Kategori <strong><?php echo $kat_lama;?></strong> tidak dapat dihapus karena masih ada variabel dibawah ini</p>
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Nama</th>
                  <th>Kategori</th>
                  <th>Ket</th>
                  <th style="width: 100px">Aksi</th>
                </tr>
                <?php
                $r_var=list_variabel_kategori($lvl4);
                if ($r_var["error"]==false) {
						$i=1;
						$max_var=$r_var["var_kat_total"];
						for ($i=1;$i<=$max_var;$i++) {
							echo '
							<tr>
								<td>'.$i.'</td>
								<td>'.$r_var["item"][$i]["var_nama"].'</td>
								<td>'.$kat_lama.'</td>
								<td>'.$r_var["item"][$i]["var_ket"].'</td>
								<td><div class="text-center"><a href="'.$app_url.'/'.$page.'/view/'.$lvl3.'/'.$r_var["item"][$i]["var_id"].'" class="btn btn-xs btn-warning"><i class="fa fa-search" aria-hidden="true"></i></a> 
								<a href="'.$app_url.'/'.$page.'/editvar/'.$lvl3.'/'.$r_var["item"][$i]["var_id"].'" class="btn btn-xs btn-success"><i class="fa fa-pencil" aria-hidden="true"></i></a> 
								<a href="'.$app_url.'/'.$page.'/hapusvar/'.$lvl3.'/'.$r_var["item"][$i]["var_id"].'" class="btn btn-xs btn-danger" data-confirm="Apakah data variabel ini akan di hapus?"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
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
}
?>