<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
      
    <div class="container mt-5">
        @include('layouts.alerts')

        <div class="row text-center">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="login-img">
                            <img src="{{ asset('assets/logo.png') }}" width="150">
                        </div>
                        <div class="login-title">
                            <h4>Log In</h4>
                        </div>

                        <div class="login-form mt-4">
                            <form action="{{ route('auth.login') }}" method="post">
                                @csrf

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <input type="email" name="email" id="email" placeholder="eg: example@gmail.com" value="{{ old('email') }}" class="form-control" required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <input type="password" name="password" id="password" placeholder="password" class="form-control" required>
                                    </div>
                                </div>
                            
                                <div class="form-row">
                                    <button class="btn btn-danger btn-block">Login</button>
                                </div>
                            </form>
                        </div>

                        <div class="logi-forgot text-right mt-2">
                            <a href="{{ route('auth.register') }}">Register</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>