@extends('frontend.layouts.master')
@section('content')
    <section class="pt-120 login-register mb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-6 col-sm-12 mx-auto">
                    <div class="login-register-cover">
                        <div class="text-center">
                            <h2 class="mb-5 text-brand-1">User Reset-Password</h2>
                            <p class="font-sm text-muted mb-30">Please Reset.</p>
                        </div>
                        <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

                        <form class="login-register text-start mt-20" method="POST" action="{{ route('password.store') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-3">Email *</label>
                                        <input class="form-control @error('email') is-invalid @enderror" id="input-3"
                                            name="email" placeholder="stevenjob@mail.com"
                                            value="{{ old('email', $request->email) }}">
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

                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label class="form-label" for="input-4">Re-Password *</label>
                                        <input class="form-control @error('password_confirmation') is-invalid @enderror"
                                            id="input-4" type="password" name="password_confirmation"
                                            placeholder="************">
                                        @error('password_confirmation')
                                            <span class="invalid-feedback d-block text-danger">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-default hover-up w-100" type="submit" name="login"> Reset Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
