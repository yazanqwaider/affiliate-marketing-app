<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    
    @include('layouts.alerts')
    
    <div>
        <form action="{{ route('auth.login') }}" method="post">
            @csrf

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="eg: example@gmail.com" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="password" required>
            </div>

            <button>login</button>
        </form>
    </div>


</body>
</html>