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
        <div class="col-md-2"></div>
        <div class="col-md-8 col-sm-12 ">
            
            <div class="register ">
                <form class="form-horizontal" method="post" action="{{url('/checkout')}}" name="checkout" id="checkout" novalidate="novalidate">
                    {{ csrf_field() }}
                    <h3 class="text-center">Delivery Address </h3>
                    <div class="control-group">
                        <label class="control-label">Address</label>
                        <div class="controls">
                            <input type="text" name="address" id="address">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label">Phone Number</label>
                        <div class="controls">
                            <input type="tel" name="phone" id="phone">
                        </div>
                    </div>
                    <h3 class="text-center">Delivery Method </h3>
                    
                    <div class="control-group">
                        <label class="control-label">Phone Number</label>
                        <div class="controls">
                            <input type="tel" name="phone" id="phone">
                        </div>
                    </div>
                    <div class=" ">
                        <h3 class="text-center">Payment Method </h3>
                        <div class="control-group">
                            <label class="control-label">Name</label>
                            <div class="controls">
                                <input type="text" name="name" id="name">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">Email Address</label>
                            <div class="controls">
                                <input type="email" name="email-add" id="email-add">
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
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
  