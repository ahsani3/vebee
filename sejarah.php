<?php 
$page = 'Sejarah';

require 'model/Sejarah.php';
$ctrl_sejarah = new Sejarah();
$list_sejarah = $ctrl_sejarah->getListSejarah();

include 'layout/header.php';
 ?>

        <div class="img-title pt-5">
          <div class="h2 white mt-100 text-center">Sejarah VeBee</div>
        </div>

        <div class="main">
                    
          <div class="row mt-5 mb-2">
            <?php foreach ($list_sejarah as $s): ?>
            <div class="col-md-12">
              <div class="card mb-5" style="border: 0;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                <div class="card-body">
                  <?php $teks = explode(PHP_EOL, $s['teks']);foreach ($teks as $t): ?>
                      <p style="font-size: 18px;line-height: 180%;text-align: justify;"><?= $t ?></p>
                  <?php endforeach ?>
                  
                </div>
              </div>
            </div>
            <?php endforeach ?>
            
            
            <!-- <div class="col-md-4 text-center">
              <div class="card-about mb-4">
                <div class="card-about-body">
                  <i class="fa-solid fa-location-dot mb-2 white" style="font-size: 32px"></i>
                  <p class="white mb-4" style="font-size: 20px;font-weight: 500;">Alamat VeBee Jepara</p>
                  <div class="about-content">
                    <a href="https://www.google.com/maps/place/CV.+Wastu+Arsy+Architects/@-6.6071579,110.6652701,15z/data=!4m5!3m4!1s0x0:0x9645036824626d59!8m2!3d-6.6071632!4d110.6653064" target="_blank" class="text-decoration-none ">
                      <p class="p2 mb-0">Klik disini</p>
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-about mb-4">
                <div class="card-about-body">
                  <i class="fa-solid fa-phone mb-2 white" style="font-size: 32px"></i>
                  <p class="white mb-4" style="font-size: 20px;font-weight: 500;">Telepon / WhatsApp</p>
                  <div class="about-content">
                    <a href="https://wa.me/628122902641" class="text-decoration-none ">
                      <p class="p2 mb-1">+62 812-2902-641</p>
                    </a>
                    <a href="https://wa.me/6281327491452" class="text-decoration-none ">
                      <p class="p2 mb-1">+62 813-2749-1452</p>
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-about mb-4">
                <div class="card-about-body">
                  <i class="fa-brands fa-instagram mb-2 white" style="font-size: 32px"></i>
                  <p class="white mb-4" style="font-size: 20px;font-weight: 500;">Instagram</p>
                  <div class="about-content">
                    <a target="_blank" href="https://www.instagram.com/vespa_biroe/" class="text-decoration-none ">
                      <p class="p2">@vespa_biroe</p>
                    </a>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-8 text-center">
              <div class="card-about mb-4">
                <div class="card-about-body">
                  <i class="fa-solid fa-users mb-2 white" style="font-size: 32px"></i>
                  <p class="white mb-4" style="font-size: 20px;font-weight: 500;">Struktur Anggota</p>
                  <div class="about-content text-left">
                    <p class="p2 main-color" style="font-weight: bold;">Ketua :</p>
                    <?php $i = 1; foreach ($ketua as $k): ?>
                    <p class="ml-5 text-color"><?= $i.'. '.$k['nama'] ?></p>
                    <?php $i++; endforeach ?>

                    <p class="p2 main-color" style="font-weight: bold;">Sekretaris :</p>
                    <?php $i = 1; foreach ($sekretaris as $k): ?>
                    <p class="ml-5 text-color"><?= $i.'. '.$k['nama'] ?></p>
                    <?php $i++; endforeach ?>


                    <p class="p2 main-color" style="font-weight: bold;">Bendahara :</p>
                    <?php $i = 1; foreach ($bendahara as $k): ?>
                    <p class="ml-5 text-color"><?= $i.'. '.$k['nama'] ?></p>
                    <?php $i++; endforeach ?>

                    <p class="p2 main-color" style="font-weight: bold;">Anggota :</p>
                    <?php $i = 1; foreach ($anggota as $k): ?>
                    <p class="ml-5 text-color"><?= $i.'. '.$k['nama'] ?></p>
                    <?php $i++; endforeach ?>
                  </div>
                </div>
              </div>
            </div> -->

          </div>

        </div>


<?php include 'layout/footer.php'; ?>