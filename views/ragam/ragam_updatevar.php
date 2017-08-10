<?php
if ($_POST['submit']) {
	$tema_id=$_POST['tema_id'];
	$var_id=$_POST['var_id'];
	$var_kat_id=$_POST['var_kat_id'];
	$var_nama=$_POST['var_nama'];
	$var_satuan=$_POST['var_satuan'];
	$var_ket=$_POST['var_ket'];
	$var_posisi=$_POST['var_posisi'];
	$var_metadata=$_POST['var_metadata'];
	if (isset($_POST['var_indikator'])) {
		$var_indikator=$_POST['var_indikator'];
	}
	else {
		$var_indikator="";
	}

	if ($tema_id=='' or $var_kat_id=='' or $var_nama=='' or $var_satuan=='' or $var_posisi=='') {
		echo 'Isian masih ada yang kosong';
	}
	elseif (cek_varID($var_id)==FALSE) {
		echo 'Variabel ID tidak tersedia';
	}
	else {
		
	if (update_variabel($var_id,$var_nama,$var_satuan,$var_posisi,$var_ket,$var_kat_id,$var_indikator,$var_metadata)==TRUE) echo "Variabel berhasil diupdate";
	else echo "Variabel tidak bisa diupdate";
	
	/*
	echo '
	tema_id : '.$tema_id.'<br />
	var_kat_id : '.$var_kat_id.'<br />
	var_id : '.$var_id.'<br />
	var_nama : '.$var_nama.'<br />
	var_satuan : '.$var_satuan.'<br />
	var_ket : '.$var_ket.'<br />
	var_posisi : '.$var_posisi.'<br />
	'; */
	
 }
}
?>