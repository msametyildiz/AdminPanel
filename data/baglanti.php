<?php 
include_once(SINIF."VT.php");
$VT=new VT();
$ayarlar=$VT->VeriGetir("ayarlar","WHERE ID=?",array(1),"ORDER BY ID ASC","1");
if ($ayarlar!=false) {
	$sitebaslik=$ayarlar["baslik"];
	$siteanahtar=$ayarlar["anahtarkelime"];
	$siteaciklama=$ayarlar["aciklama"];
	$siteURL=$ayarlar["url"];
}
?>