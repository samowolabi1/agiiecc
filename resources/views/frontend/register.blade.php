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
@endsection


