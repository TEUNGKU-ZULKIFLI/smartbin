<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <h2 class="mt-5">Dashboard</h2>
    <h4>Welcome, {{ Auth::user()->name }}!</h4>
    <p>Your email: {{ Auth::user()->email }}</p>
    <p>Your points: {{ Auth::user()->points }}</p>

    @if (session('status'))
        <div class="alert alert-success mt-3">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('activateSensor') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">DAPATKAN POINT</button>
    </form>

    <form action="{{ route('logout') }}" method="POST" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</div>
</body>
</html>
