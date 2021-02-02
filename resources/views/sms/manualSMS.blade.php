@extends('layouts.main')

@section('title','SMS')
@section('header')
    <!-- <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
        alert(msg);
        }
    </script> -->
@endsection
@section('content')
    <div class="container" style="min-height: 100VH">
        <div class="jumbotron">
            <h3 class="text-center">SMS Gateway</h3>
            <h4 class="text-primary text-right">Credit Balance : 3125.00 LKR</h4>
            <div class="row">
                <div class="col-md-8 jumbotron">
                    <table class="table">
                        <tr>
                            <th>From</th>
                            <th>To</th>
                            <th>Message</th>
                            <th>Date</th>
                        </tr>

                        <tr>
                            <td>0719274111</td>
                            <td>Mora-FitB18</td>
                            <td>This is the message</td>
                            <td>2021-02-02 17:55:55</td>
                        </tr>
                        <tr>
                            <td>0719274111</td>
                            <td>Mora-FitB18</td>
                            <td>This is the message</td>
                            <td>2021-02-02 17:55:55</td>
                        </tr>
                        <tr>
                            <td>0719274111</td>
                            <td>Mora-FitB18</td>
                            <td>This is the message</td>
                            <td>2021-02-02 17:55:55</td>
                        </tr>
                        <tr>
                            <td>0719274111</td>
                            <td>Mora-FitB18</td>
                            <td>This is the message</td>
                            <td>2021-02-02 17:55:55</td>
                        </tr>

                    </table>
                </div>
                <div class="col-md-4 jumbotron">
                    <form action="/send-sms" method="POST">
                            {{csrf_field()}}
                            <!-- TODO - set correct sender ID dynamically -->
                            <input type="text" name="from" class="form-control my-1" value="From : Mora-FitB18" required disabled>
                            <input type="text" name="contact" class="form-control my-1" placeholder="To" required>
                            <textarea name="text" cols="30" rows="2" class="form-control my-1" placeholder="Message" required></textarea>
                            <input type="submit" class="btn btn-primary mt-3" value="Send">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
