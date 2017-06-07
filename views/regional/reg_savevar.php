<?php
if ($_POST['submit']) {
	$var_nama=$_POST['var_nama'];
	$var_satuan=$_POST['var_satuan'];
	$var_ket=$_POST['var_ket'];
	$var_posisi=$_POST['var_posisi'];
	$var_lingkup=$_POST['var_lingkup'];

	if ($var_nama=='' or $var_satuan=='' or $var_posisi=='' or $var_lingkup=='') {
		echo 'Isian masih ada yang kosong';
	}
	else {
	$doit=true;
	while ($doit) {
		$var_id=gen_id_char(8);
		if (cek_regVarID($var_id)==FALSE) $doit=FALSE;
	}
	
	if (save_reg_newvar($var_id,$var_nama,$var_satuan,$var_ket,$var_posisi,$var_lingkup)==TRUE) echo "Variabel berhasil disimpan";
	else echo "Variabel tidak berhasil disimpan";
	
	/*
	echo '
	Doit : '.$doit.' <br />
	var_id : '.$var_id.'<br />
	var_nama : '.$var_nama.'<br />
	var_satuan : '.$var_satuan.'<br />
	var_ket : '.$var_ket.'<br />
	var_posisi : '.$var_posisi.'<br />
	var_lingkup : '.$var_lingkup.'<br />
	';
	*/ 
	
 }
}
?>