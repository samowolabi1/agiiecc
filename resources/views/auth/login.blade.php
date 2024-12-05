
@extends('layouts.master')

@section('content')

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <section class="signin-page account">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="block text-center">
          <!-- <a class="logo" href="index.html">
            <img src="{{asset('img/agiilogo2.png')}}">
          </a> -->
          <h2 class="text-center">Welcome Back</h2>
          <form class="text-left clearfix" method="POST" action="{{ route('login') }}">
        @csrf

            <div class="form-group">
                      <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus aria-describedby="emailHelp" placeholder="Enter Email Address...">
                      @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                      <input id="password" type="password" class="form-control form-control-user @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                     <div style="padding-left: 5px;" class="form-group">
                          <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                          <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                       </div>
                       <hr>
                    <a href="{{ url('auth/google') }}" class="btn btn-google btn-user btn-block">
                      <i class="fa fa-google"></i> Login with Google
                    </a>
                    <a href="{{ url('auth/facebook') }}" class="btn btn-facebook btn-user btn-block">
                      <i class="fa fa-facebook-f"></i> Login with Facebook
                    </a>
            <div class="text-center">
              <button value="Login" class="btn btn-main text-center" >Login</button>
            </div>
          </form>

           <hr>
                  @if (Route::has('password.request'))
                  <div class="text-center">
                    <a class="small" href="{{url('/password/reset')}}">Forgot Password?</a>
                  </div>
                  @endif
          <p class="mt-20">New in this site ?<a href="{{ route('register') }}"> Create New Account</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection