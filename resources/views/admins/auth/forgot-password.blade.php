@extends('admins.auth.layouts.master')
@section('title', 'User Forgot-Password')
@section('content')
    <p class="login-box-msg">Admin Forgot-Password</p>
    <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link
        that will allow you to choose a new one.
    </p>
    <form action="{{ route('admin.password.email') }}" method="POST">
        @csrf
        <x-auth-session-status class="mb-4 text-success" :status="session('status')" />

        <label for="username">Email</label>
        <div class="input-group mb-3">
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                placeholder="email" required>
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
        <div class="row">
            <!-- /.col -->
            <div class="col-6 mx-auto">
                <button type="submit" wire:click="submit" wire:loading.attr="disabled"
                    class="btn btn-primary btn-block d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-window-restore mx-1"></i> Email Password Reset Link
                </button>
            </div>
            <!-- /.col -->
        </div>
    </form>
@endsection
