<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{asset('../../plugins/fontawesome-free/css/all.min.css')}}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{asset('../../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <link rel="stylesheet" href="{{asset('../../plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('../../plugins/jqvmap/jqvmap.min.css')}}">
  <link rel="stylesheet" href="{{asset('../../dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('../../plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <link rel="stylesheet" href="{{asset('../../plugins/daterangepicker/daterangepicker.css')}}">
  <link rel="stylesheet" href="{{asset('../../plugins/summernote/summernote-bs4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  @include('pharmacist.includes.navbar')
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    @include('pharmacist.includes.sidebar')
  </aside>

<div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ App\Models\medicine_types::count() }}
                                    </h3>
                                    <p>Medicine Types</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-first-aid"></i>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ App\Models\medicines::count() }}
                                    </h3>
                                    <p>Medicines</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-capsules"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <section class="col-lg-5 connectedSortable">
                        </section>
                    </div>
                </div>
            </section>
        </div>
  @include('pharmacist.includes.footer')
  <aside class="control-sidebar control-sidebar-dark">

  </aside>
</div>
<script src="{{asset('../../plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('../../plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{asset('../../plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('../../plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('../../plugins/sparklines/sparkline.js')}}"></script>
<script src="{{asset('../../plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('../../plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('../../plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<script src="{{asset('../../plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('../../plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('../../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<script src="{{asset('../../plugins/summernote/summernote-bs4.min.js')}}"></script>
<script src="{{asset('../../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<script src="{{asset('../../dist/js/adminlte.js')}}"></script>
<script src="{{asset('../../dist/js/demo.js')}}"></script>
<script src="{{asset('../../dist/js/pages/dashboard.js')}}"></script>
</body>
</html>
