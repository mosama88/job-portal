@extends('admins.layouts.master', ['titlePage' => 'State'])
@section('states_active', 'active')
@section('title', 'State')
@push('css')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
@endpush
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
                    <div class="row">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input type="text" name="name" value="{{ old('name', $state->name) }}"
                                    class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                    id="exampleInputName" placeholder="Enter Name">
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="exampleInputName">Country</label>
                                <select name="country_id" class="form-control select2 select2-primary"
                                    data-dropdown-css-class="select2-primary" style="width: 100%;">
                                    <option>-- Select Country --</option>
                                    @forelse ($countries as $country)
                                        <option value="{{ $country->id }}"
                                            @if (old('country_id', $state->country_id) == $country->id) selected @endif>
                                            {{ $country->name }}</option>
                                    @empty
                                        no data else
                                    @endforelse
                                </select>
                                <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />
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
@push('js')
    <!-- Select2 -->
    <script src="{{ asset('admin') }}/assets/plugins/select2/js/select2.full.min.js"></script>
@endpush
