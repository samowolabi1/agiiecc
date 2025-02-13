@extends('layouts.frontend')

@section('mainSection')

<style>
    .dashboard-wrapper{
        margin-top:0px;
    }
</style>

    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="m-3 row">
                <div class="mt-3 text-center col-md-12 justify-content-center">
                    @include('partials.userdshheader')

                    <hr>

                </div>
            </div>


            <div style="height: 20px;"></div>

            <div class=" row">
                <div class="col-12 col-md-3 dashboard-wrapper">

                    <!-- Widget Category -->
                    <div class="border widget widget-category border-light">

                        <ul class="widget-category-list">
                            <li><a href="/dashboard">Dashboard</a>
                            </li>
                            <li><a href="/my-adverts">My Advert</a>
                            </li>

                            <li><a href="my-profile">View Profile</a>
                            </li>
                            <li><a href="/update-profile">Change Information</a>
                            </li>
                        </ul>
                    </div> <!-- End category  -->
                </div>


                @empty($company)
                    <div class="col-md-9">
                        <div>
                            <!-- <h4>You have no running adverts</h4> -->
                            <div>

                                <form action="{{ route('create.company') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Business Name</label>
                                            <input type="text" name="name" class="form-control"
                                                placeholder="Business Name" value="{{ old('name') }}" required>
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Display Name</label>
                                            <input type="text" name="brand_name" class="form-control"
                                                placeholder="Business Display Name" value="{{ old('brand_name') }}" required>
                                            @if ($errors->has('brand_name'))
                                                <span class="text-danger">{{ $errors->first('brand_name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Company Short Description</label>
                                        <textarea name="short_description" class="form-control" placeholder="Short description about your company"
                                            maxlength="87" value="" autocomplete required></textarea>
                                        @if ($errors->has('short_description'))
                                            <span class="text-danger">{{ $errors->first('short_description') }}</span>
                                        @endif

                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Company Address</label>
                                        <input name="address" class="form-control" placeholder="Company Address" required>
                                        @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif

                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label class="control-label">State</label>
                                            <select class="form-control" name="state_id" required>
                                                <option selected>Choose...</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('state_id'))
                                                <span class="text-danger">State is required</span>
                                            @endif

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Phone Number</label>
                                            <input name="phone_number" class="form-control" placeholder="Mobile Phone Number"
                                                required>
                                            @if ($errors->has('phone_number'))
                                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                            @endif

                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label class="control-label">Company Website (Optional)</label>
                                        <input type="text" name="website" class="form-control"
                                            placeholder="Short description about your product" maxlength="87" required>
                                        @if ($errors->has('website'))
                                            <span class="text-danger">{{ $errors->first('website') }}</span>
                                        @endif

                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-3">
                                            <label class="control-label">Facebook Link</label>
                                            <input type="text" name="facebook" class="form-control"
                                                placeholder="Facebook Link" value="{{ old('facebook') }}" required>
                                            @if ($errors->has('facebook'))
                                                <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="control-label">Whatsapp Link</label>
                                            <input type="text" name="whatsapp" class="form-control"
                                                placeholder="Whatsapp Link" value="{{ old('whatsapp') }}" required>
                                            @if ($errors->has('whatsapp'))
                                                <span class="text-danger">{{ $errors->first('whatsapp') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="control-label">Twitter(X) Link</label>
                                            <input type="text" name="twitter" class="form-control" placeholder="Twitter Link"
                                                value="{{ old('twitter') }}" required>
                                            @if ($errors->has('twitter'))
                                                <span class="text-danger">{{ $errors->first('twitter') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="control-label">Instagram Link</label>
                                            <input type="text" name="instagram" class="form-control"
                                                placeholder="Instagram Link" value="{{ old('instagram') }}" required>
                                            @if ($errors->has('instagram'))
                                                <span class="text-danger">{{ $errors->first('instagram') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <button style="background-color:#8FC74A; margin-left: 15px;" type="submit"
                                        class="btn btn-success">Create Company</button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endempty

                <br>

                @if (!empty($company))
                    <div class="col-12 col-md-8 ">
                        <table class="table table-hover table-striped" >
                            <tbody>
                                <tr>
                                    <td class="fw-bold" style="border: 0; width: 30%;">Company Name:</td>
                                    <td style="border: 0;">{{ $company->name ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold" style="border: 0;">Description:</td>
                                    <td style="border: 0;">{{ $company->description ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold" style="border: 0;">Address:</td>
                                    <td style="border: 0;">{{ $company->address ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold" style="border: 0;">Phone Number:</td>
                                    <td style="border: 0;">{{ $company->phone_number ?? 'N/A' }}</td>
                                </tr>
                                <tr>
                                    <td class="fw-bold" style="border: 0;">Website:</td>
                                    <td style="border: 0;">
                                        @if(!empty($company->website))
                                            <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-bold" style="border: 0;">Social Media:</td>
                                    <td style="border: 0;">
                                        @if(!empty($company->facebook || $company->twitter || $company->instagram || $company->whatsapp))
                                            <a href="{{ $company->facebook }}" target="_blank">{{ $company->facebook }}</a> <br>
                                            <a href="{{ $company->twitter }}" target="_blank">{{ $company->twitter }}</a> <br>
                                            <a href="{{ $company->whatsapp }}" target="_blank">{{ $company->whatsapp }}</a> <br>
                                            <a href="{{ $company->instagram }}" target="_blank">{{ $company->instagram }}</a> <br>
                                        @else
                                            N/A
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

               @endif


            </div>
        </div>
        <br>  <br>
    </section>



@endsection
