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
            <div class="section-header" data-aos="fade-up">
                <h1><b>Inschrijven</b></h1>
            </div>
            <div class="d-flex justify-content-center">
                <ul class="list-group features flex-column col-8">
                    <!-- example -->
                    @php($i = 0)
                    @foreach($tournaments as $tournament)
                        @php($participants = $participant_list[$i])
                            <li class="list-group-item flex-row" data-href="toernooi/{{$tournament->id}}"
                                data-aos="fade-up"
                                data-aos-delay="{{$i * 100}}">
                                <div class="container feature-box d-grid hover-zoom">
                                    <div class="row">
                                        <h3 class="col-12 col-md-6 col-lg-8 text-center text-md-start align-center">{{$tournament->title}}</h3>
                                        <div class="col-12 col-md-6 col-lg-4 row">
                                            @if(!($participants >= $tournament->max_participants))
                                                <button class="col-10 col-md-12 align-self-center" style="margin: 0 auto"
                                                        type="submit">Inschrijven
                                                </button>
                                            @else
                                                <button class="col-10 col-md-12 align-self-center" style="background:red; margin: 0 auto"
                                                        type="submit">Vol
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <p class="col-12 col-md-6 col-lg-4">Datum: {{date('d-m-Y', strtotime($tournament->start_date))}}</p>
                                        <p class="col-12 col-md-6 col-lg-8">plekken bezet: {{$participants}}/{{$tournament->max_participants}}</p>
                                        <p class="col-12 col-md-6 col-lg-4">Wordt gehouden op: {{$tournament->lane}}</p>
                                    </div>
                                </div>
                            </li>
                        @php($i++)
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

</main><!-- End #main -->


<!-- ======= Footer ======= -->
@include('parts.footer')

</body>

</html>
