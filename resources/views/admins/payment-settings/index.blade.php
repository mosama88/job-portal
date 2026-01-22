@extends('admins.layouts.master', ['titlePage' => 'Payment Setting'])
@section('payment-settings_active', 'active')
@section('title', 'Payment Setting')
@push('css')
@endpush
@section('content')

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fa-regular fa-credit-card"></i>
                Payment Settings
            </h3>
        </div>
        <div class="card-body">
            <h4> All Gateway Settings</h4>
            <div class="row">
                <div class="col-3 col-sm-2">
                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home"
                            role="tab" aria-controls="vert-tabs-home" aria-selected="true">Paypal</a>
                        <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile"
                            role="tab" aria-controls="vert-tabs-profile" aria-selected="false">Strip</a>
                        <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages"
                            role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Razor Pay</a>
                    </div>
                </div>
                <div class="col-9 col-sm-10">
                    <div class="tab-content" id="vert-tabs-tabContent">
                        @include('admins.payment-settings.sections.paypal')
                        @include('admins.payment-settings.sections.strip')
                        @include('admins.payment-settings.sections.razor')
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card -->
    </div>
@endsection
@push('js')
@endpush
