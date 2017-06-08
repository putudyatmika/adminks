<?php

if ($act=="addals") {
	require 'als_add.php';
}
elseif ($act=="saveals") {
	require 'als_save.php';
}
elseif ($act=="editals") {
	require 'als_edit.php';
}
elseif ($act=="updateals") {
	require 'als_update.php';
}
elseif ($act=="hapusals") {
	require 'als_hapus.php';
}
else {
	require 'als_depan.php';
}
?>