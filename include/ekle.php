<?php 
  if(!empty($_GET["tablo"])){
    $tablo=$VT->filter($_GET["tablo"]);
    $kontrol=$VT->VeriGetir("moduller","WHERE tablo=? AND durum=?",array($tablo,1),"ORDER BY ID ASC",1);
    if($kontrol!=false){
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
              <li class="breadcrumb-item"><a href="#">?<?=  SITE?></a></li>
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
      <div class="row">
        <div class="col-md-12">
          <a href="<?=SITE?>ekle/<?=$kontrol[0]["tablo"]?>" class="btn btn-success" style="float:right; margin-bottom=10px;"><i class="fa fa-plus"></i>YENİ EKLE</a>
      </div>
    </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  
  
  <?php
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