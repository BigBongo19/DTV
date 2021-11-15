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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
        $(".list-group-item").click(function () {
            window.location = $(this).attr("data-href");
            return false;
        });
    });
</script>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: FlexStart - v1.7.0
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    .list-group-item { border: none !important;}
    .hover-zoom {
        transition: 500ms;
    }
    .hover-zoom:hover {
        transform: scale(1.05);
        transition: 500ms;
        cursor: pointer;
    }
</style>
</head>

<body>
     <!-- ======= Header ======= -->
    @include('parts.header')
    <!-- End Header -->

  <!-- ======= Hero Section ======= -->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li>Tournooien</li>
            </ol>
            <h2>Tournooien</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
            <div class="section-header">
                <h1><b>Inschrijven</b></h1>
            </div>
            <div class="d-flex justify-content-center">
                <ul class="list-group features flex-column col-8">
                    <li class="list-group-item flex-row hover-zoom" data-href="/www/FlexStart/blog.html">
                        <div class="box">
                            <div class="container feature-box d-grid">
                                <div class="row">
                                    <h3 class="col-6">Toernooi naam 1</h3>
                                    <p class="col-6">Datum: 15-12-2021</p>
                                </div>
                                <div class="row">
                                    <p class="col-6">plekken: 8/8</p>
                                    <p class="col-6">entree prijs: $8</p>
                                </div>
                            </div>
                        </div>
                    </li>

                    <li class="list-group-item flex-row hover-zoom" data-href="#">
                        <div class="box">

                            <div class="container feature-box d-grid">
                                <div class="row">
                                    <h3 class="col-6">Toernooi naam 2</h3>
                                    <p class="col-6">Datum: 25-11-2021</p>
                                </div>

                                <div class="row">
                                    <p class="col-6">plekken: 3/4</p>
                                    <p class="col-6">entree prijs: $3</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

</main><!-- End #main -->


  <!-- ======= Footer ======= -->
  @include('parts.footer')

</body>

</html>
