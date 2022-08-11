<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Kullanıcı Ayarları</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?=SITE?>">Anasayfa</a></li>
          <li class="breadcrumb-item active">Kullanıcı Ayarları</li>
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
  if(!empty($_POST["adsoyad"]) && !empty($_POST["kullanici"]) && !empty($_POST["sifre"]) && !empty($_POST["mail"])){
        $usernamelastname=$VT->filter($_POST["adsoyad"]);
        $username=$VT->filter($_POST["kullanici"]);
        $userpassword=$VT->filter($_POST["sifre"]);
        $usermail=$VT->filter($_POST["mail"]);
        if(!empty($_FILES["resim"]["name"])){
            $picyukle=$VT->upload("resim","userimages/");
            if($picyukle!=false){
                $ekleuser="INSERT INTO 'kullanicilar' ('adsoyad', 'resim', 'kullanici', 'sifre', 'mail') VALUES ($usernamelastname, $picyukle, $username, $userpassword, $usermail)";
            }
            else{
                ?>
                <div class="alert alert-info">! RESİM YÜKLEME İŞLEMİNİZ BAŞARISIZ !</div>
                <?php
            }
         }
        else{
          $ekleuser="INSERT INTO kullanicilar ('adsoyad', 'kullanici', 'sifre', 'mail') VALUES ($usernamelastname, $username, $userpassword, $usermail)";
        }
         if($ekleuser!=false){
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
            <!-- user-namelastname -->
            <div class="col-md-12">
                <div class="form-group">
                  <label>Ad Soyad</label>
                  <input type="text" class="form-control" placeholder="Ad Soyad ..." name="adsoyad">
                </div>
            </div>
            
             <!--user-name  -->
            <div class="col-md-12">
                <div class="form-group">
                  <label>Kullanıcı Adı</label>
                  <input type="text" class="form-control" placeholder="Kullanıcı Adı ..." name="kullanici">
                </div>
            </div>
            <!--user-password  -->
            <div class="col-md-12">
                <div class="form-group">
                  <label>Sifre</label>
                  <input type="password" class="form-control" placeholder="Şifre ..." name="sifre">
                </div>
            </div>
            <!--confirm-password  -->
            <div class="col-md-12">
                <div class="form-group">
                  <label>Sifre Kontrol</label>
                  <input type="password" class="form-control" placeholder="Şifre ..." name="kontrolsifre">
                </div>
            </div>
            <!--user-mail  -->
            <div class="col-md-12">
                <div class="form-group">
                  <label>E-Mail</label>
                  <input type="text" class="form-control" placeholder="E-Mail ..." name="mail">
                </div>
            </div>
            <!--picture  -->
            <div class="col-md-12">
                    <div class="form-group">
                      <label>Kullanıcı Resmi</label>
                      <input type="file" class="form-control" placeholder="Resim Seçiniz ..." name="resim">
                    </div>
                </div>
            <!--button  -->
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

