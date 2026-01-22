@extends('frontend.layouts.master')
@section('dashboard_active', 'active')
@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Checkout</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box mt-90">
        <div class="container">

            <div class="max-width-price">
                <div class="block-pricing mt-70">
                    <div class="row">
                        <div class="col-md-8 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <h5 class="">Choose Your Payment Method</h5>
                            <div class="row pt-40">
                                <div class="col-md-3">
                                    <a href=""><img class=""
                                            style="width: 200px;border-radius: 5px;border: 3px solid #1ca774;"
                                            src="https://placehold.co/600x400" alt=""></a>
                                </div>
                                <div class="col-md-3">
                                    <a href=""><img class=""
                                            style="width: 200px;border-radius: 5px;border: 3px solid #1ca774;"
                                            src="https://placehold.co/600x400" alt=""></a>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                            <div class="box-pricing-item">
                                @if ($price->recommended == 1)
                                    <small
                                        class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-success-emphasis bg-success-subtle border border-success-subtle rounded-2">Recommended</small>
                                @else
                                    <div class="d-inline-flex mb-3 px-2 py-1 fw-semibold text-success-emphasis mt-3">
                                    </div>
                                @endif
                                <h3>{{ $price->label }}</h3>
                                <div class="box-info-price"><span
                                        class="text-price color-brand-2">${{ $price->price }}</span><span
                                        class="text-month">/month</span></div>
                                <div class="border-bottom mb-30">
                                    <p class="text-desc-package font-sm color-text-paragraph mb-30">For most
                                        businesses that want to
                                        optimize web queries</p>
                                </div>
                                <ul class="list-package-feature">
                                    <li>{{ $price->job_limit }} Job Limit</li>
                                    <li>{{ $price->featured_job_limit }} &amp; Featured Job Limit</li>
                                    <li>{{ $price->highlight_job_limit }} Highlight Job Post</li>
                                    <li>
                                        @if ($price->profile_verified == 1)
                                            Verify Company
                                        @else
                                            <strike>Verify Company</strike>
                                        @endif

                                    </li>
                                </ul>
                                <div><a class="btn btn-border" href="#">Choose plan</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
