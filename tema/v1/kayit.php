<h1>Kay�t ol </h1>
<div class="kayit">
<span></span>
<?php
if ($_POST){
$kadi = p("kkadi");
$sifre = p("sifre");
$eposta = p("eposta");
$tarih = time();
$onay = $ayar['site_uyeonay'];

if (!$kadi || !$sifre || !$eposta){
bilgi ("L�tfen t�m alanlar� doldurduktan sonra deneyiniz!!");
	
}else{
$uyeBul = mysql_query("select * from uyeler where uye_kadi='$kadi' || uye_eposta='$eposta'");
$uyesay = mysql_num_rows($uyeBul);
if ($uyesay > 0 ){
	bilgi("B�yle bir kullan�c� forumda zaten var.");
}else{
	$ekle = mysql_query("insert into uyeler set
	uye_kadi = '$kadi',
	uye_sifre = '$sifre',
	uye_eposta = '$eposta',
	uye_rutbe = '$uye_rutbe',
	uye_rut = '0',
	uye_onay = '$onay'");
	}
	if ($ekle) {
	bilgi("Ba�ar�yla Kay�t oldunuz{$mesaj}","ok");
	yonlendir(URL,4);
	}else{
	
	bilgi ("Bir sorun olustu ve kay�t basar�s�z oldu.. <br/>");
	}
} 
}

?>

<form action="" method="post">
<span>Kullan�c� Ad� : </span>
<span><input type="text" name="kkadi" /></span>
<span>�ifre : </span>
<span><input type="password" name="sifre" /></span>
<span>E- Posta :</span>
<span><input type="text" name="eposta" /></span>
<span><button type="submit"><span>Kay�t ol</button></span></span> 
</form>
</div>
