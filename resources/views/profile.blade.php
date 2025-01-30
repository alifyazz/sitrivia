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
                        <button class="btn btn-primary rounded-pill" id="editProfileButton">
                            <i class="fas fa-edit me-2"></i> Edit Profil
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
                                    <input type="tel" class="form-control profile-input" id="phoneNumber" value="+1 (555) 123-4567" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control profile-input" id="birthDate" value="1995-06-15" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">Kewarganegaraan</label>
                                    <input type="text" class="form-control profile-input" id="nationality" value="Canadian" disabled>
                                </div>
                            </div>

                            <!-- Additional Information -->
                            <div class="col-6">
                                <div class="form-group">
                                    <label class="form-label">Alamat</label>
                                    <input type="text" class="form-control profile-input" id="address" value="123 Maple Street, Toronto, ON M5V 2T6" disabled>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label">Bio</label>
                                    <textarea class="form-control profile-input" id="bio" rows="3" disabled>
                                        Passionate software developer with a love for problem-solving and building user-friendly applications. Always eager to learn new technologies and contribute to innovative projects.
                                    </textarea>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-success rounded-pill save-changes d-none" id="saveChangesButton">
                                    <i class="fas fa-save me-2"></i> Save Changes
                                </button>
                                <button class="btn btn-secondary rounded-pill d-none" id="cancelChangesButton">
                                    <i class="fas fa-times me-2"></i> Cancel
                                </button>
                            </div>

                        </div>
                    </form>
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
        const editButton = document.getElementById('editProfileButton');
        const saveButton = document.getElementById('saveChangesButton');
        const cancelButton = document.getElementById('cancelChangesButton');
        const profileInputs = document.querySelectorAll('.profile-input');

        // Fungsi untuk mengaktifkan mode edit
        function enableEditMode() {
            profileInputs.forEach(input => {
                input.disabled = false; // Aktifkan semua input
            });
            editButton.classList.add('d-none'); // Sembunyikan tombol edit
            saveButton.classList.remove('d-none'); // Tampilkan tombol save
            cancelButton.classList.remove('d-none'); // Tampilkan tombol cancel
        }

        // Fungsi untuk menyimpan perubahan
        function saveProfileChanges() {
            const updatedProfile = {
                phoneNumber: document.getElementById('phoneNumber').value,
                birthDate: document.getElementById('birthDate').value,
                nationality: document.getElementById('nationality').value,
                address: document.getElementById('address').value,
                bio: document.getElementById('bio').value,
            };

            // Simpan perubahan ke server menggunakan fetch API
            fetch('/update-profile', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify(updatedProfile),
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Gagal menyimpan perubahan profil.');
                    }
                    return response.json();
                })
                .then(data => {
                    alert(data.message || 'Perubahan berhasil disimpan.');
                    disableEditMode(); // Kembali ke mode non-edit
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat menyimpan profil.');
                });
        }

        
        function cancelProfileChanges() {
            profileInputs.forEach(input => {
                input.disabled = true; 
            });
            // Reset nilai input ke nilai asli (bisa dari server atau localStorage)
            document.getElementById('phoneNumber').value = '+1 (555) 123-4567';
            document.getElementById('birthDate').value = '1995-06-15';
            document.getElementById('nationality').value = 'Canadian';
            document.getElementById('address').value = '123 Maple Street, Toronto, ON M5V 2T6';
            document.getElementById('bio').value =
                'Passionate software developer with a love for problem-solving and building user-friendly applications. Always eager to learn new technologies and contribute to innovative projects.';

            disableEditMode();
        }

        // Fungsi untuk menonaktifkan mode edit
        function disableEditMode() {
            profileInputs.forEach(input => {
                input.disabled = true; 
            });
            editButton.classList.remove('d-none'); 
            saveButton.classList.add('d-none'); 
            cancelButton.classList.add('d-none'); 
        }

        // Event Listeners
        editButton.addEventListener('click', enableEditMode);
        saveButton.addEventListener('click', saveProfileChanges);
        cancelButton.addEventListener('click', cancelProfileChanges);
    </script>
</body>
</html>
