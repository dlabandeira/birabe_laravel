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
    </body>

</html>
