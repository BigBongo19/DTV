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

      <div class="container account" data-aos="fade-up">
        <h1>Instellingen</h1>

        <section class="account-details">
            <div class="list">
                <div class="list-item"><a href="/profile">Account</a></div>
                <div class="list-item"><a href="/edit-profile">Aanpassen</a></div>
                <div class="list-item"><a href="/payments">Betalingen</a></div>
            </div>

            <div class="account-options">
                <h1>Betalingen</h1>
                <div class="payInfo">
                    <div class="payPreference">
                        <h3>Voorkeur</h3>
                        <form action="#" class="form-control">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Selecteer een betaalmiddel</option>
                                <option value="1">IDeal</option>
                                <option value="2">Creditcard</option>
                                <option value="3">Paypal</option>
                            </select>

                            <button type="button" class="btn btn-primary form-control mt-3">Opslaan</button>
                        </form>
                    </div>

                    <div class="payHistory">
                        <h3>Betalingsgeschiedenis</h3>
                        <table>
                            <tr>
                                <th>Datum</th>
                                <th>Bedrag</th>
                            </tr>
                            <tr>
                                <td>26/11/2021</td>
                                <td>€2,99</td>
                            </tr>
                            <tr>
                                <td>30/11/2021</td>
                                <td>€4,89</td>
                            </tr>
                            <tr>
                                <td>4/12/2021</td>
                                <td>€12,99</td>
                            </tr>
                            <tr>
                                <td>6/12/2021</td>
                                <td>€5,49</td>
                            </tr>
                        </table>
                    </div>
                </div>


            </div>
        </section>
      </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('parts.footer')

</body>

</html>
