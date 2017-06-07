<?php
//fungsi hapus kategori, variabel dan value
function hapus_value($var_id,$value_waktu) {
	$db_value = new db();
	$conn_value = $db_value -> connect();
	$sql_hapus_value = $conn_value-> query("delete from ragam_value where waktu='$value_waktu' and variabel='$var_id'") or die(mysqli_error($conn_value));
	if ($sql_hapus_value) {
		$value_hapus_status=TRUE;
	}
	else {
		$value_hapus_status=FALSE;
	}
	return $value_hapus_status;
}
function cekVarValue($var_id) {
	$db_value = new db();
	$conn_value = $db_value -> connect();
	$sql_var_value=$conn_value-> query("select * from ragam_value where variabel='$var_id'") or die(mysqli_error($conn_value));
	$cek_value= $sql_var_value->num_rows;
	if ($cek_value>0) {
		$hasilVarValue=TRUE;
	}
	else {
		$hasilVarValue=FALSE;
	}
	return $hasilVarValue;
}
function hapus_variabel($var_id) {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	$sql_hapus_var = $conn_var-> query("delete from ragam_variabel where id='$var_id'") or die(mysqli_error($conn_value));
	if ($sql_hapus_var) {
		$var_hapus_status=TRUE;
	}
	else {
		$var_hapus_status=FALSE;
	}
	return $var_hapus_status;
}

function cekKatVar($kat_id) {
	$db_kat = new db();
	$conn_kat = $db_kat -> connect();
	$sql_kat=$conn_kat-> query("select * from ragam_variabel where kategori='$kat_id'") or die(mysqli_error($conn_value));
	$cek_kat= $sql_kat->num_rows;
	if ($cek_kat>0) {
		$hasil_kat=TRUE;
	}
	else {
		$hasil_kat=FALSE;
	}
	return $hasil_kat;
}
function hapus_kategori($kat_id) {
	$db_kat = new db();
	$conn_kat = $db_kat -> connect();
	$sql_kat = $conn_kat -> query("delete from ragam_kategori where id='$kat_id'") or die(mysqli_error($conn_value));
	if ($sql_kat) {
		$kat_hapus_status=TRUE;
	}
	else {
		$kat_hapus_status=FALSE;
	}
	return $kat_hapus_status;
}

?> 