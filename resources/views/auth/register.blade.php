@extends('layouts.app')

@section('title')
Register
@endsection

@section('content')

<div class="container">
    <h1>Create your personal account</h1>
    <form method="POST" action="{{ route('register.store') }}">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="username-help" placeholder="Username">
            @if ($errors->has('username'))
                <small id="username-help" class="form-text text-muted">{{ $errors->first('username')}}</small>
            @endif
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="Email address">
            @if ($errors->has('email'))
                <small id="email-help" class="form-text text-muted">{{ $errors->first('email') }}</small>
            @endif
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            @if ($errors->has('password'))
                <small id="password-help" class="form-text text-muted">{{ $errors->first('password') }}</small>
            @endif
        </div>
        <div class="form-group">
            <label for="password_confirmation">Password Confirmation</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Password Confirmation">
        </div>
        <input type="submit" class="btn btn-primary" value="Create an account"></input>
    </form>     
</div>

@endsection