<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Employee') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('css/employee.css') }}" rel="stylesheet">
	<link href="{{ asset('css/metisMenu.min.css') }}" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
	
	
</head>
<body>
    <div id="wrapper">
        
		@include('layouts.nav')
		
		
		 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
					<div class="box">
						<div class="col-lg-12">
							@yield('content')
						</div>
					</div>
                </div>             
            </div>          
        </div>
		
    </div>
    
	
	
    <!-- Scripts -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
    crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
	<script src="{{ asset('js/metisMenu.js') }}"></script>
	<script src="{{ asset('js/employee.min.js') }}"></script>
	
	<script>
		@if(Session::has('success'))
			toastr.success("{{ Session::get('success')}}")
		
		@endif
		
		@if(Session::has('info'))
			toastr.info("{{ Session::get('info')}}")
		
		@endif
	
	</script>
</body>
</html>
