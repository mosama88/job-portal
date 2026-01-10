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
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Account Setting</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <form action="{{ route('company.profile.company-info') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Logo *</label>
                                            <input class="form-control {{ $errors->has('logo') ? 'is-invalid' : '' }}"
                                                type="file" name="logo">
                                            <x-input-error class="mt-2" :messages="$errors->get('logo')" />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Banner *</label>
                                            <input class="form-control {{ $errors->has('banner') ? 'is-invalid' : '' }}"
                                                type="file" name="banner">
                                            <x-input-error class="mt-2" :messages="$errors->get('banner')" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Company Name *</label>
                                            <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                                type="text" name="name">
                                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Company Bio *</label>
                                            <textarea name="bio" cols="30" rows="10" class="summernote {{ $errors->has('bio') ? 'is-invalid' : '' }}"></textarea>
                                            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Company Vision *</label>
                                            <textarea name="vision" cols="30" rows="10"
                                                class="summernote {{ $errors->has('vision') ? 'is-invalid' : '' }}"></textarea>
                                            <x-input-error class="mt-2" :messages="$errors->get('vision')" />
                                        </div>
                                    </div>
                                </div>

                                <div class="box-button mt-15">
                                    <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                            tabindex="0">
                            <form action="" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Industry Type *</label>
                                            <select class="form-control form-icons select-active" name="industry_type_id"
                                                aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">Industry One</option>
                                                <option value="2">Industry Two</option>
                                                <option value="3">Industry Three</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Organization Type *</label>
                                            <select class="form-control form-icons select-active"
                                                name="organization_type_id" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">Organization One</option>
                                                <option value="2">Organization Two</option>
                                                <option value="3">Organization Three</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Team Size *</label>
                                            <select class="form-control form-icons select-active" name="team_size_id"
                                                aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">Team Size One</option>
                                                <option value="2">Team Size Two</option>
                                                <option value="3">Team Size Three</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Establishemnt Date</label>
                                            <input class="form-control datepicker" type="text"
                                                name="establishemnt_date">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Website</label>
                                            <input class="form-control" type="text" name="website">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Email *</label>
                                            <input class="form-control" type="email" name="email">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Phone *</label>
                                            <input class="form-control" type="text" name="phone">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">Country *</label>
                                            <select class="form-control form-icons select-active" name="industry_type_id"
                                                aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">Country One</option>
                                                <option value="2">Country Two</option>
                                                <option value="3">Country Three</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">State</label>
                                            <select class="form-control form-icons select-active"
                                                name="organization_type_id" aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">State One</option>
                                                <option value="2">State Two</option>
                                                <option value="3">State Three</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group select-style">
                                            <label class="font-sm color-text-mutted mb-10">City</label>
                                            <select class="form-control form-icons select-active" name="city_id"
                                                aria-label="Default select example">
                                                <option selected>Open this select menu</option>
                                                <option value="1">City One</option>
                                                <option value="2">City Two</option>
                                                <option value="3">City Three</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Address</label>
                                            <input class="form-control" type="text" name="phone">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Map Link</label>
                                            <input class="form-control" type="text" name="phone">
                                        </div>
                                    </div>

                                </div>

                                <div class="box-button mt-15">
                                    <button class="btn btn-apply-big font-md font-bold">Save All Changes</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab" tabindex="0">
                            <form action="" method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Username *</label>
                                            <input class="form-control" type="text" name="username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Email *</label>
                                            <input class="form-control" type="email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-5">
                                        <button type="submit" class="btn btn-success mb-3">Save</button>
                                    </div>
                                </div>
                            </form>
                            <hr>
                            <form action="" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Password *</label>
                                            <input class="form-control" type="password" name="password">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="font-sm color-text-mutted mb-10">Confirm Password *</label>
                                            <input class="form-control" type="password" name="password_confirmation">
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-5">
                                        <button type="submit" class="btn btn-success mb-3">Save</button>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
