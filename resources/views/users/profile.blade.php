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
    </div>
    @include('users.sidebar')
    <div class="col-md-9">
      <!-- user -->
        <div class="full-width overflow user-profile">
            <form class="form-horizontal" method="post" action="{{url('/profile')}}" name="profile" id="profile" novalidate="novalidate">{{ csrf_field() }}
                <div class="control-group col-md-12">
                    <div class="col-md-3">
                        <label class="control-label">Name</label>
                    </div>
                    <div class="col-md-9">
                        <div class="controls">
                            <input type="text" name="name" id="name" value="name">
                        </div>
                    </div>
                </div>
                <div class="control-group col-md-12">
                    <div class="col-md-3">
                        <label class="control-label">Phone Number</label>
                    </div>
                    <div class="col-md-9">
                        <div class="controls">
                            <input type="tel" name="phone" id="phone">
                        </div>
                    </div>
                </div>
                <div class="control-group col-md-12">
                    <div class="col-md-3">
                        <label class="control-label">Email Address</label>
                    </div>
                    <div class="col-md-9">
                        <div class="controls">
                            <input type="email" name="email" id="email">
                        </div>
                    </div>
                </div>
                <div class="control-group col-md-12">
                    <div class="col-md-3">
                        <label class="control-label">Address</label>
                    </div>
                    <div class="col-md-9">
                        <div class="controls">
                            <input type="text" name="address" id="address">
                        </div>
                    </div>
                </div>
                    
                <div class="form-actions col-md-12">
                    <input type="submit" value="update" class="btn btn-success">
                </div>
            </form>
        </div>
      <!-- /user -->
    </div>
    
  </div>

@endsection