<h1><?php echo ss($uye['uye_kadi']) . "&nbsp &nbsp &nbsp -" . ss($uye['uye_rutbe']); ?></h1><div class="uye">
<div class="uyeSag">
<div class="uyeAvatar">
<span><img src="<?php echo $avatar; ?>" alt="" /></span>
	<ul>
	<li><strong>Ad-Soyad</strong></li>
	<li><?php echo ss($uye['uye_adi']).' '.ss($uye['uye_soyadi']); ?></li>
	<li><strong>Ya�ad��� �ehir</strong></li>
	<li><?php echo ss($uye['uye_sehir']); ?></li>
	<li><strong>Mesle�i </strong></li>
	<li><?php echo ss($uye['uye_meslek']); ?></li>
	</ul>
<div class="uyeSol">

<h2>�ye istatistikleri</h2>
<ul>
<li><strong>Toplam Konu</strong><?php echo  number_format($konu); ?></li>
<li><strong>Toplam Yorum</strong><?php echo  number_format($yorum); ?></li>
</ul>
</div>
</div>
</div>
</div>
<div class="clear"></div>