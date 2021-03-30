@extends('layouts.dashboard')

@section('title','Registered Users')
@section('content')

<div class="container" style="height:auto;min-height: 100vh">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card mb-4 wow fadeIn">
        <div class="card-header font-weight-bold">
            <h2 class="mb-2 mb-sm-0 pt-1">
            <span>Registered Users</span>
            </h2>
        </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Is Verfied</th>
                                    <th>isban/unban</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->fname }}</td>
                                    <td>{{ $item->mname }}</td>
                                    <td>{{ $item->contact }}</td>
                                    <td>{{ $item->email }}</td>
                                    <th>{{ $item->role_as }}</th>
                                    <td>{{ date('M j, Y h:ia',strtotime($item->email_verified_at)) }}</td>
                                    <td>
                                        @if($item->isban == '0')
                                                <label class="badge badge-pill btn-primary px-3 py-2">Not Banned</label>
                                        @elseif($item->isban == '1')
                                            <label class="badge badge-pill btn-danger px-3 py-2">Banned</label>
                                        @endif
                                    </td>
                                    <td>
                                            <a href="{{ url('role-edit/'.$item->id) }}" class="badge badge-pill btn-primary px-3 py-2">EDIT</a>
                                    </td>
                                    <td>
                                            <form action="{{ url('role-delete/'.$item->id) }}" method="post">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                <button type="submit" class="badge badge-pill btn-danger px-3 py-2">DELETE</button>
                                            </form>
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


