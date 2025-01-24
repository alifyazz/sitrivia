// =====================
// Global Variables
// =====================
let currentQuestionIndex = 0;
let score = 0;
let currentLevel = "";
let currentQuestions = [];
let quizModal;
let questionCount = 1;

// =====================
// Initialization
// =====================
document.addEventListener("DOMContentLoaded", () => {
    quizModal = new bootstrap.Modal(document.getElementById("quizModal"));

    updateUserInfo();

    document.querySelectorAll(".edit-quiz-btn").forEach((button) => {
        button.addEventListener("click", () => {
            const quizId = button.getAttribute("data-quiz-id");
            editQuiz(quizId);
        });
    });

    const createQuizBtn = document.querySelector('.btn-create-quiz');
    if (createQuizBtn) {
        createQuizBtn.addEventListener('click', showQuizCreator);
    }

    document.querySelectorAll('.btn-start-quiz').forEach(button => {
        button.addEventListener('click', () => {
            const quizId = button.getAttribute('data-quiz-id');
            openQuizModal(quizId);
        });
    });

    document.querySelectorAll('.btn-delete-quiz').forEach(button => {
        button.addEventListener('click', () => {
            const quizId = button.getAttribute('data-quiz-id');
            deleteQuiz(quizId);
        });
    });
});

// =====================
// User Info Handling
// =====================
function updateUserInfo() {
    const currentUserEmail = localStorage.getItem("currentUser");

    if (!currentUserEmail) {
        updateWelcomeMessage("Silakan login untuk melanjutkan.");
        return;
    }

    try {
        const userData = JSON.parse(localStorage.getItem(currentUserEmail));
        if (userData?.name) {
            updateWelcomeMessage(`Selamat datang, ${userData.name}!`);
            updateScores(userData.scores || {});
        } else {
            updateWelcomeMessage("Data pengguna tidak ditemukan.");
        }
    } catch (error) {
        console.error("Error parsing user data from localStorage:", error);
        updateWelcomeMessage("Terjadi kesalahan saat memuat data pengguna.");
    }
}

function updateWelcomeMessage(message) {
    const welcomeMessageEl = document.getElementById("welcomeMessage");
    if (welcomeMessageEl) welcomeMessageEl.innerText = message;
}

// =====================
// Quiz Management
// =====================
document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('.btn-create-quiz').addEventListener('click', showQuizCreator);
});

function showQuizCreator() {
    const modal = new bootstrap.Modal(
        document.getElementById("quizCreatorModal")
    );
    modal.show();
}

function addQuestion() {
    questionCount++;
    const container = document.getElementById('questions-container');
    const questionBlock = document.createElement('div');
    questionBlock.classList.add('question-block', 'border', 'p-3', 'mb-3');
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
    container.appendChild(questionBlock);
}

function generateQuestionHTML(index) {
    return `
        <div class="mb-3">
            <label class="form-label">Pertanyaan ${index}</label>
            <input type="text" class="form-control question-text" required>
        </div>
        <div class="mb-2">
            <label class="form-label">Pilihan Jawaban</label>
            ${["A", "B", "C", "D"]
                .map(
                    (option) => `
                <div class="input-group mb-2">
                    <div class="input-group-text">
                        <input type="radio" name="correct${index}" value="${option}" ${
                        option === "A" ? "checked" : ""
                    }>
                    </div>
                    <input type="text" class="form-control" placeholder="Pilihan ${option}" required>
                </div>
            `
                )
                .join("")}
        </div>
    `;
}

function saveQuiz() {
    const quizTitle = document.getElementById('quizTitle').value.trim();
    const questions = [];
    const questionBlocks = document.querySelectorAll('.question-block');

    if (!quizTitle) {
        alert("Judul kuis tidak boleh kosong.");
        return;
    }

    let isValid = true;
    questionBlocks.forEach((block, index) => {
        const questionText = block.querySelector('.question-text').value.trim();
        const options = [];
        const correctAnswer = block.querySelector(`input[name="correct${index + 1}"]:checked`)?.value;

        if (!questionText) {
            alert(`Teks pertanyaan ${index + 1} tidak boleh kosong.`);
            isValid = false;
            return;
        }

        block.querySelectorAll('.input-group').forEach((group, i) => {
            const optionText = group.querySelector('.form-control').value.trim();
            if (!optionText) {
                alert(`Pilihan jawaban ${String.fromCharCode(65 + i)} di pertanyaan ${index + 1} tidak boleh kosong.`);
                isValid = false;
                return;
            }
            options.push({
                value: String.fromCharCode(65 + i),
                text: optionText,
            });
        });

        if (!correctAnswer) {
            alert(`Jawaban benar untuk pertanyaan ${index + 1} belum dipilih.`);
            isValid = false;
            return;
        }

        questions.push({
            text: questionText, 
            options: options, 
            correctAnswer: correctAnswer, 
        });
    });

    if (!isValid) return;

    fetch('/quizzes', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({
            title: quizTitle,
            questions: questions,
        }),
    })
        .then(response => {
            if (!response.ok) throw new Error('Gagal menyimpan kuis.');
            return response.json();
        })
        .then(data => {
            alert(data.message || 'Kuis berhasil disimpan!');
            location.reload();
        })
        .catch(error => {
            console.error(error);
            alert('Terjadi kesalahan saat menyimpan kuis.');
        });
}

function getQuizData() {
    const quizData = {
        title: document.getElementById("quizTitle").value,
        questions: [],
    };

    const questionBlocks = document.getElementsByClassName("question-block");
    Array.from(questionBlocks).forEach((block) => {
        const question = {
            text: block.querySelector(".question-text").value,
            options: Array.from(
                block.querySelectorAll('.input-group input[type="text"]')
            ).map((input) => input.value),
            correctAnswer: block.querySelector('input[type="radio"]:checked')
                .value,
        };
        quizData.questions.push(question);
    });

    return quizData;
}


function deleteQuiz(quizId) {
    if (!confirm("Yakin ingin menghapus kuis ini?")) return;

    fetch(`/quizzes/${quizId}`, {
        method: "DELETE",
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]')
                .content,
        },
    })
        .then((response) => {
            if (response.ok) {
                alert("Kuis berhasil dihapus!");
                location.reload();
            } else {
                alert("Gagal menghapus kuis!");
            }
        })
        .catch((error) => console.error("Error:", error));
}

function editQuiz(quizId) {
    fetch(`/quizzes/${quizId}`)
        .then((response) => response.json())
        .then((quiz) => {
            document.getElementById("quizTitle").value = quiz.title;
            document.getElementById("questions-container").innerHTML =
                quiz.questions
                    .map(
                        (q, index) => `
                <div class="question-block border p-3 mb-3">
                    <div class="mb-3">
                        <label class="form-label">Pertanyaan ${
                            index + 1
                        }</label>
                        <input type="text" class="form-control question-text" value="${
                            q.text
                        }" required>
                    </div>
                    <div class="mb-2">
                        <label class="form-label">Pilihan Jawaban</label>
                        ${q.options
                            .map(
                                (option, i) => `
                            <div class="input-group mb-2">
                                <div class="input-group-text">
                                    <input type="radio" name="correct${
                                        index + 1
                                    }" value="${["A", "B", "C", "D"][i]}" ${
                                    q.correct_answer === ["A", "B", "C", "D"][i]
                                        ? "checked"
                                        : ""
                                }>
                                </div>
                                <input type="text" class="form-control" value="${option}" required>
                            </div>
                        `
                            )
                            .join("")}
                    </div>
                </div>
            `
                    )
                    .join("");
            new bootstrap.Modal(
                document.getElementById("quizCreatorModal")
            ).show();
        })
        .catch((error) => console.error("Error fetching quiz data:", error));
}

// =====================
// Quiz Gameplay
// =====================

function openQuizModal(quizId) {
    fetch(`/quizzes/${quizId}`)
        .then((response) => response.json())
        .then((data) => {
            currentQuestions = data.questions;
            currentQuestionIndex = 0;
            score = 0;
            document.getElementById("quizContent").style.display = "block";
            document.getElementById("quizResult").style.display = "none";
            showQuestion();
            quizModal.show();
        })
        .catch((error) => console.error("Error:", error));
}

function showQuestion() {
    resetState();
    const question = currentQuestions[currentQuestionIndex];
    const questionElement = document.getElementById("question");
    const answersElement = document.getElementById("answers");

    questionElement.innerText = question.text;
    question.options.forEach((option) => {
        const button = document.createElement("button");
        button.innerText = option;
        button.classList.add("btn", "btn-outline-primary");
        button.addEventListener("click", () =>
            selectAnswer(option === question.correct_answer)
        );
        answersElement.appendChild(button);
    });
}

function resetState() {
    const answersElement = document.getElementById("answers");
    answersElement.innerHTML = "";
}

function selectAnswer(isCorrect) {
    if (isCorrect) score++;
    if (currentQuestionIndex < currentQuestions.length - 1) {
        currentQuestionIndex++;
        showQuestion();
    } else {
        showResult();
    }
}

function showResult() {
    const totalQuestions = currentQuestions.length;
    const roundedScore = Math.round((score / totalQuestions) * 1000) / 10;

    document.getElementById("quizContent").style.display = "none";
    document.getElementById("quizResult").style.display = "block";
    document.getElementById(
        "score"
    ).innerText = `Benar: ${score} dari ${totalQuestions} (Nilai: ${roundedScore})`;

    const currentUserEmail = localStorage.getItem("currentUser");
    const userData = JSON.parse(localStorage.getItem(currentUserEmail)) || {};
    userData.scores = userData.scores || {};
    userData.scores[currentLevel] = roundedScore;
    localStorage.setItem(currentUserEmail, JSON.stringify(userData));

    const scoreElement = document.getElementById(`${currentLevel}Score`);
    if (scoreElement) scoreElement.innerText = `Skor Terakhir: ${roundedScore}`;
}

function restartQuiz() {
    quizModal.hide();
    currentQuestionIndex = 0;
    score = 0;
}