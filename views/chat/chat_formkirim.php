<div class="row">
<div class="col-md-8">
<div class="box box-info">
<!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal" action="<?php echo $app_url.'/'.$page.'/kirim/'; ?>" method="post" role="form">
<div class="box-body">
<div class="form-group">
<label for="chat_penerima" class="col-sm-2 control-label">Penerima</label>
<div class="col-sm-10" id="select2">
	<select name="chat_penerima" id="chat_penerima" class="form-control" style="width: 100%;">
     <option value="">Pilih Penerima</option>
     <option value="semua">Semua</option>
     <?php
     	$r_chat=get_chat_user();
     	if ($r_chat["error"]==FALSE) {
     		$i=1;
			$max_user=$r_chat["chat_user_total"];
			for ($i=1;$i<=$max_user;$i++) {
				echo '
				<option value="'.$r_chat["item"][$i]["chat_user_id"].'">'.$r_chat["item"][$i]["chat_user_nama"].' ('.$r_chat["item"][$i]["chat_user_email"].')</option>
			';	
			}
     	}
     	else {
     		echo '
     		<option value="">'.$r_chat["pesan_error"].'</option>
     		';
     	}
     ?>
    </select>
</div>
</div>
<div class="form-group">
<label for="inputEmail3" class="col-sm-2 control-label">Isi</label>
<div class="col-sm-10">
    <textarea name="chat_isi" rows="10" cols="80"></textarea>
</div>
</div>
  
</div>
<!-- /.box-body -->
<div class="box-footer">
<button type="reset" class="btn btn-default">Reset</button>
<button type="submit" name="submit" value="kirim" class="btn btn-info pull-right">Kirim</button>
</div>
<!-- /.box-footer -->
</form>
</div>
</div>
</div>