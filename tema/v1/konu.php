<h1><?php echo ss($konu['konu_baslik']); ?></h1>
<div class="konu">

<div class="konuSag">
<?php echo ss(nl2br($konu['konu_icerik'])); ?>
<?php if ($uye['uye_imza']){ ?>
<div class="forumimza">
<?php echo ss($uye['uye_imza']); ?>
</div>
<?php } ?>
</div>
<div class="postBit">	
<h3><?php echo ss($uye['uye_kadi']); ?></h3>
<div class="rutbe"><?php echo ss($uye['uye_rutbe']); ?></div>
<div class="pbAvatar">
<a href="#">
<img src="<?php  echo $avatar; ?>"  width="100" height="100"/>
</a>
</div>
<ul>
	<li>Konu : <?php echo $Tkonu; ?></li>
	<li>Yorum : <?php echo $Tyorum; ?></li>
</ul>
</div>
</div>
<div id="yorumlar">
<?php yorumlar($konu['konu_id']); ?> 
</div>
<div class="clear"></div>
<div id="yorumyap">
<?php if($_SESSION['cancan']){?>
<?php if($konu['konu_tip'] == 0 ){ ?>
<?php bilgi("Bu konu kilitli olduðu için yorum yapamazsýnýz!!"); ?>
<?php }else {  ?>
<h2>Yorum Yap</h2>
<?php if($_POST){
	$yorum = p("yorum");
	$ekleyen = $_SESSION['uye_id'];
	$tarih = time();
	$kid = g("p");
	
	if (!$yorum){
	bilgi ("Lütfen birþeyler girdikten sonra yorum göndermeyi deneyiniz");
	}else{
	$ekle = mysql_query("insert into yorumlar set
	yorum_ekleyen = '$ekleyen',
	yorum_icerik = '$yorum',
	yorum_tarih = '$tarih',
	yorum_konu_id = '$kid'");
	
	if ($ekle){
	$sonid = mysql_insert_id();
	$uyeGuncelle = mysql_query("update uyeler set uye_yorum = uye_yorum +1 where uye_id = '$ekleyen'");
	$guncelle = mysql_query("update konular set konu_guncellenme = '$tarih' where konu_id = '$kid'");
	$katGuncelle = mysql_query("update kategoriler set kategori_yorum = kategori_yorum + 1 where kategori_id = '$katid'");
	 yonlendir(URL.'/?p='. $kid. '#yorum'.$sonid);
	}else{
	bilgi ("Maalesef yorumunuz eklenemedi, belkide yolunda gitmeyen birþeyler oldu..");
	}
	}
}
?>

<form action="" method="post">
<span><textarea name="yorum"  cols="30" rows="10"  ></textarea></span>
<span><button type="submit"><span>Gönder</span></span></button>
</form>
 
<?php } ?>

<?php }else ?>

<?php bilgi("Forum Konularýna yorum yapabilmeniz için üye olmanýz gerekiyor.."); ?>

</div>