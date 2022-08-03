<?php 
$page = 'Detail Video';
include 'layout/header.php'; 
require 'model/Video.php';
$ctrl_video = new Video();
$video = $ctrl_video->getOneVideo($_GET['id']);

?>
        
        <div class="img-detail">
            <div class="embed-responsive embed-responsive-16by9 detail-video">
              <iframe class="embed-responsive-item" src="video/<?=$video['video']; ?>" allowfullscreen></iframe>
            </div>
            <p class="h3 white text-center detail-title"><?= $video['judul'] ?></p>
            <p class="p1 white label-detail"><?= date('d M Y', strtotime($video['create_time'])) ?></p>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="p1 text-color mb-5 text-justify">
                        <?php $teks = explode(PHP_EOL, $video['teks']);foreach ($teks as $t): ?>
                            <p><?= $t ?></p>
                        <?php endforeach ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-5">
                      <div class="card-body text-center">
                        <h5 class="card-title text-color">Bagikan</h5>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=http://vebee.rf.gd/detail_kegiatan.php?id=<?= $video['id'] ?>" class="text-decoration-none link-share mx-3">
                            <i class="fa-brands fa-facebook-f fa-2x "></i>
                        </a>
                        <a href="whatsapp://send?text=*<?= $video['judul']; ?>*%0A%0Ahttp://vebee.rf.gd/detail_kegiatan.php?id=<?= $video['id'] ?>%0A%0ACari%20tau%20kegiatan%20lainnya%20di%20http://vebee.rf.gd/kegiatan.php%20!" class="text-decoration-none link-share mx-3">           
                            <i class="fa-brands fa-whatsapp fa-2x"></i>
                        </a>
                        <a href="https://twitter.com/intent/tweet?url=http://vebee.rf.gd/detail_kegiatan.php?id=<?= $video['id'] ?>" class="text-decoration-none link-share mx-3">           
                            <i class="fa-brands fa-twitter fa-2x"></i>
                        </a>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        

<?php include 'layout/footer.php'; ?>