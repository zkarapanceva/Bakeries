<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Bakeries</title>

        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body class="{{ \Illuminate\Support\Facades\Route::is('search') ? 'body-search' : 'body-regular'}}">
        <div class="wrapper">
            <div class="nav">
                @if(!\Illuminate\Support\Facades\Route::is('search'))
                <div class="logo"><img class="imglogo"src="images/Logo1.png" alt="img"></div>
                @endif
                <div class="menu {{ \Illuminate\Support\Facades\Route::is('search') ? 'menu-search' : 'menu-regular'}}">
                    <ul>
                        @if(!\Illuminate\Support\Facades\Route::is('home'))
                        <li><a href="/">HOME</a></li>
                        @endif
                        @if(!\Illuminate\Support\Facades\Route::is('help'))
                        <li><a href="/help">HELP</a></li>
                        @endif
                        @if(!\Illuminate\Support\Facades\Route::is('contact'))
                        <li><a href="/contact">CONTACT</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="header">
                @yield('content')
            </div>
        </div>
    </body>
    @stack('scripts')
</html>
