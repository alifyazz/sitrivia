<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Question;

class QuizController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::with('questions')->get();
        return view('quizzes.index', compact('quizzes'));
    }

    public function create()
    {
        return view('quizzes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'questions' => 'required|array',
            'questions.*.text' => 'required|string',
            'questions.*.options' => 'required|array|min:4',
            'questions.*.correctAnswer' => 'required|string',
        ]);

        $quiz = Quiz::create(['title' => $request->title]);

        foreach ($request->questions as $q) {
            $quiz->questions()->create([
                'text' => $q['text'],
                'options' => $q['options'],
                'correct_answer' => $q['correctAnswer'],
            ]);
        }

        return redirect()->route('quizzes.index')->with('success', 'Quiz created successfully.');
    }

    public function show(Quiz $quiz)
    {
        return response()->json($quiz->load('questions'));
    }


    public function edit(Quiz $quiz)
    {
        return view('quizzes.edit', compact('quiz'));
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'questions' => 'required|array',
            'questions.*.text' => 'required|string',
            'questions.*.options' => 'required|array|min:4',
            'questions.*.correctAnswer' => 'required|string',
        ]);

        $quiz->update(['title' => $request->title]);

        $quiz->questions()->delete(); // Delete old questions

        foreach ($request->questions as $q) {
            $quiz->questions()->create([
                'text' => $q['text'],
                'options' => $q['options'],
                'correct_answer' => $q['correctAnswer'],
            ]);
        }

        return redirect()->route('quizzes.index')->with('success', 'Quiz updated successfully.');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();
        return redirect()->route('quizzes.index')->with('success', 'Quiz deleted successfully.');
    }
}
