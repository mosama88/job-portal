@extends('admins.layouts.master', ['titlePage' => 'Country'])
@section('countries_active', 'active')
@section('title', 'Country')
@section('content')

    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Update {{ $country->name }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.countries.update', $country->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" name="name" value="{{ old('name', $country->name) }}"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="exampleInputName"
                            placeholder="Enter Name">
                        <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />

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
