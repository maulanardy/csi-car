<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'Laravel') }}</title>
  
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('AdminLTE-2.3.11/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->

  <!-- FONT AWESOME -->
  <link rel="stylesheet" type="text/css" href="{{ asset('vendor') }}/font-awesome/css/font-awesome.min.css">
  @stack('style')
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
 
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style type="text/css">
    a.nav-link.active {
      font-weight: bold;
      color: #1796ff!important;
    }
  </style>
</head>
<body>
    <div id="app">
        @include('layouts.nav')

        <main class="py-4">
            @yield('content')
        </main>
    </div>
<!-- ./wrapper -->
<!-- jQuery 2.2.3 -->
<script src="{{ asset('AdminLTE-2.3.11/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{ asset('AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
<!-- SlimScroll -->
<script src="{{ asset('AdminLTE-2.3.11/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('AdminLTE-2.3.11/plugins/iCheck/icheck.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE-2.3.11/dist/js/app.min.js') }}"></script>



{{--  my style  --}}
@stack('script')
</body>
</html>