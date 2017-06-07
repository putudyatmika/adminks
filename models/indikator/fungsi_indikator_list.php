<?php
function list_variabel_strategis() {
	$db_indikator = new db();
	$conn_indikator = $db_indikator -> connect();
	$sql_indikator = $conn_indikator -> query("select ragam_kategori.id as kat_id, ragam_kategori.nama as kat_nama, ragam_kategori.posisi as kat_posisi, ragam_variabel.id as var_id, ragam_variabel.nama as var_nama, ragam_variabel.kategori as var_kat, ragam_variabel.posisi as var_posisi, ragam_variabel.keterangan as var_ket, ragam_variabel.strategis as var_indikator from ragam_kategori, ragam_variabel where ragam_variabel.kategori=ragam_kategori.id and ragam_variabel.strategis>='0' order by kat_posisi, var_posisi asc");
	$cek_indikator = $sql_indikator->num_rows;
	$list_indikator=array("error"=>false);
	if ($cek_indikator>0) {
		$list_indikator["error"]=false;
		$list_indikator["tema_var_total"]=$cek_indikator;
		$i=1;
		while ($r=$sql_indikator->fetch_object()) {
			$list_indikator["item"][$i]=array(
				"tema_var_kat_id"=>$r->kat_id,
				"tema_var_kat_nama"=>$r->kat_nama,
				"tema_var_kat_posisi"=>$r->kat_posisi,
				"tema_var_id"=>$r->var_id,
				"tema_var_nama"=>$r->var_nama,
				"tema_var_posisi"=>$r->var_posisi,
				"tema_var_ket"=>$r->var_ket,
				"tema_var_indikator"=>$r->var_indikator
			);
			$i++;
		}
	}
	else {
		$list_indikator["error"]=true;
		$list_indikator["pesan_error"]="data variabel kosong";
	}
	return $list_indikator;
}
?>