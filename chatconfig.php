<?php 
include "config/linkmysql.php";

session_start();
?> 


<html>
<head> 
<title> Sohbet Ayarlar� </title>
<link rel="stylesheet" type="text/css" href="extensions/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/chat.css">
<link rel="stylesheet" type="text/css" href="css/main-style.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-ui.js"></script>
<script type="text/javascript" src="js/chatsys.js"></script> 
</head>
<body>
<center>
<div class="chatsettings">
<?php 
$kadi = $_SESSION["uyeadi"];
$query = mysql_query("SELECT * FROM uyeayar WHERE uyeadi='$kadi'");
$diz = mysql_fetch_array($query);
	$buttonreq = $diz["buttonreq"];
	$showeditor = $diz["showeditor"];
	$showdate = $diz["showdate"];
	
?> 
    <div class="leftBar">
          <div class="settitle"> Ayarlar Se�kesi </div>
          <div class="hrline"></div>
          <li style="margin-top: 30px;"><a href="#" class="active"><i class="fa fa-navicon"></i> Genel Ayarlar </a></li>
          <li><a href="#"><i class="fa fa-eye"></i> G�r�n�m  </a></li>
          <li><a href="#"><i class="fa fa-universal-access"></i> Eri�ilebilirlik  </a></li>
    </div>
    <div class="notifs">
       <span class="notif-text" style="margin-top: 11px; display: block">Sohbet ��i Ayarlar</span>
     </div>
     <div class="setcontent">
        <div class="option-title">
            <h4>Genel Ayarlar</h4>
        </div>
        <label class="checkbox">
        <input type="checkbox" class="checkbox" name="buttonreq" style="margin-top: 20px;" <?php if ( $buttonreq == 1 ){ echo "checked='checked'"; } ?> >
        <span class="checkbox">
                    <span>
                    </span>
        </span>
      </label>
       <div class="option" style="inline-block;">Mesaj g�ndermek i�in butona t�klamak gereksin.</div>
    <label class="checkbox">
    <input type="checkbox" class="checkbox" name="showeditor" <?php if ( $showeditor == 1 ){ echo "checked='checked'"; } ?>>
    <span class="checkbox">
                <span>
                </span>
    </span>
  </label>
           <div class="option" style="inline-block;">Edit�r se�eneklerini g�ster</div>
<label class="checkbox">
<input type="checkbox" class="checkbox" name="showdate" <?php if ( $showdate == 1 ){ echo "checked='checked'"; } ?>>
<span class="checkbox">
            <span>
            </span>
</span>
</label>
       <div class="option" style="inline-block;">Sohbet blo�unda tarih g�ster</div>
            <div class="save">
                    <input type="submit" value=" KAYDET " class="savebutton" name="save">
                    <input type="submit" value=" KAYDET VE �IK " class="savebutton" name="saveexit">
            </div>
            <div class="cancel">
		<form name="gotoback" action="index.php">
        <input type="submit" value=" �PTAL ET " class="cancelbutton">
		</form>
      </div>
     </div>
</div>
</center>
</body>
</html>