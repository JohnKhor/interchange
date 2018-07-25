@extends('layouts.app')

@section('title')
Edit Question
@endsection

@section('content')

<div class="container">
    <h1>Edit your question</h1>
    <form method="POST" action="{{ route('questions.update', ['question' => $question->title]) }}">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="title">Question</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="title-help" placeholder="Question" value="{{ $question->title }}">
            @if ($errors->has('title'))
                <small id="title-help" class="form-text text-muted">{{ $errors->first('title')}}</small>
            @endif
        </div>
        <div class="form-group">
            <label for="body">Further details (can be empty)</label>
            <textarea class="form-control" id="body" name="body" rows="3" placeholder="Further details">{{ $question->body }}</textarea>
            @if ($errors->has('body'))
                <small id="body-help" class="form-text text-muted">{{ $errors->first('body')}}</small>
            @endif
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Update your question"></input>
        </div>
    </form>   
</div>

@endsection