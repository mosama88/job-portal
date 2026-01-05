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
                            <button
                                class="nav-link dropdown-toggle d-flex align-items-center btn btn-link text-decoration-none"
                                type="button" data-bs-toggle="dropdown">

                                <div class="user-info me-2">
                                    <span class="user-name d-block fw-semibold">{{ auth()->user()->name }}</span>
                                    <small class="text-muted">{{ ucfirst(auth()->user()->role) }}</small>
                                </div>

                                <div class="user-avatar">
                                    @if (auth()->user()->avatar)
                                        <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="rounded-circle"
                                            width="40" height="40" alt="Avatar">
                                    @else
                                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center"
                                            style="width: 40px; height: 40px;">
                                            {{ mb_substr(auth()->user()->name, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                            </button>

                            <ul class="dropdown-menu dropdown-menu-end shadow">
                                <li class="px-3 py-2">
                                    <div class="fw-semibold">{{ auth()->user()->name }}</div>
                                    <small class="text-muted">{{ auth()->user()->email }}</small>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                {{-- روابط مختلفة حسب الـ role --}}
                                @if (auth()->user()->role === 'candidate')
                                    <li>
                                        <a class="dropdown-item" href="{{ route('candidate.dashboard') }}">
                                            <i class="bi bi-speedometer2 me-2"></i> Dashboard
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a class="dropdown-item" href="{{ route('company.dashboard') }}">
                                            <i class="bi bi-building me-2"></i> Dashboard
                                        </a>
                                    </li>
                                @endif

                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="bi bi-pencil-square me-2"></i> Edit Account
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger w-100 text-start">
                                            <i class="bi bi-box-arrow-right me-2"></i> Logout
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
