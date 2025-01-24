@extends('layouts.app')

@section('content')
<!-- Beranda Section -->
<section id="beranda" class="container py-5">
    <div class="row justify-content-center text-center">
        <div class="col-md-8">
            <h2 class="mb-4 fw-bold">Buat Kuis Anda Sendiri!</h2>
            <p class="lead mb-4">Buat kuis pilihan ganda sesuai dengan kebutuhan Anda. Mudah dan cepat!</p>
            <button class="btn btn-primary btn-lg rounded-pill btn-create-quiz" style="font-size: 1.5rem; padding: 15px 30px;">
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
                    <!-- Template pertanyaan -->
                    <div id="questions-container">
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
                <button class="btn btn-primary" onclick="saveEditedQuiz()">Simpan Perubahan</button>
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
                                        <button class="btn btn-success w-100 rounded-pill btn-start-quiz" data-quiz-id="{{ $quiz->id }}">Mulai</button>
                                        <button class="my-1 btn btn-secondary w-100 rounded-pill edit-quiz-btn" data-quiz-id="{{ $quiz->id }}">Edit</button>
                                        <button class="btn btn-danger w-100 rounded-pill btn-delete-quiz" data-quiz-id="{{ $quiz->id }}">Hapus</button>
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

@push('scripts')
<script src="{{ asset('mainpage/script.js') }}"></script>
@endpush
