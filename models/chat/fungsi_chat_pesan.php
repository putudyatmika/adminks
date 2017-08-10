<?php
function get_chat_all() {
	$db_chat = new db();
	$conn_chat = $db_chat -> connect();
	$sql_chat = $conn_chat -> query("select pks_message.id, pks_message.user_id, pks_user.nama, pks_user.email, pks_message.waktu, pks_message.isi, count(*) as jumlah from pks_user,pks_message where pks_message.user_id=pks_user.id and pks_message.receiver=0 group by pks_message.user_id order by pks_message.waktu desc");
	$cek_chat = $sql_chat->num_rows;
	$list_chat_pesan=array("error"=>false);
	if ($cek_chat>0) {
		$list_chat_pesan["error"]=false;
		$list_chat_pesan["chat_pesan_total"]=$cek_chat;
		$i=1;
		while ($r=$sql_chat->fetch_object()) {
			$list_chat_pesan["item"][$i]=array(
				"chat_pesan_id"=>$r->id,
				"chat_pesan_userid"=>$r->user_id,
				"chat_pesan_nama"=>$r->nama,
				"chat_pesan_email"=>$r->email,
				"chat_pesan_waktu"=>$r->waktu,
				"chat_pesan_isi"=>$r->isi,
				"chat_pesan_jumlah"=>$r->jumlah
			);
			$i++;
		}
	}
	else {
		$list_chat_pesan["error"]=true;
		$list_chat_pesan["pesan_error"]="data user chat kosong";
	}
	return $list_chat_pesan;
	$conn_chat->close();
}
function get_chat_pesan($user_id) {
	$db_chat = new db();
	$conn_chat = $db_chat -> connect();
	$sql_chat = $conn_chat -> query("select pks_message.id, pks_message.user_id, pks_user.nama, pks_user.email, pks_message.waktu, pks_message.isi from pks_user,pks_message where pks_message.user_id=pks_user.id and (pks_message.user_id='$user_id' or pks_message.receiver='$user_id') order by pks_message.waktu asc");
	$cek_chat = $sql_chat->num_rows;
	$list_chat_pesan=array("error"=>false);
	if ($cek_chat>0) {
		$list_chat_pesan["error"]=false;
		$list_chat_pesan["chat_pesan_total"]=$cek_chat;
		$i=1;
		while ($r=$sql_chat->fetch_object()) {
			$list_chat_pesan["item"][$i]=array(
				"chat_pesan_id"=>$r->id,
				"chat_pesan_userid"=>$r->user_id,
				"chat_pesan_nama"=>$r->nama,
				"chat_pesan_email"=>$r->email,
				"chat_pesan_waktu"=>$r->waktu,
				"chat_pesan_isi"=>$r->isi
			);
			$i++;
		}
	}
	else {
		$list_chat_pesan["error"]=true;
		$list_chat_pesan["pesan_error"]="data chat kosong";
	}
	return $list_chat_pesan;
	$conn_chat->close();
}
function kirim_chat($chat_penerima,$chat_isi,$kirimall=false) {
	$db_chat = new db();
	$conn_chat = $db_chat -> connect();
	if ($kirimall) {
		$sql_user= $conn_chat->query("select * from pks_user where tipe=1 order by id asc") or die(mysqli_error($conn_chat));;
		$cek_user = $sql_user->num_rows;
		if ($cek_user>0) {
			$chat_penerima='';
			while ($r=$sql_user->fetch_object()) {
				$chat_penerima=$r->id;
				$chat_nama=$r->nama;
				$mass_chat = $conn_chat-> query("insert into pks_message (user_id,isi,receiver) values(1,'$chat_isi','$chat_penerima')") or die(mysqli_error($conn_chat));
			}
			$sql_kirimchat=true;
		}
		else {
			$sql_kirimchat=false;
		}
	}
	else {
		$sql_kirimchat = $conn_chat-> query("insert into pks_message (user_id,isi,receiver) values(1,'$chat_isi','$chat_penerima')") or die(mysqli_error($conn_chat));
	}


	if ($sql_kirimchat) {
		$chat_terkirim=true;
	}
	else {
		$chat_terkirim=false;
	}
	return $chat_terkirim;
}

?>


