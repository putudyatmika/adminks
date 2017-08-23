<?php
if ($act=="value") {
	$var_id=$lvl4;
	$json_value=json_variabel_value($var_id);
	echo json_encode($json_value);
}

?>