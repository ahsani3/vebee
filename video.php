<?php 
$page = 'Kegiatan';
include 'layout/header.php';
require 'model/Video.php';

$ctrl_video = new Video();
$list_video = $ctrl_video->getListVideo();


 ?>
        <div class="img-title pt-5">
          <div class="h2 white mt-100 text-center">Video</div>
        </div>

        <div class="row mt-100 mb-4 mx-2">
          <?php foreach ($list_video as $a): ?>
            <div class="col-md-3">
                <!-- <a href="detail_video.php?id=<?= $a['id']; ?>" class="text-decoration-none"> -->
                    <div class="card-custome">
                      <div class="time-flex">
                        <!-- <video class="card-img-custome" controls>
                            <source src="video/<?= $a['video']; ?>" type="video/mp4">
                        </video> -->
                        <div class="embed-responsive embed-responsive-16by9 card-img-custome">
                          <iframe src="<?= $a['video']; ?>" class="embed-responsive-item" allowfullscreen></iframe>
                        </div>
                        <p class="p4 white label-time"><?= date('d M Y', strtotime($a['create_time'])) ?></p>
                      </div>
                      <div class="card-body-custome">
                        <p class="h5 text-color text-center"><?= $a['judul']; ?></p>
                      </div>
                    </div>
                <!-- </a> -->
            </div>
          <?php endforeach ?>

        </div>

<?php include 'layout/footer.php'; ?>