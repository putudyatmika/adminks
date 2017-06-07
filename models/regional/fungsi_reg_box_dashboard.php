<?php
function reg_jumlah_variabel() {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	$sql_var = $conn_var->query("select * from regional_variabel");
	$total_var=$sql_var->num_rows;	
	return $total_var;
	$conn_var->close();
}

function reg_jumlah_value() {
	$db_value = new db();
	$conn_value = $db_value -> connect();
	$sql_value = $conn_value->query("select * from regional_value");
	$total_value=$sql_value->num_rows;	
	return $total_value;
	$conn_value->close();
}

?>