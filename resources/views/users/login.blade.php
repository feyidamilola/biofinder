@extends('layouts.frontLayout.front_design')

@section('content')
    <div class="container margin-top-120"></div>
    
    <div class="container ">
        @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif
        <div class="col-md-5 col-sm-12 ">
            <h3 class="text-center">login </h3>
            <div class="register ">
              <form class="form-horizontal" method="post" action="#" name="loginForm" id="loginForm" novalidate="novalidate">
                  {{ csrf_field() }}
                    <div class="control-group">
                        <label class="control-label">Email</label>
                        <div class="controls">
                            <input type="email" name="email" id="email">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" name="password" id="password">
                        </div>
                    </div>
                    <div class="control-group">
                        {{-- <label class="control-label">Status</label> --}}
                        <div class="controls">
                            <input type="checkbox" name="remember[]" id="remember"> Remember Me
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="Login" class="btn btn-success">
                    </div>
              </form>
            </div>
        </div>
        <div class="col-md-2">
            <div class="vr">OR</div>
        </div>
        <div class="col-md-5 col-sm-12 ">
            <h3 class="text-center">New to Biofinder? SignUp </h3>
            <div class="register ">
                <form class="form-horizontal" method="post" action="{{url('/login-register')}}" name="registerForm" id="registerForm" novalidate="novalidate">
                    {{ csrf_field() }}
                    <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input type="text" name="name" id="name">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Email Address</label>
                        <div class="controls">
                            <input type="email" name="email" id="email">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password</label>
                        <div class="controls">
                            <input type="password" name="password" id="password">
                        </div>
                    </div>
                    <div class="form-actions">
                        <input type="submit" value="SignUp" class="btn btn-success">
                    </div>
                </form>
            </div>
         
        </div>
    </div>
@endsection
  