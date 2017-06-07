<?php
$var_id=$lvl4;
$value_waktu=$lvl5;
if (cek_VarValue($var_id,urldecode($value_waktu))==FALSE) {
	echo 'Value ID tidak tersedia';
}
else {
	if (hapus_value($var_id,urldecode($value_waktu))==TRUE) {
		echo "Value sudah dihapus";
	}
	else {
		echo "Value ID tidak bisa dihapus";
	}
}
?>