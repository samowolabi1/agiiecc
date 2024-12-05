@extends('layouts.master')

@section('content')

    <section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <!-- <a class="logo" href="index.html">
            <img src="{{asset('img/agiilogo2.png')}}">
          </a> -->
          <h2 class="text-center">Welcome Back</h2>

           <form class="user" method="POST" action="{{ route('register') }}">
                        @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input id="name" type="text" class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Full Name">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input id="name" type="text" class="form-control form-control-user @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" placeholder="Phone Number" required autocomplete="phone_number" autofocus>

                    @error('phone_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email Address">
                   @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
                      @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                      @enderror
                  </div>
                  <div class="col-sm-6">
                    <input id="password-confirm" type="password" class="form-control form-control-user" name="password_confirmation" required autocomplete="new-password"  placeholder="Repeat Password">
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Register Account
                </button>
                <hr>
                 <a href="{{ url('auth/google') }}" class="btn btn-google btn-user btn-block">
                      <i class="fa fa-google"></i> Login with Google
                    </a>
                 <a href="{{ url('auth/facebook') }}" class="btn btn-facebook btn-user btn-block">
                      <i class="fa fa-facebook-f"></i> Login with Facebook
                    </a>
              </form>
              <hr>
              <div class="text-center">
                <span class="small" href="#">By signing up you agree to our  <a href="{{route('terms')}}">terms and conditions</a></span>
              </div>


           <hr>
                 
          <p class="mt-20">Already have an account ?<a href="{{ route('login') }}"> Login Here</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection