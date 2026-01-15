@extends('frontend.layouts.master')
@section('profile_active', 'active')
@section('content')
    <section class="section-box mt-75">
        <div class="breacrumb-cover">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <h2 class="mb-20">Dashboard</h2>
                        <ul class="breadcrumbs">
                            <li><a class="home-icon" href="{{ url('/') }}">Home</a></li>
                            <li>Profile</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-box mt-120">
        <div class="container">
            <div class="row">
                @include('frontend.candidate-dashboard.sidebar')
                <div class="col-lg-9 col-md-8 col-sm-12 col-12 mb-50">
                    <ul class="nav nav-pills my-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Company Info</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Profile</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-experience-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-experience" type="button" role="tab"
                                aria-controls="pills-experience" aria-selected="false">Experience & Education</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Account Setting</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="col-4 mx-auto mb-3">
                            @if (session('success') != null)
                                <div class="alert alert-success text-center" id="success-alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>


                        @include('frontend.candidate-dashboard.profile.basic-section')
                        @include('frontend.candidate-dashboard.profile.profile-section')


                        <div class="tab-pane fade" id="pills-experience" role="tabpanel"
                            aria-labelledby="pills-experience-tab" tabindex="0">
                            Experience & Education Content
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab" tabindex="0">
                            {{-- <form action="{{ route('company.profile.company-account') }}" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Name *</label>
                                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                type="text" name="name" value="{{ auth()->user()->name }}">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Email *</label>
                                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                type="email" name="email" value="{{ auth()->user()->email }}">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('email')" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-5">
                                        <button type="submit" class="btn btn-success mb-3">Save</button>
                                    </div>
                                </div>
                            </form> --}}
                            <hr>
                            {{-- <form action="{{ route('company.profile.company-password') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Password *</label>
                                            <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                type="password" name="password">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('password')" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Confirm Password *</label>
                                            <input
                                                class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                                type="password" name="password_confirmation">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('password_confirmation')" />
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-5">
                                        <button type="submit" class="btn btn-success mb-3">Save</button>

                                    </div>
                                </div>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@push('js')
    <script>
        $(document).ready(function() {
            // الحصول على القيم من data attributes
            var currentCountry = $('#country').data('current');
            var currentState = $('#state').data('current');
            var currentCity = $('#city').data('current');
            var stateCountry = $('#state').data('country');
            var cityState = $('#city').data('state');

            // تحميل الولايات إذا كان هناك بلد محفوظ
            if (currentCountry) {
                loadStates(currentCountry, true);
            }

            // عند تغيير البلد
            $('#country').change(function() {
                var countryId = $(this).val();
                loadStates(countryId, false);
            });

            // عند تغيير الولاية
            $('#state').change(function() {
                var stateId = $(this).val();
                loadCities(stateId, false);
            });

            function loadStates(countryId, isInitialLoad = false) {
                $('#state').html('<option value="">Select State</option>');
                $('#city').html('<option value="">Select City</option>');

                if (!countryId) return;

                $.ajax({
                    url: '/admin/get-states/' + countryId,
                    type: 'GET',
                    success: function(data) {
                        var shouldSelectState = isInitialLoad && currentState;

                        $.each(data, function(key, state) {
                            var selected = (shouldSelectState && state.id == currentState) ?
                                'selected' : '';
                            $('#state').append('<option value="' + state.id + '" ' + selected +
                                '>' +
                                state.name + '</option>');
                        });

                        // إذا كان تحميل أولي وكان هناك state محفوظ، قم بتحميل المدن
                        if (shouldSelectState) {
                            loadCities(currentState, true);
                        }
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                    }
                });
            }

            function loadCities(stateId, isInitialLoad = false) {
                $('#city').html('<option value="">Select City</option>');

                if (!stateId) return;

                $.ajax({
                    url: '/admin/get-cities/' + stateId,
                    type: 'GET',
                    success: function(data) {
                        var shouldSelectCity = isInitialLoad && currentCity;

                        $.each(data, function(key, city) {
                            var selected = (shouldSelectCity && city.id == currentCity) ?
                                'selected' : '';
                            $('#city').append('<option value="' + city.id + '" ' + selected +
                                '>' +
                                city.name + '</option>');
                        });
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                    }
                });
            }
        });
    </script>
@endpush
