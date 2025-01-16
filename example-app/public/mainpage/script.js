const questionsByLevel = {
    easy: [
      {
        question: "Apa ibukota negara Indonesia?",
        answers: [
          { text: "Jakarta", correct: true },
          { text: "Surabaya", correct: false },
          { text: "Bandung", correct: false },
          { text: "Medan", correct: false }
        ]
      },
      {
        question: "Negara manakah yang terkenal dengan Menara Eiffel?",
        answers: [
          { text: "Italia", correct: false },
          { text: "Prancis", correct: true },
          { text: "Jerman", correct: false },
          { text: "Inggris", correct: false }
        ]
      },
      {
        question: "Benua terbesar di dunia adalah?",
        answers: [
          { text: "Amerika", correct: false },
          { text: "Afrika", correct: false },
          { text: "Asia", correct: true },
          { text: "Eropa", correct: false }
        ]
      }
    ],
    medium: [
      {
        question: "Negara manakah yang berbatasan dengan 14 negara lainnya?",
        answers: [
          { text: "Rusia", correct: false },
          { text: "China", correct: true },
          { text: "India", correct: false },
          { text: "Kazakhstan", correct: false }
        ]
      },
      {
        question: "Apa ibukota Australia?",
        answers: [
          { text: "Sydney", correct: false },
          { text: "Melbourne", correct: false },
          { text: "Canberra", correct: true },
          { text: "Perth", correct: false }
        ]
      },
      {
        question: "Di negara manakah Taj Mahal berada?",
        answers: [
          { text: "India", correct: true },
          { text: "Pakistan", correct: false },
          { text: "Bangladesh", correct: false },
          { text: "Nepal", correct: false }
        ]
      },
      {
        question: "Mata uang Yen digunakan di negara?",
        answers: [
          { text: "China", correct: false },
          { text: "Korea Selatan", correct: false },
          { text: "Jepang", correct: true },
          { text: "Thailand", correct: false }
        ]
      },
      {
        question: "Sungai terpanjang di dunia adalah?",
        answers: [
          { text: "Sungai Nil", correct: true },
          { text: "Sungai Amazon", correct: false },
          { text: "Sungai Yangtze", correct: false },
          { text: "Sungai Mississippi", correct: false }
        ]
      }
    ],
    hard: [
      {
        question: "Negara terkecil di dunia adalah?",
        answers: [
          { text: "Monaco", correct: false },
          { text: "Vatikan", correct: true },
          { text: "San Marino", correct: false },
          { text: "Liechtenstein", correct: false }
        ]
      },
      {
        question: "Apa ibukota Uzbekistan?",
        answers: [
          { text: "Tashkent", correct: true },
          { text: "Bishkek", correct: false },
          { text: "Dushanbe", correct: false },
          { text: "Ashgabat", correct: false }
        ]
      },
      {
        question: "Di negara manakah Angkor Wat berada?",
        answers: [
          { text: "Thailand", correct: false },
          { text: "Vietnam", correct: false },
          { text: "Kamboja", correct: true },
          { text: "Laos", correct: false }
        ]
      },
      {
        question: "Gunung tertinggi di Afrika adalah?",
        answers: [
          { text: "Kilimanjaro", correct: true },
          { text: "Mount Kenya", correct: false },
          { text: "Mount Stanley", correct: false },
          { text: "Mount Meru", correct: false }
        ]
      },
      {
        question: "Apa ibukota Selandia Baru?",
        answers: [
          { text: "Auckland", correct: false },
          { text: "Wellington", correct: true },
          { text: "Christchurch", correct: false },
          { text: "Hamilton", correct: false }
        ]
      },
      {
        question: "Negara manakah yang memiliki bendera dengan satu warna (merah polos)?",
        answers: [
          { text: "Libya (1977-2011)", correct: false },
          { text: "Oman", correct: false },
          { text: "Tunisia", correct: false },
          { text: "Maroko", correct: false }
        ]
      },
      {
        question: "Di negara manakah Petra berada?",
        answers: [
          { text: "Yordania", correct: true },
          { text: "Mesir", correct: false },
          { text: "Arab Saudi", correct: false },
          { text: "Lebanon", correct: false }
        ]
      },
      {
        question: "Apa nama lembah terkenal di Pakistan yang memiliki delapan gunung tertinggi di dunia?",
        answers: [
          { text: "Lembah Karakoram", correct: true },
          { text: "Lembah Hunza", correct: false },
          { text: "Lembah Swat", correct: false },
          { text: "Lembah Kaghan", correct: false }
        ]
      },
      {
        question: "Selat mana yang memisahkan Benua Asia dan Amerika Utara?",
        answers: [
          { text: "Selat Bering", correct: true },
          { text: "Selat Gibraltar", correct: false },
          { text: "Selat Malaka", correct: false },
          { text: "Selat Bass", correct: false }
        ]
      },
      {
        question: "Danau terdalam di dunia adalah?",
        answers: [
          { text: "Danau Baikal", correct: true },
          { text: "Danau Tanganyika", correct: false },
          { text: "Danau Superior", correct: false },
          { text: "Danau Victoria", correct: false }
        ]
      }
    ]
  };
  
  // Quiz state variables
let currentQuestionIndex = 0;
let previousQuestions = [];
let score = 0;
let currentLevel = '';
let currentQuestions = [];
let quizModal;

document.addEventListener('DOMContentLoaded', () => {
  quizModal = new bootstrap.Modal(document.getElementById('quizModal'));
});

function openQuizModal(level) {
  previousQuestions = [];

  currentLevel = level;
  currentQuestions = questionsByLevel[level];
  currentQuestionIndex = 0;
  score = 0;
  
  
  document.getElementById('quizContent').style.display = 'block';
  document.getElementById('quizResult').style.display = 'none';
  
  const titles = {
    easy: 'Kuis Mudah',
    medium: 'Kuis Menengah',
    hard: 'Kuis Sulit'
  };
  document.getElementById('quizModalLabel').textContent = titles[level];
  
  showQuestion();
  quizModal.show();
}

function showQuestion() {
  previousQuestions.push(currentQuestionIndex);

  resetState();
  const questionElement = document.getElementById('question');
  const answersElement = document.getElementById('answers');
  const currentQuestion = currentQuestions[currentQuestionIndex];
  
  if (currentQuestion) {
    questionElement.innerText = currentQuestion.question;

    currentQuestion.answers.forEach((answer) => {
      const button = document.createElement('button');
      button.innerText = answer.text;
      button.classList.add('btn', 'btn-outline-primary');
      button.addEventListener('click', () => selectAnswer(answer.correct));
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
  const answersElement = document.getElementById('answers');
  const buttons = answersElement.getElementsByTagName('button');
  
  for (let button of buttons) {
    button.disabled = true; // Disable all buttons after an answer is selected
    if (button.innerText === currentQuestions[currentQuestionIndex].answers.find(a => a.correct).text) {
      button.classList.add('btn-success');
    } else {
      button.classList.add('btn-danger');
    }
  }

  if (isCorrect) {
    score++;
  }
  
  if (currentQuestionIndex < currentQuestions.length - 1) {
    currentQuestionIndex++;
    showQuestion();
  } else {
    const backButton = document.createElement('button');
    backButton.innerText = 'Kembali ke Pertanyaan Sebelumnya';
    backButton.classList.add('btn', 'btn-secondary');
    backButton.addEventListener('click', () => {
      if (previousQuestions.length > 0) {
        currentQuestionIndex = previousQuestions.pop();
        showQuestion();
      }
    });
    document.getElementById('quizContent').appendChild(backButton);
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
  const userData = JSON.parse(localStorage.getItem(currentUserEmail));
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
