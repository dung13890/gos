<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>@yield('title', isset($heading) ? $heading : 'GOS') </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
        <meta name="description" content="Gara Operation System">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="/assets/css/backend/app.css"/>
        @stack('prestyles')
    </head>
    <body>
        <div id="menuMobile">
            <h4 class="title">HỆ THỐNG</h4>
            <nav class="menu" references="menu-system"></nav>

            <h4 class="title">Nghiệp vụ</h4>
            <nav class="menu" references="menu-tasks"></nav>
        </div>

        <div id="scrollTop">
            <button class="fa fa-angle-up"></button>
        </div>

    <!-- #scrollTop -->
    <div id="scrollTop">
        <button class="fa fa-angle-up"></button>
    </div>
    <!-- /#scrollTop -->
    <div class="wrapper">
        @include('backend._partials.header')
        @include('backend.user.modal_change_profile_password')
        <div id="content">
            <div class="container-fluid">
                @yield('page-content')
            </div>
            @include('backend._partials.footer')
        </div>
    </div>
        {{ HTML::script('vendor/jquery/jquery.min.js') }}
        {{ HTML::script('vendor/bootstrap/js/bootstrap.min.js') }}
        {{ HTML::script(elixir('assets/js/backend/app.js')) }}
        @stack('prescripts')
    </body>
</html>