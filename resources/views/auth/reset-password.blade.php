@extends('admins.auth.layouts.master')
@section('title', 'User Reset-Password')
@section('content')
    <p class="login-box-msg">User Reset-Password</p>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf
        <x-auth-session-status class="mb-4 text-success" :status="session('status')" />
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <label for="username">Email</label>
        <div class="input-group mb-3">
            <input type="email" id="email" name="email" value="{{ old('email', $request->email) }}"
                class="form-control @error('email') is-invalid @enderror" placeholder="email@domain.com" required>
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

        <label for="password">Confirm Password</label>
        <div class="input-group mb-3">
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="form-control @error('password_confirmation') is-invalid @enderror"
                placeholder="password_confirmation">
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
            @error('password_confirmation')
                <span class="invalid-feedback d-block text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row">
            <!-- /.col -->
            <div class="col-6 mx-auto">
                <button type="submit" wire:click="submit" wire:loading.attr="disabled"
                    class="btn btn-primary btn-block d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-window-restore mx-1"></i> Reset Password
                </button>
            </div>
            <!-- /.col -->
        </div>
    </form>
@endsection
