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
	$kat_id=$lvl3;
	$var_id=$lvl4;
	$json_kat=json_get_kategori($tema_id);
	echo json_encode($json_kat);
}
?>