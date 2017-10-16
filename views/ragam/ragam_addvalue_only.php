<div class="row">
  <div class="col-md-6">
            <!-- Horizontal Form -->
  <div class="box box-info">
  <div class="box-header with-border">
  <h3 class="box-title">Tambah Value</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" action="<?php echo $app_url.'/'.$page.'/savevalue/'; ?>" method="post" role="form">
  <div class="box-body">
  <div class="form-group">
  <label for="inputEmail3" class="col-sm-2 control-label">Tema</label>
  <div class="col-sm-6">
  <input type="text" class="form-control" id="inputNama" placeholder="Nama Kategori" value="<?php echo get_nama_ragamtema($lvl3);?>" disabled>
  </div>
  </div>
  <div class="form-group">
  <label for="var_kat_id" class="col-sm-2 control-label">Kategori</label>
  <div class="col-sm-10">
  	<input type="text" class="form-control" id="inputNama" value="<?php echo get_nama_kategori($lvl4);?>" disabled>
  </div>
  </div>
  <div class="form-group">
  <label for="var_kat_id" class="col-sm-2 control-label">Variabel</label>
  <div class="col-sm-10">
    <input type="text" class="form-control" id="inputNama" value="<?php echo get_nama_variabel($lvl5);?>" disabled>
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
  <input type="hidden" name="tema_id" value="<?php echo $lvl3; ?>" />
  <input type="hidden" name="kar_id" value="<?php echo $lvl4; ?>" />
  <input type="hidden" name="var_id" value="<?php echo $lvl5; ?>" />
  </form>
  </div>
  <!-- /.box -->
  </div>
  <?php if ($lvl5 != "") { 
            $var_id=$lvl5;
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
             <div class="col-md-6">
          <div class="box box-solid box-warning">
            <div class="box-header">
              <h3 class="box-title">Value dari variabel <?php echo get_nama_variabel($lvl5);?></h3> 
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Variabel</th>
                  <th>Ket</th>
                  <th>Waktu</th>
                  <th>Nilai</th>
                  <th>Posisi</th>
                </tr>
                <?php
                $r_var_value=list_variabel_value($lvl5);
                if ($r_var_value["error"]==false) {
            $i=1;
            $max_var_value=$r_var_value["var_value_total"];
            for ($i=1;$i<=$max_var_value;$i++) {
              echo '
              <tr>
                <td>'.$i.'</td>
                <td>'.$r_var_value["item"][$i]["var_value_nama"].'</td>
                <td>'.$var_ket.' ('.$var_satuan.')</td>
                <td>'.$r_var_value["item"][$i]["var_value_waktu"].'</td>
                <td>'.$r_var_value["item"][$i]["var_value_nilai"].'</td>
                <td>'.$r_var_value["item"][$i]["var_value_posisi"].'</td>
                
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
          </div>
          <!-- /.box value view-->
          <?php } ?>
</div>