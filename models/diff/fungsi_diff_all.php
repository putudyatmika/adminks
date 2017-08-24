<?php
function list_variabel_diff() {
	$db_diff = new db();
	$conn_diff = $db_diff -> connect();
	$sql_diff = $conn_diff -> query("select ragam_variabel.nama as varnama, ragam_diff_variabel.* from ragam_diff_variabel inner join ragam_variabel on ragam_variabel.id=ragam_diff_variabel.variabel");
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
function list_value_diff($var_diff_id) {
	$db_diff = new db();
	$conn_diff = $db_diff -> connect();
	$sql_diff = $conn_diff -> query("select ragam_diff_variabel.nama as varnama, ragam_diff_variabel.waktu as varwaktu, ragam_diff_value.* from ragam_diff_value inner join ragam_diff_variabel on ragam_diff_value.variabel_diff=ragam_diff_variabel.variabel_diff where ragam_diff_value.variabel_diff='$var_diff_id' order by ragam_diff_value.posisi asc");
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
?>