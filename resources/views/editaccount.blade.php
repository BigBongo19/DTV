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
                    <li>Account aanpassen</li>
                </ol>
                <h2>Account aanpassen</h2>
            </div>
        </section>

        <div class="container account">

            <section class="account-details-change">
                <div class="list">
                    <div class="list-item"><a href="/profile">Account</a></div>
                    <div class="list-item"><a href="/edit-profile">Aanpassen</a></div>
                </div>

                <div class="account-options">

                    <div class="profile-update">
                        <h3>Profielfoto:</h3>
                        <div class="avatar">
                            <img @if(isset($user->img_path)) src="/storage/{{ $user->img_path }}" @else src="/images/default.jpg" @endif alt="Profielfoto">
                            <form action="/profile/upload" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="image" id="img" style="display:none;" onchange="form.submit()">
                                <label class="link-primary" style="cursor: pointer; margin-left:10px;" for="img">Uploaden</label>
                            </form>
                            @if(isset($user->img_path))<a href="/profile/remove_image" class="link-danger">Verwijderen</a>@endif
                        </div>
                        <form action="/edit-profile/submit" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="inputNickname" class="form-label">Voornaam:</label>
                                    <input type="text" class="form-control" id="inputNickname"
                                        aria-describedby="nicknameHelp" name="name" value="{{ $user->name }}">
                                    <div id="nicknameHelp" class="form-text">Deze naam is zichtbaar voor iedereen
                                    </div>
                                </div>

                                <div class="col">
                                    <label for="inputName" class="form-label">Achternaam:</label>
                                    <input type="text" class="form-control" id="inputName" aria-describedby="nameHelp"
                                        name="last_name" value="{{ $user->last_name }}">
                                    <div id="nameHelp" class="form-text">Hoe wil je worden genoemd?</div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="inputEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="inputEmail"
                                        aria-describedby="emailHelp" name="email" value="{{ $user->email }}">
                                    <div id="emailHelp" class="form-text">Om in te loggen</div>
                                </div>

                                <div class="col">
                                    <label for="inputPhone" class="form-label">Telefoonnummer</label>
                                    <input type="tel" class="form-control" id="inputPhone"
                                        aria-describedby="phoneHelp" name="phone" value="{{ $user->phone_number }}">
                                    <div id="phoneHelp" class="form-text">Zodat wij u kunnen bereiken</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="inputEmail" class="form-label">Geslacht</label>
                                    <select name="gender" class="form-select" aria-label="Default select example">
                                        <option value="null" disabled selected hidden>Selecteer uw geslacht</option>
                                        <option value="1" @if ($user->gender == 1) selected @endif>Man</option>
                                        <option value="2" @if ($user->gender == 2) selected @endif>Vrouw</option>
                                        <option value="3" @if ($user->gender == 3) selected @endif>Overig</option>
                                    </select>
                                    <div id="emailHelp" class="form-text">Algemene info</div>
                                </div>
                            </div>

                            <div class="row change_pass">
                                <div class="col">
                                    <div class="text">
                                        <label for="inputEmail" class="form-label">Wachtwoord wijzigen</label>
                                        <div id="emailHelp" class="form-text">Wij raden aan om minimaal 10 tekens te gebruiken.</div>
                                    </div>
                                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete">Wijzigen</button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <input type="submit" class="btn btn-primary" value="Opslaan">
                                </div>
                            </div>



                            {{-- <div class="row delete">
                            <div class="col">
                                <div class="text">
                                    <label for="inputEmail" class="form-label">Account Verwijderen</label>
                                    <div id="emailHelp" class="form-text">Als u uw account verwijderd, verwijderd u ook
                                        al uw gegevens</div>
                                </div>
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDelete">Verwijderen</button>
                            </div>
                        </div> --}}

                        </form>
                    </div>
                </div>
            </section>

            <div class="modal fade changePass" tabindex="-1" id="modalDelete" data-bs-backdrop="static"
                data-bs-keyboard="false">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Wachtwoord wijzigen</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form data-parsley-validate class="form-horizontal form-label-left"
                                action="/edit-profile/submitpassword" method="post">
                                @csrf
                                <div class="form-group" style="margin-bottom: 5px">
                                    <label for="oldPass">Huidig wachtwoord</label>
                                    <input type="password" class="form-control"
                                        placeholder="" name="oldpassword" id="oldPass">
                                </div>

                                <div class="form-group" style="margin-bottom: 5px">
                                    <label for="newPass">Nieuw wachtwoord</label>
                                    <input type="password" placeholder=""
                                        class="form-control" name="newpassword" id="newPass">
                                </div>

                                <div class="form-group">
                                    <label for="newPassRepeat">Herhaal nieuw wachtwoord</label>
                                    <input type="password" class="form-control"
                                        placeholder="" name="password_confirmation" id="newPassRepeat">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Aanpassen</button>

                            </form>
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
