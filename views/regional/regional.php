<?php
include 'reg_box_dashboard.php';
if ($act=="addvar") {
	require 'reg_addvar.php';
}
elseif ($act=="savevar") {
	require 'reg_savevar.php';
}
elseif ($act=="editvar") {
	require 'reg_editvar.php';
}
elseif ($act=="updatevar") {
	require 'reg_updatevar.php';
}
elseif ($act=="hapusvar") { //belum
	require "reg_hapusvar.php";
}
elseif ($act=="addvalue") {
	require 'reg_addvalue.php';
}
elseif ($act=="savevalue") {
	require "reg_savevalue.php";
}
elseif ($act=="editvalue") {
	require "reg_editvalue.php";
}
elseif ($act=="updatevalue") {
	require "reg_updatevalue.php";
}
elseif ($act=="hapusvalue") {
	require "reg_hapusvalue.php";
}
elseif ($act=="imporvalue") {
	require "reg_importexcel_value.php";
}
elseif ($act=="confirmimport") {
	require "reg_confirmimport.php";
}
elseif ($act=="saveimport") {
	require "reg_saveimport.php";
}
else {
	require 'reg_list.php';
}
?>