<?php
function save_newkat($temaID,$namakat,$posisi,$kat_id) {
	$db_kat = new db();
	$conn_kat = $db_kat -> connect();
	$sql_ins_kat = $conn_kat-> query("insert into ragam_kategori(id,nama,deskripsi,tema,posisi)
		values('$kat_id','$namakat',NULL,'$temaID','$posisi')") or die(mysqli_error($conn_kat));
	if ($sql_ins_kat) {
		$kat_ins_status=TRUE;
	}
	else {
		$kat_ins_status=FALSE;
	}
	return $kat_ins_status;
}

function cek_katID($kat_id) {
	$db_tema = new db();
	$conn_tema = $db_tema -> connect();
	$sql_tema = $conn_tema -> query("select * from ragam_kategori where id='$kat_id'");
	$cek_tema = $sql_tema->num_rows;
	if ($cek_tema>0) {
		$cekkatID=TRUE;
	}
	else {
		$cekkatID=FALSE;
	}
	return $cekkatID;
}
function get_ragam_kategori($kat_id) { //full kategori konten
	$db_kat = new db();
	$conn_kat = $db_kat -> connect();
	$sql_kat = $conn_kat->query("select * from ragam_kategori where id='$kat_id'");
	$r=$sql_kat->fetch_object();
	$kat_isi=array("kat_nama"=>$r->nama,"kat_posisi"=>$r->posisi);
	return $kat_isi;
}
function get_nama_kategori($kat_id) { //hanya nama
	$db_kat = new db();
	$conn_kat = $db_kat -> connect();
	$sql_kat = $conn_kat->query("select * from ragam_kategori where id='$kat_id'");
	$cek_kat = $sql_kat->num_rows;
	if ($cek_kat>0) {
		$r=$sql_kat->fetch_object();
		$nama_kat=$r->nama;
	}
	else {
		$nama_kat=null;
	}
	return $nama_kat;
}
function update_kategori($namakat,$posisi,$kat_id) {
	$db_kat = new db();
	$conn_kat = $db_kat -> connect();
	$sql_update_kat = $conn_kat-> query("update ragam_kategori set nama='$namakat', posisi='$posisi' where id='$kat_id'") or die(mysqli_error($conn_kat));
	if ($sql_update_kat) {
		$kat_update_status=TRUE;
	}
	else {
		$kat_update_status=FALSE;
	}
	return $kat_update_status;
}
?>