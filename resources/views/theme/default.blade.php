<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initialscale=1, shrink-to-fit=no" />
<meta name="description" content="" />
<meta name="author" content="" />
<title>Dashboard - SB Admin</title>
<link href="https://cdn.jsdelivr.net/npm/simpledatatables@7.1.2/dist/style.min.css" rel="stylesheet" />
<link href="{{ asset('theme/css/styles.css') }}"
rel="stylesheet" />
<script
src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"
crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
@include('theme.header')
<div id="layoutSidenav">
@include('theme.sidebar')
<div id="layoutSidenav_content">
<main>
@yield('content')
</main>
@include('theme.footer')
</div>
</div>
<script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bu
ndle.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('theme/js/scripts.js') }}"></script>
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.j
s" crossorigin="anonymous"></script>
<script src="{{ asset('theme/assets/demo/chart-area-demo.js')
}}"></script>
<script src="{{ asset('theme/assets/demo/chart-bar-demo.js')
}}"></script>
<script src="https://cdn.jsdelivr.net/npm/simpledatatables@7.1.2/dist/umd/simple-datatables.min.js"
crossorigin="anonymous"></script>
<script src="{{ asset('theme/js/datatables-simple-demo.js')
}}"></script>
@yield('alertload')
</body>
</html>