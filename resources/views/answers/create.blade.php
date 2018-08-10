@if (auth()->check())
    @if (!$question->isAnswered())
        <form method="POST" action="{{ route('answers.store') }}">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">
            <div class="form-group">
                <label for="answer-body">Your answer:</label>
                <textarea class="form-control" id="answer-body" name="body" rows="3" placeholder="Write your answer here"></textarea>
                @if ($errors->has('body'))
                    <small id="answer-body-help" class="form-text text-muted">{{ $errors->first('body')}}</small>
                @endif
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Write answer"></input>
            </div>
        </form>
    @endif 
@else
    <p>Please <a href="{{ route('login') }}">login</a> to answer.</p>
@endif