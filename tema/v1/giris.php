<?php

$kadi = p("kadi");
$sifre = p("sifre");

if (!$kadi || !$sifre){

bilgi ("L�tfen kullan�c� ad� ve sifrenizi bo� b�rakmay�n�z!!");
}else{

$uyeBul = mysql_query("select * from uyeler where uye_kadi = '$kadi' && uye_sifre = '$sifre'");
$uyeSay = mysql_num_rows($uyeBul);

if ($uyeSay > 0 ){

$uye = mysql_fetch_array($uyeBul);

$_SESSION  ['cancan'] = true;

$_SESSION ['uye_id'] = $uye['uye_id'];
$_SESSION ['uye_kadi'] = $uye['uye_kadi'];
$_SESSION ['uye_rut'] = $uye['uye_rut'];
bilgi ("Foruma ba�ar�yla giri� yapt�n�z , y�nlendiriliyorsunuz...","ok");
yonlendir(URL,2); 

}else{
 bilgi("B�yle bir kullan�c� forumda kay�tl� g�z�km�yor,dogrulugundan emin olun!!");
}
}
?>