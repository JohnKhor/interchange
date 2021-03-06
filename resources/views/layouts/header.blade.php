<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('home') }}">Interchange</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="{{ route('questions') }}">Questions</a>
            @if (auth()->check())
                <a class="nav-item nav-link" href="{{ route('questions.create') }}">Create Question</a>
                <a class="nav-item nav-link" href="{{ route('logout') }}">Logout</a>
            @else
                <a class="nav-item nav-link" href="{{ route('login') }}">Login</a>
                <a class="nav-item nav-link" href="{{ route('register') }}">Register</a>
            @endif
        </div>
    </div>
</nav>