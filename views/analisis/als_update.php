<?php
if ($_POST['submit']) {
	$als_judul=$_POST['als_judul'];
	$als_isi=$_POST['als_isi'];
	$als_id=$_POST['als_id'];

	if ($als_judul=='' or $als_isi=='') {
		echo 'Isian masih ada yang kosong';
	}
	else {
	
	if (update_als($als_id,$als_judul,$als_isi)==TRUE) { echo "Analisis lintas sektoral berhasil diupdate"; }
	else { echo "analisis lintas sektoral tidak berhasil disimpan"; }
	
	
 	}
}
?>