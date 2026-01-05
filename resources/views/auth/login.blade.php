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



                            <!-- التعديل هنا -->
                            <div class="row mb-3">
                                <div class="col-12 d-flex justify-content-between align-items-center">
                                    <div class="form-check">
                                        <input class="form-check-input" name="remember" type="checkbox" value=""
                                            id="checkDefault">
                                        <label class="form-check-label" for="checkDefault">
                                            Remember Me
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a class="text-dark" href="{{ route('password.request') }}">I forgot my password</a>
                                    @endif
                                </div>
                            </div>
                            <!-- /.col -->

                            <div class="text-muted text-center">Don't have an account?
                                <a href="{{ route('register') }}">Registration</a>
                            </div>
                        </form>
                        <div class="text-center mt-20">
                            <div class="divider-text-center"><span>Or continue with</span></div>
                            <button class="btn social-login hover-up mt-20"><img
                                    src="{{ asset('frontend') }}/assets/imgs/template/icons/icon-google.svg"
                                    alt="joblist"><strong>Sign up with Google</strong></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
