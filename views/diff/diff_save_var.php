<?php
if ($_POST['submit']) {
	$var_id=$_POST['var_id'];
	$waktu_id=urlencode($_POST['waktu_id']);
	$diff_var_nama=$_POST['diff_var_nama'];
	$diff_var_satuan=$_POST['diff_var_satuan'];
	$diff_var_ket=$_POST['diff_var_ket'];
	$diff_var_posisi=$_POST['diff_var_posisi'];
	
	if ($var_id=='' or $waktu_id=='' or $diff_var_nama=='' or $diff_var_satuan=='' or $diff_var_posisi=='') {
		echo 'Isian masih ada yang kosong';
	}
	else {
	$doit=true;
	while ($doit) {
		$var_diff_id=gen_id_char(8);
		if (cekVar_Diff_ID($var_diff_id)==FALSE) $doit=FALSE;
	}
	
	if (save_new_diffvar($var_id,urldecode($waktu_id),$var_diff_id,$diff_var_nama,$diff_var_satuan,$diff_var_ket,$diff_var_posisi)==TRUE) echo "Variabel Diff berhasil disimpan";
	else echo "Variabel Diff tidak berhasil disimpan";
	
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