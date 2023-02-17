<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MEO AMS System') }}</title>
    <link rel="icon" href="{{ asset('images/Ams.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'MEOams') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Google Font -->
    <link
      href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;500;700&display=swap"
      rel="stylesheet"
    />
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Kanit&subset=thai,latin' rel='stylesheet' type='text/css'>
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    @livewireStyles

    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

<link rel="stylesheet" href="/assets/css/paper-kit.css">
<!-- js-->
<script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>


<!-- Plugins -->

<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>

<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="assets/js/plugins/nouislider.js"></script>

<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="assets/js/plugins/bootstrap-selectpicker.js"></script>

<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="assets/js/plugins/bootstrap-tagsinput.js"></script>

<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>

<!-- Photoswipe files -->

<script src="assets/js/photo_swipe/photoswipe.min.js"></script>
<script src="assets/js/photo_swipe/photoswipe-ui-default.min.js"></script>
<script src="assets/js/photo_swipe/init-gallery.js"></script>

<!--  for Jasny fileupload -->
<script src="/assets/js/plugins/jasny-bootstrap.min.js"></script>

    

    <!-- Icon -->
    <script src="path/to/dist/feather.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    @yield('css')
    <script>
        window.APP = <?php echo json_encode([
            'currency_symbol' => config('settings.currency_symbol'),
        ]); ?>
    </script>

</head>


<body class="font-sans antialiased">
    @if (session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <div class="alert-body">
                <span>{{ session('message') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        </div>
    @endif



    <div class="min-h-screen bg-gray-100">
         

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('js')

</body>
<!-- Icon -->
<script>
    feather.replace()
</script>

<!-- jQuery -->
	<script src="{{asset(' js/jquery-3.2.1.min.js')}}"></script>

	<!-- Bootstrap Core JS -->
	<script src="{{asset(' js/popper.min.js')}}"></script>
	<script src="{{asset(' js/bootstrap.min.js')}}"></script>

	<!-- Slimscroll JS -->
	<script src="{{asset(' plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

	<!-- Snackbar Js -->
	<script src="{{asset(' plugins/snackbar/snackbar.min.js')}}"></script>

	<!-- Toastr Js -->
	<script src="{{asset(' plugins/toastr/toastr.min.js')}}"></script>

	<!-- Custom JS -->
	<script src="{{asset(' js/script.js')}}"></script>
	<script src="{{asset('js/app.js')}}"></script>
	<script src="{{asset(' js/datatables-customizer.js')}}"></script>

	<script>
		$(document).ready(function() {
			$('.select2').select2({
				placeholder: 'Select an option'
			});
		});
		@if(Session::has('message'))
			var type = "{{ Session::get('alert-type', 'info') }}";
			switch(type){
				case 'info':
					Snackbar.show({
						text: "{{ Session::get('message') }}",
						actionTextColor: '#fff',
						backgroundColor: '#2196f3'
					});
					break;

				case 'warning':
					Snackbar.show({
						text: "{{ Session::get('message') }}",
						pos: 'top-right',
						actionTextColor: '#fff',
						backgroundColor: '#e2a03f'
					});
					break;

				case 'success':
					Snackbar.show({
						text: "{{ Session::get('message') }}",
						pos: 'top-right',
						actionTextColor: '#fff',
						backgroundColor: '#8dbf42'
					});
					break;

				case 'danger':
					Snackbar.show({
						text: "{{ Session::get('message') }}",
						pos: 'top-right',
						actionTextColor: '#fff',
						backgroundColor: '#e7515a'
					});
					break;
			}
		@endif
	</script>
	<!-- Datatables js -->
	<script src="{{asset(' plugins/DataTables/datatables.min.js')}}"></script>
	<!-- page js -->
	@stack('page-js')


</html>
