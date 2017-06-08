<?php
if ($_POST['submit']) {
	$als_judul=$_POST['als_judul'];
	$als_isi=$_POST['als_isi'];
	

	if ($als_judul=='' or $als_isi=='') {
		echo 'Isian masih ada yang kosong';
	}
	else {
	
	if (save_als($als_judul,$als_isi)==TRUE) echo "Analisis lintas sektoral berhasil disimpan";
	else echo "analisis tidak berhasil disimpan";
	
	/*
	echo '
	Doit : '.$doit.' <br />
	md_id : '.$md_id.'<br />
	md_nama : '.$md_nama.'<br />
	md_kondef : '.$md_kondef.'<br />
	md_kegunaan : '.$md_kegunaan.'<br />
	md_interpretasi : '.$md_interpretasi.'<br />
	'; */
	
 }
}
?>