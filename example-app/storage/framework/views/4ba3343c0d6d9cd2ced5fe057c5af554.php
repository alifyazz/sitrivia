<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title>SiTrivia - Main</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="mainpage/style.css">
</head>
<body>
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
                <a href="<?php echo e(route('profile.show')); ?>" class="ms-3">
                    <img src="/images/profile-placeholder.jpg" alt="Profile" class="rounded-circle border border-white" style="width: 40px; height: 40px;">
                </a>
            </div>
        </div>
    </nav>
</header>

    <!-- Jumbotron -->
    <section class="jumbotron-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h1 class="display-4 fw-bold mb-4">Selamat Datang di SiTrivia!</h1>
                    <p class="lead mb-4">Platform kuis interaktif untuk meningkatkan pengetahuan Anda dengan cara yang menyenangkan.</p>
                    <div class="mt-4">
                        <a href="#start-quiz" class="btn btn-primary rounded-pill px-4 py-2">
                            Mulai Kuis <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        <a href="#learn-more" class="btn btn-outline-primary rounded-pill px-4 py-2">Pelajari Lebih</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/online-quiz-3462315-2895677.png" 
                         alt="Quiz Illustration" 
                         class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>

    <!-- Beranda Section -->
    <section id="#beranda" class="container py-5">
      <div class="row justify-content-center text-center">
        <div class="col-md-8">
          <h2 class="mb-4 fw-bold">Buat Kuis Anda Sendiri!</h2>
          <p class="lead mb-4">Buat kuis pilihan ganda sesuai dengan kebutuhan Anda. Mudah dan cepat!</p>
          <button class="btn btn-primary btn-lg rounded-pill" onclick="showQuizCreator()" style="font-size: 1.5rem; padding: 15px 30px;">
            <i class="fas fa-plus-circle me-2"></i>Buat Kuis Baru
          </button>
        </div>
      </div>
    </section>

    <!-- Modal Pembuat Kuis -->
    <div class="modal fade" id="quizCreatorModal" tabindex="-1" aria-labelledby="quizCreatorModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="quizCreatorModalLabel">Buat Kuis Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="quizForm">
              <div class="mb-3">
                <label for="quizTitle" class="form-label">Judul Kuis</label>
                <input type="text" class="form-control" id="quizTitle" required>
              </div>
              
              <div id="questions-container">
                <!-- Template pertanyaan -->
                <div class="question-block border p-3 mb-3">
                  <div class="mb-3">
                    <label class="form-label">Pertanyaan 1</label>
                    <input type="text" class="form-control question-text" required>
                  </div>
                  
                  <div class="mb-2">
                    <label class="form-label">Pilihan Jawaban</label>
                    <div class="input-group mb-2">
                      <div class="input-group-text">
                        <input type="radio" name="correct1" value="A" checked>
                      </div>
                      <input type="text" class="form-control" placeholder="Pilihan A" required>
                    </div>
                    <div class="input-group mb-2">
                      <div class="input-group-text">
                        <input type="radio" name="correct1" value="B">
                      </div>
                      <input type="text" class="form-control" placeholder="Pilihan B" required>
                    </div>
                    <div class="input-group mb-2">
                      <div class="input-group-text">
                        <input type="radio" name="correct1" value="C">
                      </div>
                      <input type="text" class="form-control" placeholder="Pilihan C" required>
                    </div>
                    <div class="input-group mb-2">
                      <div class="input-group-text">
                        <input type="radio" name="correct1" value="D">
                      </div>
                      <input type="text" class="form-control" placeholder="Pilihan D" required>
                    </div>
                  </div>
                </div>
              </div>
              
              <button type="button" class="btn btn-success mb-3" onclick="addQuestion()">
                <i class="fas fa-plus me-2"></i>Tambah Pertanyaan
              </button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-primary" onclick="saveQuiz()">Simpan Kuis</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Akhir Template pertanyaan -->

    <h2 class="text-center mb-4 fw-bold">Aktivitas</h2>
    <section id="aktivitas" class="container py-4">
      <div class="row justify-content-center g-4">
        <div class="col-md-3">
          <div class="card h-100 shadow-sm">
            <div class="card-img-top d-flex justify-content-center align-items-center py-3" style="background-color: #f8f9fa;">
              <i class="fas fa-star fa-4x text-warning"></i>
            </div>
            <div class="card-body text-center">
              <h5 class="card-title mb-2">
                <i class="fas fa-star text-warning me-2"></i>Mudah
              </h5>
              <button class="btn btn-success w-100 rounded-pill" onclick="openQuizModal('easy')">
                Mulai Kuis
              </button>
              <p id="easyScore" class="score-text mt-2 small"></p>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card h-100 shadow-sm">
            <div class="card-img-top d-flex justify-content-center align-items-center py-3" style="background-color: #f8f9fa;">
              <div>
                <i class="fas fa-star fa-4x text-warning"></i>
                <i class="fas fa-star fa-4x text-warning"></i>
              </div>
            </div>
            <div class="card-body text-center">
              <h5 class="card-title mb-2">
                <i class="fas fa-medal text-secondary me-2"></i>Menengah
              </h5>
              <button class="btn btn-warning w-100 rounded-pill" onclick="openQuizModal('medium')">
                Mulai Kuis
              </button>
              <p id="mediumScore" class="score-text mt-2 small"></p>
            </div>
          </div>
        </div>

        <div class="col-md-3">
          <div class="card h-100 shadow-sm">
            <div class="card-img-top d-flex justify-content-center align-items-center py-3" style="background-color: #f8f9fa;">
              <div>
                <i class="fas fa-star fa-4x text-warning"></i>
                <i class="fas fa-star fa-4x text-warning"></i>
                <i class="fas fa-star fa-4x text-warning"></i>
              </div>
            </div>
            <div class="card-body text-center">
              <h5 class="card-title mb-2">
                <i class="fas fa-trophy text-danger me-2"></i>Sulit
              </h5>
              <button class="btn btn-danger w-100 rounded-pill" onclick="openQuizModal('hard')">
                Mulai Kuis
              </button>
              <p id="hardScore" class="score-text mt-2 small"></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Quiz Modal -->
    <div class="modal fade" id="quizModal" tabindex="-1" aria-labelledby="quizModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="quizModalLabel">Kuis</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div id="quizContent">
              <h4 id="question" class="mb-4"></h4>
              <div id="answers" class="d-grid gap-2">
              </div>
            </div>
            <div id="quizResult" style="display: none;" class="text-center">
              <h4>Kuis Selesai!</h4>
              <p id="score" class="h5 mb-4"></p>
              <button class="btn btn-primary" onclick="restartQuiz()">Kembali Ke Menu Utama</button>
            </div>
          </div>
        </div>
      </div>
    </div>

      <!-- Contact Section -->
    <section id="kontak" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="h1 text-center mb-5"><b>Hubungi Kami</b></h2>
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

        <script
          src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
          crossorigin="anonymous"
        ></script>
        <script src="mainpage/script.js"></script>
        <script>
            // Mendapatkan email pengguna dari localStorage
            const currentUserEmail = localStorage.getItem('currentUser');
            
            if (currentUserEmail) {
                try {
                    const userData = JSON.parse(localStorage.getItem(currentUserEmail));
                    if (userData && userData.name) {
                        // Update pesan selamat datang
                        const welcomeMessageEl = document.getElementById('welcomeMessage');
                        if (welcomeMessageEl) {
                            welcomeMessageEl.innerText = `Selamat datang, ${userData.name}!`;
                        }

                        // Update skor kuis
                        const scores = userData.scores || {};
                        const easyScoreEl = document.getElementById('easyScore');
                        const mediumScoreEl = document.getElementById('mediumScore');
                        const hardScoreEl = document.getElementById('hardScore');
                        
                        if (easyScoreEl) easyScoreEl.innerText = scores.easy ? `Nilai: ${scores.easy}` : 'Belum mulai kuis';
                        if (mediumScoreEl) mediumScoreEl.innerText = scores.medium ? `Nilai: ${scores.medium}` : 'Belum mulai kuis';
                        if (hardScoreEl) hardScoreEl.innerText = scores.hard ? `Nilai: ${scores.hard}` : 'Belum mulai kuis';
                    } else {
                        const welcomeMessageEl = document.getElementById('welcomeMessage');
                        if (welcomeMessageEl) {
                            welcomeMessageEl.innerText = 'Data pengguna tidak ditemukan.';
                        }
                    }
                } catch (error) {
                    console.error('Error parsing user data from localStorage:', error);
                    const welcomeMessageEl = document.getElementById('welcomeMessage');
                    if (welcomeMessageEl) {
                        welcomeMessageEl.innerText = 'Terjadi kesalahan saat memuat data pengguna.';
                    }
                }
            } else {
                const welcomeMessageEl = document.getElementById('welcomeMessage');
                if (welcomeMessageEl) {
                    welcomeMessageEl.innerText = 'Silakan login untuk melanjutkan.';
                }
            }
    </script>
    <script>
    let questionCount = 1;

    // Menampilkan modal pembuat kuis
    function showQuizCreator() {
        const modal = new bootstrap.Modal(document.getElementById('quizCreatorModal'));
        modal.show();
    }

    // Menambah pertanyaan baru
    function addQuestion() {
        questionCount++;
        const questionBlock = document.createElement('div');
        questionBlock.className = 'question-block border p-3 mb-3';

        questionBlock.innerHTML = `
            <div class="mb-3">
                <label class="form-label">Pertanyaan ${questionCount}</label>
                <input type="text" class="form-control question-text" required>
            </div>

            <div class="mb-2">
                <label class="form-label">Pilihan Jawaban</label>
                <div class="input-group mb-2">
                    <div class="input-group-text">
                        <input type="radio" name="correct${questionCount}" value="A" checked>
                    </div>
                    <input type="text" class="form-control" placeholder="Pilihan A" required>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-text">
                        <input type="radio" name="correct${questionCount}" value="B">
                    </div>
                    <input type="text" class="form-control" placeholder="Pilihan B" required>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-text">
                        <input type="radio" name="correct${questionCount}" value="C">
                    </div>
                    <input type="text" class="form-control" placeholder="Pilihan C" required>
                </div>
                <div class="input-group mb-2">
                    <div class="input-group-text">
                        <input type="radio" name="correct${questionCount}" value="D">
                    </div>
                    <input type="text" class="form-control" placeholder="Pilihan D" required>
                </div>
            </div>
        `;

        document.getElementById('questions-container').appendChild(questionBlock);
    }

    // Menyimpan kuis ke database
    function saveQuiz() {
        const quizData = {
            title: document.getElementById('quizTitle').value,
            questions: []
        };

        const questionBlocks = document.getElementsByClassName('question-block');

        for (let i = 0; i < questionBlocks.length; i++) {
            const block = questionBlocks[i];
            const question = {
                text: block.querySelector('.question-text').value,
                options: [],
                correctAnswer: block.querySelector('input[type="radio"]:checked').value
            };

            const options = block.querySelectorAll('.input-group input[type="text"]');
            options.forEach(option => {
                question.options.push(option.value);
            });

            quizData.questions.push(question);
        }

        // Validasi input
        if (!quizData.title.trim()) {
            alert("Judul kuis tidak boleh kosong.");
            return;
        }

        if (quizData.questions.length === 0) {
            alert("Tambahkan setidaknya satu pertanyaan.");
            return;
        }

        // Kirim data ke server
        fetch('/quizzes', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify(quizData)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Gagal menyimpan kuis.');
            }
            return response.json();
        })
        .then(data => {
            alert(data.message);
            const modal = bootstrap.Modal.getInstance(document.getElementById('quizCreatorModal'));
            modal.hide();
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan: ' + error.message);
        });
    }
</script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\example-app\resources\views/main.blade.php ENDPATH**/ ?>