@extends('layouts.dashboard')
@section('header')
    <script>
        function copyToClipboard(id) {
            document.getElementById(id).select();
            document.execCommand('copy');
            alert(document.getElementById(id).value);
        }
    </script>
@endsection
@section('title','Dashboard')
@section('content')

<div class="container" style="height:100vh">
        <?php
                $user = Auth::user();
                if($user['role_as'] == 'admin'){
        ?>

            <div class="container" style="min-height: 100vh; width:90%;">
                <div class="jumbotron">
                    <h3 class="text-center">Upcoming Meetings</h3>
                    <table class="table">
                        <tr>
                            <th>Meeting ID</th>
                            <th>Meeting Name</th>
                            <th>Description</th>
                            <th>Join Via</th>
                            <th></th>
                        </tr>

                        @foreach ($meetings as $meeting)
                        <tr>
                            <td>{{$meeting->meeting_id}}</td>
                            <td>{{$meeting->meeting_name}}</td>
                            <td>{{$meeting->meeting_description}}</td>
                            <td><a class="btn btn-info btn-sm" href="/join-details/{{$meeting->meeting_id}}">Join</a></td>
                            <td><a class="btn btn-success btn-sm" href="/send-meeting-notifications/{{$meeting->meeting_id}}">Send Invitations</a></td>
                            <td><a class="btn btn-warning btn-sm" onclick="copyToClipboard('{{$meeting->meeting_id}}')">Invite Link</a></td>
                            <td><input type="hidden" id="{{$meeting->meeting_id}}" value="{{getenv('APP_URL')}}:8000/join-via-link/{{$meeting->meeting_id}}"></td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>

<!-- Button trigger modal -->
<button
  type="button"
  class="btn btn-primary"
  data-mdb-toggle="modal"
  data-mdb-target="#exampleModal"
>
  Launch demo modal
</button>

<!-- Modal -->
<div
  class="modal fade"
  id="exampleModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button
          type="button"
          class="btn-close"
          data-mdb-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
      <div class="modal-body">...</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">
          Close
        </button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


        <?php
                }else if($user['role_as'] == 'member'){
        ?>
                    <h1 class="text-center cyan-text pt-5 mb-3">Only Admins have the permission to access this page</h1>
        <?php
                }
        ?>
</div>


@endsection
