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

    .hover-zoom {
      transition: 500ms;
      z-index: auto;
    }
    .hover-zoom:hover {
      transform: scale(1.05);
      transition: 500ms;
      cursor: pointer;
    }
    #item-soort-titel{
        display: flex;
        justify-content: center;
        width: 100%;
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
          <a href="#" onclick="warm_eten_selector()" id="random_item_title_section">warm eten</a>
          <a href="#" onclick="koud_eten_selector()" id="random_item_title_section">koud eten</a>
          <a href="#" onclick="snacks_selector()" id="random_item_title_section">snacks</a>
          <a href="#" onclick="water_selector()" id="random_item_title_section">water</a>
          <a href="#" onclick="fris_drank_selector()" id="random_item_title_section">fris drank</a>
          <a href="#" onclick="alcohol_selector()" id="random_item_title_section">alcoholische dranken</a>
          <a href="#" onclick="alles_selector()" id="random_item_title_section">alles</a>
      </div>
      <?php
      foreach ($items as $item){
          if ($item->sale == 1) {
              ?>
              <div class="hover-zoom">
                <div id="random_item_card_border" class="col-lg-3 col-md-6">
                  <div>
                    <img class="img-fluid" alt="Responsive image" id="card_image" src="images/{{$item->img_path}}">
                  </div>
                  <div class="card_text">
                    <p>{{$item->name}}</p>
                    <p>€{{number_format($item->price,2)}}</p>
                  </div>
                </div>
                </div>
              <?php
          }
        }
      ?>
    </div>
    <div id="item_list">
        <div class="warm_eten">
        <h1 id="item-soort-titel">warm eten</h1>
      <?php
        foreach ($items as $item) {
            if ($item->type == 0) {
          ?>
        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
        <div id="list_item_card_border" class="hover-zoom">
          <div>
            <img id="card_image_list" src="images/{{$item->img_path}}" class="img-fluid" alt="Responsive image">
          </div>
          <div class="card_text">
            <p>{{$item->name}}</p>
            <p>€{{number_format($item->price,2)}}</p>
          </div>
        </div>
      </div>
          <?php
        }}
      ?>
        </div>
        <div class="koud_eten">
      <h1 id="item-soort-titel" >koud eten</h1>
      <?php
        foreach ($items as $item) {
            if ($item->type == 1) {
          ?>
        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
        <div id="list_item_card_border" class="hover-zoom">
          <div>
            <img class="img-fluid" alt="Responsive image" id="card_image_list" src="images/{{$item->img_path}}">
          </div>
          <div class="card_text">
            <p>{{$item->name}}</p>
            <p>€{{number_format($item->price,2)}}</p>
          </div>
        </div>
      </div>
          <?php
        }}
      ?>
        </div>
        <div class="snacks">
      <h1 id="item-soort-titel">snacks</h1>
      <?php
        foreach ($items as $item) {
            if ($item->type == 2) {
          ?>
        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
        <div id="list_item_card_border" class="hover-zoom">
          <div>
            <img class="img-fluid" alt="Responsive image" id="card_image_list" src="images/{{$item->img_path}}">
          </div>
          <div class="card_text">
            <p>{{$item->name}}</p>
            <p>€{{number_format($item->price,2)}}</p>
          </div>
        </div>
      </div>
          <?php
        }}
      ?>
        </div>
        <div class="water">
      <h1 id="item-soort-titel">water</h1>
      <?php
        foreach ($items as $item) {
            if ($item->type == 3) {
          ?>
        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
        <div id="list_item_card_border" class="hover-zoom">
          <div>
            <img class="img-fluid" alt="Responsive image" id="card_image_list" src="images/{{$item->img_path}}">
          </div>
          <div class="card_text">
            <p>{{$item->name}}</p>
            <p>€{{number_format($item->price,2)}}</p>
          </div>
        </div>
      </div>
          <?php
        }}
      ?>
        </div>
        <div class="fris_drank">
<h1 id="item-soort-titel">fris drank</h1>
      <?php
        foreach ($items as $item) {
            if ($item->type == 4) {
          ?>
        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
        <div id="list_item_card_border" class="hover-zoom">
          <div>
            <img class="img-fluid" alt="Responsive image" id="card_image_list image_small" src="images/{{$item->img_path}}">
          </div>
          <div class="card_text">
            <p>{{$item->name}}</p>
            <p>€{{number_format($item->price,2)}}</p>
          </div>
        </div>
      </div>
          <?php
        }}
      ?>
        </div>
        <div class="alcohol">
<h1 id="item-soort-titel">alcoholische dranken</h1>
<?php
  foreach ($items as $item) {
    if ($item->type == 5) {
    ?>
  <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="100">
  <div id="list_item_card_border" class="hover-zoom">
    <div>
      <img class="img-fluid" alt="Responsive image" id="card_image_list image_small" src="images/{{$item->img_path}}">
    </div>
    <div class="card_text">
      <p>{{$item->name}}</p>
      <p>€{{number_format($item->price,2)}}</p>
    </div>
  </div>
</div>
    <?php
  }}
?>
        </div>
    </div>
  </div>
  <!-- ======= Footer ======= -->
  @include('parts.footer')

</body>

<script>
    let warm_etens = document.querySelectorAll('.warm_eten');
    let koud_etens = document.querySelectorAll('.koud_eten');
    let snacks = document.querySelectorAll('.snacks');
    let waters = document.querySelectorAll('.water');
    let fris_dranks = document.querySelectorAll('.fris_drank');
    let alcohols = document.querySelectorAll('.alcohol');

      function warm_eten_selector(){
        warm_etens.forEach(warm_eten => {
        warm_eten.style.display = "inline"});
        koud_etens.forEach(koud_eten => {
        koud_eten.style.display = "none"});
        snacks.forEach(snack => {
        snack.style.display = "none"});
        waters.forEach(water => {
        water.style.display = "none"});
        fris_dranks.forEach(fris_drank => {
        fris_drank.style.display = "none"});
        alcohols.forEach(alcohol => {
        alcohol.style.display = "none"});
      }
      function koud_eten_selector(){
        warm_etens.forEach(warm_eten => {
        warm_eten.style.display = "none"});
        koud_etens.forEach(koud_eten => {
        koud_eten.style.display = "inline"});
        snacks.forEach(snack => {
        snack.style.display = "none"});
        waters.forEach(water => {
        water.style.display = "none"});
        fris_dranks.forEach(fris_drank => {
        fris_drank.style.display = "none"});
        alcohols.forEach(alcohol => {
        alcohol.style.display = "none"});
      }
      function snacks_selector(){
        warm_etens.forEach(warm_eten => {
        warm_eten.style.display = "none"});
        koud_etens.forEach(koud_eten => {
        koud_eten.style.display = "none"});
        snacks.forEach(snack => {
        snack.style.display = "inline"});
        waters.forEach(water => {
        water.style.display = "none"});
        fris_dranks.forEach(fris_drank => {
        fris_drank.style.display = "none"});
        alcohols.forEach(alcohol => {
        alcohol.style.display = "none"});
      }
      function water_selector(){
        warm_etens.forEach(warm_eten => {
        warm_eten.style.display = "none"});
        koud_etens.forEach(koud_eten => {
        koud_eten.style.display = "none"});
        snacks.forEach(snack => {
        snack.style.display = "none"});
        waters.forEach(water => {
        water.style.display = "inline"});
        fris_dranks.forEach(fris_drank => {
        fris_drank.style.display = "none"});
        alcohols.forEach(alcohol => {
        alcohol.style.display = "none"});
      }
      function fris_drank_selector(){
        warm_etens.forEach(warm_eten => {
        warm_eten.style.display = "none"});
        koud_etens.forEach(koud_eten => {
        koud_eten.style.display = "none"});
        snacks.forEach(snack => {
        snack.style.display = "none"});
        waters.forEach(water => {
        water.style.display = "none"});
        fris_dranks.forEach(fris_drank => {
        fris_drank.style.display = "inline"});
        alcohols.forEach(alcohol => {
        alcohol.style.display = "none"});
      }
      function alcohol_selector(){
        warm_etens.forEach(warm_eten => {
        warm_eten.style.display = "none"});
        koud_etens.forEach(koud_eten => {
        koud_eten.style.display = "none"});
        snacks.forEach(snack => {
        snack.style.display = "none"});
        waters.forEach(water => {
        water.style.display = "none"});
        fris_dranks.forEach(fris_drank => {
        fris_drank.style.display = "none"});
        alcohols.forEach(alcohol => {
        alcohol.style.display = "inline"});
      }
      function alles_selector(){
        warm_etens.forEach(warm_eten => {
        warm_eten.style.display = "inline"});
        koud_etens.forEach(koud_eten => {
        koud_eten.style.display = "inline"});
        snacks.forEach(snack => {
        snack.style.display = "inline"});
        waters.forEach(water => {
        water.style.display = "inline"});
        fris_dranks.forEach(fris_drank => {
        fris_drank.style.display = "inline"});
        alcohols.forEach(alcohol => {
        alcohol.style.display = "inline"});
      }
    </script>

</html>
