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

<!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">Select2 (Default Theme)</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
            <form action="#" method="post" enctype="multipart/form-data">
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Kategori Seç</label>
                      <select class="form-control select2" style="width: 100%;">
                        <option selected="selected">Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                      </select>
                  </div>
                  <!-- /.col -->   
                </div>

                <!-- header in form -->
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Başlık</label>
                      <input type="text" class="form-control" placeholder="Başlık ..." name="baslik">
                    </div>
                </div>
                <!-- Text area-->
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Açıklama</label>
                      <textarea id="summernote" name="metin" placeholder="  Text Area  " style="width:100%; height:450px; line-height:18px; font-size:14px; border:1px solid #dddddd; padding:10px;"></textarea>
                    </div>
                </div>
                 <!--keywords  -->
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Anahtar Kelimeler</label>
                      <input type="text" class="form-control" placeholder="Anahtar Kelimeler ..." name="anahtar">
                    </div>
                </div>
                <!--description  -->
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Description</label>
                      <input type="text" class="form-control" placeholder="Description ..." name="description">
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
                      <input type="number" class="form-control" placeholder="Sıra No ..." name="sırano">
                    </div>
                </div>

                <!-- /.row -->
              </div>
              <!-- /.card-body -->
          </form>

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