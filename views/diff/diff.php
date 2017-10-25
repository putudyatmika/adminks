<?php
if ($act=="add") {
	//require 'diff_add_var.php';
	echo 'Fungsi ini belum berfungsi silakan menggunakan add variabel diff dari ragam value';
}
elseif ($act=="tmbh") {
	require 'diff_tmbh_var.php';
}
elseif ($act=="addvalue") {
	require 'diff_tmbh_value.php';
}
elseif ($act=="savevalue") {
	require 'diff_save_value.php';
}
elseif ($act=="savevar") {
	require 'diff_save_var.php';
}
elseif ($act=="editvar") {
	require 'diff_edit_var.php';
}
elseif ($act=="updatevar") {
	require 'diff_update_var.php';
}
elseif ($act=="hapusvar") {
	require 'diff_hapus_var.php';
}
elseif ($act=="editvalue") {
	require 'diff_edit_value.php';
}
elseif ($act=="updatevalue") {
	require 'diff_update_value.php';
}
elseif ($act=="hapusvalue") {
	require 'diff_hapus_value.php';
}
elseif ($act=="imporvalue") {
	require 'diff_impor_value.php';
}
elseif ($act=="saveimpor") {
	require 'diff_save_impor_value.php';
}
elseif ($act=="confirmimport") {
	require 'diff_confirm_impor_value.php';
}
else {
	require 'diff_list.php';
}
?>