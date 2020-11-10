@extends('layouts.dashboard')

@section('title','Online Conferences')
@section('content')

<div class="container" style="height:auto;min-height: 100vh">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home Page</a>
          <span>/</span>
          <span>Registered Users</span>
        </h4>

      </div>

    </div>
    <!-- Heading -->

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
                               <th>Last Name</th>
                               <th>Phone</th>
                               <th>Email</th>
                               <th>Role</th>
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
                               <td>{{ $item->lname }}</td>
                               <td>{{ $item->contact }}</td>
                               <td>{{ $item->email }}</td>
                               <td>{{ $item->role_as }}</td>
                               <td>
                                   @if($item->isban == '0')
                                        <label class="py-2 px-3 badge btn-primary">Not Banned</label>
                                   @elseif($item->isban == '1')
                                    <label class="py-2 px-3 badge btn-danger">Banned</label>
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

@endsection


