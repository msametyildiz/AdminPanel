
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Seo Ayarları</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
              <li class="breadcrumb-item active">Seo Ayarları</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    
      <section class="content">
        <div class="container-fluid">
          
<!----------------------------------------------------------------------------------------------------------------------------------->
<?php 
if($_POST){
      if(!empty($_POST["baslik"]) && !empty($_POST["anahtar"]) && !empty($_POST["description"])){
            $baslik=$VT->filter($_POST["baslik"]);
            $anahtar=$VT->filter($_POST["anahtar"]);
            $description=$VT->filter($_POST["description"]);
            $guncelle=$VT->SorguCalistir("UPDATE ayarlar","SET baslik=?, anahtar=?, aciklama=?, WHERE ID=?",array($baslik,$anahtar,$description,1),1);
            if($guncelle!=false){
                  ?>
                    <div class="alert alert-success">İŞLEMLER BAŞARIYLA KAYDEDİLDİ ...</div>
                    <meta http-equiv="refresh" content="2;url=<?=SITE?>seo-ayarlari"/>
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
              

                <!-- header in form -->
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Site Başlık</label>
                      <input type="text" class="form-control" placeholder="Site Başlık ..." name="baslik" value="<?=$sitebaslik?>">
                    </div>
                </div>
                
                 <!--keywords  -->
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Anahtar Kelimeler</label>
                      <input type="text" class="form-control" placeholder="Anahtar Kelimeler ..." name="anahtar" value="<?=$siteanahtar?>">
                    </div>
                </div>
                <!--description  -->
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" class="form-control" placeholder="Description ..." name="description" value="<?=$siteaciklama?>">
                    </div>
                </div>
                <!--button  -->
                <div class="col-md-12">
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">Güncelle</button>
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
  