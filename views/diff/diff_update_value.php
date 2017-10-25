<?php
if ($_POST['submit']) {
	$diff_id=$_POST['diff_id'];
	$value_waktu=urlencode($_POST['value_waktu']);
	$value_nilai=$_POST['value_nilai'];
	$value_posisi=$_POST['value_posisi'];

	if ($diff_id=='' or $value_waktu=='' or $value_nilai=='' or $value_posisi=='') {
		echo 'Isian masih ada yang kosong';
	}
	elseif (cekDiffVarValue($diff_id,TRUE,urldecode($value_waktu))==FALSE) {
		echo 'Data value variabel diff ini tidak tersedia';
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
		if (update_diff_value($diff_id,urldecode($value_waktu),$value_nilai,$value_posisi)==TRUE) echo "Nilai value diff berhasil diupdate";
		else echo 'Nilai value diff tidak bisa di update';
	}
	
	//if (save_newvar($var_id,$var_nama,$var_satuan,$var_posisi,$var_kat_id)==TRUE) echo "Variabel berhasil disimpan";
	//else echo "Variabel tidak berhasil disimpan";
	
}
?>