@extends('admins.layouts.master', ['titlePage' => 'State'])
@section('states_active', 'active')
@section('title', 'State')
@section('content')

    <div class="col-md-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Update {{ $state->name }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.states.update', $state->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" name="name" value="{{ old('name', $state->name) }}"
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
