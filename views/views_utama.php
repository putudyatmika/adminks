<!-- Content Header (Page header) -->
    <section class="content-header">
       <h1>
        <?php 
        if (!isset($page) or empty($page)) { $headerText="Beranda"; }
        else { 
        	if (isset($NamaHeader[$page])==TRUE) {
        		$headerText=mb_strtoupper($NamaHeader[$page]);
            }
        	else {
        		$headerText="Admin Klinik Statistik";
        	}
        }
        echo $headerText; ?>
        <small><?php echo get_nama_ragamtema($lvl3); ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
 
      <!-- /.row -->
      <!-- Your Page Content Here -->
<?php
 	if ($page=="ragam") {
 		include 'views/ragam/ragam.php';
 	}
 	elseif ($page=="regional") {
    include 'views/regional/regional.php';
 	}
  elseif ($page=="indikator") {
    include 'views/indikator/indikator.php';
  }
  elseif ($page=="metadata") {
    include 'views/metadata/metadata.php';
  }
 	else {
 		
 	}
?>
    </section>
    <!-- /.content -->
