@extends('layouts.front')

@section('special-styles')
@endsection

@section('content')
<div class="page-content inner">
    <div class="inner-page px-0">
        <div class="container">

            <div class="Contact-us">
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-inner">

                          @if(setting('contacts.address') != '')
                            <div class="internal-title">
                                Address:
                            </div>
                            <div class="text-contact">
                                {{ setting('contacts.address') }}
                            </div>
                          @endif

                          @if(setting('contacts.email') != '')
                            <div class="internal-title">
                                E-mails:
                            </div>
                            <div class="text-contact">
                                {{ setting('contacts.email') }}
                            </div>
                          @endif

                            @if(setting('contacts.office') != '' && setting('contacts.mobile') != '')
                            <div class="internal-title">
                                Phone:
                            </div>
                            <div class="text-contact">
                                @if(setting('contacts.mobile') != '')
                                  Mobile: {{ setting('contacts.mobile') }}
                                @endif
                                  <br>
                                  @if(setting('contacts.office') != '')
                                    Office: {{ setting('contacts.office') }}
                                  @endif
                            </div>
                            @endif
                        </div>
                    </div>

                    @if(setting('contacts.map') != '')
                    <div class="col-md-6">
                      {!! setting('contacts.map') !!}
                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110502.60389552709!2d31.32850511449987!3d30.059618470287788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14583fa60b21beeb%3A0x79dfb296e8423bba!2z2KfZhNmC2KfZh9ix2KnYjCDZhdit2KfZgdi42Kkg2KfZhNmC2KfZh9ix2KnigKw!5e0!3m2!1sar!2seg!4v1594641786847!5m2!1sar!2seg"
                                width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> -->
                    </div>
                    @endif
                </div>


            </div>
        </div>
    </div>
</div>

@include('front.contact-form')

@include('front.organizer-container')

@endsection

@section('special-scripts')
@endsection
