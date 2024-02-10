@extends('frontend.layout.master')
@section('title', 'Home')
@section('content')
    @include('frontend.home.sections.hero')

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    @include('frontend.home.sections.trending')
                    @include('frontend.home.sections.popular')
                    @include('frontend.home.sections.recent')
                    @include('frontend.home.sections.live')
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        @include('frontend.home.sections.sidebar-view')
                        @include('frontend.home.sections.sidebar-comments')
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection
