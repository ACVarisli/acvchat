<?php
error_reporting(0);

$db_name     ="acvsql";
$db_pass       ="";
$db_user       ="root";
$db_host       ="localhost";

$db_link = @mysql_connect($db_host, $db_user, $db_pass) or die(mysql_error());

mysql_select_db($db_name, $db_link) or die(mysql_error());
mysql_query("SET CHARSET latin5");

?>
