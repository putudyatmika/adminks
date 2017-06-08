<?php
//fungsi umum2
function tanggal_panjang($tanggal, $dgnhari=false, $dgnjam=false) {
	$BulanPanjang = array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
	$HariPanjang = array (1 =>'Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu');
	$split = explode(' ', $tanggal);
	$tgl = $split[0];

	$split_tgl = explode('-', $tgl);
	$bln=(int) $split_tgl[1];
	$tgl_indo = (int)($split_tgl[2]) .' '. $BulanPanjang[$bln] .' '. $split_tgl[0];
	$jam = date("H:i",strtotime($tanggal));
	if ($dgnhari) {
		$num = date('N', strtotime($tanggal));
		$tgl_indo_lengkap = $HariPanjang[$num] . ', ' . $tgl_indo;
	}
	if ($dgnjam) {
		$tgl_indo_lengkap = $tgl_indo_lengkap .' '. $jam;
	}
	return $tgl_indo_lengkap;
}

function tanggal_pendek($tanggal, $dgnhari=false, $dgnjam=false) {
	$BulanPendek = array(1=>"Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des");
	$HariPendek = array (1 =>'Sen','Sel','Rab','Kam','Jum','Sab','Min');
	$split = explode(' ', $tanggal);
	$tgl = $split[0];
	$jam = $split[1];

	$split_tgl = explode('-', $tgl);
	$bln=(int) $split_tgl[1];
	$tgl_indo = (int)($split_tgl[2]) .' '. $BulanPendek[$bln] .' '. $split_tgl[0];
	$jam = date("H:i",strtotime($tanggal));
	if ($dgnhari) {
		$num = date('N', strtotime($tanggal));
		$tgl_indo_lengkap = $HariPendek[$num] . ', ' . $tgl_indo;
	}
	if ($dgnjam) {
		$tgl_indo_lengkap = $tgl_indo_lengkap .' '. $jam;
	}
	return $tgl_indo_lengkap;
}
?>