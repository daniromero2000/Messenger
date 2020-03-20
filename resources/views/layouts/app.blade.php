<!doctype html>
<html class="h-100" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Fonts -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

  <!-- Styles -->
</head>

<body class="h-100">
  <div id="app" class="h-100">
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>

    <b-navbar toggleable="md" class="shadow-sm" variant="light" type="light">
      <b-navbar-toggle target="navbarSupportedContent" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
      </b-navbar-toggle>

      <b-navbar-brand href="{{ url('/') }}">
        {{ config('app.name', 'Laravel') }}
      </b-navbar-brand>
      <b-collapse id="navbarSupportedContent" is-nav>
        <b-navbar-nav class="ml-auto">
          @guest
          <b-nav-item href="{{ route('login') }}">{{ __('Login') }}</b-nav-item>
          <b-nav-item href="{{ route('register') }}">{{ __('Register') }}</b-nav-item>
          @else
          <b-nav-item-dropdown text=" {{ Auth::user()->name }}" right>
            <b-dropdown-item href="#" @click="logout">Logout</b-dropdown-item>
          </b-nav-item-dropdown>
          @endguest
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
    <main style="height: calc(100vh - 60px)">
      @yield('content')
    </main>
  </div>
   </body>
</html>