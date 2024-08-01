<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="auth">
    <div class="container">
        <h2>Register</h2>
        <form method="POST" action="{{ url('register') }}">
            @csrf
            <div class="input-name">
                <label>Name</label>
                <input type="text" name="name" value="{{ old('name') }}">
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="input-email">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}">
                @error('email')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="input-password">
                <label>Password</label>
                <input type="password" name="password">
                @error('password')
                    <div>{{ $message }}</div>
                @enderror
            </div>
            <div class="input-confirm_password">
                <label>Confirm Password</label>
                <input type="password" name="password_confirmation">
            </div>
            <button class="register" type="submit">Register</button>
            <a class="register" href="{{ route('login') }}">Sudah punya Akun? Login Sekarang</a>
        </form>
    </div>
</body>

</html>
