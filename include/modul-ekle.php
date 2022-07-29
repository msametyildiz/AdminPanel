 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Modül ekle</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Anasayfa</a></li>
              <li class="breadcrumb-item active">Modül Ekle</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php
          if($_POST){
            $calistir=$VT->ModulEkle(); // TODO
           
            if($calistir!=false){
              echo '<div class="alert alert-success">Modülünüz basarıyla eklenmiştir.</div>';
            }
            else{
              echo '<div class="alert alert-danger">! UYARI !<br>Modülünüz oluşturulurken bir sorunla karşılaşıldı.Sorunlar şunlar olabilir.<br>
              -Boş alan olabilir.<br>
              -Aynı isimde mevcut bir kayıdınız olabilir.<br>
              -Sistemsel bir sorun oluşmuş olabilir.</div>';
            }
          }
         ?>
     <div class="col-md-6">  
       <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Modül Tanımlama Ekranı</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="#" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Başlık</label>
                    <input name="baslik" type="text" class="form-control" placeholder="Modül İsmini Yazınız">
                  </div>
                  <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="durum" value="1" checked="checked">
                    <label class="form-check-label" for="exampleCheck1">Aktif Yap</label>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Modül Ekle</button>
                </div>
              </form>
            </div>
          </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>