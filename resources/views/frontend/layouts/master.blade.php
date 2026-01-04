<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.layouts.head')
</head>

<body>

    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center"><img src="{{ asset('frontend') }}/assets/imgs/template/loading.gif"
                        alt="joblist"></div>
            </div>
        </div>
    </div>
    @include('frontend.layouts.navbar')

    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-content-area">
                <div class="perfect-scroll">
                    <div class="mobile-search mobile-header-border mb-30">
                        <form action="#">
                            <input type="text" placeholder="Search…"><i class="fi-rr-search"></i>
                        </form>
                    </div>
                    <div class="mobile-menu-wrap mobile-header-border">
                        <!-- mobile menu start-->
                        <nav>
                            <ul class="mobile-menu font-heading">
                                <li class="has-children"><a class="active" href="index.html">Home</a>
                                    <ul class="sub-menu">
                                        <li><a href="index.html">Home 1</a></li>
                                        <li><a href="index-2.html">Home 2</a></li>
                                        <li><a href="index-3.html">Home 3</a></li>
                                        <li><a href="index-4.html">Home 4</a></li>
                                        <li><a href="index-5.html">Home 5</a></li>
                                        <li><a href="index-6.html">Home 6</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href="jobs-grid.html">Find a Job</a>
                                    <ul class="sub-menu">
                                        <li><a href="jobs-grid.html">Jobs Grid</a></li>
                                        <li><a href="jobs-list.html">Jobs List</a></li>
                                        <li><a href="job-details.html">Jobs Details </a></li>
                                        <li><a href="job-details-2.html">Jobs Details 2 </a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href="companies-grid.html">Recruiters</a>
                                    <ul class="sub-menu">
                                        <li><a href="companies-grid.html">Recruiters</a></li>
                                        <li><a href="company-details.html">Company Details</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href="candidates-grid.html">Candidates</a>
                                    <ul class="sub-menu">
                                        <li><a href="candidates-grid.html">Candidates Grid</a></li>
                                        <li><a href="candidate-details.html">Candidate Details</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href="blog-grid.html">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="page-about.html">About Us</a></li>
                                        <li><a href="page-pricing.html">Pricing Plan</a></li>
                                        <li><a href="page-contact.html">Contact Us</a></li>
                                        <li><a href="page-register.html">Register</a></li>
                                        <li><a href="page-signin.html">Signin</a></li>
                                        <li><a href="page-reset-password.html">Reset Password</a></li>
                                        <li><a href="page-content-protected.html">Content Protected</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href="blog-grid.html">Blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-grid.html">Blog Grid</a></li>
                                        <li><a href="blog-grid-2.html">Blog Grid 2</a></li>
                                        <li><a href="blog-details.html">Blog Single</a></li>
                                    </ul>
                                </li>
                                <li><a href="http://wp.alithemes.com/html/joblist/demos/dashboard"
                                        target="_blank">Dashboard</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="mobile-account">
                        <h6 class="mb-10">Your Account</h6>
                        <ul class="mobile-menu font-heading">
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Work Preferences</a></li>
                            <li><a href="#">Account Settings</a></li>
                            <li><a href="#">Go Pro</a></li>
                            <li><a href="page-signin.html">Sign Out</a></li>
                        </ul>
                    </div>
                    <div class="site-copyright">Copyright 2022 &copy; joblist. <br>Designed by AliThemes.</div>
                </div>
            </div>
        </div>
    </div>

    <div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-content-area">
                <div class="perfect-scroll">
                    <div class="mobile-search mobile-header-border mb-30">
                        <form action="#">
                            <input type="text" placeholder="Search…"><i class="fi-rr-search"></i>
                        </form>
                    </div>
                    <div class="mobile-menu-wrap mobile-header-border">
                        <!-- mobile menu start-->
                        <nav>
                            <ul class="mobile-menu font-heading">
                                <li class="has-children"><a class="active" href="index.html">Home</a>
                                    <ul class="sub-menu">
                                        <li><a href="index.html">Home 1</a></li>
                                        <li><a href="index-2.html">Home 2</a></li>
                                        <li><a href="index-3.html">Home 3</a></li>
                                        <li><a href="index-4.html">Home 4</a></li>
                                        <li><a href="index-5.html">Home 5</a></li>
                                        <li><a href="index-6.html">Home 6</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href="jobs-grid.html">Find a Job</a>
                                    <ul class="sub-menu">
                                        <li><a href="jobs-grid.html">Jobs Grid</a></li>
                                        <li><a href="jobs-list.html">Jobs List</a></li>
                                        <li><a href="job-details.html">Jobs Details </a></li>
                                        <li><a href="job-details-2.html">Jobs Details 2 </a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href="companies-grid.html">Recruiters</a>
                                    <ul class="sub-menu">
                                        <li><a href="companies-grid.html">Recruiters</a></li>
                                        <li><a href="company-details.html">Company Details</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href="candidates-grid.html">Candidates</a>
                                    <ul class="sub-menu">
                                        <li><a href="candidates-grid.html">Candidates Grid</a></li>
                                        <li><a href="candidate-details.html">Candidate Details</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href="blog-grid.html">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="page-about.html">About Us</a></li>
                                        <li><a href="page-pricing.html">Pricing Plan</a></li>
                                        <li><a href="page-contact.html">Contact Us</a></li>
                                        <li><a href="page-register.html">Register</a></li>
                                        <li><a href="page-signin.html">Signin</a></li>
                                        <li><a href="page-reset-password.html">Reset Password</a></li>
                                        <li><a href="page-content-protected.html">Content Protected</a></li>
                                    </ul>
                                </li>
                                <li class="has-children"><a href="blog-grid.html">Blog</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-grid.html">Blog Grid</a></li>
                                        <li><a href="blog-grid-2.html">Blog Grid 2</a></li>
                                        <li><a href="blog-details.html">Blog Single</a></li>
                                    </ul>
                                </li>
                                <li><a href="http://wp.alithemes.com/html/joblist/demos/dashboard"
                                        target="_blank">Dashboard</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="mobile-account">
                        <h6 class="mb-10">Your Account</h6>
                        <ul class="mobile-menu font-heading">
                            <li><a href="#">Profile</a></li>
                            <li><a href="#">Work Preferences</a></li>
                            <li><a href="#">Account Settings</a></li>
                            <li><a href="#">Go Pro</a></li>
                            <li><a href="page-signin.html">Sign Out</a></li>
                        </ul>
                    </div>
                    <div class="site-copyright">Copyright 2022 &copy; joblist. <br>Designed by AliThemes.</div>
                </div>
            </div>
        </div>
    </div>

    <main class="main">

        @yield('content')

    </main>

    <section class="section-box subscription_box">
        <div class="container">
            <div class="box-newsletter">
                <div class="newsletter_textarea">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="text-md-newsletter">Subscribe our newsletter</h2>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-form-newsletter">
                                <form class="form-newsletter">
                                    <input class="input-newsletter" type="text" value=""
                                        placeholder="Enter your email here">
                                    <button class="btn btn-default font-heading">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.layouts.footer')
    @include('frontend.layouts.scripts')


</body>

</html>
