@extends('layouts.frontLayout.front_design')

@section('content')
<div class="container margin-top-120">
    <div class="col-md-12">
        @if(Session::has('flash_message_error'))
          <div class="alert alert-error alert-block bg-deep-blue">
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
    </div>
    @include('users.sidebar')
    <div class="col-md-9">
      <!-- user -->
        <div class="full-width overflow user-profile">
            <form class="form-horizontal" method="post" action="{{url('/update-password')}}" name="update-password" id="update-password" novalidate="novalidate">
                {{ csrf_field() }}
                <div class="control-group col-md-12">
                    <div class="col-md-3">
                        <label class="control-label">Current Password</label>
                    </div>
                    <div class="col-md-9">
                        <div class="controls">
                            <input type="password" name="currentpassword" id="currentpassword" value="">
                        </div>
                    </div>
                </div>
                <div class="control-group col-md-12">
                    <div class="col-md-3">
                        <label class="control-label">New Password</label>
                    </div>
                    <div class="col-md-9">
                        <div class="controls">
                            <input type="password" name="password" id="password" value="">
                        </div>
                    </div>
                </div>
                <div class="control-group col-md-12">
                    <div class="col-md-3">
                        <label class="control-label">Confirm Password</label>
                    </div>
                    <div class="col-md-9">
                        <div class="controls">
                            <input type="password" name="confirmpassword" id="confirmpassword" value="">
                        </div>
                    </div>
                </div>
                
                    
                <div class="form-actions col-md-12">
                    <input type="submit" value="update password" class="btn btn-success">
                </div>
            </form>
        </div>
      <!-- /user -->
    </div>
    
  </div>

@endsection