
<h1>Genel Ayarlar</h1>
<?php

if ($_POST){

	$site_adresi = $_POST["site_adresi"];
	$site_basligi = $_POST["site_basligi"];
	$site_aciklamasi = $_POST["site_ac"];
	$site_durumu = $_POST["anasayfa"];
	
	$guncelle = mysql_query("update ayarlar set site_adi='$site_adresi', site_aciklamasi='$site_basligi', site_aciklamasi='$site_aciklamasi',site_durum ='$site_durumu'");
	if ($guncelle){
		echo "Ayarlarýnýz kaydedildi";
	}else {
		bilgi("Bir sorun oluþtu");
	}
	
}else { ?>
<form action="" method="post">
<div class="blok">Site Adresi:</div>
<div class="blok"><input type="text" name="site_adresi" value="<?php echo $site_adresi; ?>" class="admin_input" /></div>
<div class="blok">Site Baþlýðý:</div>
<div class="blok"><input type="text" name="site_basligi" value="<?php echo $site_basligi; ?>" class="admin_input" /></div>
<div class="blok">Site Açýklamasý:</div>
<div class="blok"><input type="text" name="site_ac" value="<?php echo $site_aciklamasi; ?>" class="admin_input" /></div>
<div class="blok">Site Durumu : </div>
<div class="blok"><select name="anasayfa" class="admin_select"><option value="1">Açýk</option><option value="0">Kapalý</option></select></div>
<div class="blok"><input type="submit" value="Ayarlarý Kaydet" class="giris_btn" /></div>
</form>
<?php } ?>