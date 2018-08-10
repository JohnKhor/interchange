<?php

namespace App\Http\Controllers;

use App\Question;
use App\Answer;
use Illuminate\Http\Request;

class AnswersController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'body' => 'required|string',
            'question_id' => 'required',
        ]);

        // Check if question exists
        $question = Question::findOrFail(request('question_id'));
        
        // Check if current user already answer the question
        if ($question->isAnswered())
        {
            return redirect()
                ->route('questions.show', ['question' => $question->title])
                ->with('duplicate-answer', 'You have already answered this question.');
        }

        $question->answers()->create([
            'body' => request('body'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()
            ->route('questions.show', ['question' => $question->title])
            ->with('success', 'Answer has been successfully created.');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
