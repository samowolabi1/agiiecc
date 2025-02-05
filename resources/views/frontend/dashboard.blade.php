@extends('layouts.frontend')

@section('mainSection')
    <div class="header-middle sticky-header">
        <div class="container">
            <nav class="main-nav">
                <ul class="menu sf-arrows">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="category.html">Product</a>
                    </li>
                    <li>
                        <a href="ride.html">Ride</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                    <li>
                        <a href="about.html">About Us</a>
                    </li>
                    <li>
                        <a href="contact.html">Contact Us</a>
                    </li>
                    <li class="megamenu-container active">
                        <a href="dashboard.html">My Dashboard</a>
                    </li>
                </ul><!-- End .menu -->
            </nav><!-- End .main-nav -->

        </div><!-- End .container -->
    </div><!-- End .header-middle -->
    </header><!-- End .header -->

    <main class="main">
        <div class="text-center page-header" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">My Account</h1>
            </div><!-- End .container -->
        </div><!-- End .page-header -->
        <nav aria-label="breadcrumb" class="mb-3 breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Shop</a></li>
                    <li class="breadcrumb-item active" aria-current="page">My Account</li>
                </ol>
            </div><!-- End .container -->
        </nav><!-- End .breadcrumb-nav -->

        <div class="page-content">
            <div class="dashboard">
                <div class="container">
                    <div class="row">
                        <aside class="col-md-4 col-lg-3">
                            <ul class="mb-3 nav nav-dashboard flex-column mb-md-0" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab"
                                        href="#tab-dashboard" role="tab" aria-controls="tab-dashboard"
                                        aria-selected="true">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-profile-link" data-toggle="tab" href="#tab-profile"
                                        role="tab" aria-controls="tab-profile" aria-selected="false">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address"
                                        role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account"
                                        role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link btn btn-primary"
                                        style="background-color: #8fc74a; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">
                                        <a href="login.html" style="color: #ffffff;">Sign Out</a></button>
                                </li>
                            </ul>
                        </aside><!-- End .col-lg-3 -->

                        <div class="col-md-8 col-lg-9">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel"
                                    aria-labelledby="tab-dashboard-link">
                                    <p>Hello <span class="font-weight-normal text-dark">
                                            {{ $user['firstname'] }}
                                        </span> Welcome Back<span class="font-weight-normal text-dark"></span>
                                        <br>
                                        From your account dashboard you can view your messages and history and <a
                                            href="#tab-account" class="tab-trigger-link">edit your password and account
                                            details</a>.
                                    </p>
                                    <br>
                                    <h2>Do you want to be a Vendor?</h2>
                                    <a href="register.html" class="btn btn-outline-primary-2"><span>Start Selling</span><i
                                            class="icon-long-arrow-right"></i></a>
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-profile" role="tabpanel"
                                    aria-labelledby="tab-profile-link">
                                    <div class="dashboard-wrapper dashboard-user-profile">
                                        <div class="media">
                                            <div class="text-center pull-left" href="#!">

                                                @if (auth()->user()->profile_picture)
                                                    <img src="{{ asset('profile_pictures/' . auth()->user()->profile_picture) }}"
                                                        alt="Profile Picture" width="200" class="media-object user-im">
                                                @endif
                                                <form action="{{ url('/update-profile-picture') }}" method="POST"
                                                    enctype="multipart/form-data" class="text-center">
                                                    @csrf
                                                    <label for="profile_picture" class="mt-1 text-white btn"
                                                        style="background-color: #8fc74a; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">Change
                                                        Image</label>
                                                    <input type="file" name="profile_picture" class="d-none"
                                                        id='profile_picture'>
                                                    {{-- <input type='submit' value='submit'> --}}
                                                </form>


                                                {{-- <a href="#x" class="mt-20 btn btn-transparent">Change Image</a> --}}
                                            </div>
                                            <div class="media-body">
                                                <ul class="user-profile-list">
                                                    <li><span>Full
                                                            Name:</span>{{ $user['firstname'] . ' ' . $user['lastname'] }}
                                                    </li>
                                                    {{-- <li><span>Country:</span>{{ $user[''] }}</li> --}}
                                                    <li><span>Email:</span>{{ $user['email'] }}</li>
                                                    <li><span>Phone:</span>{{ $user['phoneNumber'] }}</li>
                                                    <li><span>Date of Birth:</span>{{ $user['dob'] }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-orders" role="tabpanel"
                                    aria-labelledby="tab-orders-link">
                                    <p>No order has been made yet.</p>
                                    <a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i
                                            class="icon-long-arrow-right"></i></a>
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-downloads" role="tabpanel"
                                    aria-labelledby="tab-downloads-link">
                                    <p>No downloads available yet.</p>
                                    <a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i
                                            class="icon-long-arrow-right"></i></a>
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-address" role="tabpanel"
                                    aria-labelledby="tab-address-link">
                                    <p>The following addresses will be used on the checkout page by default.</p>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card card-dashboard">
                                                <div class="card-body">
                                                    <h3 class="card-title">Home Address</h3><!-- End .card-title -->
                                                    <p>John str<br>
                                                        New York, NY 10001<br>
                                                        1-234-987-6543<br>
                                                        yourmail@mail.com<br>
                                                        <a href="#">Edit <i class="icon-edit"></i></a>
                                                    </p>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .card-dashboard -->
                                        </div><!-- End .col-lg-6 -->

                                        <div class="col-lg-6">
                                            <div class="card card-dashboard">
                                                <div class="card-body">
                                                    <h3 class="card-title">Contact Address</h3><!-- End .card-title -->

                                                    <p>You have not set up this type of address yet.<br>
                                                        <a href="#">Edit <i class="icon-edit"></i></a>
                                                    </p>
                                                </div><!-- End .card-body -->
                                            </div><!-- End .card-dashboard -->
                                        </div><!-- End .col-lg-6 -->
                                    </div><!-- End .row -->
                                </div><!-- .End .tab-pane -->

                                <div class="tab-pane fade" id="tab-account" role="tabpanel"
                                    aria-labelledby="tab-account-link">
                                    <form action="{{ url('/additional_info') }}">

                                        <!-- Display Validation Errors -->
                                        @if ($errors->any())
                                            <div
                                                style="color: red; border: 1px solid red; padding: 10px; margin-bottom: 10px;">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <!-- Display Success Message -->
                                        @if (session('success'))
                                            <div
                                                style="color: green; border: 1px solid green; padding: 10px; margin-bottom: 10px;">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label>First Name *</label>
                                                <input type="text" class="form-control" name="firstname"
                                                    value="{{ $user['firstname'] }}" required>
                                            </div><!-- End .col-sm-6 -->

                                            <div class="col-sm-6">
                                                <label>Last Name *</label>
                                                <input type="text" class="form-control" name="lastname"
                                                    value="{{ $user['lastname'] }}" required>
                                            </div><!-- End .col-sm-6 -->
                                        </div><!-- End .row -->

                                        {{-- <label>Display Name *</label>
                                        <input type="text" class="form-control" required>
                                        <small class="form-text">This will be how your name will be displayed in the
                                            account section and in reviews</small> --}}

                                        <label>Email address *</label>
                                        <input type="email" class="form-control" name="email"
                                            value="{{ $user['email'] }}" required>

                                        <label>Current password (leave blank to leave unchanged)</label>
                                        <input type="password" name="old_password" class="form-control">

                                        <label>New password (leave blank to leave unchanged)</label>
                                        <input type="password" name='password' class="form-control">

                                        <label>Confirm new password</label>
                                        <input type="password" name='confirm_password' class="mb-2 form-control">

                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SAVE CHANGES</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>
                                    </form>
                                </div><!-- .End .tab-pane -->
                            </div>
                        </div><!-- End .col-lg-9 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .dashboard -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
@endsection
