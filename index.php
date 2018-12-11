<?php
session_start();
ob_start();

 require ("sistem/ayar.php");
 require ("sistem/sistem.php");
  
  if ($ayar['site_durum']){
	require(TEMA.'/index.php');
	 }else{
	bilgi("Site Bakýmda olduðu icin kapalýyýz ");
  }
  
  ob_end_flush();
  
?>