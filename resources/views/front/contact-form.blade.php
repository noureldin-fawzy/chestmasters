
<div class="contact-form">
    <div class="container">


      @if (\Session::has('success'))
      <div class="alert alert-success">
        <ul>
          <li>{!! \Session::get('success') !!}</li>
        </ul>
      </div>
      @endif

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
              <form method="POST" action="{{ route('front.send-contact-us') }}">
                  @csrf
                    <div class="row">

                        <div class="form-group col-md-6 col-sm-6">
                            <input type="text" class="form-control big-form @error('name') is-invalid @enderror" placeholder="Full Name" id="name" name="name" required autofocus />
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-sm-6">
                            <input type="email" class="form-control big-form @error('email') is-invalid @enderror" placeholder="E-Mail" id="email" name="email" required />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                      </div>

                        <div class="form-group col-lg-10  col-md-9 col-sm-10">
                            <textarea class="form-control big-form @error('message') is-invalid @enderror" placeholder="Message" rows="4" id="message" name="message" required ></textarea>
                              @error('message')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
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
