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
  <link href="/assets/css/default.css" rel="stylesheet">
  <link href="/assets/css/default.date.css" rel="stylesheet">
  <link href="/assets/css/default.time.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>

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
</head>

<body>
     <!-- ======= Header ======= -->
    @include('parts.header')
    <!-- End Header -->



  <main id="main">
    <section class="breadcrumbs">
        <div class="container">

          <ol>
            <li><a href="/">Home</a></li>
            <li>Baan reserveren</li>
          </ol>
          <h2>Reserveer een baan</h2>
        </div>
      </section>
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <script>
                $( function() {
                    $( "#datepicker" ).datepicker({
                        minDate: 0,
                        maxDate: "+6D",
                        onSelect : function (dateText, inst) {
                            $('#form').submit(); // <-- SUBMIT
                        }

                        });
                } );
                </script>
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <i class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" role="img" width="24" height="24"></i>
                    <div>
                     Om zoveel mogelijk banen beschikbaar te stellen kunt u maar 1 reservatie hebben.
                    </div>
                  </div>
            <div class="row reservatie">

                <div class="res-text">
                    <h1>Jouw reservatie</h1>
                    <h3 class="text-muted">Bekijk je reserveringen op <a href="/profile">jouw account</a>.</h3>
                </div>
                <p class="res-date"><b>{{$reservation->start_time}}</b> tot <b>{{$reservation->end_time}}</b></p>
                <a href="/reserveren/annuleren/{{$reservation->id}}" class="btn btn-danger d-inline" style="max-width: 200px">Annuleer</a>

            </div>



        </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('parts.footer')

</body>

</html>
