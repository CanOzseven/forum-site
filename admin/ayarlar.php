
<h1>Genel Ayarlar</h1>
<?php

if ($_POST){

	$site_adresi = $_POST["site_adresi"];
	$site_basligi = $_POST["site_basligi"];
	$site_aciklamasi = $_POST["site_ac"];
	$site_durumu = $_POST["anasayfa"];
	
	$guncelle = mysql_query("update ayarlar set site_adi='$site_adresi', site_aciklamasi='$site_basligi', site_aciklamasi='$site_aciklamasi',site_durum ='$site_durumu'");
	if ($guncelle){
		echo "Ayarlar�n�z kaydedildi";
	}else {
		bilgi("Bir sorun olu�tu");
	}
	
}else { ?>
<form action="" method="post">
<div class="blok">Site Adresi:</div>
<div class="blok"><input type="text" name="site_adresi" value="<?php echo $site_adresi; ?>" class="admin_input" /></div>
<div class="blok">Site Ba�l���:</div>
<div class="blok"><input type="text" name="site_basligi" value="<?php echo $site_basligi; ?>" class="admin_input" /></div>
<div class="blok">Site A��klamas�:</div>
<div class="blok"><input type="text" name="site_ac" value="<?php echo $site_aciklamasi; ?>" class="admin_input" /></div>
<div class="blok">Site Durumu : </div>
<div class="blok"><select name="anasayfa" class="admin_select"><option value="1">A��k</option><option value="0">Kapal�</option></select></div>
<div class="blok"><input type="submit" value="Ayarlar� Kaydet" class="giris_btn" /></div>
</form>
<?php } ?>