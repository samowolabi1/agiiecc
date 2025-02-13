@extends('layouts.frontend')

@section('mainSection')
    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="m-3 row">
                <div class="mt-3 col-md-12">
                    <div class="text-center">
                        @include('partials.userdshheader')
                    </div>



                    <div class="dashboard-wrapper user-dashboard">
                        <div class="media">

                            <div class="media-body">
                                <h2 class="media-heading">Welcome {{ Auth::user()->firstname }} </h2>
                                {{-- <p>Created - 2 Years Ago || Last Login - 2 Days ago </p> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div style="height: 40px;"></div>

            <h4 class="text-primary">Simple Steps To Take &nbsp; <i class="fa fa-pencil"></i></h4>
            <ol>
                <li>&nbsp; 1. Check your mailbox for our welcome mail</li><br>
                <li>&nbsp; 2. Get your shop details ready! Such as Name, Description and Slogan</li>
                <br>
                <li>&nbsp; 3. Click the "blue button" above to create your shop</li><br>
                <li class="text-danger">&nbsp;
            </ol>

            @if (empty(auth()->user()->company->id))
                <a href="{{ route('profile.index') }}"
                    class="shadow-sm d-none d-sm-inline-block btn btn-primary btn-lg fs-2"><i
                        class="text-center fa fa-bank text-white-50 "></i> Create a profile to start selling</a>
            @endif


        </div>
    </section>
@endsection
