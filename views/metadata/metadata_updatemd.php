<?php
if ($_POST['submit']) {
	$md_id=$_POST['md_id'];
	$md_nama=$_POST['md_nama'];
	$md_kondef=$_POST['md_kondef'];
	$md_kegunaan=$_POST['md_kegunaan'];
	$md_interpretasi=$_POST['md_interpretasi'];

	if ($md_id=='' or $md_nama=='' or $md_kondef=='') {
		echo 'Isian masih ada yang kosong';
	}
	elseif (cek_mdID($md_id)==FALSE) {
		echo "Metadata ID ini tidak tersedia";
	} 
	else {	
		if (update_metadata($md_id,$md_nama,$md_kondef,$md_kegunaan,$md_interpretasi)==TRUE) echo "Metadata berhasil diupdate";
		else echo "mMtadata tidak berhasil diupdate";
	}
 }
?>