<?php 
    if(!empty($_GET["tablo"])){
        $tablo=$_GET["tablo"];
        $kontrol=$VT->VeriGetir("moduller","WHERE tablo=? AND durum=?",array($tablo,1),"ORDER BY ID ASC",1);
        if($kontrol!=false){

        }
    }

?> 


 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?=$kontrol[0]["baslik"]?></h1>
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

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
       
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

<?php 
    
?>