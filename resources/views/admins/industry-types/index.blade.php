@extends('admins.layouts.master', ['titlePage' => 'Industry Types'])
@section('industry-types_active', 'active')
@section('title', 'Industry Types')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.industry-types.create') }}" class="btn btn-md btn-primary"><i
                            class="fa-solid fa-square-plus"></i>
                        Create</a>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
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
                                                'name' => 'industry-types',
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
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
