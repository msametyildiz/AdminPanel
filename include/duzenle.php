<?php 
  if(!empty($_GET["tablo"]) && !empty($_GET["ID"])){
    $tablo=$VT->filter($_GET["tablo"]);
    $ID=$VT->filter($_GET["ID"]);
    $kontrol=$VT->VeriGetir("moduller","WHERE tablo=? AND durum=?",array($tablo,1),"ORDER BY ID ASC",1);
    if($kontrol!=false){
        $veri=$VT->VeriGetir($kontrol[0]["tablo"],"WHERE ID=?",array($ID),"ORDER BY ID ASC",1);
        if($veri!=false){
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$kontrol[0]["baslik"]?> Düzenleme Sayfası</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active"><?=$kontrol[0]["baslik"]?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <a href="<?=SITE?>liste/<?=$kontrol[0]["tablo"]?>" class="btn btn-info" style="float:right; margin-bottom=10px; margin-left:10px;"><i class="fa fa-bars"></i> LİSTE</a>
              <a href="<?=SITE?>ekle/<?=$kontrol[0]["tablo"]?>" class="btn btn-success" style="float:right; margin-bottom=10px;"><i class="fa fa-plus"></i> YENİ EKLE</a>
 </div>
        </div>
<!----------------------------------------------------------------------------------------------------------------------------------->
<?php 
if($_POST){
      if(!empty($_POST["kategori"]) && !empty($_POST["baslik"]) && !empty($_POST["anahtar"]) && !empty($_POST["description"]) && !empty($_POST["sirano"])){
            $kategori=$VT->filter($_POST["kategori"]);
            $baslik=$VT->filter($_POST["baslik"]);
            $anahtar=$VT->filter($_POST["anahtar"]);
            $selflink=$VT->selflink($baslik);
            $description=$VT->filter($_POST["description"]);
            $sirano=$VT->filter($_POST["sirano"]);
            $metin=$VT->filter($_POST["metin"],true);//true yazılmasının sebebi editor kullnıldığı için html komutlarını temizlemesini istemiyorum
            if(!empty($_FILES["resim"]["name"])){
                  $yukle=$VT->upload("resim","../images/".$kontrol[0]["tablo"]."/");
                  if($yukle!=false){
                      $ekle=$VT->SorguCalistir("UPDATE ".$kontrol[0]["tablo"],"SET baslik=?, selflink=?, kategori=?, metin=?, resim=?, anahtar=?, description=?, durum=?,sirano=?,tarih=? WHERE ID=?",array($baslik,$selflink,$kategori,$metin,$yukle,$anahtar,$description,1,$sirano,date("Y-m-d"),$veri[0]["ID"]));
                  }
                  else{
                      ?>
                      <div class="alert alert-info">! RESİM YÜKLEME İŞLEMİNİZ BAŞARISIZ !</div>
                      <?php
                  }
              
            }
            else{
                  $ekle=$VT->SorguCalistir("UPDATE ".$kontrol[0]["tablo"],"SET baslik=?, selflink=?, kategori=?, metin=?, anahtar=?, description=?, durum=?, sirano=?, tarih=? WHERE ID=?",array($baslik,$selflink,$kategori,$metin,$anahtar,$description,1,$sirano,date("Y-m-d"), $veri[0]["ID"]));
            }
            if($ekle!=false){
                $veri=$VT->VeriGetir($kontrol[0]["tablo"],"WHERE ID=?",array($veri[0]["ID"]),"ORDER BY ID ASC",1);
                  ?>
                    <div class="alert alert-success">İŞLEMLER BAŞARIYLA KAYDEDİLDİ ...</div>
                  <?php
            }
            else{
                  ?>
                  <div class="alert alert-danger">! İŞLEM SIRASINDA BİR SORUNLA KARŞILAŞILDI. LÜTFEN DAHA SONRA TEKRAR DENEYİNİZ !</div>
                  <?php
            }
      }
      else{
            ?>
            <div class="alert alert-danger">! BOŞ BIRAKILAN ALANLARI DOLDURUNUZ !</div>
            <?php
      }
}
?>
<!----------------------------------------------------------------------------------------------------------------------------------->
<!-- SELECT2 EXAMPLE -->
          <!-- /.card-header -->,
          <form action="#" method="post" enctype="multipart/form-data">
          <div class="col-md-8">
          <div class="card-body card card-primary">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Kategori Seç</label>
                  <select class="form-control select2" style="width: 100%;" name="kategori">
                  
                    <?php
                      $sonuc=$VT->kategoriGetir($kontrol[0]["tablo"],$veri[0]["kategori"],-1);
                      if($sonuc!=false){
                        echo $sonuc;
                      }
                      else{
                        $VT->tekKategori($kontrol[0]["tablo"]);
                      }
                    ?>

                  </select>
                </div>
              <!-- /.col -->
            </div>

            <!-- header in form -->
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Başlık</label>
                      <input type="text" class="form-control" placeholder="Başlık ..." name="baslik" value="<?=stripslashes($veri[0]["baslik"])?>">
                    </div>
                </div>
                <!-- Text area-->
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Açıklama</label>
                         <textarea id="summernote" name="metin" placeholder="  Text Area  " style="width:100%; height:450px; line-height:18px; font-size:14px; border:1px solid #dddddd; padding:10px;">
                                <?=stripslashes($veri[0]["metin"])?>
                        </textarea>
                    </div>
                </div>
                 <!--keywords  -->
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Anahtar Kelimeler</label>
                      <input type="text" class="form-control" placeholder="Anahtar Kelimeler ..." name="anahtar" value="<?=stripslashes($veri[0]["anahtar"])?>">
                    </div>
                </div>
                <!--description  -->
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" class="form-control" placeholder="Description ..." name="description" value="<?=stripslashes($veri[0]["description"])?>"> 
                    </div>
                </div>
                <!--pictures  -->
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Resimler</label>
                      <input type="file" class="form-control" placeholder="Resim Seçiniz ..." name="resim">
                    </div>
                </div>
                <!--Serial no  -->
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Sıra no</label>
                      <input type="number" class="form-control" placeholder="Sıra No ..." name="sirano" style="width:100px;" value="<?=stripslashes($veri[0]["sirano"])?>">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">KAYDET</button>
                    </div>
                </div>
                <!-- /.row -->

          </div>
          <!-- /.card-body -->
          
        </div>
        <!-- /.card --> 
      </div>
      </form>

<!----------------------------------------------------------------------------------------------------------------------------------->

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  
  <?php
        }
        else{
            ?>
      <meta http-equiv="refresh" content="0;url=<?=SITE?>liste/<?=$kontrol[0]["tablo"]?>">
      <?php
        }
  }
    else{
      ?>
      <meta http-equiv="refresh" content="0;url=<?=SITE?>">
      <?php

    }
  }
else{
    ?>
      <meta http-equiv="refresh" content="0;url=<?=SITE?>">
      <?php
  }
  ?>