<h1 style="margin-bottom:5px">
<div style="float:right"><a style="background:#eee; padding:5px 10px; color:#7e0505;" href="<?php echo URL; ?>/?k=<?php echo g("k"); ?>&m=konu-ac">Konu A�</a></div>
<?php  echo ss($kategori['kategori_adi']); ?> </h1>
<?php if ($ksayisi > 0) { ?>

<div class="sayfaGecisi">
<a href="<?php echo $onceki; ?>">&laquo; �nceki</a>
<a href="<?php echo $sonraki; ?>">Sonraki &raquo; </a>
</div>
<table width="100%">
<thead>
<tr>
<td width="86%"> Konu Ba�l��� </td>
<td width="7%" align="center"> Hit </td>
<td width="7%">Yorum</td>
</tr>
</thead>
<tbody>
<?php foreach ($konular as $konu){ ?>
<?php 

$toplamYorum = mysql_num_rows(mysql_query("select yorum_id from yorumlar where yorum_konu_id = '".$konu['konu_id']."'"));

?>
<tr>
<td><a href="<?php echo URL; ?>/?p=<?php echo $konu['konu_id']; ?>"><?php echo ss($konu['konu_baslik']); ?></a></td>
<td align="center"><?php echo $konu['konu_hit']; ?></td>
<td align="center"><?php echo $toplamYorum; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
<?php }else { ?>

<?php bilgi("Hen�z bu kategoriye hi� konu eklenmemi�.. �lk sen ekleyebilirsin"); ?>
<?php } ?>