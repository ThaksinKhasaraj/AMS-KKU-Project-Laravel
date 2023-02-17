<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.partials._head')
    <link rel="icon" href="{{ asset('images/Ams.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">
    <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
    <link href="assets/fonts/thsarabunnew.css" rel="stylesheet">
</head>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        @include('layouts.partials._navbar')
        @include('layouts.partials._sidebar')
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="app">
            @include('flash::message')
            @yield('content')

        </div>
        <!-- /.content-wrapper -->
        @include('layouts.partials._footer')

    </div>
        <!-- ./wrapper -->
        @include('layouts.partials._footer-script')

      
<!-- fheater Icon -->
<script src="path/to/dist/feather.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script> 
</body>
  <!-- Icon -->
  <script>
    feather.replace()
</script>

</html>
