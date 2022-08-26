<html lang="en">

<head>
     <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="CodedThemes"/>
    <meta name="site_url" content="{{url('')}}">
      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>

    <!-- Favicon icon -->
    <link rel="icon" href="{{ asset('assets/images/favicon.ico')}}" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome/css/fontawesome-all.min.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/animation/css/animate.min.css')}}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    
    @if(isset($css) && ! empty($css))
      @foreach($css as $css_files)
      <link rel="stylesheet" href="{!! asset('assets/'.$css_files) !!}" />
      @endforeach
    @endif

    @yield('header')

  </head>

   <body>
    @yield('body')
   </body>
      
 
</html>