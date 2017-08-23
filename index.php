<?php

session_start();
require_once('config_db.php');
require('models/models.php');


if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
else $ip=$_SERVER['REMOTE_ADDR'];

$tanggal_hari_ini=date("Y-m-d");

//mengolah url request
$url_asli = explode("/",$_SERVER["REQUEST_URI"]);
$url_db=explode("/",$app_url);
if ($url_db[2] != $_SERVER['HTTP_HOST']) {
  print "<meta http-equiv=\"refresh\" content=\"0; URL=".$app_url."\">";
}
require('models/url/fungsi_url_lokal.php');
//require('models/url/fungsi_url_net.php');

/*
//check session
if (!isset($_SESSION['hotel_user_id']) or empty($_SESSION['hotel_user_id']))
     {
		require ('views/login/login.php');
		exit();
	 }

*/
if ($page=="json") {
	require_once 'views/json/m_json.php';
	exit();
}	 
if ($act=="confirmimport") {
	include 'plugins/phpexcel/PHPExcel/IOFactory.php';
}
require ('main.php');
/*
echo '
	Segmen1 : '. $segmen1.' <br />
	Segmen2 : '. $segmen2.' <br />
	page : '.$page.' <br />
	act : '.$act.' <br />
	lvl3 : '.$lvl3.' <br />
	lvl4 : '.$lvl4.' <br />
	lvl5 : '.$lvl5.' <br />
	NamaHeader : '.$NamaHeader[$page].'<br />
	';
	*/
?>