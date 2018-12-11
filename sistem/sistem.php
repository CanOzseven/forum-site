<?php

function g($par){

	return trim(strip_tags($_GET[$par]));
}
function p($par,$par2 = true){	
$deger = $_POST[$par];

if ($par2){
$deger = htmlspecialchars($deger);
}else{
$deger = $deger;
}
return trim(mysql_real_escape_string(strip_tags($deger)));
}
function bilgi($par,$par2 = 'hata'){

echo '<div class="'.$par2.'">'.$par.' </div>';
}
function yonlendir ($url, $zaman = false ){
if ($zaman){
header ("Refresh: {$zaman}; url={$url}");
}else {
header ("location:{$url}");
}
}
function ss($par){
	return stripslashes($par);
}
function icerik(){
#Konu#
if ($id = g ("p")){
$konuBul =  mysql_query("select * from konular where konu_id = '$id'");
$konuSay = mysql_num_rows($konuBul);
if ($konuSay > 0 ){	
$konu = mysql_fetch_array($konuBul);
$konuid = $konu['konu_id'];
if (!$_COOKIE["p_".$konu]){
$guncelle = mysql_query("update konular set konu_hit = konu_hit + 1 where konu_id = '$konuid'");
setcookie("p_".$konuid, ":)", time()+749899779);
}
$uyeid = $konu['konu_ekleyen'];
$uyeBul = mysql_query("select * from uyeler where uye_id = '$uyeid'");
$uye = mysql_fetch_array($uyeBul);
$Tkonu = mysql_num_rows(mysql_query("select konu_id from konular where konu_ekleyen = '$uyeid'"));
$Tyorum = mysql_num_rows(mysql_query("select yorum_id from yorumlar where yorum_ekleyen = '$uyeid'"));
$avatar = "/".$GLOBALS["tema_adresi"]."/images/avataryok.png";
require(TEMA. '/konu.php');
}else{
	bilgi("Böyle bir konu bulunmuyor , konunun doðruluðundan emin olunuz!");
	}
##Kategori##
}elseif ($id = g("k")){
	if (g("m")){
		if ($_SESSION['cancan']){
		require(TEMA.'/konu-ac.php');
		}else{
		bilgi ("Ziyaretçiler foruma KONU  ekleyemezler..");
		}
}else{
	
$kategoriBul = mysql_query("select * from kategoriler where kategori_id = '$id' && kategori_tip !=0");
$kategoriSay =mysql_num_rows($kategoriBul);
if ($kategoriSay > 0 ){

$kategori = mysql_fetch_array($kategoriBul);
$katid = $kategori['kategori_id'];
$konular = array();
$sayfa = g("s") ? g("s") : 1;
$ksayisi = mysql_num_rows(mysql_query("select konu_id from konular where konu_tip = 1 && konu_kategori = '$katid'"));
$limit = KATLIMIT;
$ssayisi = ceil($ksayisi/$limit);
$baslangic = ($sayfa*$limit) - $limit;
$onceki = URL.'/?k='.g("k").'&s='.(g("s") > 1  ? $sayfa - 1 : 1);
$sonraki =URL.'/?k='.g("k").'&s='. (g("s") < $ksayisi ? $sayfa+1 : $ksayisi);
$konuBul = mysql_query("select * from konular where konu_tip=1 && konu_kategori = '$katid'order by konu_guncellenme desc limit $baslangic, $limit");
while ($konu = mysql_fetch_array($konuBul)){
	$konular[] = $konu;
} 
require (TEMA. '/kategori.php');

}else{
bilgi ("Böyle bir kategori forumda bulunmuyor, lütfen doðruluðundan emin olun!");

}
}
}
##ÜYE ##
elseif($id = g("u")){
$uyeBul = mysql_query("select * from uyeler where uye_id = '$id'");
$uyeSay = mysql_num_rows($uyeBul);
if ($uyeSay > 0){
	$uye = mysql_fetch_array($uyeBul);
	$avatar = "/".$GLOBALS["tema_adresi"]."/images/avataryok.png";
	require(TEMA.'/uye.php');
}else{
bilgi ("Böyle bir üye, forumda kayýtlý deðil...");
}
}
elseif ($mod = g ("m")){
 if ($mod == 'giris'){
 if ($_POST){
 if (!$_SESSION['cancan']){
 require(TEMA.'/giris.php');
 }else{
 yonlendir(URL);
 }
 }else{
 yonlendir (URL);
 }
 ##KAYÝT##
 }elseif ($mod == 'kayit'){
 if (!$_SESSION['cancan']){
 require (TEMA.'/kayit.php');
 }else{
 yonlendir(URL);
 }}
 ##CIKIS##
elseif($mod== 'cikis'){
 if ($_SESSION['cancan']){
session_destroy();
yonlendir(URL);
 }else{
 yonlendir(URL);
 }
 }
 ##PROFÝL ##
 
 elseif($mod =='profil'){
 if ($_SESSION['cancan'])

 $uyeid = $_SESSION['uye_id'];
 $uyeBul = mysql_query("select * from uyeler where uye_id = '$uyeid'");
 $uye = mysql_fetch_array($uyeBul);
 require (TEMA.'/profil.php');
 }else{
	bilgi("Bu Bölüme girmeye yetkiniz bulunmuyor..");
 }
}else{
 require(TEMA.'/anasayfa.php');
}
}
function yorumlar($id){
$yorumBul = mysql_query("select * from yorumlar where yorum_konu_id = '$id'");
while ($yorum = mysql_fetch_array($yorumBul)){
$uyeid = $yorum['yorum_ekleyen'];
$uyeBul = mysql_query("select * from uyeler where uye_id = '$uyeid'");
$uye = mysql_fetch_array($uyeBul);
$Tkonu = mysql_num_rows(mysql_query("select konu_id from konular where konu_ekleyen = '$uyeid'"));
$Tyorum = mysql_num_rows(mysql_query("select yorum_id from yorumlar where yorum_ekleyen = '$uyeid'"));
$avatar = "/".$GLOBALS["tema_adresi"]."/images/noavatar.png";
 require(TEMA . '/yorum.php'); 
}
}
?>
