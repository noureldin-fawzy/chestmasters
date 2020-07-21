@extends('layouts.front')

@section('special-styles')
@endsection

@section('content')
<div class="page-content inner">
    <div class="container">
        <div class="inner-page">
            <div class="leaderboard">
                <div class="filter-section">
                    <form id="search">
                        <div class="form-row">
                            <div class="form-group col-lg-3 col-md-4 col-sm-12">
                                <label for="inputState" class="leader-filter">filter leaderboard by</label>
                            </div>

                            <div class="form-group col-md-2 col-lg-2 col-sm-4">
                                <select id="years" name="year" class="form-control" onchange="fillMonths()"></select>
                            </div>

                            <div class="form-group col-md-2 col-lg-2 col-sm-4">
                                <select id="months" name="month" class="form-control" onchange="fillDays()"></select>
                            </div>

                            <div class="form-group col-md-2 col-lg-2 col-sm-4">
                              <select id="days" name="day" class="form-control"></select>
                            </div>
                            <div class="form-group col-md-2 col-lg-2 col-sm-12">
                                <button type="submit" class="btn btn-primary w-100" onclick="doFilter(); return false;">filter</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="champion-container" class="champion-container"></div>
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

  doFilter();
}

function doFilter(){
  $.ajax({
    url : "{{ route("front.ajax.leaderboard.filter") }}",
    type: "POST",
    data: $('#search').serialize(),
    success: function(data, status, jqXHR)
    {
      if(data){
        $('#champion-container').html(data);
      }
    },
    error: function (jqXHR, textStatus, errorThrown)
    {
        alert("Something went wrong, please try again later.");
    }
  });
}


$('#pagination a').on('click', function(e){
    e.preventDefault();
    var url = $(this).attr('href');
    $.post(url, $('#search').serialize(), function(data){
        $('#champion-container').html(data);
    });
});


function showWaitMe(){
  $('body').waitMe({
      effect: 'bounce',
      text: 'Please wait',
      bg: 'rgba(255,255,255,0.7)',
      color: '#000',
      waitTime: 10,
      textPos: 'vertical',
      onClose: function() {}
    });
}

function hideWaitMe(){
    $('body').waitMe("hide");
}

</script>
@endsection
