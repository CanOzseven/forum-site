<?php 

$bul = mysql_query("select * from kategoriler where kategori_tip= 0 ");

while ($goster = mysql_fetch_array($bul)){
$id = $goster['kategori_id'];

?>

<h1><?php echo ss($goster['kategori_adi']); ?></h1>

<table width="100%">

<thead>
<tr>
<td width="60%">Kategori Adý </td>
<td width="7%" align="center"> Konu </td>
<td width="7%"align="center" >Yorum</td>
<td>Son Cevap</td>
</tr>
</thead>
<tbody>
<?php
$altkatBul = mysql_query("select * from kategoriler where kategori_tip = '$id' order by kategori_sira asc");

while ($altKat = mysql_fetch_array($altkatBul)){

$link = URL . '/?k=' . $altKat['kategori_id'];
$konu = mysql_num_rows(mysql_query("select konu_id from konular where konu_kategori = '".$altKat['kategori_id']."'"));
$yorum = mysql_num_rows(mysql_query("select yorumlar.yorum_id from konular inner join yorumlar on yorumlar.yorum_konu_id = konular.konu_id where konu_kategori = '".$altKat['kategori_id']."'"));
$katid = $altKat['kategori_id'];
$sonKonu = mysql_fetch_array(mysql_query("select * from konular where konu_kategori = '$katid' order by konu_guncellenme desc limit 1"));
$sonkonuid = $sonKonu['konu_id'];
$yorumBul = mysql_query("select * from yorumlar where yorum_konu_id = '$sonkonuid' order by yorum_id desc limit 1");
$yorumSay = mysql_num_rows($yorumBul);
if ($yorumSay > 0){
$yorumGoster = mysql_fetch_array($yorumBul);
$ekleyen = $yorumGoster['yorum_ekleyen'];
}else{
$ekleyen = $sonKonu['konu_ekleyen'];
}
$uyeBul = mysql_query("select * from uyeler where uye_id = '$ekleyen'");
$uyeGoster = mysql_fetch_array($uyeBul);

?>
<tr>

<td>
<a href="<?php echo $link; ?>"><?php echo ss($altKat['kategori_adi']); ?></a>
<span><?php echo ss($altKat['kategori_desc']); ?></span>

</td>
<td align="center"><?php echo $konu ?></td>
<td align="center"><?php echo $yorum ?></td>
<td>
<?php if ($konu > 0 ){ ?>
<a href="<?php echo URL; ?>/?p=<?php echo  $sonKonu['konu_id']; ?>"><?php echo ss($sonKonu['konu_baslik']); ?></a>
<span><a href="<?php echo URL;?>/?u=<?php echo $uyeGoster['uye_id']; ?>" style="color:#333"><?php echo $uyeGoster['uye_kadi']; ?></a></span>
<?php }else{ ?>
<em style="color: #656565">Henüz Hiç Konu yok. </em>
<?php } ?>
</td>
</tr>
<?php } ?>
</tbody>
</table>
<?php } ?>

<!--Ýstatistikler-->
<div class="istatistikler">
<?php 

$xKonu = mysql_num_rows(mysql_query("select konu_id from konular"));
$xYorum = mysql_num_rows(mysql_query("select yorum_id from yorumlar"));
$xUye = mysql_num_rows(mysql_query("select uye_id from uyeler"));
?>

KodDefteri Forumda toplam <span><?php echo $xKonu; ?></span> Konuya , <span><?php echo $xYorum; ?></span> cevap yazýlmýstýr.. Toplam Üyesi <span><?php echo $xUye; ?> </span> Kiþidir.
</div>
<!--#Ýstatistikler-->