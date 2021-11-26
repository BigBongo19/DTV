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
      width: 100%;
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
    <div id="item_list">
      <div class="row">
        <div class="warm_eten col">
          <ul class="list-group list-group-flush">
            <h5 class="d-flex justify-content-center"><b>warm eten</b></h6>
      <?php
        foreach ($items as $item) {
            if ($item->type == 0) {
          ?>
          <li class="list-group-item">
            <div class="row d-flex justify-content-between">
            <div class="col-4">
            <p class="d-flex justify-content-center">{{$item->name}}</p>
            </div>
            <div class="col-4">
            <p class="d-flex justify-content-center">€{{number_format($item->price,2)}}</p>
            </div>
            </div>
            </li>
          <?php
        }}
      ?>
          </ul>
        </div>
        <div class="warm_eten col">
          <ul class="list-group list-group-flush">
            <h5 class="d-flex justify-content-center"><b>koud eten</b></h6>
      <?php
        foreach ($items as $item) {
            if ($item->type == 1) {
          ?>
          <li class="list-group-item">
            <div class="row d-flex justify-content-between">
            <div class="col-4">
            <p class="d-flex justify-content-center">{{$item->name}}</p>
            </div>
            <div class="col-4">
            <p class="d-flex justify-content-center">€{{number_format($item->price,2)}}</p>
            </div>
            </div>
            </li>
          <?php
        }}
      ?>
          </ul>
        </div>
        <div class="warm_eten col">
          <ul class="list-group list-group-flush">
            <h5 class="d-flex justify-content-center"><b>snacks</b></h6>
      <?php
        foreach ($items as $item) {
            if ($item->type == 2) {
          ?>
          <li class="list-group-item">
            <div class="row d-flex justify-content-between">
            <div class="col-4">
            <p class="d-flex justify-content-center">{{$item->name}}</p>
            </div>
            <div class="col-4">
            <p class="d-flex justify-content-center">€{{number_format($item->price,2)}}</p>
            </div>
            </div>
            </li>
          <?php
        }}
      ?>
          </ul>
        </div>
        </div>
        <div class="row">
          <div class="warm_eten col">
            <ul class="list-group list-group-flush">
              <h5 class="d-flex justify-content-center"><b>water</b></h6>
        <?php
          foreach ($items as $item) {
              if ($item->type == 3) {
            ?>
            <li class="list-group-item">
              <div class="row d-flex justify-content-between">
              <div class="col-4">
              <p class="d-flex justify-content-center">{{$item->name}}</p>
              </div>
              <div class="col-4">
              <p class="d-flex justify-content-center">€{{number_format($item->price,2)}}</p>
              </div>
              </div>
              </li>
            <?php
          }}
        ?>
            </ul>
          </div>
          <div class="warm_eten col">
            <ul class="list-group list-group-flush">
              <h5 class="d-flex justify-content-center"><b>frisdrank</b></h6>
        <?php
          foreach ($items as $item) {
              if ($item->type == 4) {
            ?>
            <li class="list-group-item">
              <div class="row d-flex justify-content-between">
              <div class="col-4">
              <p class="d-flex justify-content-center">{{$item->name}}</p>
              </div>
              <div class="col-4">
              <p class="d-flex justify-content-center">€{{number_format($item->price,2)}}</p>
              </div>
              </div>
              </li>
            <?php
          }}
        ?>
            </ul>
          </div>
          <div class="warm_eten col">
            <ul class="list-group list-group-flush">
              <h5 class="d-flex justify-content-center"><b>alcolholische dranken</b></h6>
        <?php
          foreach ($items as $item) {
              if ($item->type == 5) {
            ?>
            <li class="list-group-item">
              <div class="row d-flex justify-content-between">
              <div class="col-4">
              <p class="d-flex justify-content-center">{{$item->name}}</p>
              </div>
              <div class="col-4">
              <p class="d-flex justify-content-center">€{{number_format($item->price,2)}}</p>
              </div>
              </div>
              </li>
            <?php
          }}
        ?>
            </ul>
          </div>
          </div>
    </div>
  </div>
  <!-- ======= Footer ======= -->
  @include('parts.footer')

</body>

</html>
