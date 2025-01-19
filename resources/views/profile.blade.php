<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-light bg-white shadow-sm">
        <div class="container">
            <a href="{{ route('home') }}" class="navbar-brand d-flex align-items-center text-dark">
                <i class="fas fa-arrow-left me-2"></i>
                Back to Main
            </a>
        </div>
    </nav>

    <!-- Profile Header -->
    <div class="gradient-header">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-4">Profil</h1>
        </div>
    </div>

    <!-- Profile Content -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Profile Picture Section -->
                <div class="text-center mb-4">
                    <div class="profile-picture-container">
                        <img 
                            src="{{ $user->profile_picture ? asset('storage/' . $user->profile_picture) : asset('images/default-profile.jpg') }}" 
                            alt="Profile Picture" 
                            class="profile-picture border border-4 border-white shadow"
                        >
                        <button 
                            onclick="document.getElementById('profile_picture').click()" 
                            class="edit-profile-btn border-0"
                        >
                            <i class="fas fa-pencil-alt"></i>
                        </button>
                        <input type="file" id="profile_picture" class="d-none" accept="image/*">
                    </div>
                </div>

                <!-- Profile Information -->
                <div class="profile-info">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="h4 fw-bold m-0">Informasi Profil</h2>
                        <button 
                            onclick="toggleEdit()" 
                            class="btn btn-primary d-flex align-items-center rounded-pill"
                        >
                            <span id="editButtonText">Edit Profil</span>
                            <i class="fas fa-pencil-alt ms-2"></i>
                        </button>
                    </div>

                    <form id="profileForm" class="mt-4">
                        <div class="row">
                            <!-- Personal Information -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Nomber HP</label>
                                    <input type="tel" class="form-control" value="+1 (555) 123-4567" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" value="1995-06-15" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kewarganegaraan</label>
                                    <input type="text" class="form-control" value="Canadian" disabled>
                                </div>
                            </div>

                            <!-- Additional Information -->
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control" value="123 Maple Street, Toronto, ON M5V 2T6" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Bio</label>
                                    <textarea class="form-control" rows="3" disabled>Passionate software developer with a love for problem-solving and building user-friendly applications. Always eager to learn new technologies and contribute to innovative projects.</textarea>
                                </div>
                            </div>

                            <!-- Save Changes Button -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-success save-changes d-none" id="saveChanges">
                                    <i class="fas fa-save me-2"></i> Save Changes
                                </button>
                            </div>

                            <!-- Logout Button -->
                            <div class="col-12 mt-3">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger rounded-pill">
                                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Structure -->
    <div class="modal fade" id="quizModal" tabindex="-1" aria-labelledby="quizModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="quizModalLabel">Quiz</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="quizContent"></div>
                    <div id="quizResult" style="display: none;">
                        <p id="score"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="restartQuiz()">Restart Quiz</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <h3 class="h5 mb-3">SiTrivia</h3>
                    <p class="text-white-50">Platform kuis interaktif untuk meningkatkan pengetahuan Anda dengan cara yang menyenangkan.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
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
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i>info@sitrivia.com</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i>(021) 1234-5678</li>
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i>Bandung, Indonesia</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-white-50">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 text-white-50">&copy; 2024 SiTrivia. Hak Cipta Dilindungi.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleEdit() {
            const form = document.getElementById('profileForm');
            const inputs = form.getElementsByTagName('input');
            const textareas = form.getElementsByTagName('textarea');
            const saveChanges = document.getElementById('saveChanges');
            const editButtonText = document.getElementById('editButtonText');
            
            // Toggle inputs
            for (let input of inputs) {
                if (input.type !== 'hidden' && input.type !== 'file') {
                    input.disabled = !input.disabled;
                }
            }
            
            // Toggle textareas
            for (let textarea of textareas) {
                textarea.disabled = !textarea.disabled;
            }
            
            if (saveChanges.classList.contains('d-none')) {
                saveChanges.classList.remove('d-none');
                editButtonText.textContent = 'Cancel Edit';
            } else {
                saveChanges.classList.add('d-none');
                editButtonText.textContent = 'Edit Profile';
            }
        }
    </script>
</body>
</html>
