<h1>Profil D�zenle</h1>

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
	bilgi ("�ifre ve E-posta alan� bo� ge�ilemez...");
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
	bilgi ("Bilgiler ba�ar�yla g�ncellendi","ok");
	yonlendir (URL.'/?m=profil',1);
	}else{
	bilgi ("Bir Sorun olu�tu g�ncelleme iptal oldu .. L�tfen Bir daha deneyin! <br/> Mysql Hatas�" .mysql_error());
	}
	}
?>
<form action="" method="post">
<span>�ifre : </span>
<span><input type="text" name="sifre" value="<?php echo ss($uye['uye_sifre']);?>"/></span>
<span>E-Posta : </span>
<span><input type="text" name="epost" value="<?php echo ss($uye['uye_eposta']);?>"/></span>
<span>Forum �mzas� :</span>
<span><input type="text" name="imza" value="<?php echo ss($uye['uye_imza']);?>"/></span>
<span>Ad�n�z:</span>
<span><input type="text" name="ad" value"<?php echo ss($uye['uye_adi']);?>"/></span>
<span>Soyad�n�z : </span>
<span><input type="text" name="soyad" value="<?php echo ss($uye['uye_soyadi']);?>"/></span>
<span>�ehir : </span>
<span><input type="text" name="sehir" value="<?php echo ss($uye['uye_sehir']);?>"/></span>
<span>Meslek : </span>
<span><input type="text" name="meslek" value="<?php echo ss($uye['uye_meslek']);?>"/></span>
<span><button type="submit"><span>Bilgileri G�ncelle</span></button></span>
</form>
</div>