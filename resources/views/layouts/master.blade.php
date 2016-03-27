<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title>App Name - @yield('title')</title>
        @section('stylesheets')
            <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
            <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        @show
    </head>
    <body>
        @if (Session::has('message'))
            <div class="flash alert-info">
                <p>{{ Session::get('message') }}</p>
            </div>
        @endif
        @if ($errors->any())
            <div class='flash alert-danger'>
                @foreach ( $errors->all() as $error )
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <div class="container">
            @yield('content')
        </div>
        @section('javascripts')
        @show
    </body>
</html>
