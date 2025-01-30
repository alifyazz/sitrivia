<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'SiTrivia')</title>

    <!-- Fonts and Styles -->
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> <!-- Updated version -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mainpage/style.css') }}">
</head>
<body>
    <div id="app">
        <!-- Navbar -->
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark fixed-top rounded-nav">
                <div class="container">
                    <a class="navbar-brand" href="#">
                        <i class="fas fa-brain me-2"></i><b>SiTrivia</b>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item">
                                <a class="nav-link active rounded-pill px-3 mx-1" href="#">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-pill px-3 mx-1" href="#aktivitas">Aktivitas</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link rounded-pill px-3 mx-1" href="#kontak">Kontak</a>
                            </li>
                        </ul>
                        <!-- Profile Icon -->
                        @auth
                            <a href="{{ route('profile.show') }}" class="ms-3">
                            <i class="fas fa-user-circle fa-2x text-white"></i>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-light ms-3">Login</a>
                        @endauth
                    </div>
                </div>
            </nav>

            <section class="jumbotron-section py-5">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Kolom Teks -->
                        <div class="col-md-6">
                            <h1 class="display-4 fw-bold mb-4">Selamat Datang di SiTrivia!</h1>
                            <p class="lead mb-4">Platform kuis interaktif untuk meningkatkan pengetahuan Anda dengan cara yang menyenangkan.</p>
                            <div class="mt-4">
                                <a href="#aktivitas" class="btn btn-primary rounded-pill px-4 py-2">
                                    Mulai Kuis <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                                <a href="#learn-more" class="btn btn-outline-primary rounded-pill px-4 py-2">Pelajari Lebih</a>
                            </div>
                        </div>
                        <!-- Kolom Gambar -->
                        <div class="col-md-6 text-center">
                            <i class="fas fa-file-alt fa-5x text-primary"></i>
                            <i class="fas fa-pencil-alt fa-5x text-primary" style="margin-left:10px;"></i>
                        </div>
                    </div>
                </div>
            </section>
        </header>

        <!-- Content Section -->
        <main class="py-4">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-dark text-white py-5">
            <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                <h3 class="h5 mb-3">SiTrivia</h3>
                <p class="text-white-50">Platform kuis interaktif untuk meningkatkan pengetahuan Anda dengan cara yang menyenangkan.</p>
                <div class="d-flex gap-3">
                    <a href="#" class="text-white-50 hover-text-white"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-white-50 hover-text-white"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-white-50 hover-text-white"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="text-white-50 hover-text-white"><i class="fab fa-linkedin"></i></a>
                        </div>
                        </div>
                        <div class="col-lg-2">
                        <h3 class="h5 mb-3">Menu</h3>
                        <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Beranda</a></li>
                        <li class="mb-2"><a href="#Aktivitas" class="text-white-50 text-decoration-none">Aktivitas</a></li>
                        <li class="mb-2"><a href="#kontak" class="text-white-50 text-decoration-none">Kontak</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h3 class="h5 mb-3">Kategori</h3>
                        <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Pengetahuan Umum</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Sains</a></li>
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Sejarah</a></li>
                            <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Teknologi</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h3 class="h5 mb-3">Kontak</h3>
                        <ul class="list-unstyled text-white-50">
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@sitrivia.com</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> (021) 1234-5678</li>
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> Bandung, Indonesia</li>
                        </ul>
                    </div>
                </div>
                <hr class="my-4 bg-white-50">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="mb-0 text-white-50">&copy; 2024 SiTrivia. Hak Cipta Dilindungi.</p>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="#" class="text-white-50 text-decoration-none">Syarat & Ketentuan</a></li>
                        <li class="list-inline-item ms-3"><a href="#" class="text-white-50 text-decoration-none">Kebijakan Privasi</a></li>
                    </ul>
                    </div>
                </div>
                </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="{{ asset('mainpage/script.js') }}"></script>

    @stack('scripts')
</body>
</html>
