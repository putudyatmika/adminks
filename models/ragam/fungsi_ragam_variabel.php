<?php
function cek_varID($var_id) {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	$sql_var = $conn_var -> query("select * from ragam_variabel where id='$var_id'");
	$cek_var = $sql_var->num_rows;
	if ($cek_var>0) {
		$cekVarID=TRUE;
	}
	else {
		$cekVarID=FALSE;
	}
	return $cekVarID;
}
function cek_VarValue($var_id,$waktu) {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	$sql_var = $conn_var -> query("select * from ragam_value where variabel='$var_id' and waktu='$waktu'");
	$cek_var = $sql_var->num_rows;
	if ($cek_var>0) {
		$cekVarValue=TRUE;
	}
	else {
		$cekVarValue=FALSE;
	}
	return $cekVarValue;
}
function save_newvalue($var_id,$value_waktu,$value_nilai,$value_posisi) {
	$db_value = new db();
	$conn_value = $db_value -> connect();
	$sql_ins_value = $conn_value-> query("insert into ragam_value(variabel,waktu,nilai,posisi)
		values('$var_id','$value_waktu','$value_nilai','$value_posisi')") or die(mysqli_error($conn_value));
	if ($sql_ins_value) {
		$value_ins_status=TRUE;
	}
	else {
		$value_ins_status=FALSE;
	}
	return $value_ins_status;
}
function save_newvar($var_id,$var_nama,$var_satuan,$var_posisi,$kat_id,$var_indikator,$var_ket,$var_metadata) {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	if (empty($var_indikator)) { $var_indikator='NULL'; }
	else { $var_indikator="'".$var_indikator."'"; }

	if (empty($var_ket)) { $var_ket='NULL'; }
	else { $var_ket="'".$var_ket."'"; }

	if (empty($var_metadata)) { $var_metadata='NULL'; }
	else { $var_metadata="'".$var_metadata."'"; }

	$sql_ins_var = $conn_var-> query("insert into ragam_variabel(id,nama,satuan,kategori,posisi,strategis,keterangan,metadata)
		values('$var_id','$var_nama','$var_satuan','$kat_id','$var_posisi',$var_indikator,$var_ket,$var_metadata)") or die(mysqli_error($conn_var));
	if ($sql_ins_var) {
		$var_ins_status=TRUE;
	}
	else {
		$var_ins_status=FALSE;
	}
	return $var_ins_status;
}
function get_ragam_variabel($var_id) { //full konten variabel
	$db_var = new db();
	$conn_var = $db_var -> connect();
	$sql_var = $conn_var->query("select * from ragam_variabel where id='$var_id'");
	$r=$sql_var->fetch_object();
	$var_isi=array("var_nama"=>$r->nama,"var_satuan"=>$r->satuan,"var_ket"=>$r->keterangan,"var_kat_id"=>$r->kategori,"var_posisi"=>$r->posisi,"var_indikator"=>$r->strategis,"var_metadata"=>$r->metadata);
	return $var_isi;
}
function get_nama_variabel($var_id) { //hanya nama
	$db_kat = new db();
	$conn_kat = $db_kat -> connect();
	$sql_kat = $conn_kat->query("select * from ragam_variabel where id='$var_id'");
	$cek_kat = $sql_kat->num_rows;
	if ($cek_kat>0) {
		$r=$sql_kat->fetch_object();
		$nama_var=$r->nama;
	}
	else {
		$nama_var=null;
	}
	return $nama_var;
}
function get_ragam_kat($kat_id) { //get kode ragam dari kode kategori
	$db_var = new db();
	$conn_var = $db_var -> connect();
	$sql_var = $conn_var->query("select * from ragam_kategori where id='$kat_id'");
	$cek_var= $sql_var->num_rows;
	if ($cek_var>0) {
		$r=$sql_var->fetch_object();
		$ragam_id=$r->tema;
	}
	else {
		$ragam_id="";
	}
	return $ragam_id;
}
function get_kategori_var($var_id) {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	$sql_var = $conn_var->query("select * from ragam_variabel where id='$var_id'");
	$cek_var= $sql_var->num_rows;
	if ($cek_var>0) {
		$r=$sql_var->fetch_object();
		$kat_nama=$r->kategori;
	}
	else {
		$kat_nama="";
	}
	return $kat_nama;
}
function update_variabel($var_id,$var_nama,$var_satuan,$var_posisi,$var_ket,$kat_id,$var_indikator,$var_metadata) {
	$db_var = new db();
	$conn_var = $db_var -> connect();
	if (empty($var_indikator)) { $var_indikator='NULL'; }
	else { $var_indikator="'".$var_indikator."'"; }

	if (empty($var_ket)) { $var_ket='NULL'; }
	else { $var_ket="'".$var_ket."'"; }

	if (empty($var_metadata)) { $var_metadata='NULL'; }
	else { $var_metadata="'".$var_metadata."'"; }

	$sql_update_var = $conn_var-> query("update ragam_variabel set nama='$var_nama',satuan='$var_satuan',kategori='$kat_id', keterangan=$var_ket, posisi='$var_posisi', strategis=$var_indikator, metadata=$var_metadata where id='$var_id'") or die(mysqli_error($conn_var));
	if ($sql_update_var) {
		$var_update_status=TRUE;
	}
	else {
		$var_update_status=FALSE;
	}
	return $var_update_status;
}

function list_variabel_value($var_id) {
	$db_var_value = new db();
	$conn_var_value = $db_var_value -> connect();
	$sql_var_value = $conn_var_value -> query("select ragam_value.variabel as variabel, ragam_variabel.nama as nama , ragam_value.waktu as waktu, ragam_value.nilai as nilai, ragam_value.posisi as posisi, ragam_value.ada_wilayah as ada_wilayah from ragam_variabel, ragam_value where ragam_variabel.id=ragam_value.variabel and ragam_value.variabel='$var_id' order by ragam_value.posisi asc");
	$cek_var_value = $sql_var_value->num_rows;
	$var_value_list=array("error"=>false);
	if ($cek_var_value>0) {
		$value_var_list["error"]=false;
		$value_var_list["var_value_total"]=$cek_var_value;
		$i=1;
		while ($r=$sql_var_value->fetch_object()) {
			$value_var_list["item"][$i]=array(
				"var_value_variabel"=>$r->variabel,
				"var_value_nama"=>$r->nama,
				"var_value_waktu"=>$r->waktu,
				"var_value_nilai"=>$r->nilai,
				"var_value_posisi"=>$r->posisi,
				"var_value_wilayah"=>$r->ada_wilayah
			);
			$i++;
		}
	}
	else {
		$value_var_list["error"]=true;
		$value_var_list["pesan_error"]="data variabel value kosong";
	}
	return $value_var_list;
}

function list_variabel_kategori($kat_id) {
	$db_var_kat = new db();
	$conn_var_kat = $db_var_kat -> connect();
	$sql_var_kat = $conn_var_kat -> query("select * from ragam_variabel where kategori='$kat_id' order by posisi asc ");
	$cek_var_kat = $sql_var_kat->num_rows;
	$list_var_kat=array("error"=>false);
	if ($cek_var_kat>0) {
		$list_var_kat["error"]=false;
		$list_var_kat["var_kat_total"]=$cek_var_kat;
		$i=1;
		while ($r=$sql_var_kat->fetch_object()) {
			$list_var_kat["item"][$i]=array(
				"var_id"=>$r->id,
				"var_nama"=>$r->nama,
				"var_posisi"=>$r->posisi,
				"var_ket"=>$r->keterangan
			);
			$i++;
		}
	}
	else {
		$list_var_kat["error"]=true;
		$list_var_kat["pesan_error"]="data variabel kosong";
	}
	return $list_var_kat;
}
function get_value_variabel($var_id,$waktu) { //full kategori konten
	$db_value = new db();
	$conn_value = $db_value -> connect();
	$sql_value = $conn_value->query("select * from ragam_value where variabel='$var_id' and waktu='$waktu'");
	$r=$sql_value->fetch_object();
	$value_isi=array("value_waktu"=>$r->waktu,"value_nilai"=>$r->nilai, "value_posisi"=>$r->posisi);
	return $value_isi;
}

function update_newvalue($var_id,$value_waktu,$value_nilai,$value_posisi) {
	$db_value = new db();
	$conn_value = $db_value -> connect();
	$sql_update_value = $conn_value-> query("update ragam_value set nilai='$value_nilai',posisi='$value_posisi' where 
		waktu='$value_waktu' and variabel='$var_id'") or die(mysqli_error($conn_value));
	if ($sql_update_value) {
		$value_update_status=TRUE;
	}
	else {
		$value_update_status=FALSE;
	}
	return $value_update_status;
}
?>