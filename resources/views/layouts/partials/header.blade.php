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
                            <div class="dropdown sign-in">

                                <a href="" class=" dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="las la-user"></i> user name
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <div class="arrow-up"></div>

                                    <button class="dropdown-item" type="button">profile</button>
                                    <button class="dropdown-item" type="button">sign out</button>
                                </div>
                            </div>
                            <ul class="top-list right" style="display: none;">
                                <li><a href="#"> log in</a></li>|
                                <li><a href="#"> sign up </a></li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
            <div class="sub-header" id="sub-header">
                <div class="container">
                    <nav class="navbar navbar-expand-lg navbar-light ">
                        <a class="navbar-brand" href="#">
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
                                    <a class="nav-link" href="quiz.html">quiz</a>
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