<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSMEDIC - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .custom-navbar-shadow {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.28);
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white custom-navbar-shadow">
        <div class="container">
            <img src="{{ asset('images/logo-klinik.png') }}" alt="Logo Klinik App" height="50">
            <a class="navbar-brand ms-3" href="/dashboard">TRANSMEDIC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link" href="/dashboard">Dashboard</a>
                        </li>
                        @if(auth()->user()->role === 'pendaftaran')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('patients.index') }}">Pasien</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('medicines.index') }}">Obat</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('checkups.index') }}">Pemeriksaan</a>
                        </li>
                    @endauth
                </ul>
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <span class="nav-link">Halo, {{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>