<?php
function list_variabel_diff() {
	$db_diff = new db();
	$conn_diff = $db_diff -> connect();
	$sql_diff = $conn_diff -> query("select ragam_variabel.nama as varnama, ragam_diff_variabel.* from ragam_diff_variabel left join ragam_variabel on ragam_variabel.id=ragam_diff_variabel.variabel");
	$cek_diff = $sql_diff->num_rows;
	$list_diff=array("error"=>false);
	if ($cek_diff>0) {
		$list_diff["error"]=false;
		$list_diff["diff_total"]=$cek_diff;
		$i=1;
		while ($r=$sql_diff->fetch_object()) {
			$list_diff["item"][$i]=array(
				"diff_var_id"=>$r->variabel,
				"diff_var_nama"=>$r->varnama,
				"diff_var_waktu"=>$r->waktu,
				"diff_id"=>$r->variabel_diff,
				"diff_nama"=>$r->nama,
				"diff_satuan"=>$r->satuan,
				"diff_ket"=>$r->keterangan,
				"diff_posisi"=>$r->posisi
			);
			$i++;
		}
	}
	else {
		$list_diff["error"]=true;
		$list_diff["pesan_error"]="data variabel diff kosong";
	}
	return $list_diff;
}
function get_variabel_diff_full($var_diff) {
	$db_diff = new db();
	$conn_diff = $db_diff -> connect();
	$sql_diff = $conn_diff -> query("select * from ragam_diff_variabel where variabel_diff='$var_diff'");
	$cek_diff = $sql_diff->num_rows;
	$list_diff=array("error"=>false);
	if ($cek_diff>0) {
		$list_diff["error"]=false;
		$r=$sql_diff->fetch_object();
			$list_diff["item"]=array(
				"diff_var_id"=>$r->variabel,
				"diff_var_waktu"=>$r->waktu,
				"diff_id"=>$r->variabel_diff,
				"diff_nama"=>$r->nama,
				"diff_satuan"=>$r->satuan,
				"diff_ket"=>$r->keterangan,
				"diff_posisi"=>$r->posisi
			);
			
	}
	else {
		$list_diff["error"]=true;
		$list_diff["pesan_error"]="data variabel diff kosong";
	}
	return $list_diff;
}
function list_value_diff($var_diff_id) {
	$db_diff = new db();
	$conn_diff = $db_diff -> connect();
	$sql_diff = $conn_diff -> query("select ragam_diff_variabel.nama as varnama, ragam_diff_variabel.waktu as varwaktu, ragam_diff_value.* from ragam_diff_value left join ragam_diff_variabel on ragam_diff_value.variabel_diff=ragam_diff_variabel.variabel_diff where ragam_diff_value.variabel_diff='$var_diff_id' order by ragam_diff_value.posisi asc");
	$cek_diff = $sql_diff->num_rows;
	$list_diff_val=array("error"=>false);
	if ($cek_diff>0) {
		$list_diff_val["error"]=false;
		$list_diff_val["diff_total"]=$cek_diff;
		$i=1;
		while ($r=$sql_diff->fetch_object()) {
			$list_diff_val["item"][$i]=array(
				"diff_id"=>$r->variabel_diff,
				"diff_var_nama"=>$r->varnama,
				"diff_var_waktu"=>$r->varwaktu,
				"diff_rincian"=>$r->rincian,
				"diff_nilai"=>$r->nilai,
				"diff_posisi"=>$r->posisi
			);
			$i++;
		}
	}
	else {
		$list_diff_val["error"]=true;
		$list_diff_val["pesan_error"]="data value diff kosong";
	}
	return $list_diff_val;
}
function get_var_diff_id($var,$waktu) {
	$db_diff = new db();
	$conn_diff = $db_diff -> connect();
	$sql_diff = $conn_diff -> query("select variabel_diff from ragam_diff_variabel where variabel='$var' and waktu='$waktu'");
	$cek_diff= $sql_diff->num_rows;
	if ($cek_diff>0) {
		$r=$sql_diff->fetch_object();
		$var_diff=$r->variabel_diff;
	}
	else {
		$var_diff=null;
	}
	return $var_diff;
}
function save_new_diffvar($var_id,$waktu_id,$var_diff_id,$var_nama,$var_satuan,$var_ket,$var_posisi) {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	
	if (empty($var_ket)) { $var_ket='NULL'; }
	else { $var_ket="'".$var_ket."'"; }

	$sql_ins_var = $conn_var-> query("insert into ragam_diff_variabel(variabel,waktu,variabel_diff,nama,satuan,keterangan,posisi) values('$var_id','$waktu_id','$var_diff_id','$var_nama','$var_satuan',$var_ket,'$var_posisi')") or die(mysqli_error($conn_var));
	if ($sql_ins_var) {
		$var_ins_status=TRUE;
		$sql_update_wilayah = $conn_var -> query("update ragam_value set ada_wilayah='1' where variabel='$var_id' and waktu='$waktu_id'") or die(mysqli_error($conn_var));
	}
	else {
		$var_ins_status=FALSE;
	}
	return $var_ins_status;
}
function update_diffvar($var_id,$waktu_id,$var_diff_id,$var_nama,$var_satuan,$var_ket,$var_posisi) {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	
	if (empty($var_ket)) { $var_ket='NULL'; }
	else { $var_ket="'".$var_ket."'"; }

	$sql_update_var = $conn_var-> query("update ragam_diff_variabel set nama='$var_nama',satuan='$var_satuan',keterangan=$var_ket,posisi='$var_posisi' where variabel='$var_id' and waktu='$waktu_id' and variabel_diff='$var_diff_id'") or die(mysqli_error($conn_var));
	if ($sql_update_var) {
		$var_update_status=TRUE;
	}
	else {
		$var_update_status=FALSE;
	}
	return $var_update_status;
}
function cekVar_Diff_ID($var_diff_id) {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	$sql_var = $conn_var -> query("select * from ragam_diff_variabel where variabel_diff='$var_diff_id'");
	$cek_var = $sql_var->num_rows;
	if ($cek_var>0) {
		$cekVarID=TRUE;
	}
	else {
		$cekVarID=FALSE;
	}
	return $cekVarID;
}

function cekDiffVarValue($var_diff_id,$AdaWaktu=false,$waktu_id) {
	$db_value = new db();
	$conn_value = $db_value -> connect();
	if ($AdaWaktu) {
		$sql_var_value=$conn_value-> query("select * from ragam_diff_value where variabel_diff='$var_diff_id' and rincian='$waktu_id'") or die(mysqli_error($conn_value));
	}
	else {
		$sql_var_value=$conn_value-> query("select * from ragam_diff_value where variabel_diff='$var_diff_id'") or die(mysqli_error($conn_value));
	}
	$cek_value= $sql_var_value->num_rows;
	if ($cek_value>0) {
		$hasilVarValue=TRUE;
	}
	else {
		$hasilVarValue=FALSE;
	}
	return $hasilVarValue;
}
function hapus_diff_variabel($var_diff_id,$var_id,$waktu_id) {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	$sql_hapus_var = $conn_var-> query("delete from ragam_diff_variabel where variabel_diff='$var_diff_id'") or die(mysqli_error($conn_value));
	if ($sql_hapus_var) {
		$var_hapus_status=TRUE;
		$sql_update_wilayah = $conn_var -> query("update ragam_value set ada_wilayah=NULL where variabel='$var_id' and waktu='$waktu_id'") or die(mysqli_error($conn_var));
	}
	else {
		$var_hapus_status=FALSE;
	}
	return $var_hapus_status;
}
function save_diff_value($diff_id,$value_waktu,$value_nilai,$value_posisi) {
	$db_value = new db();
	$conn_value = $db_value -> connect();
	$sql_ins_value = $conn_value-> query("insert into ragam_diff_value(variabel_diff,rincian,nilai,posisi)
		values('$diff_id','$value_waktu','$value_nilai','$value_posisi')") or die(mysqli_error($conn_value));
	if ($sql_ins_value) {
		$value_ins_status=TRUE;
	}
	else {
		$value_ins_status=FALSE;
	}
	return $value_ins_status;
}
function get_value_diff_full($diff_id,$waktu_id) {
	$db_diff = new db();
	$conn_diff = $db_diff -> connect();
	$sql_diff = $conn_diff -> query("select * from ragam_diff_value where variabel_diff='$diff_id' and rincian='$waktu_id'");
	$cek_diff = $sql_diff->num_rows;
	$list_diff=array("error"=>false);
	if ($cek_diff>0) {
		$list_diff["error"]=false;
		$r=$sql_diff->fetch_object();
			$list_diff["item"]=array(
				"value_diff_id"=>$r->variabel_diff,
				"value_diff_rincian"=>$r->rincian,
				"value_diff_nilai"=>$r->nilai,
				"value_diff_posisi"=>$r->posisi
			);
			
	}
	else {
		$list_diff["error"]=true;
		$list_diff["pesan_error"]="data variabel diff kosong";
	}
	return $list_diff;
}
function update_diff_value($diff_id,$value_waktu,$value_nilai,$value_posisi) {
	$db_value = new db();
	$conn_value = $db_value -> connect();
	$sql_update_value = $conn_value-> query("update ragam_diff_value set nilai='$value_nilai',posisi='$value_posisi' where variabel_diff='$diff_id' and rincian='$value_waktu'") or die(mysqli_error($conn_value));
	if ($sql_update_value) {
		$value_update_status=TRUE;
	}
	else {
		$value_update_status=FALSE;
	}
	return $value_update_status;
}
function hapus_diff_value($diff_id,$value_waktu) {
	$db_value = new db();
	$conn_value = $db_value -> connect();
	$sql_hapus_value = $conn_value-> query("delete from ragam_diff_value where rincian='$value_waktu' and variabel_diff='$diff_id'") or die(mysqli_error($conn_value));
	if ($sql_hapus_value) {
		$value_hapus_status=TRUE;
	}
	else {
		$value_hapus_status=FALSE;
	}
	return $value_hapus_status;
}
?>