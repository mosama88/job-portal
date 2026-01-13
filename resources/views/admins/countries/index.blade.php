@extends('admins.layouts.master', ['titlePage' => 'Country'])
@section('countries_active', 'active')
@section('title', 'Country')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.countries.create') }}" class="btn btn-md btn-primary"><i
                            class="fa-solid fa-square-plus"></i>
                        Create</a>

                    <div class="card-tools">
                        <form action="{{ route('admin.countries.index') }}" method="GET" class="d-flex align-items-center">

                            <div class="input-group" style="width: 600px;">
                                <div class="input-group-prepend">
                                    <a href="javascript:void(0)" onclick="resetFilters()" class="input-group-text">
                                        <i class="fas fa-redo mx-1"></i> Reset
                                    </a>
                                </div>
                                <input type="text" class="form-control" name="name_search"
                                    placeholder="Search Country types..." value="{{ request('name_search') }}">
                                <div class="input-group-append">
                                    <button type="submit" class="input-group-text bg-primary"> <i
                                            class="fas fa-search"></i></button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $info)
                                <tr>
                                    <td>{{ $info->id }}</td>
                                    <td>{{ $info->name }}</td>
                                    <td>{{ $info->slug }}</td>
                                    <td>
                                        <li class="list-inline-item">
                                            @include('admins.partials.actions', [
                                                'name' => 'countries',
                                                'name_id' => $info->id,
                                            ])
                                        </li>
                                    </td>
                                </tr>
                            @empty
                                No result Fount
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class=" mx-2 d-flex justify-content-end mt-3">
                    {{ $data->appends(request()->query())->links() }}
                </div>
            </div>

            <!-- /.card-body -->
            <!-- /.card -->
        </div>
    </div>
@endsection
