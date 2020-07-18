@extends('layouts.front')

@section('content')

<!--------------------slider-------------------------->
<div class="page-content">
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>

                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('theme/assets/Content/en/images/slider.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption">
                            <h1>next quiz will be available soon</h1>
                            <ul class="date-count-down" id="date-count-down">
                                <li><span>25</span> days</li>
                                <li><span>25</span> hours</li>
                                <li><span>25</span> minutes</li>
                                <li><span>25</span> seconds</li>
                            </ul>
                            <form class="signup-now">
                                <button onclick="window.location.href='register.html'" type="button" class="btn btn-primary">sign up now</button>
                            </form>
                            <p>already have an accouant , <a href="login.html" class="btn-text">sign in</a></p>

                        </div>
                    </div>
                    <div class="carousel-item ">
                        <img src="{{ asset('theme/assets/Content/en/images/slider.jpg') }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption">
                            <h1>the quiz available now </h1>
                            <p class="mb-3">
                                There are many variations of passages of Lorem Ipsum available,
                                but the majority have suffered alteration in some form</a>
                            </p>

                            <form class="signup-now">
                                <button type="button" class="btn btn-primary ">sign up now</button>
                            </form>
                            <p>already have an accouant , <a href="" class="btn-text">sign in</a></p>

                        </div>
                    </div>

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
            <!-------------------- champion-container ------------------------>
            <div class="champion-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 ">
                            <h1 class="title">top score </h1>

                            <div class="winner-details">
                                <span class="numb">1</span>
                                <img src="{{ asset('theme/assets/Content/en/images/Medal.svg') }}">
                                <p>
                                    <span class="challeng-name"> salim ashraf</span> <span class="score">25</span>
                                    <span class="time-taken">06:50 min</span>
                                </p>
                            </div>
                            <div class="winner-details">
                                <span class="numb">2</span>
                                <img src="{{ asset('theme/assets/Content/en/images/Medal.svg') }}">
                                <p>
                                    <span class="challeng-name">aya moustafa</span> <span class="score">20</span>
                                    <span class="time-taken">08:50 min</span>
                                </p>
                            </div>
                            <div class="winner-details">
                                <span class="numb">3</span>
                                <img src="{{ asset('theme/assets/Content/en/images/Medal.svg') }}">
                                <p>
                                    <span class="challeng-name"> karim fahmy </span><span class="score">15</span>
                                    <span class="time-taken">10:50 min</span>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6 leaders-img"><img src="{{ asset('theme/assets/Content/en/images/leader-B.svg') }}" class="img-fluid"></div>

                    </div>
                </div>
            </div>
            <!-------------------- youtube frame------------------------>
            <iframe width="100%" height="350" src="https://www.youtube.com/embed/mFM32nuY-78" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <!-------------------- contact-form------------------------>
            <div class="contact-form">
                <div class="container">
                    <div class="row">

                        <div class="col-md-5 col-lg-6">
                            <h1 class="title">
                                DO YOU HAVE ANY QUESTIONS?
                            </h1>
                            <p class="form-text">

                                Feel Free To Contact Us !
                            </p>
                        </div>
                        <div class="col-md-7 col-lg-6">
                            <form role="form ">
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-6">
                                        <input type="text" class="form-control big-form" id="exampleInputEmail1" placeholder="Full Name">
                                    </div>
                                    <div class="form-group col-md-6 col-sm-6">
                                        <input type="email" class="form-control big-form" id="exampleInputPassword1" placeholder="E-Mail">
                                    </div>
                                    <div class="form-group col-lg-10  col-md-9 col-sm-10">
                                        <textarea class="form-control big-form" placeholder="Message" rows="4"></textarea>
                                    </div>
                                    <div class="col-lg-2 col-md-3 col-sm-2 pl-md-0">
                                        <button type="submit" class="btn btn-form btn-primary">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>

                </div>

            </div>
            <!-------------------- organizer-container------------------------>
            <div class="organizer-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class="organizer special">
                                <img src="{{ asset('theme/assets/Content/en/images/essb-logo.png') }}" class="img-fluid">
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <p>
                                powered by
                                <div class="organizer">
                                    <img src="{{ asset('theme/assets/Content/en/images/sanofi-new.png') }}" class="img-fluid">
                                </div>
                            </p>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <p>
                                organized by
                                <div class="organizer">
                                    <img src="{{ asset('theme/assets/Content/en/images/ELITE.png') }}" class="img-fluid">
                                </div>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
            <!--------------------end wrapper -------------------------->
        </div>
    </div>

@endsection

@section('special-scripts')
<script type="text/javascript" src="{{ asset('theme/assets/Scripts/countdown.js') }}"></script>
@endsection