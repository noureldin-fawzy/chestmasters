<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Website Name</title>
    <!-------------------- Main Styles CSS ----------------------->
    <link href="{{ asset('theme/assets/Content/en/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link href="{{ asset('theme/assets/Content/en/fonts/fonts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('theme/assets/Content/en/css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
    <!-------------------- Custom CSS ----------------------->
    <link href="{{ asset('theme/assets/Content/en/css/style.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <div id="wrap">
        <header>
            <div class="top-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="top-list">
                                <li><a href="#"><i class="lar la-envelope"></i> support@chest-masters.com</a></li>|
                                <li><a href="#"><i class="las la-phone"></i> 01234567891</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                          @if(Auth::check())
                            <div class="dropdown sign-in">
                                <a href="" class="dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="las la-user"></i> {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <div class="arrow-up"></div>

                                    <button class="dropdown-item" type="button">profile</button>
                                    <button class="dropdown-item" type="button" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                                      Sign out
                                    </button>

                                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                            @else
                            <ul class="top-list right">
                                <li><a href="{{ route('login') }}"> Log in</a></li>|
                                <li><a href="{{ route('register') }}"> Sign up </a></li>
                            </ul>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
            <div class="sub-header" id="sub-header">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light ">
                        <a class="navbar-brand" href="{{ route('front.home') }}">
                            <img src="{{ asset('theme/assets/Content/en/images/logo-2.png') }}" class="img-fluid brand-dsk">
                        </a>

                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.html">about us</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('front.quiz') }}">quiz</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="leaderboard.html">leaderboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact.html">contact us</a>
                                </li>
                                <li class="nav-item d-lg-none">
                                    <a class="nav-link" href="profile.html">profile</a>
                                </li>
                                <li class="nav-item d-lg-none">
                                    <a class="nav-link" href="#">sign out</a>
                                </li>

                            </ul>

                        </div>
                    </nav>
                </div>
                </a>
            </div>
        </header>

        @yield('content')

    </div>
    <!-------------------- Footer -------------------------->
    <footer id="footer">
        <div class="row">
            <div class="col-sm-6 order-sm-2">
                <p class="right">
                    Get In Touch
                    <a href="" class="face-btn"><i class="lab la-facebook-f"></i></a>
                </p>
            </div>
            <div class="col-sm-6 order-sm-1">
                <p>© 2020 chest masters.</p>
            </div>
        </div>
    </footer>

    <!-------------------- Javascript files ----------------------->
    <script type="text/javascript" src="{{ asset('theme/assets/Scripts/jquery-3.5.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('theme/assets/Scripts/bootstrap.min.js') }}"></script>

    @yield('special-scripts')

    <script type="text/javascript" src="{{ asset('theme/assets/Scripts/scripts.js') }}"></script>
    <!--------------------end body ----------------------->

</body>
</html>
