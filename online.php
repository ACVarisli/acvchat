<?php
    include "config/linkmysql.php";
	$_SESSION["uyeadi"] = $kullanici;

  $time = time();
  $oturum_ekle = mysql_query("UPDATE uyeler SET sonetkinlik='$time' WHERE uyeadi='$kullanici'");
  $time_check = time()-30;
  $sorgu = mysql_query("SELECT* FROM uyeler WHERE  sonetkinlik > '$time_check'");
    while ( $diz = mysql_fetch_array($sorgu)){
        echo "<div class='onlineuser'> ";
          echo $diz['uyeadi']; echo "<i class='fa fa-circle' style='color: #16a085; margin-right: 10px;'></i>  </div>";
        }
?>
