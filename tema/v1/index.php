<html>
<head>
<title>KodDefteri Forum</title>
<link rel="stylesheet" href="<?php echo TEMA; ?>/css/style.css" type="text/css" media="screen"/>
</head>
<body>
<!--ÝÇERÝK-->
<div id="icerik" >
<!--header-->
<div id ="header">
<!--Navbar-->
<div id="navbar">
<ul>
<li><a href="<?php echo URL; ?>/index.php">Anasayfa</a></li>
<li><a href="<?php echo URL; ?>/?m=kayit"> Kayýt ol </a></li>
</ul>
</div>
<!--#navbar-->
<!--Logo-->
<div class="logo">
<a href="<?php echo URL; ?>/index.php">
<img src="<?php echo TEMA_URL; ?>/images/logo.png " alt="" /> 
</a>
</div>
<!--#Logo-->

<!--Giris Yap-->
<div id="girisYap">
<?php if ($_SESSION['cancan']){ ?>
Hoþgeldiniz, <strong><?php echo $_SESSION['uye_kadi']; ?></strong>
<div class="uyeMenu">
<a href="<?php echo URL; ?>/?m=profil">Profilim </a> | <a href="<?php echo URL; ?>/?m=cikis">Çýkýþ Yap </a> |
<?php if($_SESSION['uye_rut'] == 1){ ?>
<a href="<?php echo URL; ?>/admin/anasayfa.php"> Paneli Göster</a>
<?php } ?>
</div>
<?php }else {?>
<form action="<?php echo URL; ?>/?m=giris" method="post">
<table cellpadding="0" cellspacing="0">
<tr>
<td width="85">Kullanýcý adý: </td>
<td><input type="text" name="kadi" /></td>
</tr>
<tr>
<td>Þifre : </td>
<td><input type="password" name="sifre" /></td>
</tr>
<tr>
<td></td>
<td align="right" ><button type="submit"><span>Giriþ Yap</span></td>
</tr>
</table>
</form>
<?php } ?>
</div>
<!--#Giris Yap-->
</div>
<!--#header-->

<!--Ýcerik-->
<div class="icerik">
<?php icerik();  ?>
</div>
<!--#icerik-->
<!--Footer-->
<div id="footer">
<p align="center">Tüm Haklarý Saklýdýr. &copy; 2012 - Code By Can Ozseven</p>
</div>
<!--#footer-->

</div>
<!--#ÝÇERÝK-->
</body>
</html>