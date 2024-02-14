@extends('frontend.layout.master')
@section('title', 'User Profile')
@section('content')
    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./categories.html">User</a>
                        <span>User Profile</span>
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
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <form action="{{ route('user.profile.update') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Avatar</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <div id="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="image" id="image-upload" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="name" id="name"
                                                value="{{ Auth::user()->name }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">User Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" class="form-control" name="username" id=""
                                                value="{{ Auth::user()->username }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="email" name="email" id="email" class="form-control"
                                                value="{{ Auth::user()->email }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                value="{{ Auth::user()->phone }}">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="address" id="address" class="form-control"
                                                value="{{ Auth::user()->address }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="offset-3 col-sm-9">
                                            <button type="submit" class="btn btn-info ">Update Profile</a>
                                        </div>
                                    </div>
                                </form>
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
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#image-preview').css({
                'background-image': "url({{ !empty(Auth::user()->photo) ? asset(Auth::user()->photo) : asset('upload/avatar.png') }})",
                'background-size': 'cover',
                'background-position': 'center center',
            });
        });
    </script>
@endpush
