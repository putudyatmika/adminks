<?php
//menampilkan box dashboard
include 'ragam_box_dashboard.php';
if ($act=="addkat") {
	require 'ragam_addkat_form.php';
}
elseif ($act=="savekat") {
	require 'ragam_savekat.php';
}
elseif ($act=="editkat") {
	require 'ragam_editkat_form.php';
}
elseif ($act=="updatekat") {
	require 'ragam_updatekat.php';
}
elseif ($act=="addvar") {
	require 'ragam_addvar.php';
}
elseif ($act=="savevar") {
	require 'ragam_savevar.php';
}
elseif ($act=="editvar") {
	require 'ragam_editvar.php';
}
elseif ($act=="updatevar") {
	require 'ragam_updatevar.php';
}
elseif ($act=="addvalue") {
	require 'ragam_addvalue.php';
}
elseif ($act=="addvalueonly") {
	require 'ragam_addvalue_only.php';
}
elseif ($act=="savevalue") {
	require 'ragam_savevalue.php';
}
elseif ($act=="editvalue") {
	require 'ragam_editvalue.php';
}
elseif ($act=="updatevalue") {
	require 'ragam_updatevalue.php';
}
elseif ($act=="hapuskat") {
	require 'ragam_hapus_kat.php';
}
elseif ($act=="hapusvar") {
	require 'ragam_hapus_variabel.php';
}
elseif ($act=="hapusvalue") {
	require 'ragam_hapus_value.php';
}
elseif ($act=="imporvalue") {
	require 'ragam_imporvalue.php';
}
elseif ($act=="saveimport") {
	require 'ragam_saveimport.php';
}
elseif ($act=="confirmimport") {
	require 'ragam_confirmimport.php';
}
elseif ($act=="view") {
	require 'ragam_list_kategori.php';
}
elseif ($act=="viewonly") {
	require 'ragam_list_kategori_only.php';
}
else {
	
}

?>