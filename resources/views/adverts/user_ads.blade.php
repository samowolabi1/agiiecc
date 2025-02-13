@extends('layouts.frontend')

@section('mainSection')
    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="m-3 row">
                <div class="col-md-12">
                    <div class="mt-3 text-center">
                        @include('partials.userdshheader')


                    </div>

                    <div class="dashboard-wrapper user-dashboard">
                        <div class="media">

                            <div class="media-body">
                                <h2 class="media-heading">My Adverts </h2>
                                <!-- <p>Created - 2 Years Ago || Last Login - 2 Days ago </p> -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            <div style="height: 40px;"></div>

            <div class="m-3 row">
                <div class="col-md-2">
                    <!-- Widget Category -->
                    @include('adverts.sidebar.sidebar')

                </div>

                <div class="col-md-10">
                    @if (!empty($company->id))
                    <h3><b>Pick an Advert Category</b></h3>




                    <div class="">
                        <form action="{{ route('selectAds') }}" method="get">
                            @csrf
                            <select id="categorySelect" class="form-control fs-3" name="category_id">
                                <option value="">Select a Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>

                                <button class="mt-3 btn btn-info btn-lg" type="submit">  NEXT</button>
                        </form>
                    </div>

                    @else
                    <div>
                      <b>  You need to create a company profile. <br> <a href="/my-profile" class='text-primary'>Click Here</a>  to creat on</b>
                    </div>

                    @endif

                </div>


            </div>


    </section>


@endsection
