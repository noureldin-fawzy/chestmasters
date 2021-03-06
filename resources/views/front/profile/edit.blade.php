@extends('layouts.front')

@section('content')
<div class="page-content inner">
    <div class="container">
        <div class="inner-page">
            <div class="register">

                <h2 class="inner-title">Edit profile!</h2>

                <form method="POST" action="{{ route('front.user.profile.update') }}">
                    @csrf
                    {{ method_field('PUT') }}

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name">First Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') == null ? $user->name : old('name') }}" required autocomplete="name" autofocus placeholder="First Name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="lastName">Last Name</label>
                            <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') == null ? $user->last_name : old('lastName') }}" required autocomplete="lastName" autofocus placeholder="Last Name">
                              @error('lastName')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                        </div>
                    </div>
                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') == null ? $user->email : old('email') }}" required autocomplete="email" placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phoneNumber">Phone Number</label>
                            <input id="phoneNumber" type="number" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('phoneNumber') == null ? $user->phone_number : old('phoneNumber') }}" required autocomplete="phoneNumber" placeholder="Phone Number">
                            @error('phoneNumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="password">New Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <small id="passwordHelpBlock" class="form-text text-muted d-none">
                                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                            </small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="country">Country</label>
                            <select id="country" class="form-control" name="country">
                                <option value="Egypt" selected>Egypt</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="specialty">Specialty</label>
                            <select class="form-control" id="specialty" name="specialty">
                              @foreach(\App\Models\Specialty::active()->get() as $specialty)
                                <option value="{{ $specialty->title }}" {{ $user->specialty == $specialty->title ? 'selected' : '' }} >
                                  {{ $specialty->title }}
                                </option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="graduationYear">Graduation Year</label>
                            <select id="graduationYear" class="form-control" name="graduationYear">
                              @for($i = date('Y'); $i >= 1900; $i--)
                                <option value="{{ $i }}" {{ $user->graduation_year == $i ? 'selected' : '' }} >
                                  {{ $i }}
                                </option>
                              @endfor
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="educationDegree">Education Degree</label>
                            <select id="educationDegree" class="form-control" name="educationDegree">
                              @foreach(\App\Models\EducationDegree::active()->get() as $educationDegree)
                                <option value="{{ $educationDegree->title }}" {{ $user->education_degree == $educationDegree->title ? 'selected' : '' }} >
                                  {{ $educationDegree->title }}
                                </option>
                              @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="societyMembershipId">Society Membership ID</label>
                            <input type="number" class="form-control @error('societyMembershipId') is-invalid @enderror" id="societyMembershipId" placeholder="Society Membership ID" name="societyMembershipId" value="{{ old('societyMembershipId') == null ? $user->society_membership  : old('societyMembershipId') }}">
                            <div>
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="col-lg-3 col-md-4">
                            <button type="submit" class="btn btn-primary w-100">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
