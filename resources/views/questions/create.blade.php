@extends('layouts.app')

@section('title')
Ask Question
@endsection

@section('content')

<div class="container">
    <h1>Ask your question</h1>
    <form method="POST" action="{{ route('questions.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Question</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="title-help" placeholder="Question">
            @if ($errors->has('title'))
                <small id="title-help" class="form-text text-muted">{{ $errors->first('title')}}</small>
            @endif
        </div>
        <div class="form-group">
            <label for="body">Further details (can be empty)</label>
            <textarea class="form-control" id="body" name="body" rows="3" placeholder="Further details"></textarea>
            @if ($errors->has('body'))
                <small id="body-help" class="form-text text-muted">{{ $errors->first('body')}}</small>
            @endif
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Ask your question"></input>
        </div>
    </form>   
</div>

@endsection