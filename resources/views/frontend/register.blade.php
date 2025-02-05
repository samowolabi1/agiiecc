<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Agii NG</title>
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="AGII NG">
    <meta name="author" content="p-themes">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo.png">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#8fc74a">
    <link rel="stylesheet" href="assets/vendor/line-awesome/line-awesome/line-awesome/css/line-awesome.min.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery.countdown.css">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="css/logo.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/plugins/nouislider/nouislider.css">
</head>
<style>
  .form-step {
      display: none;
  }

  .form-step.active {
      display: block;
  }

  .form-container {
      max-width: 600px;
      margin: 0 auto;
      padding: 20px;
      background-color: #f8f9fa;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  }
</style>
<body>
    

  <div class="page-wrapper">
    <header class="header header-14">
        <div class="header-top">
            <div class="container">
                <div class="header-left">
                    <a href="tel:#"><i class="icon-phone"></i>Call: +0123 456 789</a>
                </div><!-- End .header-left -->

                <div class="header-right">

                    <ul class="top-menu">
                        <li>
                            <a href="#">Links</a>
                            <ul class="menus">
                                <li>
                                    <div class="header-dropdown">
                                        <a href="#">Location</a>
                                        <div class="header-menu">
                                            <ul>
                                                <li><a href="#">Ikeja</a></li>
                                                <li><a href="#">Island</a></li>
                                                <li><a href="#">Agege</a></li>
                                            </ul>
                                        </div><!-- End .header-menu -->
                                    </div><!-- End .header-dropdown -->
                                </li>
                            </ul>
                        </li>
                    </ul><!-- End .top-menu -->
                </div><!-- End .header-right -->
            </div><!-- End .container -->
        </div><!-- End .header-top -->
    </header>

    <div class="container-fluid p-0">
        <!-- Site Logo -->
        <div class="row justify-content-center">
            <div class="col-12 text-center">
                <a href="index.html">
                    <img src="images/Agiilogo2.png" alt="Site Logo" class="img-fluid" style="height: 170px; width: auto;">
                </a>
            </div>
        </div>
    
    </div>

  <div class="container mt-5">
      <div class="form-container">
        <h2 class="text-center mb-4" style="font-size: 3rem;">Vendor Registration</h2>
          <form id="registrationForm">
              <!-- Step 1 -->
              <div class="form-step active" id="step-1">
                  <h4 class="mb-3">Step 1: Basic Information</h4>
                  <div class="mb-3">
                      <label for="vendorName" class="form-label">Vendor Name</label>
                      <input type="text" class="form-control" id="vendorName" placeholder="Enter vendor name" required>
                  </div>
                  <div class="mb-3">
                      <label for="vendorEmail" class="form-label">Email Address</label>
                      <input type="email" class="form-control" id="vendorEmail" placeholder="Enter email" required>
                  </div>
                  <div class="text-end">
                      <button type="button" class="btn btn-primary" onclick="nextStep(1)">Next</button>
                  </div>
              </div>

              <!-- Step 2 -->
              <div class="form-step" id="step-2">
                  <h4 class="mb-3">Step 2: Business Information</h4>
                  <div class="mb-3">
                      <label for="businessType" class="form-label">Business Type</label>
                      <input type="text" class="form-control" id="businessType" placeholder="Enter type of business" required>
                  </div>
                  <div class="mb-3">
                      <label for="businessAddress" class="form-label">Business Address</label>
                      <textarea class="form-control" id="businessAddress" rows="3" placeholder="Enter business address" required></textarea>
                  </div>
                  <div class="text-end">
                      <button type="button" class="btn btn-secondary" onclick="previousStep(1)">Back</button>
                      <button type="button" class="btn btn-primary" onclick="nextStep(2)">Next</button>
                  </div>
              </div>

              <!-- Step 3 -->
              <div class="form-step" id="step-3">
                  <h4 class="mb-3">Step 3: Upload Documents & Declaration</h4>
                  <div class="mb-3">
                      <label for="documents" class="form-label">Upload Documents</label>
                      <input type="file" class="form-control" id="documents" multiple required>
                      <input type="file" class="form-control" id="documents" multiple required>
                  </div>
                  <div class="mb-4">
                      <label for="declaration" class="form-label">Declaration</label>
                      <textarea class="form-control" id="declaration" rows="3" readonly>
I hereby quote that the information provided is accurate and true to the best of my knowledge. I understand that false information may lead to disqualification or other legal actions.
                      </textarea>
                  </div>
                  <div class="mb-3 form-check">
                      <input type="checkbox" class="form-check-input" id="agree" required>
                      <label class="form-check-label" for="agree">I agree to the terms and conditions</label>
                  </div>
                  <div class="text-end">
                      <button type="button" class="btn btn-secondary" onclick="previousStep(2)">Back</button>
                      <button type="submit" class="btn btn-success">Submit</button>
                  </div>
              </div>
          </form>
      </div>
  </div>

<br>
<br>
<footer class="footer" style="background-color: #8fc74a; color:white;" >
        	<div class="footer-middle">
	            <div class="container">
	            	<div class="row" st>
	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget widget-about">
	            				<img src="assets/images/logo.png" class="footer-logo" alt="Footer Logo" width="105" height="25">
	            				<p style="color: white;">Praesent dapibus, neque id cursus ucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. </p>

	            				<div class="social-icons">
	            					<a href="#" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
	            					<a href="#" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
	            					<a href="#" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
	            					<a href="#" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
	            					<a href="#" class="social-icon" target="_blank" title="Pinterest"><i class="icon-pinterest"></i></a>
	            				</div><!-- End .soial-icons -->
	            			</div><!-- End .widget about-widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title">Useful Links</h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="about.html">About Agii NG</a></li>
	            					<li><a href="#">How to shop on Agii Ng</a></li>
	            					<li><a href="#">FAQ</a></li>
	            					<li><a href="login.html">Log in</a></li>
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="contact.html">Contact us</a></li>
	            					<li><a href="#">Terms and conditions</a></li>
	            					<li><a href="#">Privacy Policy</a></li>
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->

	            		<div class="col-sm-6 col-lg-3">
	            			<div class="widget">
	            				<h4 class="widget-title">My Account</h4><!-- End .widget-title -->

	            				<ul class="widget-list">
	            					<li><a href="#">Sign In</a></li>
	            					
	            				</ul><!-- End .widget-list -->
	            			</div><!-- End .widget -->
	            		</div><!-- End .col-sm-6 col-lg-3 -->
	            	</div><!-- End .row -->
	            </div><!-- End .container -->
	        </div><!-- End .footer-middle -->

	        <div class="footer-bottom">
	        	<div class="container">
	        		<p class="footer-copyright" style="color: white;">Copyright © 2025 Agii NG. All Rights Reserved.</p><!-- End .footer-copyright -->
	        		<figure class="footer-payments">
	        			<img src="assets/images/payments.png" alt="Payment methods" width="272" height="20">
	        		</figure><!-- End .footer-payments -->
	        	</div><!-- End .container -->
	        </div><!-- End .footer-bottom -->
        </footer><!-- End .footer -->
    </div><!-- End .page-wrapper -->
    

    <!-- Plugins JS File -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/jquery.hoverIntent.min.js"></script>
    <script src="assets/js/jquery.waypoints.min.js"></script>
    <script src="assets/js/superfish.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/wNumb.js"></script>
    <script src="assets/js/bootstrap-input-spinner.js"></script>
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/nouislider.min.js"></script>
    <!-- Main JS File -->
    <script src="assets/js/main.js"></script>

    <script>
      let currentStep = 1;

      function showStep(step) {
          document.querySelectorAll('.form-step').forEach((formStep, index) => {
              if (index + 1 === step) {
                  formStep.classList.add('active');
              } else {
                  formStep.classList.remove('active');
              }
          });
      }

      function nextStep(step) {
          if (step < 3) {
              currentStep++;
              showStep(currentStep);
          }
      }

      function previousStep(step) {
          if (step > 1) {
              currentStep--;
              showStep(currentStep);
          }
      }

      document.getElementById('registrationForm').addEventListener('submit', (e) => {
          e.preventDefault();
          alert('Vendor Registration Successful!');
      });
  </script>
</body>
</html>