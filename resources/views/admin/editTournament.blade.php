<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DTV Admin | tournament</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link href="/assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

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
            <h1 class="m-0">Wijzig toernooi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
              <li class="breadcrumb-item active">Wijzig toernooi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
         <h3 class="mt-3 mb-4">Momenteel wijzig je: <b>{{$tournament->title}}</b></h3>
        <form method="POST" style="max-width: 1200px">
            @csrf
           <input type="hidden" value="{{$tournament->id}}" name="id">
            <div class="mb-3">
                <label for="titleTournament">
                    @if($errors->first('titleTournament'))
                        @foreach ($errors->get('descTournament') as $error)
                        <i class="fas fa-exclamation-circle" style="color: red"></i>
                        @endforeach
                    @endif
                    Titel</label>
                <input type="text" class="form-control" id="titleTournament" placeholder="toernament titel" name="titleTournament" value="{{$tournament->title}}">
            </div>

            <div class="mb-3">
                <label for="baanSelect">
                    @if($errors->first('selectLane'))
                        @foreach ($errors->get('selectLane') as $error)
                        <i class="fas fa-exclamation-circle" style="color: red"></i>
                        @endforeach
                    @endif
                    Op welke baan wordt het toernament gehouden?</label>
                <select class="form-control form-select" id="baanSelect" name="selectLane">
                  <option selected value="{{$tournament->lane}}">{{$tournament->lane}}</option>
                    @foreach($courts as $court)
                        <option value="{{$court->name}}">{{$court->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="dateTournament" class="form-label">
                    @if($errors->first('dateTournamentStart'))
                        @foreach ($errors->get('dateTournamentStart') as $error)
                        <i class="fas fa-exclamation-circle" style="color: red"></i>
                        @endforeach
                    @endif
                    Wanneer begint het toernooi?</label>
                <input type="datetime-local" class="form-control" id="dateTournament" aria-describedby="dateHelp" name="dateTournamentStart" value="{{$startdate}}">
                <div id="dateHelp" class="form-text">Datum + tijd</div>
            </div>

            <div class="mb-3">
                <label for="dateTournament" class="form-label">
                    @if($errors->first('dateTournamentEnd'))
                    @foreach ($errors->get('dateTournamentEnd') as $error)
                    <i class="fas fa-exclamation-circle" style="color: red"></i>
                    @endforeach
                @endif
                    Wanneer eindigt het toernooi?</label>
                <input type="datetime-local" class="form-control" id="dateTournament" aria-describedby="dateHelp" name="dateTournamentEnd" value="{{$enddate}}">
                <div id="dateHelp" class="form-text">Datum + tijd</div>
            </div>

            <div class="mb-3">
                <label for="inputDesc" class="form-label">
                    @if($errors->first('descTournament'))
                    @foreach ($errors->get('descTournament') as $error)
                    <i class="fas fa-exclamation-circle" style="color: red"></i>
                    @endforeach
                @endif
                    Beschrijving
                </label>
                <textarea class="form-control" id="inputDesc" rows="5" name="descTournament">{{$tournament->description}}</textarea>

              </div>

            <button type="submit" class="btn btn-success addTournament">Wijzigen</button>
        </form>
      </div><!-- /.container-fluid -->
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.min.js"></script>
</body>
</html>
