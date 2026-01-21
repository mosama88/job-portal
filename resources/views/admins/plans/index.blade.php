@extends('admins.layouts.master', ['titlePage' => 'Plan'])
@section('plans_active', 'active')
@section('title', 'Plan')
@push('css')
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/dist/css/price-plan.css">
@endpush
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.plans.create') }}" class="btn btn-md btn-primary"><i
                            class="fa-solid fa-square-plus"></i>
                        Create</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">



                    <!-- Content Header -->
                    <div class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-12 text-center">
                                    <h1 class="m-0">Choose the Perfect Plan for Your Needs</h1>
                                    <p class="lead">All plans include our core features. Select the one that
                                        fits your requirements.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main content -->
                    <div class="container-fluid">
                        <!-- Pricing cards -->
                        <div class="row">
                            <!-- Developer Plan -->
                            <div class="col-md-4">
                                <div class="card pricing-card developer">
                                    <div class="pricing-card-header">
                                        <h3 class="pricing-card-title">DEVELOPER</h3>
                                        <div class="price">$19<span>/month</span></div>
                                        <p class="mb-0">Perfect for individual developers</p>
                                    </div>
                                    <div class="card-body pricing-features">
                                        <div class="feature-item">
                                            <i class="fas fa-check"></i>
                                            <span>1 user agent</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="fas fa-check"></i>
                                            <span>Core features</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="fas fa-check"></i>
                                            <span>1GB storage</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="fas fa-check"></i>
                                            <span>2 Custom domains</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="fas fa-times"></i>
                                            <span>Live Support</span>
                                        </div>
                                        <button class="btn btn-subscribe btn-developer mt-4">
                                            <i class="fas fa-shopping-cart mr-2"></i>SUBSCRIBE →
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Small Team Plan -->
                            <div class="col-md-4">
                                <div class="card pricing-card team">
                                    <div class="badge-popular">MOST POPULAR</div>
                                    <div class="pricing-card-header">
                                        <h3 class="pricing-card-title">SMALL TEAM</h3>
                                        <div class="price">$60<span>/month</span></div>
                                        <p class="mb-0">Ideal for growing teams</p>
                                    </div>
                                    <div class="card-body pricing-features">
                                        <div class="feature-item">
                                            <i class="fas fa-check"></i>
                                            <span>5 user agents</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="fas fa-check"></i>
                                            <span>Core features</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="fas fa-check"></i>
                                            <span>10GB storage</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="fas fa-check"></i>
                                            <span>10 Custom domains</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="fas fa-check"></i>
                                            <span>24/7 Support</span>
                                        </div>
                                        <button class="btn btn-subscribe btn-team mt-4">
                                            <i class="fas fa-shopping-cart mr-2"></i>SUBSCRIBE →
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Enterprise Plan -->
                            <div class="col-md-4">
                                <div class="card pricing-card enterprise">
                                    <div class="pricing-card-header">
                                        <h3 class="pricing-card-title">ENTERPRISE</h3>
                                        <div class="price">$499<span>/month</span></div>
                                        <p class="mb-0">For large organizations</p>
                                    </div>
                                    <div class="card-body pricing-features">
                                        <div class="feature-item">
                                            <i class="fas fa-infinity"></i>
                                            <span>Unlimited user agents</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="fas fa-check"></i>
                                            <span>Core features</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="fas fa-check"></i>
                                            <span>8TB storage</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="fas fa-infinity"></i>
                                            <span>Unlimited custom domains</span>
                                        </div>
                                        <div class="feature-item">
                                            <i class="fas fa-check"></i>
                                            <span>Lifetime Support</span>
                                        </div>
                                        <button class="btn btn-subscribe btn-enterprise mt-4">
                                            <i class="fas fa-shopping-cart mr-2"></i>SUBSCRIBE →
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional info -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="callout callout-info">
                                    <h5><i class="fas fa-info-circle mr-2"></i>Note:</h5>
                                    <p>All plans come with our core features including dashboard access,
                                        basic analytics, and API access. You can upgrade or downgrade your
                                        plan at any time. All prices are in USD.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.card-body -->
            <!-- /.card -->
        </div>
    </div>
@endsection
@push('js')
@endpush
