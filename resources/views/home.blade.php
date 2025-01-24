@extends('layouts.app')

@section('content')
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
            <div class="col-md-6">
                <img src="https://cdni.iconscout.com/illustration/premium/thumb/online-quiz-3462315-2895677.png" 
                     alt="Quiz Illustration" 
                     class="img-fluid rounded">
            </div>
        </div>
    </div>
</section>

<!-- Beranda Section -->
<section id="beranda" class="container py-5">
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

<!-- Aktivitas Section with Carousel -->
<section id="aktivitas" class="container py-4">
    <div id="quizCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($quizzes->chunk(3) as $chunk)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <div class="row justify-content-center g-4">
                        @foreach($chunk as $quiz)
                            <div class="col-md-3">
                                <div class="card h-100 shadow-sm">
                                    <div class="card-img-top d-flex justify-content-center align-items-center py-3" style="background-color: #f8f9fa;">
                                        <i class="fas fa-star fa-4x text-warning"></i>
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title mb-2">{{ $quiz->title }}</h5>
                                        <button class="my-1 btn btn-success w-100 rounded-pill" onclick="openQuizModal('{{ $quiz->id }}')">Mulai</button>
                                        <button class="my-1 btn btn-danger w-100 rounded-pill" onclick="deleteQuiz('{{ $quiz->id }}')">Hapus</button>
                                        <p id="{{ $quiz->id }}Score" class="score-text mt-2 small"></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#quizCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#quizCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
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
                    <div id="answers" class="d-grid gap-2"></div>
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
@endsection


@section('scripts')
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

// JavaScript for handling quiz creation
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

function editQuiz(quizId) {
    fetch(`/quizzes/${quizId}`)
        .then(response => response.json())
        .then(quiz => {
            document.getElementById('quizTitle').value = quiz.title;
            document.getElementById('questions-container').innerHTML = quiz.questions.map((q, index) => `
                <div class="question-block border p-3 mb-3">
                    <div class="mb-3">
                        <label class="form-label">Pertanyaan ${index + 1}</label>
                        <input type="text" class="form-control question-text" value="${q.question}" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Pilihan Jawaban</label>
                        ${q.answers.map((answer, i) => `
                            <div class="input-group mb-2">
                                <div class="input-group-text">
                                    <input type="radio" name="correct${index + 1}" value="${['A', 'B', 'C', 'D'][i]}" ${q.correct === ['A', 'B', 'C', 'D'][i] ? 'checked' : ''}>
                                </div>
                                <input type="text" class="form-control" value="${answer}" required>
                            </div>
                        `).join('')}
                    </div>
                </div>
            `).join('');
            new bootstrap.Modal(document.getElementById('quizCreatorModal')).show();
        });
}

function deleteQuiz(quizId) {
    if (confirm('Yakin ingin menghapus kuis ini?')) {
        fetch(`/quizzes/${quizId}`, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
        },
    })
    .then(response => {
        if (response.ok) {
            alert('Kuis berhasil dihapus!');
            location.reload();
        } else {
            alert('Gagal menghapus kuis!');
        }
    })
    .catch(error => console.error('Error:', error));

        }
}
</script>
@endsection