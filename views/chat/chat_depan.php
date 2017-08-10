<div class="row">
<div class="col-md-12">
	 <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Pesan</a></li>
              <li><a href="#tab_2" data-toggle="tab">Users</a></li>
              <li><a href="#tab_3" data-toggle="tab">Kirim Pesan</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
               	<?php include 'chat_pesan.php'; ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <?php include 'chat_user_list.php'; ?>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <?php include 'chat_formkirim.php'; ?>
              </div>
              <!-- /.tab-pane -->
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
</div>
</div>