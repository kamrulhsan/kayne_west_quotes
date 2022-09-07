@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" id="loginForm">
                        
                        <div class="row mb-3">
                            <label for="user_login_email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="user_login_email" type="email" class="form-control" name="user_login_email" value="{{ old('user_login_email') }}" required autocomplete="email" autofocus>

                                
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="user_login_password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="user_login_password" type="password" class="form-control" name="user_login_password" required >

                               
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" class="btn btn-primary" id="login_button">
                                    {{ __('Login') }}
                                </button>

                               
                                    <a class="btn btn-link" href="/register">
                                        {{ __('New Here? Sign Up') }}
                                    
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $("#login_button").on("click",login);
    function login(){
        $.ajax({
             
             method: "post",
             url: "http://localhost:8000/api/user_login_check",
             datatype: "html",
             data: $('#loginForm').serialize(),
             success: function(data){
                localStorage.setItem("authUser",JSON. stringify(data));
                // alert('Login Successful');
                location.href="quotes_view"
               
                console.log(data);
            

             },
             error: function(returnval) {}
    });
    }
</script>
@endsection
