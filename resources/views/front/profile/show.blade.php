@extends('layouts.front')

@section('special-styles')
@endsection

@section('content')

<div class="page-content inner">
    <div class="container">
        <div class="profile">
            <div class="row">
                <div class="col-md-5 col-lg-4">
                    <div class="inner-page">
                        <div class="user-details">
                            <a href="{{ route('front.user.profile.edit') }}" class="edit-btn"><i class="las la-edit"></i></a>
                        </div>
                        <div class="user-icon">
                            <img src="{{ asset('theme/assets/Content/en/images/user.png') }}" class="img-fluid">
                        </div>
                        <div class="user-info">
                            <p class="user-name"> {{ $user->name . ' ' .$user->last_name }} </p>
                            <p>{{ $user->country }}</p>
                            <p>{{ $user->email }}</p>
                            <p>{{ $user->phone_number }}</p>
                            <p>{{ $user->specialty }}</p>
                            <p>{{ $user->education_degree }} " {{ $user->graduation_year }}"</p>
                            <p>Society Membership ID : {{ $user->society_membership }}</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                    <div class="inner-page">
                      @foreach($solutions as $k => $solution)
                        <a href="{{ route('front.solution.show', $solution->id) }}" class="winner-details">
                            <span class="numb">{{ $k+1 }}</span>
                            <img src="{{ asset('theme/assets/Content/en/images/Medal.svg') }}">
                            <p>
                                {{ $solution->quiz->title }} <span class="score">{{ $solution->score }}</span>
                            
                                @php $time = new \Carbon\Carbon($solution->finish_at); @endphp
                                <span class="time-taken">{{ $time->format('h:i A') }}</span>
                            </p>
                        </a>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

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

@endsection

@section('special-scripts')

@endsection
