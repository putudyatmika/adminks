<div class="row">
<div class="col-md-8">
	<div class="box box-primary">
        <?php
        $als_view=get_als($lvl3);
        if ($als_view["error"]==TRUE) { ?>
        	 <div class="box-header with-border">
    	     <h3 class="box-title"><?php echo $als_view["pesan_error"];?></h3>
        	</div>
        <?php }
        
        else {
        $tgl_pdk=tanggal_panjang($als_view["item"]["als_waktu"], true, true);
        ?>
        <div class="box-header with-border">
    	    <h3 class="box-title"><?php echo $als_view["item"]["als_judul"];?></h3> <p class="description"><?php echo $tgl_pdk;?></p>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <?php echo $als_view["item"]["als_isi"]; ?>
         </div>
         <div class="box-footer">
              <span class="pull-right">
              <a href="<?php echo $app_url.'/'.$page.'/editals/'.$lvl3;?>" class="btn btn-warning">Edit</a>
              <a href="<?php echo $app_url.'/'.$page.'/editals/'.$lvl3;?>" class="btn btn-danger" data-confirm="Apakah data metadata ini akan di hapus?">Hapus</a>
              </span>
            </div>
         <?php
         	}
         ?>   
            <!-- /.box-body -->
     </div>
          <!-- /.box -->
</div>
</div>