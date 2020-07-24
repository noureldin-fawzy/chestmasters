@extends('layouts.front')

@section('special-styles')
  @if($quizType == "current")
    <link href="{{ asset('theme/assets/Content/waitMe.min.css') }}" rel="stylesheet" type="text/css">
  @endif
@endsection

@section('content')
<div class="page-content inner">
    <div class="container">
        <div class="inner-page">
            <div class="quiz-page" id="htmlContent">

                @if($quizType == "current")
                  <h5 class="modal-title" id="exampleModalLabel">Welcome to chestMasters !</h5>
                  <div class="icon-container-lg">
                      <div class="ques-c">
                          <img src="{{ asset('theme/assets/Content/en/images/questionnaire-fill.svg') }}" class="img-fluid">
                          <span>{{ $quiz->questionsCount }} Questions </span>
                      </div>
                      <div class="time-c">
                          <img src="{{ asset('theme/assets/Content/en/images/timer-fill.svg') }}" class="img-fluid">
                          <span>{{ $quiz->questionsTime }} minutes </span>
                      </div>
                  </div>
                   you have<span class="text-o" > {{ $quiz->questionsCount }} MCQ</span> questions to solve in <span class="text-o" >3 minutes </span> for each question.
                   This quiz valid for 1 entry only and once you start you have to answer as much questions as you can by
                   submitting your answers to collect your points.
                   <br><br>
                  <span class="text-o">* You cannot revert back to any question that has already been solves/timed out.</span>

                  <hr />

                  <div class="col-md-12">
                    <button type="button" class="btn btn-secondary mr-auto" onclick="goHome()">Cancel</button>
                    <button type="button" class="btn btn-primary pull-right" id="startQuiz" onclick="startQuiz()">Start</button>
                  </div>

                  <script>

                  </script>

                @elseif($quizType == "next")

                  <div class="icon-container">
                    <img src="{{ asset('theme/assets/Content/en/images/t-out.png') }}" class="img-fluid">
                  </div>

                  <h5 class="modal-title">
                    Next quiz will be available on <span class="text-o">{{  \Carbon\Carbon::parse($quiz->start_at)->format('l jS F, h:i:s A') }}</span>
                  </h5>

                  @elseif($quizType == "noAvailable")
                <div class="icon-container">
                  <img src="{{ asset('theme/assets/Content/en/images/t-out.png') }}" class="img-fluid">
                </div>
                <h5 class="modal-title">Sorry, no quiz available now</h5>

                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('special-scripts')
  @if($quizType == "current")
    <script type="text/javascript" src="{{ asset('theme/assets/Scripts/waitMe.min.js') }}"></script>

    <script>
          var solution_id = 0;
          function startQuiz(){
            showWaitMe();
            $.ajax({
              url : "{{ route("front.ajax.solution.create", $quiz->id) }}",
              type: "POST",
              success: function(data, status, jqXHR)
              {
                if(data.success){
                  solution_id = data.data;
                  nextQuestion();
                }else {
                  alert(data.msg);
                }
                hideWaitMe();
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert("Something went wrong, please try again later.");
                  hideWaitMe();
              }
            });
          }

          function nextQuestion(){
            showWaitMe();
            $.ajax({
              url : "{{ route("front.ajax.question.next") }}",
              type: "POST",
              data : {'solution_id' : solution_id},
              success: function(data, status, jqXHR)
              {
                //data - response from server
                if(data){
                  hideWaitMe();
                  $('#htmlContent').html(data);
                  startTimer();
                }
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert("Something went wrong, please try again later.");
              }
            });

          }

          function submitQuestion(){
            var formData = $("#questionForm").serializeArray();
            formData.push({'name':'solution_id', 'value':solution_id});

            showWaitMe();
            $.ajax({
              url : "{{ route("front.ajax.question.submit") }}",
              type: "POST",
              data : formData,
              success: function(data, status, jqXHR)
              {
                //data - response from server
                if(data){
                  hideWaitMe();
                  nextQuestion();
                }
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert("Something went wrong, please try again later.");
              }
            });
          }

          function submitQuiz(){
            showWaitMe();
            $.ajax({
              url : "{{ route("front.ajax.solution.submit") }}",
              type: "POST",
              data : {'solution_id':solution_id},
              success: function(data, status, jqXHR)
              {
                //data - response from server
                console.log();
                if(data.success){
                  hideWaitMe();
                  goHome();
                }else{
                  console.log(data.msg);
                }
              },
              error: function (jqXHR, textStatus, errorThrown)
              {
                  alert("Something went wrong, please try again later.");
              }
            });
          }

          function showWaitMe(){
            $('body').waitMe({
                effect: 'bounce',
                text: 'Please wait',
                bg: 'rgba(255,255,255,0.7)',
                color: '#000',
                waitTime: -1,
                textPos: 'vertical',
                onClose: function() {}
              });
          }

          function hideWaitMe(){
              $('body').waitMe("hide");
          }

          function goHome(){
            window.location.href = "{{ route('front.home') }}";
          }

        function startTimer() {
            var time = $('#time').attr('time');
            time = time ? time : 3;

            var duration = 60 * time,
            display = $('#time');

            var timer = duration, minutes, seconds;
            var refreshId = setInterval(function () {
                minutes = parseInt(timer / 60, 10);
                seconds = parseInt(timer % 60, 10);

                minutes = minutes < 10 ? "0" + minutes : minutes;
                seconds = seconds < 10 ? "0" + seconds : seconds;

                display.text(minutes + ":" + seconds);

                if (--timer < 0) {
                  // submitQuestion();
                  $('#submit-data').click();
                  clearInterval(refreshId);
                }
            }, 1000);
        }

      $("document").ready(function(){});

    </script>
  @endif

@endsection
