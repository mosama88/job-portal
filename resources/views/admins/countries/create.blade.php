@extends('admins.layouts.master', ['titlePage' => 'Country'])
@section('countries_active', 'active')
@section('title', 'Country')
@section('content')

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Country</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.countries.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    id="exampleInputName" placeholder="Enter Name">
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Code</label>
                                <input type="text" name="code" value="{{ old('code') }}"
                                    class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}"
                                    id="exampleInputcode" placeholder="Enter code">
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('code')" />

                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
