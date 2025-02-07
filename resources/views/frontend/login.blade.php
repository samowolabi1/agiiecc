@extends('layouts.frontend')

@section('headerSection')
    <div class="header-bottom sticky-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col col-lg-6 col-xl-6 col-xxl-8 header-center">
                    @include('layouts.marketplaceNavbar')
                </div><!-- End .col-xl-9 col-xxl-10 -->

                <div class="col col-lg-3 col-xl-3 col-xxl-2 header-right">

                </div>
            </div><!-- End .row -->
        </div><!-- End .container-fluid -->
    </div>
@endsection

@section('mainSection')
<section class="signin-page account">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-md-6 col-md-offset-3">
          <div class="block text-center">
            <h2 class="text-center">Welcome Back</h2>
            <form class="text-left clearfix" method="POST" action="#">
              <div class="form-group">
                <input
                  id="email"
                  type="email"
                  class="form-control form-control-user"
                  name="email"
                  required
                  placeholder="Enter Email Address..."
                />
              </div>
              <div class="form-group">
                <input
                  id="password"
                  type="password"
                  class="form-control form-control-user"
                  name="password"
                  required
                  placeholder="Password"
                />
              </div>
              <div style="padding-left: 5px;" class="form-group">
                <input
                  class="form-check-input"
                  type="checkbox"
                  name="remember"
                  id="remember"
                />
                <label class="form-check-label" for="remember">Remember Me</label>
              </div>
              <hr />
              <a href="#" class="btn btn-google btn-user btn-block">
                <i class="fa fa-google"></i> Login with Google
              </a>
              <a href="#" class="btn btn-facebook btn-user btn-block">
                <i class="fa fa-facebook-f"></i> Login with Facebook
              </a>
              <div class="text-center">
                <button type="submit" class="btn btn-main text-center">
                  Login
                </button>
              </div>
            </form>
            <hr />
            <div class="text-center">
              <a class="small" href="#">Forgot Password?</a>
            </div>
            <p class="mt-20">
              New in this site? <a href="signin.html">Create New Account</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
