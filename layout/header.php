<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Poppins -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css?v=<?= time(); ?>">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>VeBee Jepara | <?= @$page; ?></title>
  </head>
  <body style="min-height: 100vh">

    <div class="navbar-custome" id="navbar">
      <a href="index.php" class="d-flex text-decoration-none">
        <div class="logo">
            <img src="assets/img/logo.png">
        </div>
        <p class="main-color" style="margin-top: 8px;font-size: 24px;font-weight: 700">VeBee</p>
      </a>
      <div class="icon-menu ml-auto" data-toggle="modal" data-target="#exampleModal"></div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-custome">
        <div class="modal-content">
            
          <div class="modal-header">
            <div class="icon-close ml-auto" data-dismiss="modal"></div>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="col-md-4 mt-24">
                  <div style="">
                    
                    <div class="menu-modal mb-24">
                      <a class="h4 text-color" href="index.php">Beranda</a>
                    </div>
                    <div class="menu-modal mb-24">
                      <a class="h4 text-color" href="kegiatan.php">Kegiatan</a>
                    </div>
                    <div class="menu-modal mb-24">
                      <a class="h4 text-color" href="video.php">Video</a>
                    </div>
                    <div class="menu-modal mb-24">
                      <a class="h4 text-color" href="about.php">Tentang Kami</a>
                    </div>
                    <div class="menu-modal mb-24">
                      <a class="h4 text-color" href="sejarah.php">Sejarah</a>
                    </div>
                  </div>
                </div>
                <!-- <div class="col-md-8 mt-24">
                  <img src="img/gambar4.jpg" class="image-full">
                  
                </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>