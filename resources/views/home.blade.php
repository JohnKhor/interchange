@extends('layouts.app')

@section('title')
Home
@endsection

@section('content')

<div class="container">
    
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif

    <div class="jumbotron text-center">
        <h1>Welcome to Interchange</h1>
        <p>This is a simple Q&A site built with Laravel and Bootstrap.</p>
        @if (auth()->check())
            <a class="btn btn-primary btn-lg" href="{{ route('register') }}">Register</a>
            <a class="btn btn-success btn-lg" href="{{ route('login') }}">Login</a>
        @endif
    </div>
</div>

@endsection