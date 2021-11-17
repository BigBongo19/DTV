<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DTV | {{"<tournament name>"}}</title>
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
                <li>Toernooi</li>
            </ol>
            <h2>Toernooi: {{"Toernooi naam"}}</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container tourney">
            <div class="section-header" data-aos="fade-up">
                <h1><b>Inschrijven</b></h1>
            </div>



            <div class="description d-flex justify-content row mt-5" data-aos="fade-up" data-aos-delay="100">
                <p class="col-12 col-lg-8">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime mollitia,
                    molestiae quas vel sint commodi repudiandae consequuntur voluptatum laborum
                    numquam blanditiis harum quisquam eius sed odit fugiat iusto fuga praesentium
                    optio, eaque rerum! Provident similique accusantium nemo autem. Veritatis
                    obcaecati tenetur iure eius earum ut molestias architecto voluptate aliquam
                    nihil, eveniet aliquid culpa officia aut! Impedit sit sunt quaerat, odit,
                    tenetur error, harum nesciunt ipsum debitis quas aliquid. Reprehenderit,
                    quia. Quo neque error repudiandae fuga? Ipsa laudantium molestias eos
                    sapiente officiis modi at sunt excepturi expedita sint? Sed quibusdam
                    recusandae alias error harum maxime adipisci amet laborum.
                </p>
                <div class="col-12 col-lg-4">
                    <div class="row">
                        <img class="col-12" src="assets/img/logo.png">
                    </div>
                </div>
            </div>

            <div class="align-self-center d-flex row mt-5" data-aos="fade-up" data-aos-delay="200">
                <p class="col-sm-12 col-md-4">plekken beschikbaar {{rand(0,32)}}/32</p>
                <p class="col-sm-12 col-md-4">Inschrijven tot dd-mm-yyyy</p>
                <button class="col-sm-12 col-md-4" type="submit">Inschrijven</button>

            </div>

            <div class="participants mt-5">
                <div class="justify-content-center">
                    <div class="section-header" data-aos="fade-up" data-aos-delay="300">
                        <h3>Deelnemers:</h3>
                    </div>
                    <div class="features" data-aos="fade-up" data-aos-delay="400">
                        <div class="feature-box">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Voornaam:</th>
                                    <th scope="col">Achternaam:</th>
                                    <th scope="col">Inschrijfdatum:</th>
                                </tr>
                                </thead>

                                <tbody>
                                @for($i = 1; $i <= 8; $i++)
                                    <tr>
                                        <td>voornaam {{$i}}</td>
                                        <td>achternaam {{$i}}</td>
                                        <td>ingeschreven op: dd-mm-yyyy</td>
                                    </tr>
                                @endfor
                                </tbody>
                            </table>
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
