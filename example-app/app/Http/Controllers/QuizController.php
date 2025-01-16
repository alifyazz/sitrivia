<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;

class QuizController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'questions' => 'required|array',
            'questions.*.text' => 'required|string',
            'questions.*.options' => 'required|array|min:4',
            'questions.*.correctAnswer' => 'required|string',
        ]);

        // Simpan kuis
        $quiz = Quiz::create(['title' => $request->title]);

        // Simpan pertanyaan
        foreach ($request->questions as $q) {
            $quiz->questions()->create([
                'text' => $q['text'],
                'options' => $q['options'],
                'correct_answer' => $q['correctAnswer'],
            ]);
        }

        return response()->json(['message' => 'Kuis berhasil disimpan!'], 200);
    }
}

