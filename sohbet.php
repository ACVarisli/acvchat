<?php
session_start();
include "config/linkmysql.php";

header("Content-type: text/html; charset=ISO-8859-9");

$ban_status = $_SESSION["ban"];
$type = strip_tags($_POST["type"]);
$boldcontrol = $_POST["bold"];
$mesaj = iconv("UTF-8", "ISO-8859-9",  strip_tags(trim($_POST["mesaj"])));
$kullanici = $_SESSION["uyeadi"];
$rutbe = $_SESSION["rutbe"];
date_default_timezone_set('Europe/Istanbul');
$tarih = date("H:i:s");

$bilgicek = mysql_query("SELECT * FROM uyeler WHERE uyeadi ='$kullanici'");
while( $diz = mysql_fetch_array($bilgicek)){
    $bandurumu = $diz["ban"];
}
if ($bandurumu == 0){

    Switch($type){

        case "gonder";
            if ( empty($mesaj)){
                echo "empty";
            }else{
                $open = fopen("mesajlar.txt", "ab");
                $addqueue = $tarih."\t".$kullanici."\t".$mesaj."\t".$rutbe."\t".$boldcontrol."\t".$ban_status."\n";
                $add = fwrite($open, $addqueue);
            }
            break;
        case "guncelle";
            $file = file("mesajlar.txt");
            arsort($file);
            if (empty($file)){
                header('Content-type: text/plain; charset=utf-8');
                echo " <div class='clearAttent'><span style='color: #fff'><i class='fa fa-check'></i> Sohbet temiz. </span></div>";
                echo "<div class='banned-block' style='opacity: 0.6; height: 275px;'><i class='fa fa-smile-o'></i> <span class='ban-text'>Hey! burası çok ıssız, bi' o kadar da ferah...</span></div>";
            }else{
                $top = count($file);
                $maks = 100;
                $kalan = $maks - $top  ;
                echo "<div class='clearAttent'><span style='color: #fff'><i class='fa fa-trash'></i> Mesajlar $kalan mesaj sonra silinecektir. </span></div>";
                foreach($file as $mesaj){

                    $bol = explode("\t", $mesaj);
                    if ( $top >= 100 ){
                        unlink("mesajlar.txt");
                        touch("mesajlar.txt");
                    }else{

                        if ( $bol[3] == 1 ){
                            echo"<div class='messagebox'>
              <div class='id-for-admin'>$bol[1]</div>";  if( $bol[4] == 1){
                                echo "<strong><span class='msg'> {$bol[2]} </span></strong>";
                            }else{
                                echo "<span class='msg'> {$bol[2]} </span>";
                            }
                            if ( $rutbe == 1 ){

                                if ( $kullanici != $bol[1] ){
                                    echo "<div class='date' style='margin-right: 30px;'>{$bol[0]}</div><div class='admin-opt'><i class='fa fa-ban'></i> </div> </div>";
                                }else{
                                    echo "<div class='date'>{$bol[0]}</div> </div>";
                                }
                            }else{
                                echo "<div class='date'>{$bol[0]}</div> </div>";
                            }
                        }else{
                            echo"<div class='messagebox'>
                <div class='id'>$bol[1]</div>";  if( $bol[4] == 1 ){
                                echo "<strong><span class='msg'> {$bol[2]} </span></strong>";
                            }else{
                                echo "<span class='msg'> {$bol[2]} </span>";
                            }
                            if ( $rutbe == 1 ){
                                if ( $kullanici != $bol[1] ){
                                    if ($bandurumu == 1){
                                        echo " Üye banlı!";
                                    }else{
                                        echo "<div class='date' style='margin-right: 28px;'>{$bol[0]}</div><div class='admin-opt'><i class='fa fa-ban'></i> </div> </div>";
                                    }
                                }else{
                                    echo "<div class='date'>{$bol[0]}</div> </div>";
                                }
                            }else{
                                echo "<div class='date'>{$bol[0]}</div> </div>";
                            }
                        }
                    }
                }
            }
            break;

        case "temizle";
            unlink("mesajlar.txt");
            touch("mesajlar.txt");
            break;

    }
}else{
    header('Content-type: text/plain; charset=utf-8');
    echo "<div class='banned-block'><i class='fa fa-warning'></i> <span class='ban-text'>Sohbetten uzaklaştırıldınız.</span></div>";
}

$time = time();
if ( $ban_status == 0 ){
    $oturum_ekle = mysql_query("UPDATE uyeler SET sonetkinlik='$time' WHERE uyeadi='$kullanici'");
}else{

}

?>
