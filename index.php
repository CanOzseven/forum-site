<?php
session_start();
ob_start();

 require ("sistem/ayar.php");
 require ("sistem/sistem.php");
  
  if ($ayar['site_durum']){
	require(TEMA.'/index.php');
	 }else{
	bilgi("Site Bak�mda oldu�u icin kapal�y�z ");
  }
  
  ob_end_flush();
  
?>