@extends('layouts.dashboard')

@section('title','Registered Users')
@section('content')

<div class="container" style="height:auto;min-height: 100vh">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="card text-body bg-info mb-3 mt-2">
            <div class="card-header font-weight-bold">
                <h2><b>Registered Users</b></h2>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead class="color-block-dark indigo lighten-1-color-dark z-depth-2 white-text">
                                <tr>
                                    <th>Id</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>isban/unban</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Payments History</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->fname }}</td>
                                    <td>{{ $item->mname }}</td>
                                    <td>{{ $item->lname }}</td>
                                    <td>{{ $item->contact }}</td>
                                    <td>{{ $item->email }}</td>
                                    <th>{{ $item->role_as }}</th>

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
                                    <td><a href="/view-payments/{{$item->id}}" class="badge badge-pill btn-primary px-3 py-2">View</a></td>
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


