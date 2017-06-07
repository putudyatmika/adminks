<?php
if ($_POST['submit']) {
	$tema_id=$_POST['tema_id'];
	$kat_id=$_POST['kat_id'];
	$kat_nama=$_POST['kat_nama'];
	$kat_posisi=$_POST['kat_posisi'];

	if ($tema_id=='' or $kat_nama=='' or $kat_posisi=='' or $kat_id=='') {
		echo 'Isian masih ada yang kosong';
	}
	else {
	if (update_kategori($kat_nama,$kat_posisi,$kat_id)==TRUE) echo "Kategori berhasil diupdate";
	else echo "Kategori tidak bisa diupdate";
	/*
	echo '
	tema_id : '.$tema_id.'<br />
	kat_id : '.$kat_id.'<br />
	kat_nama : '.$kat_nama.'<br />
	kat_posisi : '.$kat_posisi.'<br />
	';
	*/
 }
}
?>