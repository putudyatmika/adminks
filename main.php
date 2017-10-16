<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Klinik Statistik</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo $app_url; ?>/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $app_url; ?>/plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $app_url; ?>/plugins/ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo $app_url; ?>/plugins/select2/select2.min.css">
  <link rel="stylesheet" href="<?php echo $app_url; ?>/plugins/iCheck/all.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $app_url; ?>/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="<?php echo $app_url; ?>/dist/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="<?php echo $app_url; ?>/css/adminks.css">
  <link href="<?php echo $app_url; ?>/plugins/validator/css/bootstrapValidator.min.css" rel="stylesheet">
  <link href="<?php echo $app_url; ?>/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="<?php echo $app_url; ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>KS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b> Klinik Statistik</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo $app_url; ?>/img/logo.jpg" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">Admin</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo $app_url; ?>/img/logo.jpg" class="img-circle" alt="User Image">

                <p>
                  BPS Provinsi NTB
                  <small>Admin Sistem</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">MENU ADMIN</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Ragam Statistik</span>
           <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          <?php
          $list_tema=ragam_tema_list();
          if ($list_tema['error']==false) {
              $i=1;
              $max_tema=$list_tema['tema_total'];
              for ($i=1;$i<=$max_tema;$i++) {
                   echo '
                    <li><a href="'.$app_url.'/ragam/view/'.$list_tema["item"][$i]["tema_id"].'">'.$list_tema["item"][$i]["tema_nama"].'</a></li>
              ';
              }
             
          }
          else {

          }
          ?>
          </ul>
        </li>
        <li><a href="<?php echo $app_url.'/regional/'; ?>"><i class="fa fa-link"></i> <span>Perbandingan Regional</span></a></li>
         <li><a href="<?php echo $app_url.'/indikator/'; ?>"><i class="fa fa-link"></i> <span>Indikator Strategis</span></a></li>
          <li><a href="<?php echo $app_url.'/metadata/'; ?>"><i class="fa fa-link"></i> <span>Metadata</span></a></li>
           <li><a href="<?php echo $app_url.'/analisis/'; ?>"><i class="fa fa-link"></i> <span>Analisis Lintas Sektoral</span></a></li>
           <li><a href="<?php echo $app_url.'/chat/'; ?>"><i class="fa fa-link"></i> <span>Pojok Konsultasi Statistik</span></a></li>
            <li><a href="<?php echo $app_url.'/diff/'; ?>"><i class="fa fa-link"></i> <span>Turunan Ragam</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?php require 'views/views_utama.php'; ?>
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      created by : <a href="http://dyatmika.com" target="_blank">I Putu Dyatmika</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2017 <a href="http://ntb.bps.go.id" target="_blank">Bidang IPDS BPS Provinsi NTB</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo $app_url; ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo $app_url; ?>/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $app_url; ?>/plugins/select2/select2.full.min.js"></script>
<script src="<?php echo $app_url; ?>/plugins/iCheck/icheck.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo $app_url; ?>/dist/js/app.min.js"></script>
<script src="<?php echo $app_url; ?>/plugins/ckeditor/ckeditor.js"></script>
<script src="<?php echo $app_url; ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo $app_url; ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?php echo $app_url; ?>/js/ajax.js"></script>
<script type="text/javascript">
  $(function () {
    $("#tabelVariabel").DataTable();
    $('#tabelVariabel2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    //Initialize Select2 Elements
    $("#select2 select").select2();
  });
  $(document).ready(function() {
  $('a[data-confirm]').click(function(ev) {
    var href = $(this).attr('href');
    if (!$('#dataConfirmModal').length) {
      $('body').append('<div id="dataConfirmModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="dataConfirmModal" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header modal-danger"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button><h3 id="dataConfirmLabel">Konfirmasi</h3></div><div class="modal-body"></div><div class="modal-footer"><button class="btn pull-left btn-success" data-dismiss="modal" aria-hidden="true">close</button><a class="btn btn-primary" id="dataConfirmOK"><span class="glyphicon glyphicon-ok"></span> ok</a></div></div></div></div>');
    }
    $('#dataConfirmModal').find('.modal-body').text($(this).attr('data-confirm'));
    $('#dataConfirmOK').attr('href', href);
    $('#dataConfirmModal').modal({show:true});
    return false;
  });

   //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });
    CKEDITOR.replace('editorCK');
    CKEDITOR.replace('editorCK2');
    CKEDITOR.replace('editorCK3');
  });
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>