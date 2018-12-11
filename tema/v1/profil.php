<h1>Profil Düzenle</h1>

<div class="kayit">

<span></span>
<?php

if ($_POST){
	$sifre = p("sifre");
	$eposta = p("epost");
	$imza = p ("imza");
	$ad = p("ad");
	$soyad = p("soyad");
	$sehir = p("sehir");
	$meslek = p("meslek");
	
	
	if (!$sifre || !$eposta){
	bilgi ("Þifre ve E-posta alaný boþ geçilemez...");
	}else{ 
	
	$guncell = mysql_query("update uyeler set
	uye_sifre = '$sifre',
	uye_eposta = '$eposta',
	uye_imza = '$imza',
	uye_adi = '$ad',
	uye_soyadi = '$soyad',
	uye_sehir = '$sehir',
	uye_meslek = '$meslek'
	where uye_id = '$uyeid'");
	}
	if ($guncell){
	bilgi ("Bilgiler baþarýyla güncellendi","ok");
	yonlendir (URL.'/?m=profil',1);
	}else{
	bilgi ("Bir Sorun oluþtu güncelleme iptal oldu .. Lütfen Bir daha deneyin! <br/> Mysql Hatasý" .mysql_error());
	}
	}
?>
<form action="" method="post">
<span>Þifre : </span>
<span><input type="text" name="sifre" value="<?php echo ss($uye['uye_sifre']);?>"/></span>
<span>E-Posta : </span>
<span><input type="text" name="epost" value="<?php echo ss($uye['uye_eposta']);?>"/></span>
<span>Forum Ýmzasý :</span>
<span><input type="text" name="imza" value="<?php echo ss($uye['uye_imza']);?>"/></span>
<span>Adýnýz:</span>
<span><input type="text" name="ad" value"<?php echo ss($uye['uye_adi']);?>"/></span>
<span>Soyadýnýz : </span>
<span><input type="text" name="soyad" value="<?php echo ss($uye['uye_soyadi']);?>"/></span>
<span>Þehir : </span>
<span><input type="text" name="sehir" value="<?php echo ss($uye['uye_sehir']);?>"/></span>
<span>Meslek : </span>
<span><input type="text" name="meslek" value="<?php echo ss($uye['uye_meslek']);?>"/></span>
<span><button type="submit"><span>Bilgileri Güncelle</span></button></span>
</form>
</div>