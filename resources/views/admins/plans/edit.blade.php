@extends('admins.layouts.master', ['titlePage' => 'Plan'])
@section('plans_active', 'active')
@section('title', 'Plan')
@section('content')

    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Update {{ $plan->name }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.plans.update', $plan->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Label</label>
                                <input type="text" name="label" value="{{ old('label', $plan->label) }}"
                                    class="form-control {{ $errors->has('label') ? 'is-invalid' : '' }}"
                                    id="exampleInputlabel" placeholder="Enter label">
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('label')" />

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Price</label>
                                <input type="text" name="price" value="{{ old('price', $plan->price) }}"
                                    class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                                    id="exampleInputprice" placeholder="Enter price">
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('price')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Job Limit</label>
                                <input type="text" name="job_limit" value="{{ old('job_limit', $plan->job_limit) }}"
                                    class="form-control {{ $errors->has('job_limit') ? 'is-invalid' : '' }}"
                                    id="exampleInputjob_limit" placeholder="Enter job limit">
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('job_limit')" />

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Featured Job Limit</label>
                                <input type="text" name="featured_job_limit"
                                    value="{{ old('featured_job_limit', $plan->featured_job_limit) }}"
                                    class="form-control {{ $errors->has('featured_job_limit') ? 'is-invalid' : '' }}"
                                    id="exampleInputfeatured_job_limit" placeholder="Enter featured job limit">
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('featured_job_limit')" />

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Highlight Job Limit</label>
                                <input type="text" name="highlight_job_limit"
                                    value="{{ old('highlight_job_limit', $plan->highlight_job_limit) }}"
                                    class="form-control {{ $errors->has('highlight_job_limit') ? 'is-invalid' : '' }}"
                                    id="exampleInputhighlight_job_limit" placeholder="Enter featured job limit">
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('highlight_job_limit')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Profile Verified</label>
                                <select name="profile_verified"
                                    class="custom-select {{ $errors->has('profile_verified') ? 'is-invalid' : '' }}">
                                    <option selected>Select Options</option>
                                    <option @if (old('profile_verified', $plan->profile_verified) == 1) selected @endif value="1">Yes</option>
                                    <option @if (old('profile_verified', $plan->profile_verified) == 0) selected @endif value="0">No</option>
                                </select>
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('profile_verified')" />

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Recommended</label>
                                <select name="recommended"
                                    class="custom-select {{ $errors->has('recommended', $plan->recommended) ? 'is-invalid' : '' }}">
                                    <option selected>Select Options</option>
                                    <option @if (old('recommended', $plan->recommended) == 1) selected @endif value="1">Yes</option>
                                    <option @if (old('recommended', $plan->recommended) == 0) selected @endif value="0">No</option>
                                </select>
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('recommended')" />

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Show Packege frontend Show</label>
                                <select name="frontend_show"
                                    class="custom-select {{ $errors->has('frontend_show') ? 'is-invalid' : '' }}">
                                    <option selected>Select Options</option>
                                    <option @if (old('frontend_show', $plan->frontend_show) == 1) selected @endif value="1">Yes</option>
                                    <option @if (old('frontend_show', $plan->frontend_show) == 0) selected @endif value="0">No</option>
                                </select>
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('frontend_show')" />
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Show At Home</label>
                                <select name="show_home"
                                    class="custom-select {{ $errors->has('show_home') ? 'is-invalid' : '' }}">
                                    <option selected>Select Options</option>
                                    <option @if (old('show_home', $plan->show_home) == 1) selected @endif value="1">Yes</option>
                                    <option @if (old('show_home', $plan->show_home) == 0) selected @endif value="0">No</option>
                                </select>
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('show_home')" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
