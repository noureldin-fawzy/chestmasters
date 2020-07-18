@section('content')

<!-- <link rel="stylesheet" href="{{ asset('theme/assets/Content/en/css/lightbox.min.css') }}">
<script src="{{ asset('theme/assets/Scripts/lightbox-plus-jquery.min.js') }}"></script> -->
@if($isExist)

<h2 class="inner-title">{{ $quiz->title }}</h2>
<div class="row quiz-info">
    <div class="col-md-8 offset-md-2">
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width: {{ (($solved+1)/$activeQuestionsCount)*100 }}%;" aria-valuenow="1" aria-valuemin="0" aria-valuemax="{{ $activeQuestionsCount }}">
                 {{ $solved+1 }} / {{ $activeQuestionsCount }} questions
            </div>
        </div>
    </div>
    <div class="col-md-2">
      <div id="time" time="{{ $question->time }}" class="time-down">{{ $question->time }}</div>
    </div>
</div>
<div class="row quiz-section">
    @if($question->image != null && $question->image != "")
      <div class="col-md-4">
          <a href="{{ Voyager::image($question->image) }}"  data-lightbox="example-1">
              <img class="img-fluid quiz-img" src="{{ Voyager::image($question->image) }}" />
          </a>
      </div>
    @endif
    <div class="col-md-8">
        <form id="questionForm">
            <div class="question-item">{!! $question->question !!}</div>
            <input type="hidden" name="question_id" value="{{ $question->id }}" />
            @foreach($answers as $k => $answer )
            <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="answer{{ $answer->id }}" name="answer_id" value="{{ $answer->id }}" {{ $k ==0 ? 'checked' : '' }}>
                <label class="custom-control-label" for="answer{{ $answer->id }}">{!! $answer->answer !!}</label>
            </div>
            @endforeach
            <button id="submit-data" class="question-next btn btn-primary col-md-3" type="button" onclick="submitQuestion()" > Next </button >
        </form>
    </div>
</div>
@else

<h5 class="modal-title" id="exampleModalLabel">Quiz Completed Successfully</h5>
<div class="icon-container">
    <img src="{{ asset('theme/assets/Content/en/images/completed.svg') }}" class="img-fluid">
</div>
Please press submit to collect the points. the model answer will be available on
<span class="text-o">{{  \Carbon\Carbon::parse($quiz->available_until)->format('l jS F, h:i:s A') }}</span>
. You can check the model answer from your
<a href="profile.html" class="btn-text"> profile</a> .
 Keep answering the upcoming quizzes to earn more points.

<hr />
<div class="col-md-12">
   <button id="submit-data" type="button" class="btn btn-primary pull-right" onclick="submitQuiz()" >
     Submit (<span id="time"  time="1">01:00</span>)
   </button>
</div>

@endif

@endsection
