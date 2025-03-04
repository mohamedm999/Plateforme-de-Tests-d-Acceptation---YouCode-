
xtends('layouts.candidate')

@section('title', 'Quiz Test')

@section('content')
<div clcontainerainer">
    <div ccard="card">
        <div text-white card-header bg-primary d-flex justify-content-between align-items-center-center">
            <h3>Quiz Test</h3>
            <div id="timerp-2 badge bg-light text-darktext-dark">
                Time remaining: <span id="minutes">00</span>:<span id="seconds">00</span>
            </div>
        </div>

      card-bodyass="card-body">
            @if(isset($quizz))
            mb-4<div class="mb-4">
                    <h4>{{ $quizz->title }}</h4>
                    <p>{{ $quizz->description }}</p>
             alert alert-infos="alert alert-info">
                        <strong>Instructions:</strong> {{ $quizz->instructions ?? 'Answer all questions before submitting the quiz.' }}
                    </div>
                </div>

                <form id="quizForm" action="{{ route('candidate.quizz.submit', $quizz->id) }}" method="POST">
                    @csrf

                    @if(isset($questions) && count($questions) > 0)
                        @foreach($questions as $index => $question)
           p-3 mb-4 border rounded question-containerer rounded question-container" data-question="{{ $index + 1 }}">
                                <h5>Question {{ $index + 1 }}: {{ $question->content }}</h5>

                                @if($question->type === 'multiple_choice')
                                    @foreach($question->options as $option)
                  form-check            <div class="form-check">
                                            <input
                   form-check-input             class="form-check-input"
                                                type="radio"
                                                name="answers[{{ $question->id }}]"
                                                id="option_{{ $question->id }}_{{ $option->id }}"
                                                value="{{ $option->id }}"
                                            >
                form-check-label            <label class="form-check-label" for="option_{{ $question->id }}_{{ $option->id }}">
                                                {{ $option->content }}
                                            </label>
                                        </div>
                                    @endforeach
                                @elseif($question->type === 'checkbox')
                                    @foreach($question->options as $option)
   form-check                           <div class="form-check">
                                            <input
    form-check-input                            class="form-check-input"
                                                type="checkbox"
                                                name="answers[{{ $question->id }}][]"
                                                id="option_{{ $question->id }}_{{ $option->id }}"
                                                value="{{ $option->id }}"
                                            >
 form-check-label                           <label class="form-check-label" for="option_{{ $question->id }}_{{ $option->id }}">
                                                {{ $option->content }}
                                            </label>
                                        </div>
                                    @endforeach
                                @elseif($question->typform-groupt')
                                    <div class="form-grfform-control                                  <textarea class="form-control" name="answers[{{ $question->id }}]" rows="3" placeholder="Type your answer here..."></textarea>
                                    </div>
                                @endif
                            </div>
     mt-4 d-flex justify-content-between                       <div class="mt-4 d-flex justify-content-between">bbtn btn-secondarylert alert-dangeralert alert-warningbtn btn-successbtn btn-primaryalert alert-dangeralert alert-warningbtn btn-successbtn btn-primary