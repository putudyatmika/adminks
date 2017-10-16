<?php
function json_variabel_value($var_id) {
	$db_var_value = new db();
	$conn_var_value = $db_var_value -> connect();
	$sql_var_value = $conn_var_value -> query("select ragam_kategori.nama as katnama, ragam_variabel.nama as varnama, ragam_value.* FROM ragam_value INNER JOIN ragam_variabel on ragam_value.variabel=ragam_variabel.id INNER JOIN ragam_kategori on ragam_variabel.kategori=ragam_kategori.id WHERE ragam_value.variabel='$var_id' ORDER by ragam_value.posisi ASC");
	$cek_var_value = $sql_var_value->num_rows;
	$var_value_list=array("error"=>false);
	if ($cek_var_value>0) {
		$value_var_list["error"]=false;
		$value_var_list["row_total"]=$cek_var_value;
		$i=1;
		while ($r=$sql_var_value->fetch_object()) {
			$value_var_list["item"][$i]=array(
				"kat_nama"=>$r->katnama,
				"var_nama"=>$r->varnama,
				"var_id"=>$r->variabel,
				"val_waktu"=>$r->waktu,
				"val_nilai"=>$r->nilai,
				"val_posisi"=>$r->posisi,
				"val_wilayah"=>$r->ada_wilayah
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

function json_get_kategori($ragam_id) {
	$db_tema_kat = new db();
	$conn_tema_kat = $db_tema_kat -> connect();
	$sql_tema_kat = $conn_tema_kat -> query("select * from ragam_kategori where tema='$ragam_id' order by posisi asc");
	//$sql_tema_kat = $conn_tema_kat -> query("select * from ragam_kategori where tema='$ragam_id' order by posisi asc");
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
				"tema_kat_id"=>$r->id
			);
			$i++;
		}
	}
	else {
		$tema_list_kat["error"]=true;
		$tema_list_kat["pesan_error"]="data kategori kosong";
	}
	return $tema_list_kat;

}
?>