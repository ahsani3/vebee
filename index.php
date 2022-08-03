<?php 
$page = 'Home';
require 'model/Artikel.php';
$ctrl_artikel = new Artikel();
$list_kegiatan = $ctrl_artikel->getListkegiatan();
$limit_kegiatan = $ctrl_artikel->getLimitArtikel();

$list_sleder = $ctrl_artikel->getListBeranda();

include 'layout/header.php';
 ?>

    <div class="contain-carousel mb-32">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <?php $i = 0;foreach ($list_sleder as $s): ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="<?php if($i == 0){echo 'active';} $i++?>"></li>
            <?php endforeach ?>
          </ol>
          <div class="carousel-inner">
            <?php $len = count($list_sleder); $i = 0;foreach ($list_sleder as $s): ?>
              <?php if ($i == 0): ?>
                <div class="carousel-item carousel-item-custome <?php if($i == 0){echo 'active';}?>">
                  <img src="img/<?= $s['img'] ?>" class="img-carousel" alt="...">
                  <div class="content-carousel">
                        <div class="col-md-6">
                            <p class="h1 white"><?= $s['judul'] ?></p>
                            
                        </div>
                  </div>
                </div>

              <?php elseif($i == $len - 1): ?>
                <div class="carousel-item carousel-item-custome">
                  <img src="img/<?= $s['img'] ?>" class="img-carousel" alt="...">
                  <div class="content-carousel">
                        <div class="col-md-6"></div>
                        <div class="col-md-6 text-right">
                            <p class="h1 white"><?= $s['judul'] ?></p>
                            
                        </div>
                  </div>
                </div>
              <?php else: ?>
                <div class="carousel-item">
                  <img src="img/<?= $s['img'] ?>" class="img-carousel" alt="...">
                  <div class="content-carousel">
                    <div style="width: 100%;height: 100%">
                      
                      <p class="h3 white text-center mb-24" style="display: flex;justify-content: center;margin-top: 60vh;"><?= $s['judul'] ?></p>
                      <!-- <div style="display: flex;justify-content: center;width: 100%;margin-top: auto;">
                          <a href="kegiatan.php" class="btn btn-primary btn-custome">Kegiatan</a>
                      </div> -->
                    </div>
                  </div>
                </div>
              <?php endif; $i++ ?>            

            
            <?php endforeach ?>

            

          </div>
          <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </button>
        </div>
    </div>

    <div class="main">
      <?php $i = 1; foreach ($list_kegiatan as $k): ?>
        <?php if ($i % 2 == 1): ?>
          <a href="detail_kegiatan.php?id=<?= $k['id']; ?>" class="text-decoration-none">
            <div class="row">
                <div class="col-md-5 mb-5">
                    <img src="img/<?= $k['img'] ?>" class="image-full" style="height: 245px;">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6 mb-5" style="height: 245px;overflow: hidden;">
                    <p class="text-color" style="font-size: 24px;font-weight: 600"><?= $k['judul'] ?></p>
                    <p class="text-justify p2 text-color"><?= $k['teks'] ?></p>
                </div>
            </div>
          </a>
        <?php else: ?>
          <a href="detail_kegiatan.php?id=<?= $k['id']; ?>" class="text-decoration-none">
            <div class="row">
                <div class="col-md-6 mb-5 d-none d-md-block" style="height: 245px;overflow: hidden;">
                    <p class="text-color" style="font-size: 24px;font-weight: 600"><?= $k['judul'] ?></p>
                    <p class="text-justify p2 text-color"><?= $k['teks'] ?></p>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5 mb-5">
                    <img src="img/<?= $k['img'] ?>" class="image-full" style="height: 245px;">
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-6 mb-5 d-md-none" style="height: 245px;overflow: hidden;">
                    <p class="text-color" style="font-size: 24px;font-weight: 600"><?= $k['judul'] ?></p>
                    <p class="text-justify p2 text-color"><?= $k['teks'] ?></p>
                </div>
            </div>
          </a>
        <?php endif ?>
      
      <?php $i++; endforeach ?>

    </div>

    <div class="barrier mb-5">
      <p>Terbaru</p>
    </div>
    <div class="container">
      <div class="row">
        <?php foreach ($limit_kegiatan as $a): ?>
          <div class="col-md-4">
              <a href="detail_kegiatan.php?id=<?= $a['id']; ?>" class="text-decoration-none">
                  <div class="card-custome">
                    <div class="time-flex">
                      <img src="img/<?= $a['img']; ?>" class="card-img-custome">
                      <p class="p4 white label-time"><?= date('d M Y',strtotime($a['create_time'])) ?></p>
                    </div>
                    <div class="card-body-custome">
                      <p class="h5 text-color text-center"><?= $a['judul']; ?></p>
                    </div>
                  </div>
              </a>
          </div>
        <?php endforeach ?>

      </div>
      
    </div>
        
       <!--  <div class="row">
          <?php foreach ($limit_kegiatan as $l): ?>
            <div class="col-md-5 mb-5">
                <img src="img/<?= $l['img'] ?>" class="image-home">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6 mb-5" style="max-height: 250px;overflow: hidden;">
              <p class="h5"><?= $l['judul'] ?></p>
                <div class="text-justify p2 text-color">
                  <?= $l['teks']; ?>
                </div>
            </div>
            
          <?php endforeach ?>
        </div> -->

<?php include 'layout/footer.php'; ?>