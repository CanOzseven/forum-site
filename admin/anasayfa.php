<?php 
error_reporting(0);
?>
<link rel="stylesheet" href="<?php echo URL; ?>\admin\admin.css" type="text/css" media="screen"/>
<div id="header"><div class="header">
<div style="float: right; background-color: #346a94; padding: 5px">Hoþgeldiniz, <?php echo $_SESSION["uye_kadi"]; ?> <a href="<?php echo URL; ?>/?m=cikis">Çýkýþ Yap </a></div>
<h1>Kod Defteri Yönetim Paneli</h1>
<p>Can Özseven & Emre Ince</p>
</div></div>
<div id="menu">
<a href="index.php?git=ayarlar">Genel Ayarlar</a>
<a href="index.php?git=uyeler">Üyeler</a>
<a href="index.php?git=kategoriler">Kategoriler</a>
<a href="index.php?git=yorumlar">Yorumlar</a>

</div>
<div id="icerik">
<?php

$git = $_GET["git"];
Switch($git){

	case "ayarlar";
	include("ayarlar.php");
	break;
	
	case "yorumlar";
	include("yorumlar.php");
	break;
	
	case "uyeler";
	include("uyeler.php");
	break;
	
	case "kategoriler";
	include("kategoriler.php");
	break;
	
	
	
}

?>
</div>