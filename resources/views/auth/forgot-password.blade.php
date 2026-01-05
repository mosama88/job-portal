@extends('frontend.layouts.master')
@section('content')
    <section class="pt-120 login-register mb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12 mx-auto">
                    <div class="login-register-cover">
                        <div class="text-center">
                            <h2 class="mb-5 text-brand-1">Reset Password</h2>
                            <p class="font-sm text-muted mb-30">Forgot your password? No problem. Just let us know your email
                                address and we will email you a password reset link
                                that will allow you to choose a new one.</p>
                        </div>
                        <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

                        <form class="login-register text-start mt-20" action="{{ route('password.email') }}" method="POST">
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
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default hover-up w-100" type="submit">Email Password
                                    Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
