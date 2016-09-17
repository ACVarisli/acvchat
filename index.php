<?php
include "config/linkmysql.php";

session_start();
?>
<!DOCTYPE html>
<html>
<head>
<title> ACV Chat v1.0</title>
<link rel="stylesheet" href="extensions/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet"  type="text/css" href="css/main-style.css">
<link rel="stylesheet" type="text/css" href="css/chat.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/index-animation.js"></script>
<script type="text/javascript" src="js/chat-animations.js"></script>
<script type="text/javascript" src="extensions/jquery.slimscroll.min.js"></script>
    <meta charset="utf8">
</head>
<body>

   <?php  if (!isset($_SESSION["oturum"])){  ?>

<header id="topBar">
   <div class="reg-button"><i class="fa fa-user-plus"></i>  Üyelik Oluştur</div>
</header>
<div class="parent">
   <center>

      <div class="register">
         <div class="icon-for-reg">
            <i class="fa fa-user-plus"></i>
            <i class="fa fa-times" style="display: none;"></i>
         </div>
         <!-- Kay?t Formu -->
      <h1 style="margin-top: 10px; margin-bottom:  30px; color: #27ad60;"> Kay?t  </h1>
      <form name="kayit" method="POST" action="kayityazdir.php">
      <div class="input-block">
         <i class="fa fa-user"></i>
      <input type="text" name="kadi_reg" placeholder="  Kullan?c? ad?n?z." class="girisinput" autocomplete="off" maxlength="15">
      </div>
      <div class="input-block">
         <i class="fa fa-key"></i>
      <input type="password" name="sifre_reg" placeholder="  ?ifreniz" class="girisinput" autocomplete="off" maxlength="21">
      </div>

      <div class="input-block">
         <i class="fa fa-key"></i>
      <input type="password" name="t_sifre" placeholder="  ?ifre Tekrar?" class="girisinput" autocomplete="off" maxlength="21">
      </div>
      <div class="input-block">
         <i class="fa fa-envelope"></i>
      <input type="text" name="eposta" placeholder="  E-Postan?z" class="girisinput" autocomplete="off" maxlength="25">
      </div>
      <input type="submit"  value="Kay?t Ol" class="kayitbtn" style="margin-top: 30px;">
      </form>
      </div>

<div class="login">
   <div class="icon">
      <i class="fa fa-user"></i>
      <i class="fa fa-times" style="display: none;"></i>
   </div>
   <!-- Giri? Formu -->
<h1 style="margin-top: 10px; margin-bottom:  30px;"> Giri?  </h1>
<form name="giris" method="POST" action="giriskontrol.php">
<div class="input-block">
   <i class="fa fa-user"></i>
<input type="text" name="kadi" placeholder="  Kullan?c? ad?n?z." class="girisinput" autocomplete="off" maxlength="15" >
</div>
<div class="input-block">
   <i class="fa fa-key"></i>
<input type="password" name="sifre" placeholder="  ?ifreniz" class="girisinput" autocomplete="off" maxlength="21">
</div>
<input type="submit"  value="Giri? Yap" class="girisbtn" style="margin-top: 30px;">
</form>
</div>
<div class="attention">
  <i class="fa fa-exclamation-triangle fa-2x"></i> <div class="text" style="margin-top: 5px;">  <h2>Bo? alan b?rakamazs?n?z.</h2> </div>
</div>
</center>
</div>
</div>

<?php }else{ ?>
<script type="text/javascript" src="js/chatsys.js"></script>
<div class="profile-head">
   <h2>Ho?geldin <span class="profile-name"><?php $kadi = $_SESSION["uyeadi"];  echo $kadi; ?>!</span></h2>
        <li><a href="profil.php" style="text-decoration:none; color: #fff;" class="gear"><i class="fa fa-gear"></i></a></li>
        <li><a href="cikis.php" style="text-decoration:none; color: #fff;"><i class="fa fa-sign-out"></i> Ç?k?? Yap </a></li>
</div>
<center>
<div id="sohbet">
   <div class="sohbetList">
     <div class="title"> <span class="title"><i class="fa fa-group"></i> &nbsp  Çevrimiçi Kullan?c?lar</span>
       <?php
          session_start();
       ?>
     </div>
     <div class="sohbetlist-content flip">
     </div>
<div class="sohbetList-opt">
    <div class="opt-block"><i class="fa fa-times"></i>

    </div>
</div>
 </div>
   <div class="notifs">
      <span class="notif-text" style="margin-top: 11px; display: block">Sohbet</span>
      <?php $admin = $_SESSION["rutbe"]; if( $admin == 1 ){ ?> <span class="trashicon">
        <a href="javascript:void(0)" onclick="chatClear();"><i class="fa fa-trash"></i></a> </span> <?php } ?>
        <span class="slidericon">
         <a href="ayarlar"><i class="fa fa-sliders"></i></a> </span>
   </div>
   <div class="sohbeticerik">  </div>
<div class="messageArea">
   <i class=" fa fa-comment"></i>

   <?php $ban_status = $_SESSION["ban"];
   if ( $ban_status == 0 ) { ?>
       <input type="text" name="mesaj" class="mesajBlock" style="margin-top: 1px;"
              placeholder="  Çekinme, bir ?eyler yaz!">
       <?php $sorgu = mysql_query(" SELECT * FROM uyeayar WHERE uyeadi='$kadi' ");
       $cek = mysql_fetch_array($sorgu);
       $showed = $cek["showeditor"];

       if ($showed == 1) {

       ?>
       <div class="editor">
           <div class="bg-for-opt"><i class="fa fa-bold"></i></div>
           <div class="bg-for-color"><i class="fa fa-paint-brush"></i></div>
       </div>
       <?php
   }
       ?>
   <?php }else{ ?>
      <input type="text" name="mesaj" class="mesajBlock" style="margin-top: 1px;" placeholder="  Siz, bu sohbete mesaj iletemezsiniz!" disabled="disabled">
     <?php } ?>
</div>
</div>
<div class="changed-opt" style="display: none;">
<span class="check">  <i class="fa fa-check"></i> Kalın yazma aktifleştirildi. </span>
</div>
</center>
<?php } ?>

<footer id="nav">
    <i class="fa fa-code" style="color: #F39C12;   opacity: 0.6;"></i> <span class="text">with</span>
    <i class="fa fa-heart" style="color: #E74C3C;   opacity: 0.6;"></i>
    <span class="text"> by </span>
    <a href="http://www.facebook.com/acvfeysbuq"> ACV </a>
</footer>
</body>
</html>
