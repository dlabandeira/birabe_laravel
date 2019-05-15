<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Birabe') }}</title>
        
        <!-- Styles -->
        <style>
            @import url("https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600");
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Montserrat', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .color{
                color: #ff1143;
            }
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
                .links > a:hover {
                    color: #ff1143;
                }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="title m-b-md">
                    De lo <span class="color">bi</span>zarro, lo <span class="color">ra</span>ro y lo <span class="color">be</span>llo
                </div>

                <div class="links">
                    @if (Route::has('login'))
                        @if (Auth::check())
                            <a href="{{ url('/home') }}">Inicio</a>
                        @else
                            <a href="{{ url('/login') }}">Identificarse</a>
                            <a href="{{ url('/register') }}">Registrarse</a>
                        @endif
                    @endif
                    <!--<a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>-->
                </div>
            </div>
        </div>
    </body>
</html>
