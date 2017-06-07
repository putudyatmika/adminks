<?php
if ($_POST['submit']) {
	$tema_id=$_POST['tema_id'];
	$var_kat_id=$_POST['var_kat_id'];
	$var_nama=$_POST['var_nama'];
	$var_satuan=$_POST['var_satuan'];
	$var_ket=$_POST['var_ket'];
	$var_posisi=$_POST['var_posisi'];
	if (isset($_POST['var_indikator'])) {
		$var_indikator=$_POST['var_indikator'];
	}
	else {
		$var_indikator="";
	}

	if ($tema_id=='' or $var_kat_id=='' or $var_nama=='' or $var_satuan=='' or $var_posisi=='') {
		echo 'Isian masih ada yang kosong';
	}
	else {
	$doit=true;
	while ($doit) {
		$var_id=gen_id_char(8);
		if (cek_varID($var_id)==FALSE) $doit=FALSE;
	}
	
	if (save_newvar($var_id,$var_nama,$var_satuan,$var_posisi,$var_kat_id,$var_indikator,$var_ket)==TRUE) echo "Variabel berhasil disimpan";
	else echo "Variabel tidak berhasil disimpan";
	
	/*
	echo '
	Doit : '.$doit.' <br />
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