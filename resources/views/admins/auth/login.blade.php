    @extends('admins.auth.layouts.master')
    @section('title', 'Admin Login')
    @section('content')
        <p class="login-box-msg">Sign in as an <b>Admin</b> to start your session</p>

        <form action="{{ route('admin.login') }}" method="POST">
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
                        <a href="{{ route('admin.password.request') }}">I forgot my password</a>
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
    @endsection
