<?php
if ($_POST['submit']) {
	$chat_penerima=$_POST['chat_penerima'];
	$chat_isi=$_POST['chat_isi'];

	if ($chat_penerima=='' or $chat_isi=='') {
		echo 'isian masih ada yang kosong';
	}
	else {
		if ($chat_penerima=='semua') {
			//kirim pesan ke semua user teregister
			if (kirim_chat($chat_penerima,$chat_isi,true)==true) {
					echo 'Pesan sudah terkirim';
				}
				else {
					echo 'Pesan gagal terkirim';
				}
			
		}
		else {
			//check user dulu
			if (cek_user($chat_penerima)==true) {
				if (kirim_chat($chat_penerima,$chat_isi,false)==true) {
					echo 'Pesan sudah terkirim';
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
}
?>