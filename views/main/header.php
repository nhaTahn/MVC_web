<?php
  session_start();
  if (isset($_SESSION['guest']))
  {
    require_once('models/user.php');
    $data = User::get($_SESSION['guest']);
  }
  
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BKaV</title>

  <link href="/MVC_Phong/public/css/layout/navbar.css" rel="stylesheet" >  
  <link href="/MVC_Phong/public/css/layout/footer.css" rel="stylesheet" >
  <link href="/MVC_Phong/public/css/layout/hero.css" rel="stylesheet" >
  
  <!-- icon -->
  <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
  <script
    src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha256-pasqAKBDmFT4eHoN2ndd6lN370kFiGUFyTiUHWhU7k8="
    crossorigin="anonymous"></script>
    <script>
    $(function() {
    $(".toggle").on("click", function() {
        if ($(".item").hasClass("active")) {
            $(".item").removeClass("active");
        } else {
            $(".item").addClass("active");
        }
    });
    });</script>
  <!--CSS -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  
</head>
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <nav class="navbar">
        <ul class="menu">
          <li class="logo"><a href="#"><img class="logo" src="/MVC_Phong/public/images/hcmut.png"></a></li>
          <li class="item"><a href="index.php?page=main&controller=layouts&action=index">Trang chủ</a></li>
          <li class="item"><a href="index.php?page=main&controller=about&action=index">Chúng tôi</a></li>
          <li class="item"><a href="index.php?page=main&controller=services&action=index">Sản phẩm</a></li>
          <li class="item"><a href="index.php?page=main&controller=blog&action=index">Tin tức</a></li>
          <?php
          if (!isset($_SESSION["guest"])){
            echo '
              <li class="item button"><a href="index.php?page=main&controller=register&action=index" >Đăng ký </a></li>  
              <li class="item button secondary"><a href="index.php?page=main&controller=login&action=index" >Đăng nhập </a></li>  
              <li class="toggle"><span class="bars"></span></li>
              ';
          }
          else{
            echo '
            <li><a href="" data-toggle="modal" data-target="#EditUserModal"><i class="bu bi-person-badge-fill"></i></a></li>
            <li><a href="index.php?page=main&controller=login&action=logout" class="box-arrow-in-right"><i class="bu bi-box-arrow-right"> Đăng xuất</i></a></li>
            ';
          }
          ?>
        </ul>
      </nav><!-- .navbar -->
   
  </header><!-- End Header -->