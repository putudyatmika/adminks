<?php
 if ($act=="addmd") {
 	require "metadata_addmd.php";
 }
 elseif ($act=="savemd") {
 	require 'metadata_savemd.php';
 }
 elseif ($act=="editmd") {
 	require 'metadata_editmd.php';
 }
 elseif ($act=="updatemd") {
 	require 'metadata_updatemd.php';
 }
 elseif ($act=="hapusmd") {
 	require "metadata_hapusmd.php";
 }
 else {
   require "metadata_depan.php";
 }
?>