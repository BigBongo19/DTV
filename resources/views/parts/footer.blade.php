  <footer id="footer" class="footer">

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>DTV</span></strong>.
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/purecounter/purecounter.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet">
  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- jQuery -->
  <script src="/plugins/jquery/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <script>
      @if (Session::has('message'))
          toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-bottom-center",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
          }
          toastr.success("{{ session('message') }}");
      @endif
      @if (Session::has('warning'))
          toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-bottom-center",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
          }
          toastr.warning("{{ session('warning') }}");
      @endif
      @if(count($errors) > 0)
      @foreach($errors->all() as $error)
      toastr.options =
      {
          "closeButton" : true,
          "progressBar" : true
      }
              toastr.error("{{$error}}");
       @endforeach
  @endif
  </script>
