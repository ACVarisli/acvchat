<?php 
include("../config/linkmysql.php");
error_reporting('0');
header('Content-type: text/html; charset=utf-8');
session_start();

/* required variables */

$kadi = $_SESSION["uyeadi"];
$buttonreq = $_POST["buttonreq"];
$showeditor = $_POST["showeditor"];
$showdate = $_POST["showdate"];
$save = $_POST["save"];
$save_exit = $_POST["saveexit"];

if ( isset($save) ){

	if ( isset($buttonreq)){
		$updatesettings = mysql_query(" UPDATE uyeayar SET buttonreq=1 WHERE uyeadi='$kadi' ");
	}else{
		$updatesettings = mysql_query(" UPDATE uyeayar SET buttonreq=0 WHERE uyeadi='$kadi' ");
	}

	if ( isset($showeditor) ){
		$updatesettings = mysql_query(" UPDATE uyeayar SET showeditor=1 WHERE uyeadi='$kadi' ");
	}else{
		$updatesettings = mysql_query(" UPDATE uyeayar SET showeditor=0 WHERE uyeadi='$kadi' ");
	}

	if ( isset($showdate) ){
		$updatesettings = mysql_query(" UPDATE uyeayar SET showdate=1 WHERE uyeadi='$kadi' ");
	}else{
		$updatesettings = mysql_query(" UPDATE uyeayar SET showdate=0 WHERE uyeadi='$kadi' ");
	}

	if ( $updatesettings ){
		echo "Başarılı";
	}else{
		echo "Başarısız :/";
	}

}else if ( isset($save_exit) ){
	echo "Kaydet ve çık ile geldiniz";
}else{
	echo "Bu sayfayı bu biçimde görüntüleyemezsiniz.";
}

?> 
