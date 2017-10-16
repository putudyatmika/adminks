<?php
require 'umum/vars.php';
require 'umum/class_db.php';
require 'ragam/fungsi_ragam_list.php';
require 'umum/fungsi_gen_id.php';
require 'ragam/fungsi_ragam_kategori.php';
require 'ragam/fungsi_ragam_variabel.php';
require 'ragam/fungsi_ragam_hapus.php';
require 'ragam/fungsi_box_dashboard.php';
//models untuk regional
require 'regional/fungsi_reg_list.php';
require 'regional/fungsi_reg_variabel.php';
require 'regional/fungsi_reg_value.php';
require 'regional/fungsi_reg_box_dashboard.php';
//models untuk indikator strategis
require 'indikator/fungsi_indikator_list.php';
//models untuk metadata
require 'metadata/fungsi_metadata_all.php';
//models untuk analisis
require 'analisis/fungsi_als_all.php';
require 'umum/fungsi_umum.php';
//models chat users
require 'chat/fungsi_chat_user.php';
require 'chat/fungsi_chat_pesan.php';
//model diff 
require 'diff/fungsi_diff_all.php';
//model json
require 'json/fungsi_json.php';
?>