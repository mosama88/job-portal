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
                                aria-selected="false">Founding Info</button>
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

                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <form action="{{ route('company.profile.company-info') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        {{-- @if (optional($companyInfo)->getFirstMediaUrl('logo', 'preview'))
                                            <img width="200" height="200"
                                                src="{{ $companyInfo?->getFirstMediaUrl('logo', 'preview') }}"
                                                alt="{{ $companyInfo->name ?? '' }}">
                                        @endif --}}

                                    </div>
                                    <div class="col-md-6">
                                        {{-- @if (optional($companyInfo)->getFirstMediaUrl('banner', 'preview'))
                                            <img width="200" height="200"
                                                src="{{ $companyInfo?->getFirstMediaUrl('banner', 'preview') }}"
                                                alt="{{ $companyInfo->name ?? '' }}">
                                        @endif --}}

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Logo *</label>
                                            <input class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}"
                                                type="file" name="logo">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('logo')" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Banner *</label>
                                            <input class="form-control {{ $errors->has('banner') ? 'is-invalid' : '' }}"
                                                type="file" name="banner">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('banner')" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Company Name *</label>
                                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                type="text" name="name" value="{{ old('name') }}">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Company Bio *</label>
                                            <textarea cols="30" rows="10" class="form-control {{ $errors->has('bio') ? 'is-invalid' : '' }}"
                                                name="bio">{{ old('bio') }}</textarea>
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('bio')" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Company Vision *</label>
                                            <textarea cols="30" rows="10" class="form-control {{ $errors->has('vision') ? 'is-invalid' : '' }}"
                                                name="vision">{{ old('vision') }}</textarea>
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('vision')" />
                                        </div>
                                    </div>
                                </div>

                                <div class="box-button mt-15">
                                    <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            {{-- <form action="{{ route('company.profile.company-founding') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Industry Type *</label>
                                            <select
                                                class="form-control {{ $errors->has('industry_type_id') ? 'is-invalid' : '' }} form-icons select-active"
                                                name="industry_type_id" aria-label="Default select example">
                                                <option value="" selected>Open this select menu</option>
                                                @foreach ($other['industry_types'] as $industry)
                                                    <option @if (old('industry_type_id', $companyInfo->industry_type_id) == $industry->id) selected @endif
                                                        value="{{ $industry->id }}">
                                                        {{ $industry->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('industry_type_id')" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Organization Type *</label>
                                            <select
                                                class="form-control {{ $errors->has('organization_type_id') ? 'is-invalid' : '' }} form-icons select-active"
                                                name="organization_type_id" aria-label="Default select example">
                                                <option value="" selected>Open this select menu</option>
                                                @foreach ($other['organization_types'] as $organization)
                                                    <option @if (old('organization_type_id', $companyInfo->organization_type_id) == $organization->id) selected @endif
                                                        value="{{ $organization->id }}">{{ $organization->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('organization_type_id')" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Team Size *</label>
                                            <select
                                                class="form-control {{ $errors->has('team_size_id') ? 'is-invalid' : '' }} form-icons select-active"
                                                name="team_size_id" aria-label="Default select example">
                                                <option value="" selected>Open this select menu</option>
                                                @foreach ($other['team_sizes'] as $team)
                                                    <option @if (old('team_size_id', $companyInfo->team_size_id) == $team->id) selected @endif
                                                        value="{{ $team->id }}">{{ $team->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('team_size_id')" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Establishemnt Date</label>
                                            <input
                                                class="form-control {{ $errors->has('establishemnt_date') ? 'is-invalid' : '' }} datepicker"
                                                type="text" name="establishemnt_date"
                                                value="{{ old('establishemnt_date', optional($companyInfo->establishemnt_date)->format('Y-m-d')) }}">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('establishemnt_date')" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Website</label>
                                            <input class="form-control {{ $errors->has('website') ? 'is-invalid' : '' }}"
                                                type="text" name="website"
                                                value="{{ old('website', $companyInfo->website) }}">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('website')" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Email *</label>
                                            <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                type="email" name="email"
                                                value="{{ old('email', $companyInfo->email) }}">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('email')" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Phone *</label>
                                            <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                                type="text" name="phone"
                                                value="{{ old('phone', $companyInfo->phone) }}">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('phone')" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Country *</label>
                                            <select
                                                class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }} form-icons select-active"
                                                name="country" id="country" data-current="{{ $companyInfo->country }}"
                                                aria-label="Default select example">
                                                <option value="">Select Country</option>
                                                @foreach ($other['countries'] as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ old('country', $companyInfo->country) == $country->id ? 'selected' : '' }}>
                                                        {{ $country->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('country')" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">State</label>
                                            <select
                                                class="form-control {{ $errors->has('state') ? 'is-invalid' : '' }} form-icons select-active"
                                                name="state" id="state" data-current="{{ $companyInfo->state }}"
                                                data-country="{{ $companyInfo->country }}"
                                                aria-label="Default select example">
                                                <option value="">Select State</option>
                                                <!-- سيتم ملؤها بالـ JavaScript -->
                                            </select>
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('state')" />
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">City</label>
                                            <select
                                                class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }} form-icons select-active"
                                                name="city" id="city" data-current="{{ $companyInfo->city }}"
                                                data-state="{{ $companyInfo->state }}"
                                                aria-label="Default select example">
                                                <option value="">Select City</option>
                                                <!-- سيتم ملؤها بالـ JavaScript -->
                                            </select>
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('city')" />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Address</label>
                                            <input class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}"
                                                type="text" name="address"
                                                value="{{ old('address', $companyInfo->address) }}">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('address')" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Map Link</label>
                                            <input class="form-control {{ $errors->has('map_link') ? 'is-invalid' : '' }}"
                                                type="text" name="map_link"
                                                value="{{ old('map_link', $companyInfo->map_link) }}">
                                            <x-input-error class="mt-2 text-danger" :messages="$errors->get('map_link')" />
                                        </div>
                                    </div>

                                </div>

                                <div class="box-button mt-15">
                                    <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
                                </div>
                            </form> --}}
                        </div>

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
