<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Starter</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <style>
      #form-input{
          width: 45%;
          margin-right: 5px;
      }
      #name-fields{
          display: flex;
      }
      #form-submit{
          padding-left: 20px;
      }
      #button-input{
          width: 20%;
          margin-right: 5px;
      }
      #align-buttons{
          display: flex;
          flex-direction: column;
      }
      #admin-button{
          display: flex;
          align-items: flex-start;
      }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    @include('parts.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">menu items toevoegen</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <!-- edit content -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">menu item toevoegen</h3>
            </div>
        <form method="POST">
            @csrf
            <div class="card-body">
                <div class="row">
              <div id="form-input" class="row-6">
                <label for="itemNaamInput">item naam</label>
                <input name="itemNaam" type="itemname" class="form-control" id="itemNaamInput" placeholder="item naam">
              </div>
              <div id="form-input" class="row-6">
                <label for="priceInput">prijs</label>
                <input name="priceInput" type="price" class="form-control" id="priceInput" placeholder="prijs">
              </div>
            </div>
            <div class="row">
              <div id="form-input" class="row-6">
                <label for="typeInput">type</label>
                <input name="typeInput" type="typeInput" class="form-control" id="typeInput" placeholder="type">
              </div>
            </div>
            <div id="button-input admin-button">
                <label>op de kaart</label>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" id="enabled" value="1" name="enabled">
                  <label class="form-check-label" for="admincheck">op de kaart</label>
                </div>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
    </div>
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
</body>
</html>
