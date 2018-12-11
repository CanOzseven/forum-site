<div class="yorum" id="yorum<?php echo $yorum['yorum_id']; ?>">
<div class="clear"></div>
<div class="konuSag">
<?php echo ss(nl2br($yorum['yorum_icerik'])); ?>
<div class="forumimza">
<?php echo ss($uye['uye_imza']); ?>
</div>
</div>


<div class="postBit">
<div class="pbAvatar">
<div class="clear"></div>
<h3><?php echo ss($uye['uye_kadi']); ?></h3>
<div class="rutbe"><?php echo ss($uye['uye_rutbe']); ?></div>
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
<div class="clear"></div>