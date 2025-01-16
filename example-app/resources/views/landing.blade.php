<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SiTrivia - Landing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="mainpage/style.css">
</head>
<body>
<!-- Header Section -->
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
                <a href="{{ route('profile.show') }}" class="ms-3">
                    <img src="/images/profile-placeholder.jpg" alt="Profile" class="rounded-circle border border-white" style="width: 40px; height: 40px;">
                </a>
            </div>
        </div>
    </nav>
</header>

    <!-- Hero Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-4 fw-bold mb-4">Belajar Lebih Seru dengan SiTrivia</h1>
                    <p class="lead mb-4">Platform kuis interaktif untuk meningkatkan pengetahuan Anda dengan cara yang menyenangkan.</p>
                    <button class="btn btn-primary rounded-pill px-4 py-2" id="mainButton">Get Started</button>
                </div>
                <div class="col-md-6">
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/online-quiz-3462315-2895677.png" 
                         alt="Quiz Illustration" 
                         class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm hover-shadow transition-all rounded-3 p-4">
                        <div class="card-body text-center">
                            <i class="fas fa-trophy text-primary fs-1 mb-3"></i>
                            <h3 class="h4">Kompetisi Seru</h3>
                            <p class="text-muted">Berkompetisi dengan pemain lain dan raih posisi teratas di papan peringkat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm hover-shadow transition-all rounded-3 p-4">
                        <div class="card-body text-center">
                            <i class="fas fa-book-reader text-primary fs-1 mb-3"></i>
                            <h3 class="h4">Beragam Kategori</h3>
                            <p class="text-muted">Pilih dari ribuan kuis dalam berbagai kategori yang menarik.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm hover-shadow transition-all rounded-3 p-4">
                        <div class="card-body text-center">
                            <i class="fas fa-chart-line text-primary fs-1 mb-3"></i>
                            <h3 class="h4">Pantau Progres</h3>
                            <p class="text-muted">Lihat perkembangan belajar Anda melalui statistik yang detail.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="tentang" class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center">
                    <h2 class="h1 mb-4">Tentang SiTrivia</h2>
                    <p class="lead text-muted">SiTrivia lahir dari visi untuk membuat pembelajaran menjadi lebih menyenangkan dan interaktif. Platform ini dikembangkan oleh tim yang passionate dalam pendidikan dan teknologi.</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h3 class="h5 mb-3">Visi Kami</h3>
                            <p class="text-muted mb-0">Menjadi platform pembelajaran interaktif terdepan yang memudahkan akses ke pengetahuan berkualitas untuk semua kalangan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body p-4">
                            <h3 class="h5 mb-3">Misi Kami</h3>
                            <p class="text-muted mb-0">Menyediakan konten edukatif yang menarik, membangun komunitas pembelajaran yang aktif, dan mendorong semangat belajar sepanjang hayat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="kontak" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="h1 text-center mb-5">Hubungi Kami</h2>
                    <div class="card shadow-sm">
                        <div class="card-body p-4">
                            <form>
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="subject" class="form-label">Subjek</label>
                                    <input type="text" class="form-control" id="subject" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">Pesan</label>
                                    <textarea class="form-control" id="message" rows="5" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary rounded-pill px-4">Kirim Pesan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                        <li class="mb-2"><a href="#tentang" class="text-white-50 text-decoration-none">Tentang</a></li>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        // Login
        const loginButton = document.getElementById('loginButton');
        if (loginButton) {
            loginButton.addEventListener('click', function () {
                window.location.href = "{{ route('login') }}";
            });
        }

        // Main
        const mainButton = document.getElementById('mainButton');
        if (mainButton) {
            mainButton.addEventListener('click', function () {
                window.location.href = '/main';
            });
        }
        });
    </script>


</body>
</html>