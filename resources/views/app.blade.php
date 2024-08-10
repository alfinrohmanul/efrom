<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset(env('APP_PUBLIC').'plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset(env('APP_PUBLIC').'dist/css/adminlte.min.css') }}">

  @yield('style')
</head>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link"><i class="fas fa-home"></i> Dashboard</a>
          </li>
          @if (Auth::user()->level == "admin")
            <li class="nav-item">
              <a href="{{ route('jenisProduksi') }}" class="nav-link"><i class="fas fa-box-open"></i> Jenis Sektor</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('puk') }}" class="nav-link"><i class="fas fa-industry"></i> PUK</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('laporan') }}" class="nav-link"><i class="fas fa-copy"></i> Laporan</a>
            </li>
          @endif
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <span class="font-weight-bold text-uppercase">{{ Auth::user()->name }}</span> <i class="far fa-user"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <div>
              <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="border-0 bg-transparent" style="width: 100%;">logout <i class="fas fa-sign-in-alt"></i></button>
              </form>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  @yield('content')
  <!-- /.content-wrapper -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset(env('APP_PUBLIC').'plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset(env('APP_PUBLIC').'plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset(env('APP_PUBLIC').'dist/js/adminlte.min.js') }}"></script>

<script>
  $(document).ready(function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  })
</script>
<script>
  function rupiahJs(bilangan) {
    var	number_string = bilangan.toString(),
      split= number_string.split(","),
      sisa= split[0].length % 3,
      rupiah= split[0].substr(0, sisa),
      ribuan= split[0].substr(sisa).match(/\d{1,3}/gi);

    if (ribuan) {
      separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
    }
    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;

    return rupiah;
  }
  function rupiahJsKeyup(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, "").toString(),
      split= number_string.split(","),
      sisa= split[0].length % 3,
      rupiah= split[0].substr(0, sisa),
      ribuan= split[0].substr(sisa).match(/\d{3}/gi);

    // tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
      separator = sisa ? "." : "";
      rupiah += separator + ribuan.join(".");
    }

    rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
    return prefix == undefined ? rupiah : rupiah ? "" + rupiah : "";
  }
</script>

@yield('script')
</body>
</html>