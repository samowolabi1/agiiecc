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
                        <a href="vendordashboard.html">My Dashboard</a>
                    </li>
					<li>
                        <a href="store.html">Store</a>
                    </li>
                    </ul><!-- End .menu -->
            </nav><!-- End .main-nav -->
    
                </div><!-- End .container -->
            </div><!-- End .header-middle -->
        </header><!-- End .header -->

        <main class="main">
        	<div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        		<div class="container">
        			<h1 class="page-title">Vendor Account</h1>
        		</div><!-- End .container -->
        	</div><!-- End .page-header -->
            <nav aria-label="breadcrumb" class="breadcrumb-nav mb-3">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">My Account</li>
                    </ol>
                </div><!-- End .container -->
            </nav><!-- End .breadcrumb-nav -->

            <div class="page-content">
            	<div class="dashboard">
	                <div class="container">
	                	<div class="row">
	                		<aside class="col-md-4 col-lg-3">
	                			<ul class="nav nav-dashboard flex-column mb-3 mb-md-0" role="tablist">
								    <li class="nav-item">
								        <a class="nav-link active" id="tab-dashboard-link" data-toggle="tab" href="#tab-dashboard" role="tab" aria-controls="tab-dashboard" aria-selected="true">Dashboard</a>
								    </li>
                                    <li class="nav-item">
								        <a class="nav-link" id="tab-profile-link" data-toggle="tab" href="#tab-profile" role="tab" aria-controls="tab-profile" aria-selected="false">Profile</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-address-link" data-toggle="tab" href="#tab-address" role="tab" aria-controls="tab-address" aria-selected="false">Adresses</a>
								    </li>
								    <li class="nav-item">
								        <a class="nav-link" id="tab-account-link" data-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">Account Details</a>
								    </li>
								    <li class="nav-item">
                                        <button class="nav-link btn btn-primary" style="background-color: #8fc74a; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;"> <a href="" style="color: #ffffff;">Sign Out</a></button>
								    </li>
								</ul>
	                		</aside><!-- End .col-lg-3 -->

	                		<div class="col-md-8 col-lg-9">
	                			<div class="tab-content">
								    <div class="tab-pane fade show active" id="tab-dashboard" role="tabpanel" aria-labelledby="tab-dashboard-link">
								    	<p>Hello <span class="font-weight-normal text-dark">George</span> Welcome Back<span class="font-weight-normal text-dark"></span>
								    	<br>
								    	From your account dashboard you can view your messages and history and <a href="#tab-account" class="tab-trigger-link">edit your password and account details</a>.</p>
								    </div><!-- .End .tab-pane -->

                                    <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="tab-profile-link">
								    	<div class="dashboard-wrapper dashboard-user-profile">
                                            <div class="media">
                                              <div class="pull-left text-center" href="#!">
                                                <img class="media-object user-img" src="images/avater.jpg" alt="Image">
                                                <a href="#x" class="btn btn-transparent mt-20">Change Image</a>
                                              </div>
                                              <div class="media-body">
                                                <ul class="user-profile-list">
                                                  <li><span>Full Name:</span>George Doe</li>
                                                  <li><span>Country:</span>Nigeria</li>
                                                  <li><span>Email:</span>mail@gmail.com</li>
                                                  <li><span>Phone:</span>+880123123</li>
                                                  <li><span>Date of Birth:</span>Dec , 22 ,1991</li>
                                                </ul>
                                              </div>
                                            </div>
                                          </div>
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-orders" role="tabpanel" aria-labelledby="tab-orders-link">
								    	<p>No order has been made yet.</p>
								    	<a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-downloads" role="tabpanel" aria-labelledby="tab-downloads-link">
								    	<p>No downloads available yet.</p>
								    	<a href="category.html" class="btn btn-outline-primary-2"><span>GO SHOP</span><i class="icon-long-arrow-right"></i></a>
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-address" role="tabpanel" aria-labelledby="tab-address-link">
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
														<a href="#">Edit <i class="icon-edit"></i></a></p>
								    				</div><!-- End .card-body -->
								    			</div><!-- End .card-dashboard -->
								    		</div><!-- End .col-lg-6 -->

								    		<div class="col-lg-6">
								    			<div class="card card-dashboard">
								    				<div class="card-body">
								    					<h3 class="card-title">Contact Address</h3><!-- End .card-title -->

														<p>You have not set up this type of address yet.<br>
														<a href="#">Edit <i class="icon-edit"></i></a></p>
								    				</div><!-- End .card-body -->
								    			</div><!-- End .card-dashboard -->
								    		</div><!-- End .col-lg-6 -->
								    	</div><!-- End .row -->
								    </div><!-- .End .tab-pane -->

								    <div class="tab-pane fade" id="tab-account" role="tabpanel" aria-labelledby="tab-account-link">
								    	<form action="#">
			                				<div class="row">
			                					<div class="col-sm-6">
			                						<label>First Name *</label>
			                						<input type="text" class="form-control" required>
			                					</div><!-- End .col-sm-6 -->

			                					<div class="col-sm-6">
			                						<label>Last Name *</label>
			                						<input type="text" class="form-control" required>
			                					</div><!-- End .col-sm-6 -->
			                				</div><!-- End .row -->

		            						<label>Display Name *</label>
		            						<input type="text" class="form-control" required>
		            						<small class="form-text">This will be how your name will be displayed in the account section and in reviews</small>

		                					<label>Email address *</label>
		        							<input type="email" class="form-control" required>

		            						<label>Current password (leave blank to leave unchanged)</label>
		            						<input type="password" class="form-control">

		            						<label>New password (leave blank to leave unchanged)</label>
		            						<input type="password" class="form-control">

		            						<label>Confirm new password</label>
		            						<input type="password" class="form-control mb-2">

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