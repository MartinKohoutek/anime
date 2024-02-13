@extends('frontend.layout.master')
@section('title', 'Forgot Password')
@section('content')
    <!-- Normal Breadcrumb Begin -->
    <section class="normal-breadcrumb set-bg" data-setbg="{{ asset('frontend/img/normal-breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="normal__breadcrumb__text">
                        <h2>Forgot password</h2>
                        <p>Forgot your password? No problem. Just let us know your email address and we will email you a
                            password reset link that will allow you to choose a new one.'</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Normal Breadcrumb End -->

    <!-- Login Section Begin -->
    <section class="login spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="login__form">
                        <h3>Forgot password</h3>
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="input__item">
                                <input type="email" name="email" id="email" placeholder="Email address"
                                    value="{{ old('email') }}">
                                <span class="icon_mail"></span>
                            </div>

                            <button type="submit" class="site-btn">Send Reset Link</button>
                        </form>
                        <a href="{{ route('login') }}" class="forget_pass" style="bottom: 10px; right: 50px">Back to
                            Login</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Dont’t Have An Account?</h3>
                        <a href="{{ route('register') }}" class="primary-btn">Register Now</a>
                    </div>
                </div>
            </div>
            <div class="login__social">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="login__social__links">
                            <span>or</span>
                            <ul>
                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With
                                        Facebook</a></li>
                                <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With
                                        Google</a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With
                                        Twitter</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Login Section End -->
@endsection
