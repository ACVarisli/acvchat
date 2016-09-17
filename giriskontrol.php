<?php
session_start();
include "config/linkmysql.php";

if ( $_POST ){

$time = time();

$kadi = strip_tags(trim($_POST["kadi"]));
$sifre = strip_tags(trim($_POST["sifre"]));

$bul = mysql_query("SELECT * FROM uyeler WHERE uyeadi = '$kadi' && uyesifre = '$sifre'");
$say = mysql_num_rows($bul);
   if ( $say > 0 ){
            $goster = mysql_fetch_array($bul);
            $_SESSION["oturum"] = true;
            $_SESSION["uyeadi"] = $kadi;
            $_SESSION["rutbe"] = $goster["admin"];
            $_SESSION["ban"] = $goster["ban"];
            $_SESSION["id"] = $goster["uyeid"];

            $oturum_ekle = mysql_query("UPDATE uyeler SET sonetkinlik='$time' WHERE uyeadi='$kadi'");

            echo " giriş başarılı ";
   }else{
            echo "böyle bir kullanıcı yok, bizi mi koparıyorsun anlamadım ki.";
   }

}else{
   echo "Burası POST edilmeli.";
}

?>
