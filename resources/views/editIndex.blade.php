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

        <section class="account-details-change">
            <div class="list">
                <div class="list-item"><a href="/profile">Account</a></div>
                <div class="list-item"><a href="/edit-profile">Aanpassen</a></div>
                <div class="list-item"><a href="/payments">Betalingen</a></div>
            </div>

            <div class="account-options">
                <h1>Account aanpassen</h1>

                <div class="profile-update">
                    <h3>Profielfoto</h3>
                    <div class="avatar">
                        <img src="assets/img/team/team-1.jpg" alt="team 1">
                        <a href="#" class="link-primary">Upload</a>
                        <a href="#" class="link-secondary">Remove</a>
                    </div>
                    <form action="#">
                        <div class="row">
                            <div class="col">
                                <label for="inputNickname" class="form-label">Voornaam:</label>
                                <input type="email" class="form-control" id="inputNickname"
                                    aria-describedby="nicknameHelp" name="nickname" value="{{$user->name}}">
                                <div id="nicknameHelp" class="form-text">Deze naam is zichtbaar voor iedereen</div>
                            </div>

                            <div class="col">
                                <label for="inputName" class="form-label">Achternaam:</label>
                                <input type="text" class="form-control" id="inputName" aria-describedby="nameHelp"
                                    name="name" value="{{$user->last_name}}">
                                <div id="nameHelp" class="form-text">Hoe wil je worden genoemd?</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp"
                                    name="email" value="{{$user->email}}">
                                <div id="emailHelp" class="form-text">Om in te loggen</div>
                            </div>

                            <div class="col">
                                <label for="inputPhone" class="form-label">Telefoonnummer</label>
                                <input type="tel" class="form-control" id="inputPhone" aria-describedby="phoneHelp"
                                    name="phone" value="{{$user->phone_number}}">
                                <div id="phoneHelp" class="form-text">Zodat wij u kunnen bereiken</div>
                            </div>
                        </div>

                        <div class="row change_pass">
                            <div class="col">
                                <div class="text">
                                    <label for="inputEmail" class="form-label">Wachtwoord aanpassen</label>
                                    <div id="emailHelp" class="form-text">Hier kunt u uw wachtwoord aanpassen</div>
                                </div>
                                <button type="button" class="btn btn-secondary">Wijzig wachtwoord</button>
                            </div>
                        </div>

                        <div class="row delete">
                            <div class="col">
                                <div class="text">
                                    <label for="inputEmail" class="form-label">Account Verwijderen</label>
                                    <div id="emailHelp" class="form-text">Als u uw account verwijderd, verwijderd u ook
                                        al uw gegevens</div>
                                </div>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete">Verwijderen</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>

        <div class="modal fade" tabindex="-1" id="modalDelete" data-bs-backdrop="static" data-bs-keyboard="false">
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


  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('parts.footer')

</body>

</html>
