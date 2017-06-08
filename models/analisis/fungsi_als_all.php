<?php
function als_list_all() {
	$db_als = new db();
	$conn_als = $db_als -> connect();
	$sql_als = $conn_als -> query("select * from analisis_artikel order by id desc");
	$cek_als = $sql_als->num_rows;
	$list_als=array("error"=>false);
	if ($cek_als>0) {
		$list_als["error"]=false;
		$list_als["als_total"]=$cek_als;
		$i=1;
		while ($r=$sql_als->fetch_object()) {
			$list_als["item"][$i]=array(
				"als_id"=>$r->id,
				"als_waktu"=>$r->waktu,
				"als_judul"=>$r->judul,
				"als_isi"=>$r->isi
			);
			$i++;
		}
	}
	else {
		$list_als["error"]=true;
		$list_als["pesan_error"]="data analisis lintas sektoral kosong";
	}
	return $list_als;
	$conn_als->close();
}
function get_als($als_id) {
	$db_als = new db();
	$conn_als = $db_als -> connect();
	$sql_als = $conn_als -> query("select * from analisis_artikel where id='$als_id' limit 1");
	$cek_als = $sql_als->num_rows;
	$list_als=array("error"=>false);
	if ($cek_als>0) {
		$list_als["error"]=false;
		$r=$sql_als->fetch_object();
		$list_als["item"]=array(
				"als_id"=>$r->id,
				"als_waktu"=>$r->waktu,
				"als_judul"=>$r->judul,
				"als_isi"=>$r->isi);
	}
	else {
		$list_als["error"]=true;
		$list_als["pesan_error"]="data analisis lintas sektoral kosong";
	}
	return $list_als;
	$conn_als->close();
}
function save_als($als_judul,$als_isi) {
	$db_als = new db();
	$conn_als = $db_als -> connect();
	//$sql_lock_tabel= $conn_als->query("Lock tables analisis_artikel write;");
	$sql_max_id = $conn_als -> query("select max(id) as maxid from analisis_artikel");
	$m=$sql_max_id->fetch_object();
	$max_id=($m->maxid)+1;
	$waktu_lokal=date("Y-m-d H:i:s");
	$sql_als = $conn_als -> query("insert into analisis_artikel(id,waktu,judul,isi) values('$max_id','$waktu_lokal','$als_judul','$als_isi')") or die(mysqli_error($conn_als));
	if ($sql_als) {
		$save_status_als=TRUE;
	}
	else {
		$save_status_als=FALSE;
	}
	return $save_status_als;
	//$sql_unlock_tabel= $conn_als->query("unlock tables;");
	$conn_als->close();
}
function update_als($als_id,$als_judul,$als_isi) {
	$db_als = new db();
	$conn_als = $db_als -> connect();
	$sql_als_update = $conn_als -> query("update analisis_artikel set judul='$als_judul', isi='$als_isi' where id='$als_id' ") or die(mysqli_error($conn_als));
	if ($sql_als_update) {
		$update_status_als=TRUE;
	}
	else {
		$update_status_als=FALSE;
	}
	return $update_status_als;
	$conn_als->close();
}
function hapus_als($als_id) {
	$db_als = new db();
	$conn_als = $db_als -> connect();
	$sql_als = $conn_als -> query("delete from analisis_artikel where id='$als_id' ") or die(mysqli_error($conn_als));
	if ($sql_als) {
		$hapus_status_als=TRUE;
	}
	else {
		$hapus_status_als=FALSE;
	}
	return $hapus_status_als;
	$conn_als->close();
}
function jumlah_als() {
	$db_als = new db();
	$conn_als = $db_als -> connect();
	$sql_als = $conn_als -> query("select * from analisis_artikel") or die(mysqli_error($conn_als));
	$jmlh_als=$sql_als->num_rows;
	return $jmlh_als;
	$conn_als->close();
}
?>