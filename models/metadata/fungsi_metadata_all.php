<?php
function list_metadata_all() {
	$db_metadata = new db();
	$conn_metadata = $db_metadata -> connect();
	$sql_metadata = $conn_metadata -> query("select * from metadata_istilah order by nama asc");
	$cek_metadata = $sql_metadata->num_rows;
	$list_metadata=array("error"=>false);
	if ($cek_metadata>0) {
		$list_metadata["error"]=false;
		$list_metadata["md_total"]=$cek_metadata;
		$i=1;
		while ($r=$sql_metadata->fetch_object()) {
			$list_metadata["item"][$i]=array(
				"md_id"=>$r->id,
				"md_nama"=>$r->nama,
				"md_kondef"=>$r->kondef,
				"md_kegunaan"=>$r->kegunaan,
				"md_interpretasi"=>$r->interpretasi
			);
			$i++;
		}
	}
	else {
		$list_metadata["error"]=true;
		$list_metadata["pesan_error"]="data variabel kosong";
	}
	return $list_metadata;
	$conn_metadata->close();
}
function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }
function truncate($str, $width) {
    return strtok(wordwrap($str, $width, "...\n"), "\n");
}

function get_metadata($md_id) {
	$db_metadata = new db();
	$conn_metadata = $db_metadata -> connect();
	$sql_metadata = $conn_metadata -> query("select * from metadata_istilah where id='$md_id'");
	$cek_metadata = $sql_metadata->num_rows;
	$md_data=array("error"=>false);
	if ($cek_metadata>0) {
		$md_data["error"]=false;
		$r=$sql_metadata->fetch_object();
		$md_data["items"]=array(
				"md_nama"=>$r->nama,
				"md_kondef"=>$r->kondef,
				"md_kegunaan"=>$r->kegunaan,
				"md_interpretasi"=>$r->interpretasi
			);
	}
	else {
		$md_data["error"]=true;
		$md_data["pesan_error"]="metadata tidak ditemukan";
	}
	return $md_data;
	$conn_metadata->close();
}
?>