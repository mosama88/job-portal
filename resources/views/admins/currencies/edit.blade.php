@extends('admins.layouts.master', ['titlePage' => 'Currency'])
@section('currencies_active', 'active')
@section('title', 'Currency')
@section('content')

    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Update {{ $currency->name }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.currencies.update', $currency->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input type="text" name="name" value="{{ old('name', $currency->name) }}"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    id="exampleInputName" placeholder="Enter Name">
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Code</label>
                                <input type="text" name="code" value="{{ old('code', $currency->code) }}"
                                    class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}"
                                    id="exampleInputcode" placeholder="Enter code">
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('code')" />

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
