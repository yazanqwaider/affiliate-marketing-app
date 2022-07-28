<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regsiter</title>
</head>
<body>
    
    @include('layouts.alerts')

    <div>
        <form action="{{ route('auth.register') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="image">Image *</label>
                <input type="file" name="image" id="image" required>
            </div>

            <div>
                <label for="name">Name *</label>
                <input type="text" name="name" id="name" placeholder="eg: yazan" value="{{ old('name') }}" required>
            </div>

            <div>
                <label for="email">Email *</label>
                <input type="email" name="email" id="email" placeholder="eg: example@gmail.com" value="{{ old('email') }}" required>
            </div>

            <div>
                <label for="phone">Phone Number *</label>
                <input type="number" name="phone" id="phone" placeholder="eg: 0780000000" value="{{ old('phone') }}" required>
            </div>

            <div>
                <label for="birthday">Birthday</label>
                <input type="date" name="birthday" id="birthday" value="{{ old('birthday') }}">
            </div>

            <div>
                <label for="password">Password *</label>
                <input type="password" name="password" id="password" placeholder="password" required>
            </div>

            <div>
                <label for="password_confirmation">Confirm Password *</label>
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="confirm password" required>
            </div>

            <button>register</button>
        </form>
    </div>


</body>
</html>