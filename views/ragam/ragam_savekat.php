<?php
if ($_POST['submit']) {
	$tema_id=$_POST['tema_id'];
	$kat_nama=$_POST['kat_nama'];
	$kat_posisi=$_POST['kat_posisi'];

	if ($tema_id=='' or $kat_nama=='' or $kat_posisi=='') {
		echo 'Isian masih ada yang kosong';
	}
	else {
	$doit=true;
	while ($doit) {
		$kat_id=gen_id_char(4);
		if (cek_katID($kat_id)==FALSE) $doit=FALSE;
	}
	if (save_newkat($tema_id,$kat_nama,$kat_posisi,$kat_id)==TRUE) echo "Kategori berhasil disimpan";
	else echo "Kategori tidak berhasil disimpan";
	/*
	echo '
	Doit : '.$doit.' <br />
	tema_id : '.$tema_id.'<br />
	kat_id : '.$kat_id.'<br />
	kat_nama : '.$kat_nama.'<br />
	kat_posisi : '.$kat_posisi.'<br />
	';
	*/
 }
}
?>