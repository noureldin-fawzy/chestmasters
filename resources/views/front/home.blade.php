@extends('layouts.front')

@section('content')
<div class="page-content">

  @if(count($sliders) > 0)
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">

      <ol class="carousel-indicators">
        @foreach($sliders as $k => $s)
          <li data-target="#carouselExampleCaptions" data-slide-to="{{ $k }}" @if($k == 0) class="active" @endif ></li>
        @endforeach
      </ol>
      <div class="carousel-inner">

        @foreach($sliders as $i => $slider)
          <div class="carousel-item @if($i == 0) active @endif">
              <img src="{{ Voyager::image($slider->image) }}" class="d-block w-100" alt="{{ $slider->name }}">

              @if($i == 0)
                @if($quizType == "next")
                  <div class="carousel-caption">
                      <h1>next quiz will be available soon</h1>
                      <ul class="date-count-down" id="date-count-down" data-date="{{ $quiz->start_at }}">
                          <li><span></span> days</li>
                          <li><span></span> hours</li>
                          <li><span></span> minutes</li>
                          <li><span></span> seconds</li>
                      </ul>

                      @if(!Auth::check())
                        <form class="signup-now">
                            <button onclick="window.location.href='{{ route('register') }}'" type="button" class="btn btn-primary">sign up now</button>
                        </form>
                        <p>already have an accouant , <a href="{{ route('login') }}" class="btn-text">sign in</a></p>
                      @endif
                  </div>
                @elseif($quizType == "current")
                <div class="carousel-caption">
                  <h1>The Quiz result Is Available Now</h1>
                  <p class="mb-3">
                      You Can Check your points from Your Profile !
                  </p>
                    @if(!Auth::check())
                      <form class="signup-now">
                          <button onclick="window.location.href='{{ route('register') }}'" type="button" class="btn btn-primary">sign up now</button>
                      </form>
                      <p>already have an accouant , <a href="{{ route('login') }}" class="btn-text">sign in</a></p>
                    @endif
                </div>

                @elseif($quizType == "noAvailable")
                <div class="carousel-caption">
                    <h1>welcome to chest masters</h1>
                    @if(!Auth::check())
                      <form class="signup-now">
                          <button onclick="window.location.href='{{ route('register') }}'" type="button" class="btn btn-primary">sign up now</button>
                      </form>
                      <p>already have an accouant , <a href="{{ route('login') }}" class="btn-text">sign in</a></p>
                    @endif
                </div>
                @endif
              @endif
          </div>
          @endforeach

          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
          </a>
      </div>
  </div>
  @endif

@if(count($latestQuizSolutions) > 0)
  <div class="champion-container">
      <div class="container">
          <div class="row">
              <div class="col-md-6 ">
                  <h1 class="title">top score </h1>

                  @foreach($latestQuizSolutions as $k => $solution)
                  <div class="winner-details">
                      <span class="numb">{{ $k+1 }}</span>
                      <img src="{{ asset('theme/assets/Content/en/images/Medal.svg') }}">
                      <p>
                          <span class="challeng-name"> {{ $solution->user->name . ' ' . $solution->user->last_name }} </span>
                          <span class="score">{{ $solution->score }}</span>
                          @php $time = new \Carbon\Carbon($solution->finish_at); @endphp
                          <span class="time-taken">{{ $time->format('h:i A') }}</span>
                      </p>
                  </div>
                  @endforeach
              </div>

              <div class="col-md-6 leaders-img"><img src="{{ asset('theme/assets/Content/en/images/leader-B.svg') }}" class="img-fluid"></div>
          </div>
      </div>
  </div>
  @endif

  @if(setting('site.yt_video') != '')
    <iframe width="100%" height="350" src="{{ str_replace('watch?v=', 'embed/',setting('site.yt_video')) }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
  @endif

  @include('front.contact-form')

  @include('front.organizer-container')

  <!--------------------end wrapper -------------------------->
</div>

@endsection

@section('special-scripts')
<script type="text/javascript" src="{{ asset('theme/assets/Scripts/countdown.js') }}"></script>
@endsection
