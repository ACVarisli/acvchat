<?php
session_start();
include "config/linkmysql.php";


if (isset($_SESSION["oturum"])){
      session_destroy();
      unset($_SESSION["oturum"]);
   echo "çıkış başarılı";
}else{
   echo "sorun oluştu";
}

?>
