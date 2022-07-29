<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/master.css') }}">
    </head>

    <body>
        
        @include('layouts.navbar')

        <div class="container-fluid">
            <div class="row">
                @include('layouts.sidebar')

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">

                    @yield('content')

                </main>
            </div>
          </div>

        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
