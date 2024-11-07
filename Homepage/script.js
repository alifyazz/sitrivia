// Soal-soal kuis
const questions = [
  {
    question: "Berapa jumlah planet di tata surya kita?",
    answers: [
      { text: "7", correct: false },
      { text: "8", correct: true },
      { text: "9", correct: false },
    ],
  },
  {
    question: "Hewan apa yang dikenal sebagai raja hutan?",
    answers: [
      { text: "Gajah", correct: false },
      { text: "Singa", correct: true },
      { text: "Harimau", correct: false },
    ],
  },
];

let currentQuestionIndex = 0;
let score = 0;

function startQuiz() {
  document.getElementById("beranda").style.display = "none";
  document.getElementById("kuis").style.display = "block";
  showQuestion();
}

function showQuestion() {
  resetState();
  const questionElement = document.getElementById("question");
  const answersElement = document.getElementById("answers");
  const currentQuestion = questions[currentQuestionIndex];
  questionElement.innerText = currentQuestion.question;

  currentQuestion.answers.forEach((answer) => {
    const button = document.createElement("button");
    button.innerText = answer.text;
    button.classList.add("btn");
    button.addEventListener("click", () => selectAnswer(answer.correct));
    answersElement.appendChild(button);
  });
}

function resetState() {
  document.getElementById("answers").innerHTML = "";
}

function selectAnswer(isCorrect) {
  if (isCorrect) {
    score++;
  }
  if (currentQuestionIndex < questions.length - 1) {
    currentQuestionIndex++;
    showQuestion();
  } else {
    showResult();
  }
}

function nextQuestion() {
  showQuestion();
}

function showResult() {
  document.getElementById("kuis").style.display = "none";
  document.getElementById("hasil").style.display = "block";
  document.getElementById(
    "score"
  ).innerText = `Skor Anda: ${score} dari ${questions.length}`;
}

function restartQuiz() {
  currentQuestionIndex = 0;
  score = 0;
  document.getElementById("hasil").style.display = "none";
  document.getElementById("beranda").style.display = "block";
}
