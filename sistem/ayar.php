<?php

error_reporting(0);
 $host = 'localhost';
 $user = 'root' ;
 $pass = '' ;
 $db = 'forum' ;
 
 $baglan = mysql_connect($host,$user,$pass) or die (mysql_error());
 mysql_select_db($db,$baglan) or die (mysql_error());
 mysql_query ("SET CHARACTER SET utf8");
 
 ## Ayarlar ##
 $ayarBul = mysql_query("select * from ayarlar");
 $ayar = mysql_fetch_array($ayarBul);
 
 ##Sabitler ##
 
 define ("URL" , $ayar['site_url']);
 define ("TEMA", 'tema/' . $ayar['site_tema']);
 define ("TEMA_URL", $ayar['site_url']. '/tema/' . $ayar['site_tema']);
 define ("KATLIMIT", $ayar['site_katlimiti']); 
?> 
