<?php
session_start();
error_reporting(0);
include ("ayar.php");
include ("sistem.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="tr" lang="tr">
<head>
	<title>Kod Defteri || Y�netim Paneli</title>
</head>
<body>
<?php

if (!$_SESSION["cancan"]){
echo '<div id="giris">
<form action="/giris" method="post">
<h1>Y�netim Paneli Giri�i</h1>
<span>Kullan�c� Ad�:</span>
<span><input type="text" name="kadi" class="giris_input" /></span>
<span>�ifre:</span>
<span><input type="password" name="sifre" class="giris_input" /></span>
<span><input type="submit" value="Giri� Yap" class="giris_btn" />
</form>
</div>';
}elseif($_SESSION["cancan"] && $_SESSION["uye_rut"] == 1) {
	require("anasayfa.php");
}

?>
</body>
</html>