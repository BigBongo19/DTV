<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DTV Admin | Menu</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('parts.sidebar')

        <!-- Content Wrapper. Contains page content -->

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Menukaart</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Menukaart</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-header">

                                <h3 class="d-inline-block">Menukaart</h3>
                                <a href="menu/toevoegen" class="add-btn btn btn-success float-right">Voeg een nieuw product toe</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="dt_tournaments" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Titel</th>
                                            <th>Prijs</th>
                                            <th>Categorie</th>
                                            <th>Actie</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($items as $menuItem)
                                        <tr>
                                            <td>{{$menuItem->name}}</td>
                                            <td>???{{number_format($menuItem->price,2)}}</td>
                                            <td>
                                            <?php
                                                if ($menuItem->type == 0) {
                                                    ?>
                                                    warm eten
                                                    <?php
                                                }
                                                if ($menuItem->type == 1) {
                                                    ?>
                                                    koud eten
                                                    <?php
                                                }
                                                if ($menuItem->type == 2) {
                                                    ?>
                                                    snacks
                                                    <?php
                                                }
                                                if ($menuItem->type == 3) {
                                                    ?>
                                                    water
                                                    <?php
                                                }
                                                if ($menuItem->type == 4) {
                                                    ?>
                                                    frisdrank
                                                    <?php
                                                }
                                                if ($menuItem->type == 5) {
                                                    ?>
                                                    alcolholische dranken
                                                    <?php
                                                }
                                            ?>
                                            </td>
                                            <td>
                                                <a href="/admin/menu/edit/{{$menuItem->id}}" class="mr-2 ml-2"><i class="fas fa-edit"></i></a>

                                                <form method="POST" action="/admin/deleteMenuItem/{{$menuItem->id}}" accept-charset="UTF-8" style="display: inline;">
                                                    <input name="_method" type="hidden">
                                                    @csrf
                                                    <span onclick="deleteEntity(this)"><i class="fas fa-trash" style="color: red"></i></span>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('parts.adminfooter')
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.min.js"></script>

    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="../../plugins/jszip/jszip.min.js"></script>
    <script src="../../plugins/pdfmake/pdfmake.min.js"></script>
    <script src="../../plugins/pdfmake/vfs_fonts.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <!-- Page specific script -->
    <script>
        $(function() {
            $("#dt_tournaments").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        window.deleteEntity = function (element, message = "Weet je zeker dat je dit wil verwijderen?") {
            Swal.fire({
  title: 'Weet je het zeker?',
  text: "Je kan dit niet terugdraaien!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Ja, verwijderen'
}).then((result) => {
  if (result.isConfirmed) {

    Swal.fire(
      'Verwijderd!',
      'Het is verwijderd.',
      'success'
    )
    $(element).closest('form').submit();
  }
})
};
    </script>
</body>

</html>
