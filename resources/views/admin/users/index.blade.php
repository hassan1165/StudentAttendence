@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header">Faculty
                        @can('manage-users')
                            <a href="{{ route('admin.users.create') }}"><button class="col-md-2 btn btn-primary float-right">Add Faculty</button></a>
                        @endcan
                    </div>

                    {{--<div class="card-body">--}}
                        {{--@foreach($users as $user)--}}
                            {{--{{ $user->name }} - {{ $user->email }}--}}
                            {{--@endforeach--}}
                    {{--</div>--}}

                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td scope="row">{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ implode(',',$user->roles()->get()->pluck('name')->toArray()) }}</td>
                                    <td>
                                        @can('edit-users')
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="float-left"><button type="button" class="btn btn-primary">Edit</button></a>
                                        @endcan
                                        @can('delete-users')
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="post" class="float-left">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                 <button type="submit" class="btn btn-warning">Delete</button>
                                            </form>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
