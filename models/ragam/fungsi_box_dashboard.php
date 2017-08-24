<?php
function jumlah_kategori($kat_id) {
	$db_kat = new db();
	$conn_kat = $db_kat -> connect();
	if ($kat_id=='all') {
		$sql_kat = $conn_kat->query("select * from ragam_kategori");
	}
	else {
		$sql_kat = $conn_kat->query("select * from ragam_kategori where tema='$kat_id'");
	}
	$total_kat=$sql_kat->num_rows;	
	return $total_kat;
	$conn_kat->close();
}

function jumlah_variabel($kat_id) {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	if ($kat_id=='all') {
	$sql_var = $conn_var->query("select * from ragam_variabel");
	}
	else {
		$sql_var= $conn_var->query("select ragam_variabel.id, ragam_variabel.nama from ragam_variabel INNER JOIN ragam_kategori on ragam_variabel.kategori=ragam_kategori.id where ragam_kategori.tema='$kat_id'");
	}
	$total_var=$sql_var->num_rows;	
	return $total_var;
	$conn_var->close();
}

function jumlah_value($kat_id) {
	$db_value = new db();
	$conn_value = $db_value -> connect();
	if ($kat_id=='all') {
	$sql_value = $conn_value->query("select * from ragam_value"); 
}
	else {
		$sql_value = $conn_value->query("select ragam_value.variabel, ragam_value.waktu, ragam_value.nilai, ragam_kategori.id, ragam_kategori.tema from ragam_value INNER JOIN ragam_variabel on ragam_value.variabel=ragam_variabel.id INNER join ragam_kategori on ragam_variabel.kategori=ragam_kategori.id where ragam_kategori.tema='$kat_id'");
	}
	$total_value=$sql_value->num_rows;	
	return $total_value;
	$conn_value->close();
}
function jumlah_value_variabel($var_id) {
	$db_value = new db();
	$conn_value = $db_value -> connect();
	$sql_value = $conn_value->query("select * from ragam_value where variabel='$var_id");
	$total_value=$sql_value->num_rows;	
	return $total_value;
	$conn_value->close();
}
?>