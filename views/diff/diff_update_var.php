<?php
if ($_POST['submit']) {
	$var_id=$_POST['var_id'];
	$var_diff_id=$_POST['diff_id'];
	$waktu_id=urlencode($_POST['waktu_id']);
	$diff_var_nama=$_POST['diff_var_nama'];
	$diff_var_satuan=$_POST['diff_var_satuan'];
	$diff_var_ket=$_POST['diff_var_ket'];
	$diff_var_posisi=$_POST['diff_var_posisi'];
	
	if ($var_id=='' or $waktu_id=='' or $diff_var_nama=='' or $diff_var_satuan=='' or $diff_var_posisi=='') {
		echo 'Isian masih ada yang kosong';
	}
	elseif (cekVar_Diff_ID($var_diff_id)==FALSE) {
		echo 'Variabel Diff ID tidak tersedia';
	}
	
	else {
	if (update_diffvar($var_id,urldecode($waktu_id),$var_diff_id,$diff_var_nama,$diff_var_satuan,$diff_var_ket,$diff_var_posisi)==TRUE) echo "Variabel Diff berhasil diupdate";
	else echo "Variabel Diff tidak berhasil diupdate";
	
	/*
	update_diffvar($var_id,$waktu_id,$var_diff_id,$var_nama,$var_satuan,$var_ket,$var_posisi)
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