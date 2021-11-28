<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DTV | Toernooien</title>
    <meta content="" name="description">

    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

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
    <link href="/assets/css/style.css" rel="stylesheet">

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

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <ol>
                <li><a href="/">Home</a></li>
                <li>Toernooien</li>
            </ol>
            <h2>Toernooien</h2>
        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container tourney">
            <div class="section-header">
                <h1><b>Schrijf je in voor een toernooi</b></h1>
            </div>
            <div class="tCards">
                <div class="tCard">
                    <div class="tCard-header">
                        <h3>Titel kaart</h3>
                    </div>
                    <div class="tCard-body">
                        <div class="tCard-desc">
                            <p>Hier komt een beetje beschrijving te staan.</p>
                        </div>
                        <div class="tCard-dates-and-button">
                            <p class="text">Dit toernooi begint op: DATUM</p>
                            <a href="#" class="tCard-btn">Schrijf je in!</a>
                        </div>
                    </div>
                </div>
                <div class="tCard">
                    <div class="tCard-header">
                        <h3>Titel kaart</h3>
                    </div>
                    <div class="tCard-body">
                        <div class="tCard-desc">
                            <p>Soms staat er wat nuttigs in de beschrijving.</p>
                        </div>
                        <div class="tCard-dates-and-button">
                            <p class="text">Dit toernooi begint op: DATUM</p>
                            <a href="#" class="tCard-btn">Schrijf je in!</a>
                        </div>
                    </div>
                </div>
                <div class="tCard">
                    <div class="tCard-header">
                        <h3>Titel kaart</h3>
                    </div>
                    <div class="tCard-body">
                        <div class="tCard-desc">
                            <p>Het kan ook voorkomen dat een beschrijving niet zo lang is.</p>
                        </div>
                        <div class="tCard-dates-and-button">
                            <p class="text">Dit toernooi begint op: DATUM</p>
                            <a href="#" class="tCard-btn">Schrijf je in!</a>
                        </div>
                    </div>
                </div>
                <div class="tCard">
                    <div class="tCard-header">
                        <h3>Titel kaart</h3>
                    </div>
                    <div class="tCard-body">
                        <div class="tCard-desc">
                            <p>Het kan ook voorkomen dat een beschrijving niet zo lang is.</p>
                        </div>
                        <div class="tCard-dates-and-button">
                            <p class="text">Dit toernooi begint op: DATUM</p>
                            <a href="#" class="tCard-btn">Schrijf je in!</a>
                        </div>
                    </div>
                </div>
                <div class="tCard">
                    <div class="tCard-header">
                        <h3>Titel kaart</h3>
                    </div>
                    <div class="tCard-body">
                        <div class="tCard-desc">
                            <p>Het kan ook voorkomen dat een beschrijving niet zo lang is.</p>
                        </div>
                        <div class="tCard-dates-and-button">
                            <p class="text">Dit toernooi begint op: DATUM</p>
                            <a href="#" class="tCard-btn">Schrijf je in!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main><!-- End #main -->


<!-- ======= Footer ======= -->
@include('parts.footer')

</body>

</html>
