<?php
if (isset($_POST['submit'])) {
  $chat_penerima=$_POST['chat_penerima'];
  $chat_isi=$_POST['chat_isi'];
    if ($chat_penerima=='' or $chat_isi=='') {
    
  }
  else {
      //check user dulu
      if (cek_user($chat_penerima)==true) {
        if (kirim_chat($chat_penerima,$chat_isi,false)==true) {
           echo '<script type="text/javascript">location.href = \''.$app_url.'/'.$page.'/view/'.$lvl3.'\';</script>';
        }
      }
      

  }
}
?>
<div class="row">
<div class="col-md-6">
          <!-- DIRECT CHAT SUCCESS -->
          <div class="box box-success direct-chat direct-chat-success">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo get_nama_user($lvl3); ?></h3>

              <div class="box-tools pull-right">
                
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
             <div class="direct-chat-messages">
             <?php
              $r_chat=get_chat_pesan($lvl3);
          if ($r_chat["error"]==false) {
            $i=1;
            $max_pesan=$r_chat["chat_pesan_total"];
            for ($i=1;$i<=$max_pesan;$i++) {
              if ($r_chat["item"][$i]["chat_pesan_userid"]==1) {  
                //admin yg jawab ?>
               
                <!-- Message. Default to the left -->
                <div class="direct-chat-msg">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-left">Admin</span>
                    <span class="direct-chat-timestamp pull-right"><?php echo tanggal_pendek($r_chat["item"][$i]["chat_pesan_waktu"],true,true); ?></span>
                  </div>
                  <!-- /.direct-chat-info -->
                <div class="direct-chat-text">
                    <?php echo $r_chat["item"][$i]["chat_pesan_isi"]; ?>
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
                <?php
            }
              else {
                //user yg chat
                ?>
                  <div class="direct-chat-msg right">
                  <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-right"><?php echo $r_chat["item"][$i]["chat_pesan_nama"]; ?></span>
                    <span class="direct-chat-timestamp pull-left"><?php echo tanggal_pendek($r_chat["item"][$i]["chat_pesan_waktu"],true,true); ?></span>
                  </div>
                  <!-- /.direct-chat-info -->
                 
                  <div class="direct-chat-text">
                    <?php echo $r_chat["item"][$i]["chat_pesan_isi"]; ?>
                  </div>
                  <!-- /.direct-chat-text -->
                </div>
              <?php
            }
              
            }
            
          }
          else {
            echo $r_chat["pesan_error"];
          }
             ?>
                           <!-- Contacts are loaded here -->
                           </div>
              
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <form action="<?php echo $app_url.'/'.$page.'/view/'.$lvl3; ?>" method="post">
                <div class="input-group">
                  <input type="text" name="chat_isi" placeholder="Type Message ..." class="form-control">
                      <span class="input-group-btn">
                        <button type="submit" name="submit" value="kirim" class="btn btn-success btn-flat">Send</button>
                      </span>
                </div>
                <input type="hidden" name="chat_penerima" value="<?php echo $lvl3; ?>" />
              </form>
            </div>
            <!-- /.box-footer-->
          </div>
          <!--/.direct-chat -->
        </div>
        <!-- /.col -->
        </div>