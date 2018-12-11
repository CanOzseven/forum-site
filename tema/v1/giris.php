<?php

$kadi = p("kadi");
$sifre = p("sifre");

if (!$kadi || !$sifre){

bilgi ("Lütfen kullanýcý adý ve sifrenizi boþ býrakmayýnýz!!");
}else{

$uyeBul = mysql_query("select * from uyeler where uye_kadi = '$kadi' && uye_sifre = '$sifre'");
$uyeSay = mysql_num_rows($uyeBul);

if ($uyeSay > 0 ){

$uye = mysql_fetch_array($uyeBul);

$_SESSION  ['cancan'] = true;

$_SESSION ['uye_id'] = $uye['uye_id'];
$_SESSION ['uye_kadi'] = $uye['uye_kadi'];
$_SESSION ['uye_rut'] = $uye['uye_rut'];
bilgi ("Foruma baþarýyla giriþ yaptýnýz , yönlendiriliyorsunuz...","ok");
yonlendir(URL,2); 

}else{
 bilgi("Böyle bir kullanýcý forumda kayýtlý gözükmüyor,dogrulugundan emin olun!!");
}
}
?>