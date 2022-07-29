<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/master.css') }}">
        @stack('style')
    </head>

    <body>
        
        @include('layouts.navbar')

        <div class="container-fluid">
            <div class="row">
                <main role="main" class="col-10 mx-auto pt-3 px-4">

                    @include('layouts.alerts')

                    @yield('content')

                </main>
            </div>
          </div>

        <script src="{{ asset('js/app.js') }}"></script>
        @stack('script')
    </body>
</html>
