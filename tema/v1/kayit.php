<h1>Kayýt ol </h1>
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
bilgi ("Lütfen tüm alanlarý doldurduktan sonra deneyiniz!!");
	
}else{
$uyeBul = mysql_query("select * from uyeler where uye_kadi='$kadi' || uye_eposta='$eposta'");
$uyesay = mysql_num_rows($uyeBul);
if ($uyesay > 0 ){
	bilgi("Böyle bir kullanýcý forumda zaten var.");
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
	bilgi("Baþarýyla Kayýt oldunuz{$mesaj}","ok");
	yonlendir(URL,4);
	}else{
	
	bilgi ("Bir sorun olustu ve kayýt basarýsýz oldu.. <br/>");
	}
} 
}

?>

<form action="" method="post">
<span>Kullanýcý Adý : </span>
<span><input type="text" name="kkadi" /></span>
<span>Þifre : </span>
<span><input type="password" name="sifre" /></span>
<span>E- Posta :</span>
<span><input type="text" name="eposta" /></span>
<span><button type="submit"><span>Kayýt ol</button></span></span> 
</form>
</div>
