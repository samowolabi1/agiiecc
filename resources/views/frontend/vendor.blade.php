@extends('layouts.frontend')
@section('mainSection')

    <div class="container mt-5">

        <h1 class='text-center'>Become a Vendor</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="text-white alert alert-success">
                {{ session('success') }}
                <a href="vendor_dashboard"> <b>Goto Dashboard </b></a>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


        <form action="{{ route('vendor_register') }}" class='mt-4' method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-sm-6">
                    <label>First Name *</label>
                    <input type="text" value="{{ old('firstname', auth()->user()->firstname ?? '') }}" name="firstname"
                        placeholder="Enter First Name" class="form-control" required>
                </div>

                <div class="col-sm-6">
                    <label>Last Name *</label>
                    <input type="text" value="{{ old('lastname', auth()->user()->lastname ?? '') }}" name="lastname"
                        placeholder="Enter Last Name" class="form-control" required>
                </div>
            </div>



            <label>House Number *</label>
            <input type="text" name="houseNo" placeholder="Enter House Number" class="form-control" required>

            <label>Address *</label>
            <input type="text" name="address1" placeholder="Enter Address" class="form-control" required>

            <div class="row">
                <div class="col-sm-6">
                    <label>State of Origin *</label>
                    <input type="text" name="stateOfOrigin" placeholder="Enter State of Origin" class="form-control"
                        required>
                </div>

                <div class="col-sm-6">
                    <label>Postcode *</label>
                    <input type="text" name="postcode" placeholder="Enter Postcode" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label>Phone Number *</label>
                    <input type="text" name="phoneNumber" placeholder="Enter Phone Number" class="form-control" required>
                </div>

                <div class="col-sm-6">
                    <label>Email *</label>
                    <input type="email" name="email" placeholder="Enter Email" class="form-control" required>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <label>Date of Birth *</label>
                    <input type="date" name="dob" class="form-control" required>
                </div>

                <div class="col-sm-6">
                    <label>Gender *</label>
                    <select name="sex" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>

            <label>Country *</label>
            <input type="text" name="country" placeholder="Enter Country" class="form-control" required>

            <label>Profile Picture</label>
            <input type="file" name="profile_picture" class="form-control">


            <button type="submit" class="btn btn-outline-primary-2">
                <span>REGISTER</span>
                <i class="icon-long-arrow-right"></i>
            </button>
        </form>
        <br><br>
    </div>
@endsection
