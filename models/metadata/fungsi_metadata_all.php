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
	$sql_metadata = $conn_metadata -> query("select * from metadata_istilah where id='$md_id' limit 1");
	$cek_metadata = $sql_metadata->num_rows;
	$md_data=array("error"=>false);
	if ($cek_metadata>0) {
		$md_data["error"]=FALSE;
		$r=$sql_metadata->fetch_object();
		$md_data["items"]=array(
				"md_nama"=>$r->nama,
				"md_kondef"=>$r->kondef,
				"md_kegunaan"=>$r->kegunaan,
				"md_interpretasi"=>$r->interpretasi
			);
	}
	else {
		$md_data["error"]=TRUE;
		$md_data["pesan_error"]="metadata tidak ditemukan";
	}
	return $md_data;
	$conn_metadata->close();
}
function cek_mdID($md_id) {
	$db_metadata = new db();
	$conn_metadata = $db_metadata -> connect();
	$sql_metadata = $conn_metadata -> query("select * from metadata_istilah where id='$md_id'");
	$cek_metadata = $sql_metadata->num_rows;
	if ($cek_metadata>0) {
		$md_cek=TRUE;
	}
	else {
		$md_cek=FALSE;
	}
	return $md_cek;
	$conn_metadata->close();
}
function save_metadata($md_id,$md_nama,$md_kondef,$md_kegunaan,$md_interpretasi) {
	$db_metadata = new db();
	$conn_metadata = $db_metadata -> connect();
	$sql_metadata = $conn_metadata->query("insert into metadata_istilah(id,nama,kondef,kegunaan,interpretasi) values('$md_id','$md_nama','$md_kondef','$md_kegunaan','$md_interpretasi')") or die(mysqli_error($conn_metadata));
	if ($sql_metadata) {
		$md_status=TRUE;
	}
	else {
		$md_status=FALSE;
	}
	return $md_status;
	$conn_metadata->close();
}

function update_metadata($md_id,$md_nama,$md_kondef,$md_kegunaan,$md_interpretasi) {
	$db_metadata = new db();
	$conn_metadata = $db_metadata -> connect();
	$sql_metadata = $conn_metadata -> query("update metadata_istilah set nama='$md_nama',kondef='$md_kondef', kegunaan='$md_kegunaan', interpretasi='$md_interpretasi' where id='$md_id'") or die(mysqli_error($conn_metadata));
	if ($sql_metadata) {
		$md_cek=TRUE;
	}
	else {
		$md_cek=FALSE;
	}
	return $md_cek;
	$conn_metadata->close();
}
function hapus_metadata($md_id) {
	$db_metadata = new db();
	$conn_metadata = $db_metadata -> connect();
	$sql_metadata = $conn_metadata -> query("delete from metadata_istilah where id='$md_id'");
	if ($sql_metadata>0) {
		$md_cek=TRUE;
	}
	else {
		$md_cek=FALSE;
	}
	return $md_cek;
	$conn_metadata->close();
}
function jumlah_metadata() {
	$db_metadata = new db();
	$conn_metadata = $db_metadata -> connect();
	$sql_metadata = $conn_metadata -> query("select * from metadata_istilah");
	$md_jumlah=$sql_metadata->num_rows;
	return $md_jumlah;
	$conn_metadata->close();
}
?>