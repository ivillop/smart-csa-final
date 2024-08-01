<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body class="auth">
    <div class="container">
        <h2>Login</h2>
        <form method="POST" action="{{ url('login') }}">
            @csrf
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
            <button class="login" type="submit">Login</button>
            <a class="login" href="{{ route('register') }}">Belum punya akun? Daftar Sekarang</a>
        </form>
    </div>
</body>

</html>
