<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <div class="d-flex justify-content-center mb-4">
        <img src="{{ asset('TongBroh01.jpeg') }}" alt="Logo" class="img-fluid mx-2">
        <img src="{{ asset('TongBroh02.jpeg') }}" alt="Logo" class="img-fluid mx-2">
    </div>
    <h2 class="mt-5 text-center text-primary">Selamat Datang di Sistem Tempat Sampah Pintar!</h2>
    <div class="mt-5">
        <a href="{{ route('login') }}" class="btn btn-primary">LOGIN</a>
        <a href="{{ route('register') }}" class="btn btn-success">REGISTER</a>
    </div>
</div>
</body>
</html>
