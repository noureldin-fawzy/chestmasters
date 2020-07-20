@extends('layouts.front')

@section('special-styles')
@endsection

@section('content')
<div class="page-content inner">
    <div class="container">
        <div class="inner-page">
            <div class="leaderboard">
                <div class="filter-section">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                                <label for="inputState" class="leader-filter">filter leaderboard by</label>
                            </div>

                            <div class="form-group col-md-2 col-lg-2 col-sm-4">
                                <select id="years" class="form-control" onchange="fillMonths()">

                                </select>
                            </div>

                            <div class="form-group col-md-2 col-lg-2 col-sm-4">
                                <select id="months" class="form-control" onchange="fillDays()">
                                </select>
                            </div>

                            <div class="form-group col-md-2 col-lg-2 col-sm-4">
                              <select id="days" class="form-control">

                              </select>
                            </div>
                            <div class="form-group col-md-2 col-lg-2 col-sm-12">
                                <button type="submit" class="btn  btn-primary w-100">filter</button>
                            </div>


                        </div>
                    </form>
                </div>
                <div class="champion-container">
                    <div class="row">
                        <div class="col-md-6 order-md-2 leaders-img"><img src="{{ asset('theme/assets/Content/en/images/leader-B.svg') }}" class="img-fluid"></div>
                        <div class="col-md-6 order-md-1">
                            <h1 class="title">top score </h1>

                            <div class="winner-details">
                                <span class="numb">1</span>
                                <img src="{{ asset('theme/assets/Content/en/images/Medal.svg') }}">
                                <p>
                                    <span class="challeng-name"> salim ashraf </span><span class="score">25</span>
                                    <span class="time-taken">06:50 min</span>
                                </p>
                            </div>
                            <div class="winner-details">
                                <span class="numb">2</span>
                                <img src="{{ asset('theme/assets/Content/en/images/Medal.svg') }}">
                                <p>
                                    <span class="challeng-name"> aya moustafa </span><span class="score">20</span>
                                    <span class="time-taken">08:50 min</span>
                                </p>
                            </div>
                            <div class="winner-details">
                                <span class="numb">3</span>
                                <img src="{{ asset('theme/assets/Content/en/images/Medal.svg') }}">
                                <p>
                                    <span class="challeng-name">karim fahmy</span> <span class="score">15</span>
                                    <span class="time-taken">10:50 min</span>
                                </p>
                            </div>
                            <div class="winner-details">
                                <span class="numb">4</span>
                                <img src="{{ asset('theme/assets/Content/en/images/Medal.svg') }}">
                                <p>
                                    <span class="challeng-name">salim ashraf</span> <span class="score">25</span>
                                    <span class="time-taken">06:50 min</span>
                                </p>
                            </div>
                            <div class="winner-details">
                                <span class="numb">5</span>
                                <img src="{{ asset('theme/assets/Content/en/images/Medal.svg') }}">
                                <p>
                                    <span class="challeng-name">aya moustafa </span><span class="score">20</span>
                                    <span class="time-taken">08:50 min</span>
                                </p>

                            </div>
                            <div class="winner-details">
                                <span class="numb">6</span>
                                <img src="{{ asset('theme/assets/Content/en/images/Medal.svg') }}">
                                <p>
                                   <span class="challeng-name"> karim fahmy </span><span class="score">15</span>
                                    <span class="time-taken">10:50 min</span>
                                </p>

                            </div>
                        </div>


                    </div>
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <span class="page-link">Previous</span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active">
                                <span class="page-link">
                                    2
                                    <span class="sr-only">(current)</span>
                                </span>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('special-scripts')
<script type="text/javascript" src="{{ asset('theme/assets/Scripts/waitMe.min.js') }}"></script>

<script>

 var dates = @json($data);
$('document').ready(function(){
  fillYears();
});

function fillYears(){
  $.each(dates, function(year, months){
    $("#years").append($("<option />").val(year).text(year));
  });
  fillMonths();
}

function fillMonths(){
  var year = $("#years").val();
  var months = dates[year];

  $('#months').empty();
  $.each(months, function(month, days){
    $("#months").append($("<option />").val(month).text(month));
  });

  fillDays();
}

function fillDays(){
  var year = $("#years").val();
  var month = $("#months").val();

  var days = dates[year][month];

  $('#days').empty();
  $.each(days, function(index, day){
    $("#days").append($("<option />").val(day).text(day));
  });
}

function getMonths(){
  showWaitMe();
  var year = $('#years').val();
  $.ajax({
    url : "{{ route("front.ajax.filter.months") }}",
    type: "GET",
    data: {'year': year},
    success: function(data, status, jqXHR)
    {
      if(data.success){
        console.log(data.data);
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

function showWaitMe(){
  console.log('showWaitMe');
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
  console.log('hideWaitMe');
    $('body').waitMe("hide");
}
</script>
@endsection
