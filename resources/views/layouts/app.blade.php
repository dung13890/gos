<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>login</title>
    {{ HTML::style(elixir('assets/css/backend/app.css')) }}
    <link rel="stylesheet" href="/assets/css/backend/support.css"/>
    <link rel="stylesheet" href="/assets/css/backend/login.css"/>
</head>
<body>

    @yield('content')

    {{ HTML::script('vendor/jquery/jquery.min.js') }}
    {{ HTML::script('vendor/bootstrap/js/bootstrap.min.js') }}
</body>
</html>
