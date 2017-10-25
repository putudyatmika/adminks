<?php
//$dif_var_id=$lvl3;
$r_diff=get_variabel_diff_full($lvl3);
$var_id=$r_diff["item"]["diff_var_id"];
$diff_id=$r_diff["item"]["diff_id"];
$value_id=$r_diff["item"]["diff_var_waktu"];
$kat_id=get_kategori_var($var_id);
$tema_id=get_ragam_kat($kat_id);
?>
<div class="row">
  <div class="col-md-6">
            <!-- Horizontal Form -->
  <div class="box box-info">
  <div class="box-header with-border">
  <h3 class="box-title">Tambah Value Diff</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" action="<?php echo $app_url.'/'.$page.'/savevalue/'; ?>" method="post" role="form">
  <div class="box-body">
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Tema</label>
  <div class="col-sm-6">
  <input type="text" class="form-control" id="inputNama" placeholder="Nama Kategori" value="<?php echo get_nama_ragamtema($tema_id);?>" disabled>
  </div>
  </div>
  <div class="form-group">
  <label for="var_kat_id" class="col-sm-2 control-label">Kategori</label>
  <div class="col-sm-6">
  	<input type="text" class="form-control" id="inputNama" value="<?php echo get_nama_kategori($kat_id);?>" disabled>
  </div>
  </div>
  <div class="form-group">
  <label for="var_kat_id" class="col-sm-2 control-label">Variabel</label>
  <div class="col-sm-6">
    <input type="text" class="form-control" id="inputNama" value="<?php echo get_nama_variabel($var_id);?>" disabled>
  </div>
  </div>
  <div class="form-group">
  <label for="var_kat_id" class="col-sm-2 control-label">Waktu</label>
  <div class="col-sm-6">
    <input type="text" class="form-control" id="inputNama" value="<?php echo $value_id;?>" disabled>
  </div>
  </div>
   <div class="form-group">
  <label for="var_kat_id" class="col-sm-2 control-label">Variabel Diff</label>
  <div class="col-sm-6">
    <input type="text" class="form-control" id="inputNama" value="<?php echo $r_diff["item"]["diff_nama"];?>" disabled>
  </div>
  </div>
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Waktu</label>
  <div class="col-sm-6">
  <input type="text" name="value_waktu" class="form-control" id="inputNama" placeholder="Waktu" required="">
  </div>
  </div>
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Nilai</label>
  <div class="col-sm-6">
  <input type="text" name="value_nilai" class="form-control" id="inputNama" placeholder="Nilai" required="">
  </div>
  </div>
    <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Posisi</label>
    <div class="col-sm-4">
    <input type="number" name="value_posisi" class="form-control" id="inputPosisi" placeholder="Posisi" required="">
    </div>
    </div>
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
  <button type="reset" class="btn btn-default">Reset</button>
  <button type="submit" name="submit" value="simpanvalue" class="btn btn-info pull-right">Simpan</button>
  </div>
  <!-- /.box-footer -->
  <input type="hidden" name="diff_id" value="<?php echo $diff_id; ?>" />
  </form>
  </div>
  <!-- /.box -->
  </div>
  <!---view value dari variabel diff yg mau di add-->
  <div class="col-md-6">
          <div class="box box-solid box-success">
            <div class="box-header">
              <h3 class="box-title">Value Diff : <?php echo $r_diff["item"]["diff_nama"] .' '.$value_id; ?></h3> <span class="pull-right"><button class="btn btn-xs btn-success" data-widget="collapse"><i class="fa fa-minus"></i></button> </span>
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
                $r_val=list_value_diff($diff_id);
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
</div>