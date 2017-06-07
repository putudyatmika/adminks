<?php
if ($_POST['submit']) {
	$tema_id=$_POST['tema_id'];
	$var_id=$_POST['var_id'];
	$value_waktu=$_POST['value_waktu'];
	$value_nilai=$_POST['value_nilai'];
	$value_posisi=$_POST['value_posisi'];
	

	if ($tema_id=='' or $var_id=='' or $value_waktu=='' or $value_nilai=='' or $value_posisi=='') {
		echo 'Isian masih ada yang kosong';
	}
	elseif (cek_VarValue($var_id,$value_waktu)==FALSE) {
		echo 'Data value variabel ini tidak tersedia';
	
	}
	else {
		
	if (update_newvalue($var_id,$value_waktu,$value_nilai,$value_posisi)==TRUE) echo "Value berhasil diupdate";
	else echo "Value tidak bisa diupdate";
	
	/*
	echo '
	tema_id : '.$tema_id.'<br />
	var_id : '.$var_id.'<br />
	value_waktu : '.$value_waktu.'<br />
	value_nilai : '.$value_nilai.'<br />
	value_posisi : '.$value_posisi.'<br />
	'; */
	
 }
}
?>