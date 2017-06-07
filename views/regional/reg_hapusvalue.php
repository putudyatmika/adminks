<?php
$var_id=$lvl3;
$value_wilayah=$lvl4;
if (cek_value_regVarID($var_id,urldecode($value_wilayah))==FALSE) {
	echo 'Value ID tidak tersedia';
}
else {
	if (hapus_reg_value($var_id,urldecode($value_wilayah))==TRUE) {
		echo "Value sudah dihapus";
	}
	else {
		echo "Value ID tidak bisa dihapus";
	}
}
?>