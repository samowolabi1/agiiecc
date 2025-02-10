@extends('layouts.master')

@section('content')

<style>
    .dashboard-wrapper{
        margin-top:0px;
    }
</style>

    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="m-3 row">
                <div class="col-md-12">
                    @include('partials.userdshheader')

                    <hr>
                    <div class="user-dashboard">
                        <div class="media">

                            <div class="media-body">
                                <!-- <h2 class="media-heading">My Profile </h2> -->
                                <!-- <p>Created - 2 Years Ago || Last Login - 2 Days ago </p> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div style="height: 20px;"></div>

            <div class=" row">
                <div class="col-12 col-md-3 dashboard-wrapper">

                    <!-- Widget Category -->
                    <div class="border widget widget-category border-light">

                        <ul class="widget-category-list">
                            <li><a href="/my-profile">View Profile</a>
                            </li>
                            <li><a href="#!">Change Information</a>
                            </li>
                        </ul>
                    </div> <!-- End category  -->
                </div>



                    <div class="col-md-9">

                        @if (!empty($company->id))




                                <form action="{{ route('update.company') }}" method="post" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Business Name</label>
                                            <input type="text" name="name" class="form-control"
                                            placeholder="Business Name" value="{{ old('name', $company->name) }}" required>

                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Display Name</label>
                                            <input type="text" name="brand_name" class="form-control"
                                                placeholder="Business Display Name" value="{{ old('brand_name', $company->brand_name) }}" required>
                                            @if ($errors->has('brand_name'))
                                                <span class="text-danger">{{ $errors->first('brand_name') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Company Short Description</label>
                                        <textarea name="short_description" class="form-control" placeholder="Short description about your company"
                                            maxlength="87" value="" autocomplete required>{{ $company->short_description }}</textarea>
                                        @if ($errors->has('short_description'))
                                            <span class="text-danger">{{ $errors->first('short_description') }}</span>
                                        @endif

                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="control-label">Company Address</label>
                                        <input name="address" class="form-control" value="{{$company->address}}" placeholder="Company Address" required>
                                        @if ($errors->has('address'))
                                            <span class="text-danger">{{ $errors->first('address') }}</span>
                                        @endif

                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label class="control-label">State</label>
                                            <select class="form-control" name="state_id" required>
                                                <option value="">Choose...</option>

                                                @foreach ($states as $state)
                                                    <option value="{{ $state->id }}"
                                                        {{ optional($company)->state_id == $state->id ? 'selected' : '' }}>
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach
                                            </select>


                                            @if ($errors->has('state_id'))
                                                <span class="text-danger">State is required</span>
                                            @endif

                                        </div>

                                        <div class="form-group col-md-6">
                                            <label class="control-label">Phone Number</label>
                                            <input name="phone_number" class="form-control" placeholder="Mobile Phone Number"
                                                required value="{{ old( 'phone_number', $company->phone_number) }}">
                                            @if ($errors->has('phone_number'))
                                                <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                            @endif

                                        </div>
                                    </div>


                                    <div class="form-group col-md-12">
                                        <label class="control-label">Company Website (Optional)</label>
                                        <input type="text" name="website" class="form-control"
                                        placeholder="Company Website"
                                        value="{{ old('website', optional($company)->website) }}" required>


                                        @if ($errors->has('website'))
                                            <span class="text-danger">{{ $errors->first('website') }}</span>
                                        @endif

                                    </div>

                                    <div class="form-row">

                                        <div class="form-group col-md-3">
                                            <label class="control-label">Facebook Link</label>
                                            <input type="text" name="facebook" class="form-control"
                                                placeholder="Facebook Link" value="{{ old('facebook', $company->facebook) }}" required>
                                            @if ($errors->has('facebook'))
                                                <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="control-label">Whatsapp Link</label>
                                            <input type="text" name="whatsapp" class="form-control"
                                                placeholder="Whatsapp Link" value="{{ old('whatsapp', $company->whatsapp) }}" required>
                                            @if ($errors->has('whatsapp'))
                                                <span class="text-danger">{{ $errors->first('whatsapp') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="control-label">Twitter(X) Link</label>
                                            <input type="text" name="twitter" class="form-control" placeholder="Twitter Link"
                                                value="{{ old('twitter', $company->twitter) }}" required>
                                            @if ($errors->has('twitter'))
                                                <span class="text-danger">{{ $errors->first('twitter') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label class="control-label">Instagram Link</label>
                                            <input type="text" name="instagram" class="form-control"
                                                placeholder="Instagram Link" value="{{ old('instagram', $company->instagram ) }}" required>
                                            @if ($errors->has('instagram'))
                                                <span class="text-danger">{{ $errors->first('instagram') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <button style="background-color:#8FC74A; margin-left: 15px;" type="submit"
                                        class="btn btn-success btn-lg">Update Company</button>
                                </form>

                                @else

                                    <div>
                                        You need to create a company profile first before Updating. <a href="/my-profile">Click Here</a>
                                    </div>

                                @endif



                    </div>


                <br>
            </div>
        </div>

    </section>



@endsection
