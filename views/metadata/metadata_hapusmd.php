<?php
$md_id=$lvl3;
$md_hapus=get_metadata($md_id);
if ($md_hapus["error"]==TRUE) {
	echo "Metadata ID ".$md_id." yang mau dihapus tidak tersedia <br />";
	echo $md_hapus["pesan_error"];
}
else {
	$md_nama_lama=$md_hapus["items"]['md_nama'];
	if (hapus_metadata($md_id)==TRUE) { echo 'Metadata id '. $md_nama_lama .' sudah dihapus'; }
	else { echo 'Metadata id '. $md_nama_lama .' tidak dapat dihapus'; }
}
?>