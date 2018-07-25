<?php

namespace App\Http\Controllers;

use App\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    public function show(Question $question) 
    {
        return view('questions.show', compact('question'));
    }

    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255|unique:questions,title',
            'body' => 'nullable|string',
        ]);

        $question = Question::create([
            'title' => request('title'),
            'body' => request('body'),
            'user_id' => auth()->user()->id,
        ]);

        return redirect()
            ->route('questions.show', ['question' => $question->title])
            ->with('success', 'Question has been successfully created.');
    }

    public function edit(Question $question)
    {
        return view('questions.edit', compact('question'));
    }

    public function update(Question $question, Request $request)
    {
        $this->authorize('update', $question);

        $request->validate([
            'title' => 'required|string|max:255|unique:questions,title,' . $question->id,
            'body' => 'nullable|string',
        ]);

        $question->title = $request->title;
        $question->body = $request->body;
        $question->save();

        return redirect()
            ->route('questions.show', ['question' => $question->title])
            ->with('success', 'Question has been successfully updated.');
    }

    public function destroy(Question $question)
    {
        $this->authorize('delete', $question);

        $question->delete();

        return redirect()
            ->route('questions')
            ->with('success', 'Question has been removed.');
    }
}
