<?php
if ($act=="value") {
	$var_id=$lvl3;
	$json_value=json_variabel_value($var_id);
	echo json_encode($json_value);
}
elseif ($act=="kat") {
	$tema_id=$lvl3;
	$json_kat=json_get_kategori($tema_id);
	echo json_encode($json_kat);
}
elseif ($act=="var") {
	// /var/kat_id/
	$kat_id=$lvl3;
	$json_kat=json_get_variabel($kat_id);
	echo json_encode($json_kat);
}
?>