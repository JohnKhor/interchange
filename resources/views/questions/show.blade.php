@extends('layouts.app')

@section('title')
{{ $question->title }}
@endsection

@section('content')

<div class="container">
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif

    @if(session()->has('duplicate-answer'))
        <div class="alert alert-danger" role="alert">{{ session('duplicate-answer') }}</div>
    @endif

    <h2>{{ $question->title }}</h2>
    <p>Asked by {{ $question->user->username }}</p>
    <p>{{ $question->body }}</p>
    
    @can('update', $question)
        <a class="btn btn-primary d-inline-block" href="{{ route('questions.edit', ['question' => $question->title]) }}" role="button">Edit</a>
        <form method="POST" action="{{ route('questions.destroy', ['question' => $question->title]) }}" class="d-inline-block">
            @method('DELETE')
            @csrf
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Delete"></input>
            </div>
        </form>
    @endcan

    @include('answers.create', compact('question'))

    @include('answers.index', compact('question')) 
</div>

@endsection