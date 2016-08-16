<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Login</title>
        <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css"/>
        <link rel="stylesheet" href="/vendor/font-awesome/css/font-awesome.min.css"/>
        <link rel="stylesheet" href="/assets/css/backend/support.css"/>
        <link rel="stylesheet" href="/assets/css/backend/login.css" />
        <link rel="stylesheet" href="/assets/css/backend/plugins.css" />
    </head>
    <body>
        @yield('content')
        {{ HTML::script('vendor/jquery/jquery.min.js') }}
        {{ HTML::script('vendor/bootstrap/js/bootstrap.min.js') }}
    </body>
</html>
