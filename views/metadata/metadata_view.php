<div class="row">
<div class="col-md-12">
           <!-- /.box-header -->
            <?php
                $md_view=get_metadata($lvl3);
                if ($md_view["error"]==FALSE) { ?> 
						<div class="box box-solid box-danger">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $md_view["items"]["md_nama"];?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        Konsep dan Definisi
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="box-body">
                      <?php echo $md_view["items"]["md_kondef"]; ?>
                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                       Kegunaan
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
                     <?php echo $md_view["items"]["md_kegunaan"]; ?>
                    </div>
                  </div>
                </div>
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        Interprestasi
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                     <?php echo $md_view["items"]["md_interpretasi"]; ?>
                    </div>
                  </div>
                </div>
              </div>
             
            </div>
             <div class="box-footer">
              <span class="pull-right">
              <a href="<?php echo $app_url.'/'.$page.'/editmd/'.$lvl3;?>" class="btn btn-warning">Edit</a>
              <a href="<?php echo $app_url.'/'.$page.'/hapusmd/'.$lvl3;?>" class="btn btn-danger" data-confirm="Apakah data metadata ini akan di hapus?">Hapus</a>
              </span>
            </div>
                <?php 
                }
				        else {
      						echo '
      						<p class="text-center">'.$md_view["pesan_error"].'</p>';
      					}
                ?>
              
            <!-- /.box-body -->
             
</div>
</div>