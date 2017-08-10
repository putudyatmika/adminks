<?php

if ($act=="kirim") {
	require 'chat_kirim.php';
}
elseif ($act=="view") {
	require 'chat_view.php';
}
elseif ($act=="kirimpm") {
	require 'chat_kirimpm.php';
}
else {
	require 'chat_depan.php';
}
?>