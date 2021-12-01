<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DTV | Menu</title>
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

   <!-- Font Awesome Icons -->
   <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
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
  <div id="menu">
      <div class="selection-list">
          <div class="selection-list-item">
            <i class="fas fa-hamburger"></i>
            <div class="selection-item-text">Warm eten</div>
          </div>

          <div class="selection-list-item">
            <i class="fas fa-ice-cream"></i>
            <div class="selection-item-text">Koud eten</div>
          </div>

          <div class="selection-list-item">
            <i class="fas fa-cookie-bite"></i>
            <div class="selection-item-text">Snacks</div>
          </div>

          <div class="selection-list-item">
            <i class="fas fa-cocktail"></i>
            <div class="selection-item-text">Drinken</div>
          </div>
      </div>
    <div id="item_list" class="container">
      <div class="row">
        <div class="warm_eten col">
          <ul class="list-group list-group-flush">
            <h5 class="d-flex justify-content-center"><b>warm eten</b></h6>
      <?php
        foreach ($items as $item) {
            if ($item->type == 0) {
                if ($item->enabled == 1) {
          ?>
          <li class="list-group-item">
            <div class="row d-flex justify-content-between">
            <div class="col-4">
            <p class="d-flex justify-content-start">{{$item->name}}</p>
            </div>
            <div class="col-4">
            <p class="d-flex justify-content-end">€{{number_format($item->price,2)}}</p>
            </div>
            </div>
            </li>
          <?php
        }}}
      ?>
          </ul>
        </div>
        <div class="warm_eten col">
          <ul class="list-group list-group-flush">
            <h5 class="d-flex justify-content-center"><b>koud eten</b></h6>
      <?php
        foreach ($items as $item) {
            if ($item->type == 1) {
                if ($item->enabled == 1) {
          ?>
          <li class="list-group-item">
            <div class="row d-flex justify-content-between">
            <div class="col-4">
            <p class="d-flex justify-content-start">{{$item->name}}</p>
            </div>
            <div class="col-4">
            <p class="d-flex justify-content-end">€{{number_format($item->price,2)}}</p>
            </div>
            </div>
            </li>
          <?php
        }}}
      ?>
          </ul>
        </div>
        <div class="warm_eten col">
          <ul class="list-group list-group-flush">
            <h5 class="d-flex justify-content-center"><b>snacks</b></h6>
      <?php
        foreach ($items as $item) {
            if ($item->type == 2) {
                if ($item->enabled == 1) {
          ?>
          <li class="list-group-item">
            <div class="row d-flex justify-content-between">
            <div class="col-4">
            <p class="d-flex justify-content-start">{{$item->name}}</p>
            </div>
            <div class="col-4">
            <p class="d-flex justify-content-end">€{{number_format($item->price,2)}}</p>
            </div>
            </div>
            </li>
          <?php
        }}}
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
                if ($item->enabled == 1) {
            ?>
            <li class="list-group-item">
              <div class="row d-flex justify-content-between">
              <div class="col-4">
              <p class="d-flex justify-content-start">{{$item->name}}</p>
              </div>
              <div class="col-4">
              <p class="d-flex justify-content-end">€{{number_format($item->price,2)}}</p>
              </div>
              </div>
              </li>
            <?php
          }}}
        ?>
            </ul>
          </div>
          <div class="warm_eten col">
            <ul class="list-group list-group-flush">
              <h5 class="d-flex justify-content-center"><b>frisdrank</b></h6>
        <?php
          foreach ($items as $item) {
              if ($item->type == 4) {
                if ($item->enabled == 1) {
            ?>
            <li class="list-group-item">
              <div class="row d-flex justify-content-between">
              <div class="col-4">
              <p class="d-flex justify-content-start">{{$item->name}}</p>
              </div>
              <div class="col-4">
              <p class="d-flex justify-content-end">€{{number_format($item->price,2)}}</p>
              </div>
              </div>
              </li>
            <?php
          }}}
        ?>
            </ul>
          </div>
          <div class="warm_eten col">
            <ul class="list-group list-group-flush">
              <h5 class="d-flex justify-content-center"><b>alcolholische dranken</b></h6>
        <?php
          foreach ($items as $item) {
              if ($item->type == 5) {
                if ($item->enabled == 1) {
            ?>
            <li class="list-group-item">
              <div class="row d-flex justify-content-between">
              <div class="col-4">
              <p class="d-flex justify-content-start">{{$item->name}}</p>
              </div>
              <div class="col-4">
              <p class="d-flex justify-content-end">€{{number_format($item->price,2)}}</p>
              </div>
              </div>
              </li>
            <?php
          }}}
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
