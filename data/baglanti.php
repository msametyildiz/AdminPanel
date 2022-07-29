<?php 
include_once(SINIF."VT.php");
$VT=new VT();
$ayarlar=$VT->VeriGetir("settings","WHERE ID=?",array(1),"ORDER BY ID ASC","1");

if ($ayarlar!=false) {
	$sitebaslik=$settings["baslik"] ?? null;
	$siteanahtar=$settings["anahtarkelime"] ?? null;
	$siteaciklama=$settings["aciklama"] ?? null;
	$siteURL=$settings["url"] ?? null;
}

?>