<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Birabe') }}</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    </head>

    <body>
        <div id="app">
            <header>
                @include('home.menu')
            </header>
            
            <div class="container_body">
                <div class="container-fluid">
                    <div class="row">
                        @if (!Auth::guest())
                            <section class="col-xs-12 col-md-2">
                                @include('home.left')
                            </section>

                            <div class="content col-xs-12 col-md-5">
                                @yield('content')
                            </div>
                            
                            <section class="col-xs-12 col-md-3">
                                @include('home.right')
                            </section>
                            
                            <section class="col-xs-12 col-md-2">
                                @include('home.chat')
                            </section>
                        @else
                            <div class="content col-xs-12">
                                @yield('content')
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <footer>
                 @include('home.footer')
            </footer>
        </div>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/functions.js') }}"></script>
        </script>
    </body>

</html>
