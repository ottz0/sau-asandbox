<html>
    <head>
        <title>App Name - @yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}"/>    
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <body>
    <div id="container">  
    @include('global.partials._header')
        <div id="sandbox-app">
            <div class="container">
                @yield('content')
            </div>
        </div>
        
	</div>
	<script src="/js/app.js"></script>
	<script src="{{asset('js/sau-frontend-main.min.js')}}"></script>
	<script src="{{asset('js/lsau-ux-bundle.min.js')}}"></script> <!-- /Contains jquery.js, bootstrap.js,  popper.js, datatables.js   -->
	@stack('scripts')
	</body>
</html>