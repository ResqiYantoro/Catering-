<?php
//PROTEKSI HALAMAN ADMIN DG FUNGSI CEK LOGIN YG ADA DI SIMPLE LOGIN
$this->simple_login->cek_login();  

//gabungkan semua bagian layout menjadi satu 
require_once('head.php');
require_once('header.php');
require_once('nav.php');
require_once('content.php');
require_once('footer.php');