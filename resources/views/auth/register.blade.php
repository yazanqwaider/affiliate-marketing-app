<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regsiter</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    
    <div class="container mt-3">
        @include('layouts.alerts')

        <div class="row text-center">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="login-img">
                            <img src="{{ asset('assets/logo.png') }}" width="150">
                        </div>
                        <div class="login-title">
                            <h4>Sign Up</h4>
                        </div>

                        <div class="signup-form text-left mt-4">
                            <form action="{{ route('auth.register') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="my-2">
                                    <label for="">Image *</label>
                                    <div class="d-flex align-items-center">
                                        <div class="custom-file">
                                            <input type="file" name="image" id="image" class="custom-file-input" required>
                                            <label class="custom-file-label" for="image">Choose File</label>
                                        </div>

                                        <div class="preview-img"></div>
                                    </div>
                                </div>

                                <div class="my-2">
                                    <label for="name">Name *</label>
                                    <input type="text" name="name" id="name" placeholder="eg: yazan" value="{{ old('name') }}" class="form-control" required>
                                </div>
                    
                                <div class="my-2">
                                    <label for="email">Email *</label>
                                    <input type="email" name="email" id="email" placeholder="eg: example@gmail.com" value="{{ old('email') }}" class="form-control" required>
                                </div>
                    
                                <div class="my-2">
                                    <label for="phone">Phone Number *</label>
                                    <input type="number" name="phone" id="phone" placeholder="eg: 0780000000" value="{{ old('phone') }}" class="form-control" required>
                                </div>
                    
                                <div class="my-2">
                                    <label for="birthday">Birthday</label>
                                    <input type="date" name="birthday" id="birthday" value="{{ old('birthday') }}" class="form-control">
                                </div>
                    
                                <div class="my-2">
                                    <label for="password">Password *</label>
                                    <input type="password" name="password" id="password" placeholder="password" class="form-control" required>
                                </div>
                    
                                <div class="my-2">
                                    <label for="password_confirmation">Confirm Password *</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="confirm password" class="form-control" required>
                                </div>
                                <input type="hidden" name="referer_user_id" value="{{ $referer_user?->id }}">
                            
                                <div class="my-3">
                                    <button class="btn btn-danger btn-block">Register</button>
                                </div>
                            </form>
                        </div>

                        <div class="logi-forgot text-right mt-2">
                            <a href="{{ route('auth.login') }}">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $("#image").on('change', function(e) {
            let file = e.target.files[0];
            let url = URL.createObjectURL(file);
            let imgElm = `<img src="${url}" width="55" class="rounded-lg mx-2">`;
            $('.preview-img').html(imgElm);
        });
    </script>
</body>
</html>