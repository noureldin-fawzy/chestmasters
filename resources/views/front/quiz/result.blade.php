@extends('layouts.front')

@section('special-styles')

@endsection

@section('content')

<div class="inner-page">
        <div style="     text-align: center;
    background: #ffffff;
    padding:.5rem;
    box-shadow: 2px 4px 5px 0px #00000012;;">
            <img src="Content/en/images/logo-2.png" class="img-fluid brand-dsk">
        </div>
        <div class="container">
            <div class="quiz-page">
                <h2 class="inner-title">quiz name</h2>
                <div class="row quiz-section">
                    <div class="col-md-4">
                        <img src="Content/en/images/leader.svg" class="img-fluid login-img">
                    </div>
                    <div class="col-md-6">
                        <form>
                            <div class="question-item">What heart condition is Turner’s syndrome associated with?</div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="customRadio" name="example1" value="customEx">
                                <label class="custom-control-label" for="customRadio">Custom radio</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="customRadio2" name="example1" value="customEx">
                                <label class="custom-control-label" for="customRadio2">Custom radio</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
                                <label class="custom-control-label" for="customRadio3">Custom radio</label>
                            </div>
                            <div class="custom-control custom-radio right-answer">
                                <input type="radio" class="custom-control-input" id="customRadio4" name="example1" value="customEx">
                                <label class="custom-control-label" for="customRadio4">Custom radio</label>
                            </div>
                        </form>

                    </div>
                    <div class="col-md-1">
                        <img src="Content/en/images/correct.png" class="img-fluid state">
                        <span class="score"> score : 1</span>

                    </div>
                </div>
                <div class="row quiz-section">
                    <div class="col-md-4">
                        <img src="Content/en/images/leader.svg" class="img-fluid login-img">
                    </div>
                    <div class="col-md-6">
                        <form>
                            <div class="question-item">What heart condition is Turner’s syndrome associated with?</div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="customRadio" name="example1" value="customEx">
                                <label class="custom-control-label" for="customRadio">Custom radio</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="customRadio2" name="example1" value="customEx">
                                <label class="custom-control-label" for="customRadio2">Custom radio</label>
                            </div>
                            <div class="custom-control custom-radio  right-answer">
                                <input type="radio" class="custom-control-input" id="customRadio3" name="example1" value="customEx">
                                <label class="custom-control-label" for="customRadio3">Custom radio</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" class="custom-control-input" id="customRadio4" name="example1" value="customEx">
                                <label class="custom-control-label" for="customRadio4">Custom radio</label>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-1 ">
                        <img src="Content/en/images/wrong.png" class="img-fluid state">
                        <span class="score"> score : 0</span>
                    </div>
                </div>
                <div class="total-score">
                    <p> total score : 10 </p>
                </div>

            </div>


        </div>
    </div>

@endsection

@section('special-scripts')
@endsection
