<?php
if ($_POST['submit']) {
	$value_var_id=$_POST['value_var_id'];
	$value_wilayah=urlencode($_POST['value_wilayah']);
	$value_nilai=$_POST['value_nilai'];
	$value_posisi=$_POST['value_posisi'];

	if ($value_var_id=='' or $value_wilayah=='' or $value_nilai=='' or $value_posisi=='') {
		echo 'Isian masih ada yang kosong';
	}
	elseif (cek_value_regVarID($value_var_id,urldecode($value_wilayah))==FALSE) {
		echo 'Data value variabel ini tidak tersedia';
	
	}
	else {
		/*
		echo '
		tema_id : '.$tema_id.'<br />
		var_id : '.$var_id.'<br />
		value_wilayah : '.$value_wilayah.'<br />
		value_nilai : '.$value_nilai.'<br />
		value_posisi : '.$value_posisi.'<br />
		';*/ 
		if (update_reg_value($value_var_id,urldecode($value_wilayah),$value_nilai,$value_posisi)==TRUE) echo "Nilai value berhasil diupdate";
		else echo 'Nilai value tidak bisa di update';
	}
	
	//if (save_newvar($var_id,$var_nama,$var_satuan,$var_posisi,$var_kat_id)==TRUE) echo "Variabel berhasil disimpan";
	//else echo "Variabel tidak berhasil disimpan";
	
}
?>