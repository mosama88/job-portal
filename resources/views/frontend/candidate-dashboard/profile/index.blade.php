@extends('frontend.layouts.master')
@section('profile_active', 'active')
@push('css')
    <style>
        .ck-editor__editable {
            min-height: 350px
        }
    </style>
@endpush
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
                        @include('frontend.candidate-dashboard.profile.experience-section')



                        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                            tabindex="0">
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create new Experience</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('candidate.candidate-experiences.store') }}" method="POST" id="addExperienceForm">
                    @csrf
                    <input readonly type="hidden" name="candidate_id" value="{{ auth()->user()->id }}">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Company *</label>
                                    <input class="form-control {{ $errors->has('company') ? 'is-invalid' : '' }}"
                                        type="text" name="company" value="{{ old('company') }}">
                                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('company')" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Department *</label>
                                    <input class="form-control {{ $errors->has('department') ? 'is-invalid' : '' }}"
                                        type="text" name="department" value="{{ old('department') }}">
                                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('department')" />
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Designation *</label>
                                    <input class="form-control {{ $errors->has('designation') ? 'is-invalid' : '' }}"
                                        type="text" name="designation" value="{{ old('designation') }}">
                                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('designation')" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Start Date *</label>
                                    <input class="form-control {{ $errors->has('start') ? 'is-invalid' : '' }} datepicker"
                                        type="text" name="start" value="{{ old('start') }}">
                                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('start')" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">End Date *</label>
                                    <input class="form-control {{ $errors->has('end') ? 'is-invalid' : '' }} datepicker"
                                        type="text" name="end" value="{{ old('end') }}">
                                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('end')" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input name="currently_working" class="form-check-input" type="checkbox"
                                        value="" id="checkDefault">
                                    <label class="form-check-label" for="checkDefault">
                                        Currently Working
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted mb-10">Responsibilities *</label>
                                    <textarea cols="30" rows="10"
                                        class="form-control {{ $errors->has('responsibilities') ? 'is-invalid' : '' }}" name="responsibilities">
                                        {{ old('responsibilities') }}
                                    </textarea>
                                    <x-input-error class="mt-2 text-danger" :messages="$errors->get('responsibilities')" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="$('#addExperienceForm').submit()">Add
                            Experience</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/40.2.0/classic/ckeditor.js"></script>


    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))

            .catch(error => {
                console.error('Error initializing CKEditor 5:', error);
            });
    </script>

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
