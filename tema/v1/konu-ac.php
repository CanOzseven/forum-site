<h1>Yeni Konu A�</h1>

<div class="kayit">
<span></span>
<?php
	if ($_POST){
	
	$baslik = p("baslik");
	$icerik = p("icerik");
	$ekleyen = $_SESSION['uye_id'];
	$tarih = time();
	$katid = g("k");
	
	if (!$baslik || !$icerik){
	bilgi ("Ba�l�k ve  i�eri�i bo� b�rakmay�n!!");
	}else {
	$ekle = mysql_query("insert into konular set
	konu_baslik = '$baslik',
	konu_icerik = '$icerik',
	konu_ekleyen = '$ekleyen',
	konu_tarih = '$tarih',
	konu_guncellenme = '$tarih',
	konu_tip = 1,
	konu_kategori = '$katid'");
	
	if ($ekle){
	$sonid= mysql_insert_id();
	$kategoriGuncelle= mysql_query("update kategoriler set kategori_konu = kategori_konu + 1 where kategori_id = '$kid'");
	$uyeGuncelle = mysql_query("update uyeler set uye_konu = uye_konu + 1 where uye_id ='$ekleyen'");
	yonlendir(URL. '/?p='. $sonid);
	}else{
	bilgi ("Bir sorun olu�tu ve konu eklenemedi..<br/>");
	}
	}
	}
?>
<form action="" method="post">
<span>Konu Ba�l���:</span>
<span><input type="text" name="baslik" /></span>
<span>Konu ��eri�i:</span>
<span><textarea name="icerik"></textarea></span>
<span><button type="submit"><span>Konuyu A�</span></button></span>
</form>
</div>