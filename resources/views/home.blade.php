@extends('layouts.app')

@section('title')
Home
@endsection

@section('content')

<div class="container">
    
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">You have successfully register as an user!</div>
    @endif
    
</div>

@endsection