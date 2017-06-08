<?php
$als_id=$lvl3;
$als_hapus=get_als($als_id);
if ($als_hapus["error"]==TRUE) {
	echo "Analisis Lintas Sektoral ID ".$als_id." yang mau dihapus tidak tersedia <br />";
	echo $als_hapus["pesan_error"];
}
else {
	$als_judul_lama=$als_hapus["item"]['als_judul'];
	if (hapus_als($als_id)==TRUE) { echo 'Analisis Lintas Sektoral Judul '. $als_judul_lama .' sudah dihapus'; }
	else { echo 'Analisis Lintas Sektoral Judul '. $als_judul_lama .' tidak dapat dihapus'; }
}
?>