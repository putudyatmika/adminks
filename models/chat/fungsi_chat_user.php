<?php
function get_chat_user() {
	$db_chat = new db();
	$conn_chat = $db_chat -> connect();
	$sql_chat = $conn_chat -> query("select * from pks_user where tipe=1 order by id asc");
	$cek_chat = $sql_chat->num_rows;
	$list_chat_user=array("error"=>false);
	if ($cek_chat>0) {
		$list_chat_user["error"]=false;
		$list_chat_user["chat_user_total"]=$cek_chat;
		$i=1;
		while ($r=$sql_chat->fetch_object()) {
			$list_chat_user["item"][$i]=array(
				"chat_user_id"=>$r->id,
				"chat_user_nama"=>$r->nama,
				"chat_user_email"=>$r->email
			);
			$i++;
		}
	}
	else {
		$list_chat_user["error"]=true;
		$list_chat_user["pesan_error"]="data user chat kosong";
	}
	return $list_chat_user;
	$conn_chat->close();
}
function get_nama_user($user_id) {
	$db_chat = new db();
	$conn_chat = $db_chat -> connect();
	$sql_chat = $conn_chat -> query("select * from pks_user where id='$user_id'");
	$cek_chat = $sql_chat->num_rows;
	if ($cek_chat>0) {
		$r=$sql_chat->fetch_object();
		$nama_user=$r->nama;
	}
	else {
		$nama_user="";
	}
	return $nama_user;
}
function cek_user($user_id) {
	$db_chat = new db();
	$conn_chat = $db_chat -> connect();
	$sql_chat = $conn_chat -> query("select * from pks_user where id='$user_id'");
	$cek_chat = $sql_chat->num_rows;
	if ($cek_chat>0) {
		$cek_user=TRUE;
	}
	else {
		$cek_user=FALSE;
	}
	return $cek_user;
}
function get_jumlah_chat_user($user_id) {
	$db_chat = new db();
	$conn_chat = $db_chat -> connect();
	$sql_chat = $conn_chat -> query("select * from pks_message where user_id='$user_id'");
	$cek_chat = $sql_chat->num_rows;
	if ($cek_chat>0) {
		$jumlah_chat=$cek_chat;
	}
	else {
		$jumlah_chat=0;
	}
	return $jumlah_chat;
	$conn_chat->close();
}

?>