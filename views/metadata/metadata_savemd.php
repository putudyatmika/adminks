<?php
if ($_POST['submit']) {
	$md_nama=$_POST['md_nama'];
	$md_kondef=$_POST['md_kondef'];
	$md_kegunaan=$_POST['md_kegunaan'];
	$md_interpretasi=$_POST['md_interpretasi'];

	if ($md_nama=='' or $md_kondef=='') {
		echo 'Isian masih ada yang kosong';
	}
	else {
	$doit=true;
	while ($doit) {
		$md_id=gen_id_char(8);
		if (cek_mdID($md_id)==FALSE) $doit=FALSE;
	}
	if (save_metadata($md_id,$md_nama,$md_kondef,$md_kegunaan,$md_interpretasi)==TRUE) echo "Metadata berhasil disimpan";
	else echo "mMtadata tidak berhasil disimpan";
	
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