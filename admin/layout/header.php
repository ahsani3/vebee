<?php 
session_start();
if (@$_SESSION['id'] == null) {
  echo "<script>alert('anda belum login');document.location.href='login.php'</script>";
}

 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/img/favicon.ico">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <!-- Poppins -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>

    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css?v=<?= time(); ?>">

    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

    <title>VeBee Jepara</title>
  </head>
  <body>

    <div class="sidebar">
      <div class="sidebar-header">
        <a href="index.php" class="text-decoration-none">
          <h4 class="white">VeBee</h4>
        </a>
      </div>
      <div class="sidebar-body">
        <a href="index.php" class="text-decoration-none">
          <div class="sidebar-list">
            <i class="fa-solid fa-house-chimney mr-3 white"></i>
            <p class="white m-0" style="font-size: 14px;">Beranda</p>
          </div>
        </a>
        <a href="kegiatan.php" class="text-decoration-none">
          <div class="sidebar-list">
            <i class="fa-solid fa-newspaper mr-3 white"></i>
            <p class="white m-0" style="font-size: 14px;">Kegiatan</p>
          </div>
        </a>
        <a href="video.php" class="text-decoration-none">
          <div class="sidebar-list">
            <i class="fa-solid fa-video mr-3 white"></i>
            <p class="white m-0" style="font-size: 14px;">Video</p>
          </div>
        </a>
        <a href="about.php" class="text-decoration-none">
          <div class="sidebar-list">
            <i class="fa-solid fa-users mr-3 white"></i>
            <p class="white m-0" style="font-size: 14px;">Tentang Kami</p>
          </div>
        </a>
        <a href="sejarah.php" class="text-decoration-none">
          <div class="sidebar-list">
            <i class="fa-solid fa-clock-rotate-left mr-3 white"></i>
            <p class="white m-0" style="font-size: 14px;">Sejarah</p>
          </div>
        </a>
        <a href="logout.php" class="text-decoration-none">
          <div class="sidebar-list" style="">
            <i class="fa-solid fa-right-from-bracket mr-3 white"></i>
            <p class="white m-0" style="font-size: 14px;">Logout</p>
          </div>
        </a>
      </div>  

    </div>

    <div class="navbar">
      <div class="toggle-bar d-flex">
        <i class="fa-solid fa-bars"></i>
      </div>
    </div>

    <div class="main-admin">