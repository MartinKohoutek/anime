@extends('frontend.layout.master')
@section('title', 'User Dashboard')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./categories.html">User</a>
                        <span>User Dashboard</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    {{-- <div class="row gutters-sm"> --}}
                    @include('frontend.profile.layout.sidebar')
                    <div class="col-md-9 dashboard">
                        <div class="card mb-3">
                            <div class="card-body">

                                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-2">
                                    <div class="col">
                                        <div class="card radius-10 border-start border-0 border-3 border-info">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-0 text-secondary">Total Orders</p>
                                                        <h4 class="my-1 text-info">4805</h4>
                                                        <p class="mb-0 font-13">+2.5% from last week</p>
                                                    </div>
                                                    <div
                                                        class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                                        <i class="fa fa-shopping-cart"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card radius-10 border-start border-0 border-3 border-danger">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-0 text-secondary">Total Revenue</p>
                                                        <h4 class="my-1 text-danger">$84,245</h4>
                                                        <p class="mb-0 font-13">+5.4% from last week</p>
                                                    </div>
                                                    <div
                                                        class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto">
                                                        <i class="fa fa-dollar"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card radius-10 border-start border-0 border-3 border-success">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-0 text-secondary">Bounce Rate</p>
                                                        <h4 class="my-1 text-success">34.6%</h4>
                                                        <p class="mb-0 font-13">-4.5% from last week</p>
                                                    </div>
                                                    <div
                                                        class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                                        <i class="fa fa-bar-chart"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card radius-10 border-start border-0 border-3 border-warning">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <p class="mb-0 text-secondary">Total Customers</p>
                                                        <h4 class="my-1 text-warning">8.4K</h4>
                                                        <p class="mb-0 font-13">+8.4% from last week</p>
                                                    </div>
                                                    <div
                                                        class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto">
                                                        <i class="fa fa-users"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->
@endsection
