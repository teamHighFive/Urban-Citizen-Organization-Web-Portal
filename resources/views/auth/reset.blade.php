@extends('layouts.main')

@section('title','Reset')
@section('header')
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
        alert(msg);
        }



        function resetPass(){
            pass = document.getElementById("password").value;
            passC = document.getElementById("password-confirm").value;

            err = document.getElementById("error");

            if(pass.length >= 8){
                if(pass == passC){
                    err.innerHTML = "";
                    document.getElementById("resetButton").disabled = false;
                }else{
                    //Error
                    err.innerHTML = "Passwords does not match";
                    document.getElementById("resetButton").disabled = true;
                }
            }else{
                //Error
                err.innerHTML = "Password must contain at least 8 characters"
                document.getElementById("resetButton").disabled = true;

            }


        }

        
    </script>
@endsection
@section('content')
@if(isset($userId) && isset($otpCorrect))
<div class="container" style="height:100vh">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="/reset-pwd">
                        @csrf

                        <input type="hidden" name="userId" value="{{ $userId }}">

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input onkeyup="resetPass()"  id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div  style="color:red;text-align:center" id="error"></div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                
                                <button type="submit" id="resetButton" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
