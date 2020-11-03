@extends('layouts.main')

@section('title','Archives')
@section('content')
    <div class="container">
        <div class="jumbotron">

            <div>
            <a href="archieves">
                <img alt="LOGO" src="https://images.cdn4.stockunlimited.net/clipart/home-button_1481470.jpg"
                width="50px" height="50px">
            </a>
            </div>

        <h2 style = "font-family:Georgia, serif ;font-weight:600; text-align: center;">
         The Document Warehouse
        </h2>
        <div class="links">
            <button type="submit" name="submit" class="btn btn-light btn-sm"><a href="warehouse">Upload another file</a></button>
        </div>
        <br><br>

<table class="table table-stripped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Document ID</th>
            <th scope="col">Document Name</th>
            <th scope="col">User ID</th>
            <th scope="col">Event Name</th>
            <th scope="col">File</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($upload as $item)
        <tr>
        <tr>
            <th> {{$item->docId}}</th>
            <th> {{$item->docName}}</th>
            <th> {{$item->userId}}</th>
            <th> {{$item->event}}</th>
            <th> {{$item->file}} <br>
            <img src="{{ asset ('uploads/files/' . $item->file) }}" width="100px" height="100px" alt="file"></th>
        </tr>
        @endforeach
    </tbody>
</table>

        </div>
    </div>

</body>
</html>
@endsection
