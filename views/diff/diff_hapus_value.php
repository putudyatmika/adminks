<?php
$diff_id=$lvl3;
$value_waktu=$lvl4;
if (cekDiffVarValue($diff_id,TRUE,urldecode($value_waktu))==FALSE) {
	echo 'Diff Value ID tidak tersedia';
}
else {
	if (hapus_diff_value($diff_id,urldecode($value_waktu))==TRUE) {
		echo "Diff Value sudah dihapus";
	}
	else {
		echo "Diff Value ID tidak bisa dihapus";
	}
}
?>