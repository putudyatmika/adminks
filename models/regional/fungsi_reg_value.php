<?php
//value

function save_reg_newvalue($value_var_id,$value_waktu,$value_nilai,$value_posisi) {
	$db_value = new db();
	$conn_value = $db_value -> connect();
	$sql_inv_value = $conn_value-> query("insert into regional_value(variabel,wilayah,nilai,posisi)
		values('$value_var_id','$value_waktu','$value_nilai','$value_posisi')") or die(mysqli_error($conn_var));
	if ($sql_inv_value) {
		$value_ins_status=TRUE;
	}
	else {
		$value_ins_status=FALSE;
	}
	return $value_ins_status;
}
function get_reg_var_value($var_id,$wilayah) {
	$db_reg = new db();
	$conn_reg = $db_reg -> connect();
	$sql_reg = $conn_reg -> query("select * from regional_value where variabel='$var_id' and wilayah='$wilayah'") or die(mysqli_error($conn_reg));
	$r=$sql_reg->fetch_object();
	$reg_value=array(
		"reg_value_wilayah"=>$r->wilayah,
		"reg_value_nilai"=>$r->nilai,
		"reg_value_posisi"=>$r->posisi
		);
	return $reg_value;
	$conn_list->close();
}

function update_reg_value($value_var_id,$value_wilayah,$value_nilai,$value_posisi) {
	$db_value = new db();
	$conn_value = $db_value -> connect();
	$sql_update_value = $conn_value-> query("update regional_value set nilai='$value_nilai',posisi='$value_posisi' where variabel='$value_var_id' and wilayah='$value_wilayah'") or die(mysqli_error($conn_var));
	if ($sql_update_value) {
		$value_update_status=TRUE;
	}
	else {
		$value_update_status=FALSE;
	}
	return $value_update_status;
}
function hapus_reg_value($var_id,$value_wilayah) {
	$db_value = new db();
	$conn_value = $db_value -> connect();
	$sql_hapus_value = $conn_value-> query("delete from regional_value where wilayah='$value_wilayah' and variabel='$var_id'") or die(mysqli_error($conn_value));
	if ($sql_hapus_value) {
		$value_hapus_status=TRUE;
	}
	else {
		$value_hapus_status=FALSE;
	}
	return $value_hapus_status;
	$conn_value->close();
}
?>