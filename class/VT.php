<?php
class VT{
	var $sunucu="localhost";
	var $user="root";
	var $password="";
	var $dbname="yonetimpaneli";
	var $baglanti;

	//veri tabananına bağlantı işlemi burada oluyor
	function __construct()
	{
		try {
			$this->baglanti=new PDO("mysql:host=".$this->sunucu.";dbname=".$this->dbname.";charset=utf8",$this->user,$this->password);
		
		} catch (PDOException $error) {
			echo $error->getMessage();
			exit();
		}
		

	}
	//--------------------------------------------------------------------------------------------------------------------------------------

	// select * FROM ayarlar WHERE ID=1 ORDER BY ID ASC LIMIT 1
	public function VeriGetir($tablo , $wherealanlar="",$wherearraydeger="",$ordeby="ORDER BY ID ASC",$limit=""){

		$this->baglanti->query("SET CHARACTER SET utf8");
		$sql="SELECT * FROM ".$tablo;
		if(!empty($wherealanlar) && !empty($wherearraydeger)){
			$sql.=" ".$wherealanlar;
			if(!empty($ordeby)){$sql.=" ".$ordeby;}
			if(!empty($limit)){$sql.=" LIMIT ".$limit;}
			$calistir=$this->baglanti->prepare($sql);
			$sonuc=$calistir->execute($wherearraydeger); // TODO
			$veri=$calistir->fetchAll (PDO::FETCH_ASSOC);
		}
		else {
			if(!empty($ordeby)){$sql.=" ".$ordeby;}
			if(!empty($limit)){$sql.=" LIMIT ".$limit;}
			$veri=$this->baglanti->query($sql,PDO::FETCH_ASSOC);
		}
		if ($veri!=false && !empty($veri)) {
			$datalar=array();
			foreach ($veri as $bilgiler) {
				$datalar[]=$bilgiler;/*  $sonuc[0]["baslik"]*/
			}
			return $datalar;
		}
		else{
			return false;
		}
	}
//--------------------------------------------------------------------------------------------------------------------------------------

	public function SorguCalistir($tablo,$alanlar="",$degerlerarray="",$limit=""){
		$this->baglanti->query("SET CHARACTER SET utf8");
		if(!empty($alanlar) && !empty($degerlerarray)){
			$sql=$tablo." ".$alanlar;
			if(!empty($limit)){$sql.=" LIMIT ".$limit;}
			$calistir=$this->baglanti->prepare($sql);
			$sonuc=$calistir->execute($degerlerarray);
		}
		else{
			$sql=$tablo;
			if(!empty($limit)){$sql.=" LIMIT ".$limit;}
			$sonuc=$this->baglanti->exec($sql);
		}
		if ($sonuc!=false) {
			return true;
		}
		else{
			return false;
		}
		$this->baglanti->query("SET CHARACTER SET utf8");	
	}

//--------------------------------------------------------------------------------------------------------------------------------------

	public function selflink($val){
		/* Seflink Yapısı */

		$find = array('Ç', 'Ş', 'Ğ', 'Ü', 'İ', 'Ö', 'ç', 'ş', 'ğ', 'ü', 'ö', 'ı', '+', '#','?','*','!','.','(',')');
		$replace = array('c', 's', 'g', 'u', 'i', 'o', 'c', 's', 'g', 'u', 'o', 'i', 'plus', 'sharp','','','','','','');
		$string = strtolower(str_replace($find, $replace, $val));
		$string = preg_replace("@[^A-Za-z0-9\-_\.\+]@i", ' ', $string);
		$string = trim(preg_replace('/\s+/', ' ', $string));
		$string = str_replace(' ', '-', $string);
		return $string;
	}
//--------------------------------------------------------------------------------------------------------------------------------------


	public function ModulEkle(){
		if(!empty($_POST["baslik"])){
			$baslik=$_POST["baslik"];
			if(!empty($_POST["durum"])){$durum=1;}else{$durum=2;}
			$tablo=str_replace("-","",$this->selflink($baslik));
			$kontrol=$this->VeriGetir("moduller","WHERE tablo=?",array($tablo),"ORDER BY ID ASC",1); // TODO
			if ($kontrol!=false) {
				return false;
			}
			
			else{
				$tabloOlustur=$this->SorguCalistir('CREATE TABLE `'.$tablo.'` (
					  `ID` int(11) NOT NULL,
					  `baslik` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
					  `selflink` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
					  `katagori` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
					  `metin` text COLLATE utf8_turkish_ci DEFAULT NULL,
					  `resim` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
					  `anahtar` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
					  `description` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
					  `durum` int(5) DEFAULT NULL,
					  `sırano` int(11) DEFAULT NULL,
					  `tarih` date DEFAULT NULL
					) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;');


				$ModulEkle=$this->SorguCalistir("INSERT INTO moduller","SET baslik=?, tablo=?, durum=?, tarih=?",array($baslik,$tablo,$durum,date("y-m-d")));
				$kategoriekle=$this->SorguCalistir("INSERT INTO kategoriler","SET baslik=?, selflink=? ,tablo=?, durum=?, tarih=?",array($baslik,$tablo,'modul',1,date("y-m-d")));
				if($ModulEkle!=false){
					return true;
					header("Refresh:0");
				}
				else{
					return false;
				}
			}
			
		}
		else{
			return false;
		}
	}

}


?>