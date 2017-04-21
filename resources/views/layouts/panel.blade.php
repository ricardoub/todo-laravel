<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app-class.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script>
      window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
      ]) !!};
    </script>
  </head>
  <body>
    <div id="app">
      <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
          <div class="navbar-header">
            
            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
              <span class="sr-only">Toggle Navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
              {{ config('app.name', 'Laravel') }}
            </a>
          </div>

          <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            @include('partials.menus.menuh-left')
            
            <!-- Right Side Of Navbar -->
            @include('partials.menus.menuh-right')
          </div>
        </div>
      </nav>

      <div class="container">
        <div class="row">
          <div class="panel panel-primary">
            <div class="panel-heading panel-master">
              <div class="btn-toolbar" role="toolbar" aria-label="...">
                @if (!Auth::guest())
                  <div class="btn-group" role="group" aria-label="...">
                    @yield('panel-head-left')
                  </div>
                  <div class="btn-group" role="group" aria-label="...">
                    @yield('panel-head-middle')
                  </div>
                  <div class="btn-group pull-right" role="group" aria-label="...">
                    @yield('panel-head-right')
                  </div>
                @endif
              </div>
            </div>
            <div class="panel-body">
              @yield('panel-body')
            </div>
            @yield('panel-footer')
          </div>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
  </body>
</html>
