// Quiz state variables
let currentQuestionIndex = 0;
let score = 0;
let currentLevel = '';
let currentQuestions = [];
let quizModal;

document.addEventListener('DOMContentLoaded', () => {
    quizModal = new bootstrap.Modal(document.getElementById('quizModal'));
});

function openQuizModal(quizId) {
  fetch(`/quizzes/${quizId}`)
  .then(response => response.json())
  .then(data => {
      currentQuestions = data.questions;
      currentQuestionIndex = 0;
      score = 0;

      document.getElementById('quizContent').style.display = 'block';
      document.getElementById('quizResult').style.display = 'none';
      showQuestion();

      quizModal.show();
  })
  .catch(error => console.error('Error:', error));
}


function showQuestion() {
    resetState();
    const questionElement = document.getElementById('question');
    const answersElement = document.getElementById('answers');
    const currentQuestion = currentQuestions[currentQuestionIndex];

    if (currentQuestion) {
        questionElement.innerText = currentQuestion.text;

        currentQuestion.options.forEach((option, index) => {
            const button = document.createElement('button');
            button.innerText = option;
            button.classList.add('btn', 'btn-outline-primary');
            button.addEventListener('click', () => selectAnswer(option === currentQuestion.correct_answer));
            answersElement.appendChild(button);
        });
    }
}

function resetState() {
    const answersElement = document.getElementById('answers');
    while (answersElement.firstChild) {
        answersElement.removeChild(answersElement.firstChild);
    }
}

function selectAnswer(isCorrect) {
    if (isCorrect) {
        score++;
    }

    if (currentQuestionIndex < currentQuestions.length - 1) {
        currentQuestionIndex++;
        showQuestion();
    } else {
        showResult();
    }
}

function showResult() {
    document.getElementById('quizContent').style.display = 'none';
    document.getElementById('quizResult').style.display = 'block';

    const totalQuestions = currentQuestions.length;
    const scoreValue = (score / totalQuestions) * 100;
    const roundedScore = Math.round(scoreValue * 10) / 10;

    document.getElementById('score').innerText = 
        `Benar: ${score} dari ${totalQuestions} (Nilai: ${roundedScore})`;

    const currentUserEmail = localStorage.getItem('currentUser');
    const userData = JSON.parse(localStorage.getItem(currentUserEmail)) || {};
    userData.scores = userData.scores || {};
    userData.scores[currentLevel] = roundedScore;
    localStorage.setItem(currentUserEmail, JSON.stringify(userData));

    document.getElementById(`${currentLevel}Score`).innerText = `Skor Terakhir: ${roundedScore}`;
}

function restartQuiz() {
    quizModal.hide();
    currentQuestionIndex = 0;
    score = 0;
}
