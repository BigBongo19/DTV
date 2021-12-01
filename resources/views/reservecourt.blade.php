<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DTV | Home</title>
  <meta content="" name="description">

  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/favicon.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/lib/themes/default.css">
  <link rel="stylesheet" href="/lib/themes/default.time.css">
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

            <div class="row reservatie">

                <form method="POST" action="/reserveren/bevestigen">
                    @csrf
                    <fieldset>
                        <h1><label for="input_01">Kies een tijd om deze baan de reserveren</label></h1>
                        <input
                            id="input_from"
                            class="datepicker form-control"
                            type="time"
                            name="time"
                            placeholder="Selecteer tijd"
                            required>
                            <!-- valuee="2:30 AM"
                            data-value="0:00" -->
                            <input name="date" value="{{$date}}" type="hidden">
                            <input name="court_id" value="{{$court_id}}" type="hidden">
                            <input class="btn btn-primary" value="Reserveren" type="submit">
                    </fieldset>
                </form>
            </div>



        </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('parts.footer')

</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="/lib/picker.js"></script>
<script src="/lib/picker.time.js"></script>
<script src="/lib/legacy.js"></script>
<script type="text/javascript">

    $('.datepicker').pickatime({
  min: [{{array_key_first($times)}}],
  max: [{{end($times)}}],
  formatSubmit: 'HH:i',
  interval: 60,
  disable: [
    @foreach ($reservationsTimes as $key => $value)
        [{{$reservationsTimes[$key]}}],
    @endforeach
  ]

})
    // picker.open()

</script>
