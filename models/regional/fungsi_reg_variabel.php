<?php
function cek_regVarID($var_id) {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	$sql_var = $conn_var -> query("select * from regional_variabel where id='$var_id'");
	$cek_var = $sql_var->num_rows;
	if ($cek_var>0) {
		$RegVarID=TRUE;
	}
	else {
		$RegVarID=FALSE;
	}
	return $RegVarID;
}
function cek_value_regVarID($value_var_id,$value_wilayah) {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	$sql_var = $conn_var -> query("select * from regional_value where variabel='$value_var_id' and wilayah='$value_wilayah'") or die(mysqli_error($conn_var));
	$cek_var = $sql_var->num_rows;
	if ($cek_var>0) {
		$RegVarID=TRUE;
	}
	else {
		$RegVarID=FALSE;
	}
	return $RegVarID;
}
function cek_regVar_on_value($value_var_id) {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	$sql_var = $conn_var -> query("select * from regional_value where variabel='$value_var_id'") or die(mysqli_error($conn_var));
	$cek_var = $sql_var->num_rows;
	if ($cek_var>0) {
		$RegVarID=TRUE;
	}
	else {
		$RegVarID=FALSE;
	}
	return $RegVarID;
}
function save_reg_newvar($var_id,$var_nama,$var_satuan,$var_ket,$var_posisi,$var_lingkup) {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	$sql_ins_var = $conn_var-> query("insert into regional_variabel(id,nama,satuan,keterangan,posisi,lingkup)
		values('$var_id','$var_nama','$var_satuan','$var_ket','$var_posisi','$var_lingkup')") or die(mysqli_error($conn_var));
	if ($sql_ins_var) {
		$var_ins_status=TRUE;
	}
	else {
		$var_ins_status=FALSE;
	}
	return $var_ins_status;
}
function get_reg_variabel($var_id) { //full konten variabel
	$db_var = new db();
	$conn_var = $db_var -> connect();
	$sql_var = $conn_var->query("select * from regional_variabel where id='$var_id'");
	$r=$sql_var->fetch_object();
	$var_isi=array("var_nama"=>$r->nama,"var_satuan"=>$r->satuan,"var_ket"=>$r->keterangan,"var_lingkup"=>$r->lingkup,"var_posisi"=>$r->posisi);
	return $var_isi;
}

function update_reg_variabel($var_id,$var_nama,$var_satuan,$var_ket,$var_posisi,$var_lingkup) {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	$sql_update_var = $conn_var-> query("update regional_variabel set nama='$var_nama',satuan='$var_satuan',keterangan='$var_ket',posisi='$var_posisi',lingkup='$var_lingkup' where id='$var_id'") or die(mysqli_error($conn_var));
	if ($sql_update_var) {
		$var_update=TRUE;
	}
	else {
		$var_update=FALSE;
	}
	return $var_update;
	$conn_var->close();
}
function hapus_reg_variabel($var_id) {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	$sql_hapus_var = $conn_var-> query("delete from regional_variabel where id='$var_id'") or die(mysqli_error($conn_value));
	if ($sql_hapus_var) {
		$var_hapus_status=TRUE;
	}
	else {
		$var_hapus_status=FALSE;
	}
	return $var_hapus_status;
	$conn_var->close();
}
?>