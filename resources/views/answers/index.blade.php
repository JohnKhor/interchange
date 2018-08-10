@if ($question->answers->isNotEmpty())
    @foreach ($question->answers as $answer)
        <li class="list-group-item">
            <p>{{ $answer->body }}</p>
            <p>Answer by {{ $answer->user->username }}</p>
        </li>
    @endforeach
@endif 