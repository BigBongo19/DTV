<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DTV | Home</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    #menu{
      margin: 50px;
      display: flex;
      flex-wrap: wrap;
    }
    #page_title{
      display: flex;
      justify-content: center;
      width: 100%;
    }
    #random_item{
      width: 25%;
    }
    #random_item_title{
      margin-bottom: 20px;
      display: flex;
      flex-direction: column;
    }
    #random_item_title_section{
      display: flex;
      justify-content: center;
    }
    #random_item_title_section{
      color: black;
    }

    a:hover{
      text-decoration: underline;
    }

    #item_list{
      width: calc(75% - 10px);
      display: flex;
      flex-wrap: wrap;
      padding: 10px;
    }
    #random_item_card_border{
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;
      margin-top: 20px;
      margin-bottom: 20px;
      box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
      border-radius: 5px;
    }

    #list_item_card_border{
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 90%;
      margin-top: 20px;
      margin-bottom: 20px;
      box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
      border-radius: 5px;
    }

    #card_image_list{
      width: 95%;
      height: 75%;
      margin: 5px;
      border-radius: 5px;
    }

    #card_image{
      width: 95%;
      height: 75%;
      margin: 10px;
      border-radius: 5px;
    }

    .hover-zoom {
      transition: 500ms;
      z-index: auto;
    }
    .hover-zoom:hover {
      transform: scale(1.05);
      transition: 500ms;
      cursor: pointer;
    }
    @media only screen and (max-width: 768px) {
        #random_item_card_border{
            display: none;
        }
        #menu{
            display: flex;
            align-items: center;
            flex-direction: column;
            margin: 0%;
        }

        .eten .drinken{
            display: flex;
            align-items: center;
        }
    }

  </style>

  <!-- =======================================================
  * Template Name: FlexStart - v1.7.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
     <!-- ======= Header ======= -->
    @include('parts.header')
    <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section class="breadcrumbs">
    <div class="container">

        <ol>
            <li><a href="/">Home</a></li>
            <li>Menu</li>
        </ol>
        <h2>Menu</h2>

    </div>
</section>
  <div id="menu" data-aos="fade-left">
    <div id="page_title">
      <h1>Menukaart</h1>
    </div>
    <div id="random_item">
      <div id="random_item_title">
          <a href="#" onclick="eten()" id="random_item_title_section">eten</a>
          <a href="#" onclick="drinken()" id="random_item_title_section">drinken</a>
          <a href="#" onclick="alles()" id="random_item_title_section">alles</a>
      </div>
      <?php
        for($x = 0; $x <= 1; $x++){
          ?>
        <div class="hover-zoom">
        <div id="random_item_card_border" class="col-lg-3 col-md-6">
          <div>
            <img id="card_image" src="images/perfect-hot-dog.jpg">
          </div>
          <div class="card_text">
            <p>willekeurig item</p>
            <p>$0.00</p>
          </div>
        </div>
        </div>
        <?php
        }
      ?>
    </div>
    <div id="item_list">
      <?php
        for($x = 0; $x <= 4; $x++){
          ?>
        <div class="col-lg-3 col-md-6 eten" data-aos="zoom-in" data-aos-delay="100">
        <div id="list_item_card_border" class="hover-zoom">
          <div>
            <img id="card_image_list" src="images/perfect-hot-dog.jpg">
          </div>
          <div class="card_text">
            <p>willekeurig item</p>
            <p>$0.00</p>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 drinken" data-aos="zoom-in" data-aos-delay="100">
        <div id="list_item_card_border" class="hover-zoom">
          <div>
            <img id="card_image_list" src="images/perfect-hot-dog.jpg">
          </div>
          <div class="card_text">
            <p>willekeurig item</p>
            <p>$0.00</p>
          </div>
        </div>
      </div>
          <?php
        }
      ?>
    </div>
  </div>
  <!-- ======= Footer ======= -->
  @include('parts.footer')

</body>

<script>
    let etens = document.querySelectorAll('.eten');
    let drinkens = document.querySelectorAll('.drinken');

      function eten(){
        etens.forEach(eten => {
        eten.style.display = "inline"});
        drinkens.forEach(drinken => {
        drinken.style.display = "none"});
      }
      function drinken(){
        etens.forEach(eten => {
        eten.style.display = "none"});
        drinkens.forEach(drinken => {
        drinken.style.display = "inline"});
      }
      function alles(){
        etens.forEach(eten => {
        eten.style.display = "inline"});
        drinkens.forEach(drinken => {
        drinken.style.display = "inline"});
      }
    </script>

</html>
