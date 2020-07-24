<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Website Name</title>
    <style>
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%;
            -webkit-tap-highlight-color: transparent;
        }

        body {
            direction: ltr;
            text-transform: capitalize;
            font-size: 1.5rem;
            margin: 0;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            height: 100%;
            width: 100%;
            font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";

        }

        .inner-title {
            font-size: 2rem;
            text-align: center;
            margin-top: 0;
        }

        .inner-page {
            margin-bottom: 3rem;
        }

        table {
            text-align: left;
        }

        .login-img {
            margin-bottom: 1.5rem;
            max-width: 160px;
        }

        .quiz-section {
            margin-bottom: 10px;
        }

        .right-answer {
            border: .1rem solid #ffa41b;
            padding:10px;
            border-radius: 15px;
            background: #c4f1de;
        }

        .quiz-section table{
            border-bottom: 1px solid #cecece;
            margin-bottom:10px;
        }

        .custom-control.custom-radio {
            margin-bottom: 1.5rem;
            display:block;
            line-height:5px;
        }

        .question-item {
            font-weight: 600;
            margin-bottom: 15px;
            text-align:left;
        }
        .custom-radio{
            text-align:left;
            display:block;

        }
        .custom-control-input , .custom-control-label{
            margin-right:5px;
            line-height:10px;
        }


        .brand-dsk {
            max-width: 18rem;
            margin: 0 auto;
        }

        .score {
            text-align:center;
            display:block;
        }

        .quiz-page {
            background: white;
            margin-top: 2rem;
        }
        .custom-control-label{
            margin-top:5px;
        }
        .state {
            max-width: 3rem;
            max-height:3rem;
            margin: 0 auto;
            display: block;
        }

        .total-score {
            text-align: right;
            font-size: 1.5rem;
            font-weight: 600;
        }


        .logo-container {
            text-align: center;
            background: #ffffff;
            padding: .5rem;
            box-shadow: 2px 4px 5px 0px #00000012;
            height: 85px;
            border-bottom: .4rem solid #525ca3;
            margin-bottom:5px;

        }
        .state-container{
            max-width:60px;
            text-align:center;
        }

        tr {
            display: table-row;
            vertical-align: inherit;
            border-color: inherit;
        }

        tbody {
            display: table-row-group;
            vertical-align: middle;
            border-color: inherit;
        }
        td{
            padding:2.5px

        }
        input[type="radio" i] {
            background-color: initial;
            cursor: default;
            appearance: radio;
            box-sizing: border-box;
            margin: 3px 3px 0px 5px;
            padding: initial;
            border: initial;
        }
    </style>
</head>

<body>
    <div class="inner-page">
        <div class="logo-container">
            <img src="{{ asset('theme/assets/Content/en/images/logo-2.png') }}" class="img-fluid brand-dsk">
        </div>
            <div class="quiz-page">
                <h2 class="inner-title">{{ $quiz->title }}</h2>
                <div class="quiz-section">

                  @foreach($quiz->questions as $k => $question)

                  @php
                    $questionAnswer = $solution->questions->where('id', $question->id)->first();
                    $questionPoints = $questionAnswer->pivot->points;

                    $correctImage = asset('theme/assets/Content/en/images/correct.png');
                    $wrongImage = asset('theme/assets/Content/en/images/wrong.png');

                  @endphp

                    <table>
                        <tr>
                            <td style="width: 100px">
                              <img src="{{ Voyager::image($question->image) }}" class="login-img">
                            </td>
                            <td style="width: 440px">
                                <form class="question">
                                    <div class="question-item">{{ $question->question }} </div>

                                    @foreach($question->answers as $i => $answer)
                                    <div class="custom-control custom-radio @if($answer->points > 0) right-answer @endif">
                                        <input type="radio" class="custom-control-input" id="customRadio" name="example1" value="customEx">
                                        <label class="custom-control-label" for="customRadio">{{ $answer->answer }}</label>
                                    </div>
                                    @endforeach

                                </form>
                            </td>
                             <td class="state-container" style="width: 100px">
                               <img src="{{ $questionPoints > 0 ? $correctImage : $wrongImage }}" class="img-fluid state">
                              <span class="score"> score : {{ $questionPoints }}</span>
                            </td>
                        </tr>
                    </table>
                    @endforeach

                  <div class="total-score">
                      <p> total score : {{ $solution->score }} </p>
                  </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
