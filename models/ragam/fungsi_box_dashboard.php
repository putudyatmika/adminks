<?php
function jumlah_kategori() {
	$db_kat = new db();
	$conn_kat = $db_kat -> connect();
	$sql_kat = $conn_kat->query("select * from ragam_kategori");
	$total_kat=$sql_kat->num_rows;	
	return $total_kat;
	$conn_kat->close();
}

function jumlah_variabel() {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	$sql_var = $conn_var->query("select * from ragam_variabel");
	$total_var=$sql_var->num_rows;	
	return $total_var;
	$conn_var->close();
}

function jumlah_value() {
	$db_value = new db();
	$conn_value = $db_value -> connect();
	$sql_value = $conn_value->query("select * from ragam_value");
	$total_value=$sql_value->num_rows;	
	return $total_value;
	$conn_value->close();
}

?>