<?php
if ($_POST['submit']) {
	$tema_id=$_POST['tema_id'];
	$var_id=$_POST['var_id'];
	$value_waktu=urlencode($_POST['value_waktu']);
	$value_nilai=$_POST['value_nilai'];
	$value_posisi=$_POST['value_posisi'];

	if ($tema_id=='' or $var_id=='' or $value_waktu=='' or $value_nilai=='' or $value_posisi=='') {
		echo 'Isian masih ada yang kosong';
	}
	elseif (cek_VarValue($var_id,urldecode($value_waktu))==TRUE) {
		echo 'Data value variabel ini sudah tersedia';
	
	}
	else {
		/*
		echo '
		tema_id : '.$tema_id.'<br />
		var_id : '.$var_id.'<br />
		value_waktu : '.$value_waktu.'<br />
		value_nilai : '.$value_nilai.'<br />
		value_posisi : '.$value_posisi.'<br />
		';*/ 
		if (save_newvalue($var_id,urldecode($value_waktu),$value_nilai,$value_posisi)==TRUE) echo "Nilai value berhasil disimpan";
		else echo 'Nilai value tidak bisa di simpan';
	}
	
	//if (save_newvar($var_id,$var_nama,$var_satuan,$var_posisi,$var_kat_id)==TRUE) echo "Variabel berhasil disimpan";
	//else echo "Variabel tidak berhasil disimpan";
	
}
?>