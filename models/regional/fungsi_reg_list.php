<?php
//fungsi untuk menampilkan regional variabel
function reg_variabel_list() {
	$db_reg = new db();
	$conn_reg = $db_reg -> connect();
	$sql_reg = $conn_reg -> query("select * from regional_variabel order by posisi asc");
	$cek_reg = $sql_reg->num_rows;
	$reg_list=array("error"=>false);
	if ($cek_reg>0) {
		$reg_list["error"]=false;
		$reg_list["reg_var_total"]=$cek_reg;
		$i=1;
		while ($r=$sql_reg->fetch_object()) {
			$reg_list["item"][$i]=array(
				"reg_var_id"=>$r->id,
				"reg_var_nama"=>$r->nama,
				"reg_var_satuan"=>$r->satuan,
				"reg_var_ket"=>$r->keterangan,
				"reg_var_posisi"=>$r->posisi,
				"reg_var_lingkup"=>$r->lingkup
			);
			$i++;
		}
	}
	else {
		$reg_list["error"]=true;
		$reg_list["pesan_error"]="data kosong";
	}
	return $reg_list;
	$conn_list->close();
}
function get_reg_namavar($var_id) {
	$db_reg = new db();
	$conn_reg = $db_reg -> connect();
	$sql_reg = $conn_reg -> query("select * from regional_variabel where id='$var_id'") or die(mysqli_error($conn_reg));
	$cek_reg = $sql_reg->num_rows;
	if ($cek_reg>0) {
		$r=$sql_reg->fetch_object();
		$nama_reg_var=$r->nama;
	}
	else {
		$nama_reg_var=null;
	}
	return $nama_reg_var;
}
function reg_var_value_list($var_id) {
	$db_reg = new db();
	$conn_reg = $db_reg -> connect();
	$sql_reg = $conn_reg -> query("select * from regional_value where variabel='$var_id' order by posisi asc") or die(mysqli_error($conn_reg));
	$cek_reg = $sql_reg->num_rows;
	$reg_list=array("error"=>false);
	if ($cek_reg>0) {
		$reg_list["error"]=false;
		$reg_list["reg_value_total"]=$cek_reg;
		$i=1;
		while ($r=$sql_reg->fetch_object()) {
			$reg_list["item"][$i]=array(
				"reg_value_id"=>$r->variabel,
				"reg_value_wilayah"=>$r->wilayah,
				"reg_value_nilai"=>$r->nilai,
				"reg_value_posisi"=>$r->posisi
			);
			$i++;
		}
	}
	else {
		$reg_list["error"]=true;
		$reg_list["pesan_error"]="data kosong";
	}
	return $reg_list;
	$conn_list->close();
}
?>