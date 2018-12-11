<?php


if ($id = $_GET["duzenle"]){

	$katBul = mysql_query("select * from kategoriler where kategori_id='$id'");
	$katSay = mysql_num_rows($katBul);
	
	if ($katSay > 0){
		
		if ($_POST){
		
			$kategori_adi = $_POST["kategori_adi"];
			$kategori_aciklamasi = $_POST["kategori_aciklamasi"];
			$kategori_tip = $_POST["kategori_tipi"];
		    $kategori_sirasi = $_POST["kategori_sira"];
			
			$katGuncelle = mysql_query("update kategoriler set kategori_adi='$kategori_adi', kategori_desc='$kategori_aciklamasi' , kategori_tip='$kategori_tip', kategori_sira='$kategori_sirasi' where kategori_id='$id'");
			if ($katGuncelle){
				header("Location:index.php?git=kategoriler");
			}else {
				bilgi("Bir Sorun Oluþtu","Kategori güncellenemedi!!");
			}
		
		}else {
		
			$katGoster = mysql_fetch_array($katBul);
			echo '<h1>Kategori Düzenle:</h1>
			<form action="" method="post">
			<div class="blok">Kategori Adý:</div>
			<div class="blok"><input type="text" name="kategori_adi" value="'.$katGoster["kategori_adi"].'" class="admin_input" /></div>
			<div class="blok">Kategori Açýklamasý:</div>
			<div class="blok"><input type="text" name="kategori_aciklamasi" value="'.$katGoster["kategori_desc"].'" class="admin_input"/></div>
			<div class="blok">Kategori Tipi : </div>
			<div class="blok"><input type="text" name="kategori_tipi" value="'.$katGoster["kategori_tip"].'" class="admin_input" /></div>
			<div class="blok">Kategori Sirasi : </div>
			<div class="blok"><input type="text" name="kategori_sirasi" value="'.$katGoster["kategori_sira"].'" class="admin_input" /></div>
			<div class="blok"><input type="submit" value="Kategoriyi Düzenle" class="giris_btn" /></div>
			</form>';
			
		}
		
	}else {
	echo "baþarýyla güncellestirildi";
		header("Location:index.php?git=kategoriler");
	}

}elseif ($id = $_GET["sil"]){

	$katSil = mysql_query("delete from kategoriler where kategori_id='$id'");
	if ($katSil){
		header("Location:index.php?git=kategoriler");
	}else {
		bilgi("Bir Sorun Oluþtu","Kategori silinemedi!!");
	}

}elseif ($_GET["ekle"]){

	if ($_POST){
	
		$kategori_adi = $_POST["kategori_adi"];
		$kategori_aciklamasi = $_POST["kategori_aciklamasi"];
		$kategori_tip = $_POST["kategori_tip"];
		$kategori_sirasi = $_POST["kategori_sira"];
		
		$katGuncelle = mysql_query("insert into kategoriler (kategori_adi,kategori_desc,kategori_tip,kategori_sira) values ('$kategori_adi','$kategori_aciklamasi','$kategori_tip','$kategori_sirasi')");
		if ($katGuncelle){
			header("Location:index.php?git=kategoriler");
		}else {
			bilgi("Bir Sorun Oluþtu","Kategori güncellenemedi!!");
		}
	
	}else {
	
		echo '<h1>Kategori Ekle</h1>
		<form action="" method="post">
		<div class="blok">Kategori Adý:</div>
		<div class="blok"><input type="text" name="kategori_adi" class="admin_input" /></div>
		<div class="blok">Kategori Açýklamasý:</div>
		<div class="blok"><input type="text" name="kategori_aciklamasi" class="admin_input"/></div>
		<div class="blok">Kategori Tipi :</div>
		<div class="blok"><input type="text" name="kategori_tip" class="admin_input"/></div>
		<div class="blok">Kategori Sirasi :</div>
		<div class="blok"><input type="text" name="kategori_sira" class="admin_input"/></div>
		<div class="blok"><input type="submit" value="Kategori Ekle" class="giris_btn" /></div>
		</form>';
		
	}

}else {

	echo '<h1><span style="float: right"><a href="index.php?git=kategoriler&ekle=kategori" style="color: yellow">Kategori Ekle</a></span>Kategori Listesi</h1>';
	$katBul = mysql_query("select * from kategoriler");
	while ($katGoster = mysql_fetch_array($katBul)){
	
		echo '<div class="blok"><div style="float: right"><a style="background-color: red; color: #fff; padding: 2px" href="index.php?git=kategoriler&duzenle='.$katGoster["kategori_id"].'">Düzenle</a> <a style="background-color: red; color: #fff; padding: 2px" href="index.php?git=kategoriler&sil='.$katGoster["kategori_id"].'">Sil</a></div>'.$katGoster["kategori_adi"].'</div>';
	
	}

}

?>