<html>
    <head>
        <title>App Name - @yield('title')</title>
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
    </body>
</html>
