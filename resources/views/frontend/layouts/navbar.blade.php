<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo"><a class="d-flex" href="index.html"><img alt="joblist"
                            src="{{ asset('frontend') }}/assets/imgs/template/logo.png"></a></div>
            </div>
            <div class="header-nav">
                <nav class="nav-main-menu">
                    <ul class="main-menu">
                        <li class="has-children"><a class="active" href="{{ url('/') }}">Home</a></li>
                        <li class="has-children"><a href="jobs-list.html">Find a Job</a></li>
                        <li class="has-children"><a href="companies-grid.html">Recruiters</a></li>
                        <li class="has-children"><a href="candidates-grid.html">Candidates</a></li>
                        <li class="has-children"><a href="blog-grid.html">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="page-about.html">About Us</a></li>
                                <li><a href="page-pricing.html">Pricing Plan</a></li>
                                <li><a href="page-contact.html">Contact Us</a></li>
                                <li><a href="page-register.html">Register</a></li>
                                <li><a href="page-signin.html">Signin</a></li>
                                <li><a href="page-reset-password.html">Reset Password</a></li>
                                <li><a href="blog-details.html">Blog Single</a></li>
                            </ul>
                        </li>
                        <li class="has-children"><a href="blog-grid.html">Blog</a></li>
                    </ul>
                </nav>
                <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span
                        class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
            </div>
            <div class="header-right">
                <div class="block-signin">





                    @guest
                        <a class="btn btn-default btn-shadow ml-40 hover-up" href="{{ route('login') }}">Sign in</a>
                    @endguest
                    @auth
                        <div class="nav-item dropdown">

                            {{-- زر فتح القائمة --}}
                            <button
                                class="nav-link dropdown-toggle d-flex align-items-center btn btn-link text-decoration-none"
                                type="button" data-bs-toggle="dropdown" aria-expanded="false">

                                <div class="user-info me-2 text-end">
                                    <span class="user-name d-block fw-semibold">
                                        {{ auth()->user()->name }}
                                    </span>
                                    <small class="text-muted">
                                        {{ auth()->user()->role }}
                                    </small>
                                </div>

                                <div class="user-avatar">
                                    @if (auth()->user()->avatar)
                                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="rounded-circle"
                                            width="32" height="32" alt="Avatar">
                                    @else
                                        <div class="avatar-placeholder rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                            style="width: 32px; height: 32px;">
                                            {{ mb_substr(auth()->user()->name, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                            </button>

                            {{-- القائمة --}}
                            <ul class="dropdown-menu dropdown-menu-end shadow" data-bs-auto-close="true">

                                <li class="px-3 py-2">
                                    <div class="fw-semibold">
                                        {{ auth()->user()->name }}
                                    </div>
                                    <small class="text-muted">
                                        {{ auth()->user()->email }}
                                    </small>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="{{ route('candidate.dashboard') }}">
                                        <i class="bi bi-person me-2"></i>
                                        Profile
                                    </a>
                                </li>

                                <li>
                                    <a class="dropdown-item d-flex align-items-center" href="javascript:void(0)">
                                        <i class="bi bi-gear me-2"></i>
                                        Settings
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item d-flex align-items-center text-danger">
                                            <i class="bi bi-box-arrow-right me-2"></i>
                                            Logout
                                        </button>
                                    </form>
                                </li>

                            </ul>
                        </div>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</header>
