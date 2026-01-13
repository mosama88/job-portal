@extends('admins.layouts.master', ['titlePage' => 'State'])
@section('states_active', 'active')
@section('title', 'State')
@section('content')


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('admin.states.create') }}" class="btn btn-md btn-primary"><i
                            class="fa-solid fa-square-plus"></i>
                        Create</a>

                    <div class="card-tools">
                        <form action="{{ route('admin.states.index') }}" method="GET" class="d-flex align-items-center">

                            <div class="input-group" style="width: 600px;">
                                <div class="input-group-prepend">
                                    <a href="javascript:void(0)" onclick="resetFilters()" class="input-group-text">
                                        <i class="fas fa-redo mx-1"></i> Reset
                                    </a>
                                </div>
                                <input type="text" class="form-control" name="name_search"
                                    placeholder="Search State Or Country..." value="{{ request('name_search') }}">
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
                                <th>Country</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $info)
                                <tr>
                                    <td>{{ $info->id }}</td>
                                    <td>{{ $info->name }}</td>
                                    <td>{{ $info->country->name }}</td>
                                    <td>
                                        <li class="list-inline-item">
                                            @include('admins.partials.actions', [
                                                'name' => 'states',
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
