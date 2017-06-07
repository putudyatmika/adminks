<?php
if ($_POST['submit']) {
	$var_id=$_POST['var_id'];
	$var_nama=$_POST['var_nama'];
	$var_satuan=$_POST['var_satuan'];
	$var_ket=$_POST['var_ket'];
	$var_posisi=$_POST['var_posisi'];
	$var_lingkup=$_POST['var_lingkup'];

	if ($var_nama=='' or $var_satuan=='' or $var_posisi=='' or $var_lingkup=='') {
		echo 'Isian masih ada yang kosong';
	}
	elseif (cek_regVarID($var_id)==FALSE) {
		echo 'Variabel ID tidak tersedia';
	}
	else {
		
	if (update_reg_variabel($var_id,$var_nama,$var_satuan,$var_ket,$var_posisi,$var_lingkup)==TRUE) echo "Variabel berhasil diupdate";
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