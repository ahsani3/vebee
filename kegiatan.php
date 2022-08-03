<?php 
$page = 'Kegiatan';
include 'layout/header.php';
require 'model/Artikel.php';

$ctrl_artikel = new Artikel();
$list_artikel = $ctrl_artikel->getListArtikel();


 ?>
        <div class="img-title pt-5">
          <div class="h2 white mt-100 text-center">Kegiatan</div>
        </div>

        <div class="row mt-100 mb-4 mx-2">
          <?php foreach ($list_artikel as $a): ?>
            <div class="col-md-3">
                <a href="detail_kegiatan.php?id=<?= $a['id']; ?>" class="text-decoration-none">
                    <div class="card-custome">
                      <div class="time-flex">
                        <img src="img/<?= $a['img']; ?>" class="card-img-custome">
                        <p class="p4 white label-time"><?= date('d M Y', strtotime($a['create_time'])) ?></p>
                      </div>
                      <div class="card-body-custome">
                        <p class="h5 text-color text-center"><?= $a['judul']; ?></p>
                      </div>
                    </div>
                </a>
            </div>
          <?php endforeach ?>

        </div>

<?php include 'layout/footer.php'; ?>