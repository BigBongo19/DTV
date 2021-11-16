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
            <li>Reseveren</li>
          </ol>
          <h2>Reseveren</h2>
        </div>
      </section>
    <!-- ======= About Section ======= -->
    <section id="about" class="about">

        <div class="container">
            <div class="row justify-content-center flex-column banen text-center">


                <section id="team" class="team">

                    <div class="container" data-aos="fade-up">

                        <header class="section-header">
                            <h2>Beschikbare banen</h2>
                        </header>

                        <div class="row gy-4">

                            <div class="col-lg-3 col-md-6 d-flex align-items-baseline" data-aos="fade-up"
                                data-aos-delay="100">
                                <div class="member">
                                    <div class="member-img">
                                        <img src="assets/img/banen/tennisbaan1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="member-info">
                                        <h4>Tennisbaan 1</h4>
                                        <span>Harde ondergrond</span>
                                        <p>Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae
                                            aut.
                                            Ipsum exercitationem iure minima enim corporis et voluptate.</p>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#confirmModal">Reserveer</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                                data-aos-delay="400">
                                <div class="member">
                                    <div class="member-img">
                                        <img src="assets/img/banen/tennisbaan1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="member-info">
                                        <h4>Squashbaan 2</h4>
                                        <span>Zachte ondergrond</span>
                                        <p>Rerum voluptate non adipisci animi distinctio et deserunt amet voluptas. Quia aut
                                            aliquid doloremque ut possimus ipsum officia.</p>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#confirmModal" disabled>Reserveer</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                                data-aos-delay="400">
                                <div class="member">
                                    <div class="member-img">
                                        <img src="assets/img/banen/tennisbaan1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="member-info">
                                        <h4>Tennisbaan 3</h4>
                                        <span>Zachte ondergrond</span>
                                        <p>Rerum voluptate non adipisci animi distinctio et deserunt amet voluptas. Quia aut
                                            aliquid doloremque ut possimus ipsum officia.</p>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#confirmModal">Reserveer</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up"
                                data-aos-delay="400">
                                <div class="member">
                                    <div class="member-img">
                                        <img src="assets/img/banen/tennisbaan1.jpg" class="img-fluid" alt="">
                                    </div>
                                    <div class="member-info">
                                        <h4>Tennisbaan 4</h4>
                                        <span>Harde ondergrond</span>
                                        <p>Rerum voluptate non adipisci animi distinctio et deserunt amet voluptas. Quia aut
                                            aliquid doloremque ut possimus ipsum officia.</p>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#confirmModal">Reserveer</button>
                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>

                </section><!-- End Team Section -->
            </div>

            <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModal" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmModal">Bevestig uw reservering</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="#">
                                <div class="mb-3">
                                    <label for="disabledNumber" class="form-label">Uw lidnummer:</label>
                                    <input type="text" id="disabledNumber" class="form-control"
                                        placeholder="Hier komt het lidnummer van de gebruiker" disabled name="inputNumber">
                                </div>
                                <div class="mb-3">
                                    <label for="inputEmail" class="form-label">Email:</label>
                                    <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp"
                                        name="inputMail">
                                    <div id="emailHelp" class="form-text">Wij sturen u een email ter bevestiging van de
                                        reservering.</div>
                                </div>
                                <div class="mb-3">
                                    <label for="inputDate" class="form-label">Datum:</label>
                                    <input type="datetime-local" class="form-control" id="inputDate" name="inputDate"
                                        aria-describedby="dateHelp">
                                    <div id="dateHelp" class="form-text">U kan 1x per dag een baan reserveren!</div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuleren</button>
                            <button type="button" class="btn btn-free">Reserveren</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('parts.footer')

</body>

</html>