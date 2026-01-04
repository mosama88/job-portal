{{-- @extends('admins.auth.layouts.master')
@section('title', 'Login')
@section('content')
    <p class="login-box-msg">Sign in as an <b>User</b> to start your session</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="username">Email</label>
        <div class="input-group mb-3">
            <input type="text" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="email@domain.com">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
                <span class="invalid-feedback d-block text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <label for="password">Password</label>
        <div class="input-group mb-3">
            <input type="password" id="password" name="password"
                class="form-control @error('password') is-invalid @enderror" placeholder="Password">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password')
                <span class="invalid-feedback d-block text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row">
            <div class="col-12 mb-3 d-flex justify-content-between align-items-center">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember">
                    <label for="remember">Remember Me</label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">I forgot my password</a>
                @endif

            </div>

            <!-- /.col -->

            <div class="col-4 mx-auto">
                <button type="submit" wire:click="submit" wire:loading.attr="disabled"
                    class="btn btn-primary btn-block d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-right-to-bracket mx-1"></i> Log in
                </button>
            </div>
            <!-- /.col -->
        </div>
    </form>
@endsection --}}


@extends('frontend.layouts.master')
@section('content')
    <section class="pt-120 login-register mb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12 mx-auto">
                    <div class="login-register-cover">
                        <div class="text-center">
                            <h2 class="mb-5 text-brand-1">Login</h2>
                            <p class="font-sm text-muted mb-30">Please Login.</p>
                        </div>
                        <form class="login-register text-start mt-20" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-3">Email *</label>
                                        <input class="form-control @error('email') is-invalid @enderror" id="input-3"
                                            name="email" placeholder="stevenjob@mail.com">
                                        @error('email')
                                            <span class="invalid-feedback d-block text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-4">Password *</label>
                                        <input class="form-control @error('password') is-invalid @enderror" id="input-4"
                                            type="password" name="password" placeholder="************">
                                        @error('password')
                                            <span class="invalid-feedback d-block text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default hover-up w-100" type="submit" name="login">Login</button>
                            </div>
                            <div class="text-muted text-center">Don't have an account?
                                <a href="{{ route('register') }}">Registration</a>
                            </div>
                        </form>
                        <div class="text-center mt-20">
                            <div class="divider-text-center"><span>Or continue with</span></div>
                            <button class="btn social-login hover-up mt-20"><img
                                    src="{{ asset('frontend') }}/assets/imgs/template/icons/icon-google.svg"
                                    alt="joblist"><strong>Sign up with
                                    Google</strong></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
