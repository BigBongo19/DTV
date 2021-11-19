<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>DTV | Profiel</title>
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
    <!-- ======= About Section ======= -->
    <div class="container account">
        <h1>Instellingen</h1>

        <section class="account-details">
            <div class="list">
                <div class="list-item"><a href="/profile">Account</a></div>
                <div class="list-item"><a href="/edit-profile">Aanpassen</a></div>
                <div class="list-item"><a href="/payments">Betalingen</a></div>
            </div>

            <div class="account-options">
                <h1>Account</h1>

                <div class="profile-update">
                    <h3>Profielfoto</h3>
                    <div class="avatar">
                        <img src="assets/img/team/team-1.jpg" alt="team 1">
                    </div>
                    <form action="#">
                        <div class="row">
                            <div class="col">
                                <label for="inputNickname" class="form-label">Voornaam:</label>
                                <p>{{$user->name}}</p>
                            </div>

                            <div class="col">
                                <label for="inputName" class="form-label">Achternaam:</label>
                                <p>{{$user->last_name}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="inputEmail" class="form-label">Email</label>
                                <p>{{$user->email}}</p>
                            </div>

                            <div class="col">
                                <label for="inputPhone" class="form-label">Lid nummer</label>
                                <p>{{$user->id}}</p>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="profile-reservations">
                <h1>Reserveringen</h1>

                <table>
                    <tr>
                        <th>Datum</th>
                        <th>Tijdstip</th>
                        <th>Baan</th>
                    </tr>
                    <tr>
                        <td>11/26/2021</td>
                        <td>11:00</td>
                        <td>Tennisbaan 1</td>
                    </tr>
                    <tr>
                        <td>11/27/2021</td>
                        <td>16:00</td>
                        <td>Tennisbaan 4</td>
                    </tr>
                    <tr>
                        <td>11/28/2021</td>
                        <td>08:30</td>
                        <td>Squashbaan 1</td>
                    </tr>
                    <tr>
                        <td>11/29/2021</td>
                        <td>15:45</td>
                        <td>Tennisbaan 5</td>
                    </tr>
                    <tr>
                        <td>11/30/2021</td>
                        <td>19:30</td>
                        <td>Squashbaan 3</td>
                    </tr>
                </table>
            </div>
        </section>
    </div>

        <div class="modal fade" tabindex="-1" id="modalDelete" data-bs-backdrop="static" data-bs-keyboard="false" >
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Weet je het zeker?</h5>
                </div>
                <div class="modal-body">
                  <p>Als je je account verwijderd, verdwijnen ook <b>ALLE</b> gegevens op uw account.</p>
                  <p>Wilt u doorgaan?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Nee</button>
                  <button type="button" class="btn btn-danger">Ja, verwijder mijn account</button>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('parts.footer')

</body>

</html>
