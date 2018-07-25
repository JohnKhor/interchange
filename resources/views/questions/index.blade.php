@extends('layouts.app')

@section('title')
All Questions
@endsection

@section('content')

<div class="container">
    <h1>All Questions</h1>
    
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif
    
    <ul class="list-group">
        @foreach ($questions as $question)
            <li class="list-group-item">
                <h5>
                    <a href="{{ route('questions.show', ['question' => $question->title]) }}">{{ $question->title }}</a>
                </h5>
                <p>Asked by {{ $question->user->username }}</p>

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
            </li>    
        @endforeach    
    </ul>
</div>
 
@endsection