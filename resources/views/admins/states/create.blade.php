@extends('admins.layouts.master', ['titlePage' => 'State'])
@section('states_active', 'active')
@section('title', 'State')
@section('content')

    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create States</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="{{ route('admin.states.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" id="exampleInputName"
                            placeholder="Enter Name">
                        <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />

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
