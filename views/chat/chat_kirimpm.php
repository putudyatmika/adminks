<?php
session_start();
if ($_POST['submit']) {
	$chat_penerima=$_POST['chat_penerima'];
	$chat_isi=$_POST['chat_isi'];

	if ($chat_penerima=='' or $chat_isi=='') {
		echo 'isian masih ada yang kosong';
	}
	else {
			//check user dulu
			if (cek_user($chat_penerima)==true) {
				if (kirim_chat($chat_penerima,$chat_isi,false)==true) {
					//echo 'Pesan sudah terkirim';
					//header("Location : ".$app_url."/".$page ."/view/".$chat_penerima);
   					//exit;
					//print '<meta http-equiv="refresh" content="; URL="'.$app_url.'/'.$page .'/view/'.$chat_penerima.'">';
					print '<meta http-equiv="refresh" content="0; URL="'.$app_url.'/'.$page .'/view/'.$chat_penerima.'">';
				}
				else {
					echo 'Pesan gagal terkirim';
				}
			}
			else {
				echo 'User penerima tidak tersedia';
			}

		}
}
?>