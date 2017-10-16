<?php
//fungsi untuk menampilkan ragam tema
function ragam_tema_list() {
	$db_tema = new db();
	$conn_tema = $db_tema -> connect();
	$sql_tema = $conn_tema -> query("select * from ragam_tema order by posisi asc");
	$cek_tema = $sql_tema->num_rows;
	$tema_list=array("error"=>false);
	if ($cek_tema>0) {
		$tema_list["error"]=false;
		$tema_list["tema_total"]=$cek_tema;
		$i=1;
		while ($r=$sql_tema->fetch_object()) {
			$tema_list["item"][$i]=array(
				"tema_posisi"=>$r->posisi,
				"tema_nama"=>$r->nama,
				"tema_id"=>$r->id
			);
			$i++;
		}
	}
	else {
		$tema_list["error"]=true;
		$tema_list["pesan_error"]="data kosong";
	}
	return $tema_list;
	$conn_tema->close();
}

//fungsi untuk get nama ragam
function get_nama_ragamtema($ragam_id) {
	$db_tema = new db();
	$conn_tema = $db_tema -> connect();
	$sql_tema = $conn_tema -> query("select * from ragam_tema where id='$ragam_id'");
	$cek_tema = $sql_tema->num_rows;
	if ($cek_tema>0) {
		$r=$sql_tema->fetch_object();
		$nama_tema=$r->nama;
	}
	else {
		$nama_tema=null;
	}
	return $nama_tema;
}
function list_ragam_kategori($ragam_id) {
	$db_tema_kat = new db();
	$conn_tema_kat = $db_tema_kat -> connect();
	//$sql_tema_kat = $conn_tema_kat -> query("select * from ragam_kategori where tema='$ragam_id' order by posisi asc");
	$sql_tema_kat = $conn_tema_kat -> query("select ragam_kategori.*, COUNT(ragam_variabel.kategori) as jumlah_variabel from ragam_kategori left join ragam_variabel on ragam_variabel.kategori=ragam_kategori.id where ragam_kategori.tema='$ragam_id' group by ragam_variabel.kategori order by ragam_kategori.posisi asc");
	$cek_tema_kat = $sql_tema_kat->num_rows;
	$tema_list_kat=array("error"=>false);
	if ($cek_tema_kat>0) {
		$tema_list_kat["error"]=false;
		$tema_list_kat["tema_kat_total"]=$cek_tema_kat;
		$i=1;
		while ($r=$sql_tema_kat->fetch_object()) {
			$tema_list_kat["item"][$i]=array(
				"tema_kat_posisi"=>$r->posisi,
				"tema_kat_nama"=>$r->nama,
				"tema_kat_id"=>$r->id,
				"jumlah_variabel"=>$r->jumlah_variabel
			);
			$i++;
		}
	}
	else {
		$tema_list_kat["error"]=true;
		$tema_list_kat["pesan_error"]="data kosong";
	}
	return $tema_list_kat;
}
function list_ragam_variabel($ragam_id) {
	$db_tema_var = new db();
	$conn_tema_var = $db_tema_var -> connect();
	//$sql_tema_var = $conn_tema_var -> query("select ragam_kategori.id as kat_id, ragam_kategori.nama as kat_nama, ragam_kategori.posisi as kat_posisi, ragam_variabel.id as var_id, ragam_variabel.nama as var_nama, ragam_variabel.kategori as var_kat, ragam_variabel.posisi as var_posisi, ragam_variabel.keterangan as var_ket, ragam_variabel.strategis as var_indikator, ragam_variabel.metadata as var_metadata from ragam_kategori, ragam_variabel where ragam_variabel.kategori=ragam_kategori.id and ragam_kategori.tema='$ragam_id' order by kat_posisi, var_posisi asc");
	$sql_tema_var = $conn_tema_var -> query("select ragam_kategori.id as kat_id, ragam_kategori.nama as kat_nama, ragam_kategori.posisi as kat_posisi, ragam_variabel.id as var_id, ragam_variabel.nama as var_nama, ragam_variabel.kategori as var_kat, ragam_variabel.posisi as var_posisi, ragam_variabel.satuan as var_sat, ragam_variabel.keterangan as var_ket, ragam_variabel.strategis as var_indikator, ragam_variabel.metadata as var_metadata, COUNT(ragam_value.variabel) as jumlah_value from ragam_variabel left join ragam_value ON ragam_value.variabel=ragam_variabel.id left join ragam_kategori on ragam_variabel.kategori=ragam_kategori.id where ragam_kategori.tema='$ragam_id' group by ragam_value.variabel order by ragam_kategori.posisi, ragam_variabel.posisi asc");
	$cek_tema_var = $sql_tema_var->num_rows;
	$tema_list_var=array("error"=>false);
	if ($cek_tema_var>0) {
		$tema_list_var["error"]=false;
		$tema_list_var["tema_var_total"]=$cek_tema_var;
		$i=1;
		while ($r=$sql_tema_var->fetch_object()) {
			$tema_list_var["item"][$i]=array(
				"tema_var_kat_id"=>$r->kat_id,
				"tema_var_kat_nama"=>$r->kat_nama,
				"tema_var_kat_posisi"=>$r->kat_posisi,
				"tema_var_id"=>$r->var_id,
				"tema_var_nama"=>$r->var_nama,
				"tema_var_posisi"=>$r->var_posisi,
				"tema_var_ket"=>$r->var_ket,
				"tema_var_indikator"=>$r->var_indikator,
				"tema_var_metadata"=>$r->var_metadata,
				"tema_var_satuan"=>$r->var_sat,
				"jumlah_value"=>$r->jumlah_value
			);
			$i++;
		}
	}
	else {
		$tema_list_var["error"]=true;
		$tema_list_var["pesan_error"]="data variabel kosong";
	}
	return $tema_list_var;
}
function get_jumlah_variabel_ragam($ragam_id) {
	$db_tema = new db();
	$conn_tema = $db_tema -> connect();
	$sql_tema = $conn_tema -> query("select * from ragam_kategori, ragam_variabel where ragam_variabel.kategori=ragam_kategori.id and ragam_kategori.tema='$ragam_id'");
	$cek_tema = $sql_tema->num_rows;
	if ($cek_tema>0) {
		$jumlah_kategori=$cek_tema;
	}
	else {
		$jumlah_kategori=null;
	}
	return $jumlah_kategori;
}
function get_jumlah_variabel_kategori($kat_id) {
	$db_tema = new db();
	$conn_tema = $db_tema -> connect();
	$sql_tema = $conn_tema -> query("select * from ragam_variabel where kategori='$kat_id'");
	$cek_tema = $sql_tema->num_rows;
	if ($cek_tema>0) {
		$jumlah_kategori=$cek_tema;
	}
	else {
		$jumlah_kategori=null;
	}
	return $jumlah_kategori;
}
function list_only_ragam_variabel($ragam_id,$kat_id) {
	$db_tema_var = new db();
	$conn_tema_var = $db_tema_var -> connect();
	$sql_tema_var = $conn_tema_var -> query("select ragam_kategori.id as kat_id, ragam_kategori.nama as kat_nama, ragam_kategori.posisi as kat_posisi, ragam_variabel.id as var_id, ragam_variabel.nama as var_nama, ragam_variabel.kategori as var_kat, ragam_variabel.posisi as var_posisi, ragam_variabel.satuan as var_sat, ragam_variabel.keterangan as var_ket, ragam_variabel.strategis as var_indikator, ragam_variabel.metadata as var_metadata from ragam_kategori, ragam_variabel where ragam_variabel.kategori=ragam_kategori.id and ragam_kategori.tema='$ragam_id' and ragam_variabel.kategori='$kat_id' order by kat_posisi, var_posisi asc");
	$cek_tema_var = $sql_tema_var->num_rows;
	$tema_list_var=array("error"=>false);
	if ($cek_tema_var>0) {
		$tema_list_var["error"]=false;
		$tema_list_var["tema_var_total"]=$cek_tema_var;
		$i=1;
		while ($r=$sql_tema_var->fetch_object()) {
			$tema_list_var["item"][$i]=array(
				"tema_var_kat_id"=>$r->kat_id,
				"tema_var_kat_nama"=>$r->kat_nama,
				"tema_var_kat_posisi"=>$r->kat_posisi,
				"tema_var_id"=>$r->var_id,
				"tema_var_nama"=>$r->var_nama,
				"tema_var_posisi"=>$r->var_posisi,
				"tema_var_ket"=>$r->var_ket,
				"tema_var_indikator"=>$r->var_indikator,
				"tema_var_satuan"=>$r->var_sat,
				"tema_var_metadata"=>$r->var_metadata
			);
			$i++;
		}
	}
	else {
		$tema_list_var["error"]=true;
		$tema_list_var["pesan_error"]="data variabel kosong";
	}
	return $tema_list_var;
}
?>