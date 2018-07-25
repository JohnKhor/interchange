@extends('layouts.app')

@section('title')
Home
@endsection

@section('content')

<div class="container">
    
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
    @endif
    
</div>

@endsection