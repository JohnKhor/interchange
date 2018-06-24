@extends('layouts.app')

@section('title')
Login
@endsection

@section('content')

<div class="container">
    <h1>Log into your account</h1>
    <form method="POST" action="{{ route('login.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="usernameOrEmail">Username or email address</label>
            <input type="text" class="form-control" id="usernameOrEmail" name="usernameOrEmail" placeholder="Username or email address">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Log into your account"></input>
        </div>
        @if ($errors->has('credentials'))
            <div class="alert alert-danger" role="alert">{{ $errors->first('credentials') }}</div>
        @endif
    </form>   
</div>

@endsection