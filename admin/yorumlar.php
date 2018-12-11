<?php
 

if ($id = $_GET["duzenle"]){
	
	$yorum = $_POST["yorum"];
	
	$yorumGuncelle = mysql_query("update yorumlar set yorum_icerik='$yorum' where yorum_id='$id'");
	if ($yorumGuncelle){
		header("Location:index.php?git=yorumlar");
	}else {
		echo '<div class="hata"><strong>Bir Sorun Oluþtu!!</strong>Yorum Güncellenemedi!!</div>';
	}
	
}elseif ($id = $_GET["sil"]){
	
	$yorumSil = mysql_query("delete from yorumlar where yorum_id='$id'");
	if ($yorumSil){
		header("Location:index.php?git=yorumlar");
	}else {
		echo '<div class="hata">Yorum silinemedi!!</div>';
	}
	
}else {
	
	$yorumBul = mysql_query("select * from yorumlar");
	$yorumSay = mysql_num_rows($yorumBul);
	if ($yorumSay > 0){
		
		$kacar = 5;
		$ksayisi = mysql_num_rows(mysql_query("select * from yorumlar"));
		$ssayisi = ceil($ksayisi/$kacar);
		$yorumBulma = mysql_query("select * from yorumlar");
		while ($yorumGoster = mysql_fetch_array($yorumBulma)){
			if (is_numeric($yorumGoster["yorum_ekleyen"])){
				$uyeID = $yorumGoster["yorum_ekleyen"];
				$uyeBul = mysql_query("select uye_id,uye_kadi from uyeler where uye_id='$uyeID'");
				$uyeGoster = mysql_fetch_assoc($uyeBul);
				$uye = $uyeGoster["uye_kadi"];
			}else {
				$uye = $yorumGoster["yorum_ekleyen"];
			}
			echo '<div class="yorum">
			<span><div style="float: right"><a href="index.php?git=yorumlar&sil='.$yorumGoster["yorum_id"].'">Sil</a></div><strong>'.$uye.'</strong> tarafýndan yazýldý!!</span>
			<form action="index.php?git=yorumlar&duzenle='.$yorumGoster["yorum_id"].'" method="post">
			<textarea name="yorum" rows="0" cols="0" class="adminTextarea"';
			echo '>'.$yorumGoster["yorum_icerik"].'</textarea>';
			echo '</select><input type="submit" value="Güncelle" class="giris_btn " /></span>
			</form>
			</div>';
		}
		echo '<div class="sayfala">';
		for ($i=1; $i<=$ssayisi; $i++){
			echo '<a href="index.php?git=yorumlar&sayfa='.$i.'"';
			if ($sayfa == $i){ echo ' class="aktif"';}
			echo '>'.$i.'</a>';
		}
		echo '</div>';
		
	}else {
echo '<h1><span style="float: right"></span>Yorumlar</h1>';
		bilgi ("Henüz yorum eklenmemis");
	}
	
}

?>