@extends('layouts.frontLayout.front_design')

@section('content')
<div class="container margin-top-120">
    <div class="col-md-12">
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
    </div>
    <!-- Vendors -->
    <div class="container margin-bottom-30">
        <div class="full-width">
            <div class="col-md-3"></div>
            <div class="col-md-6 be-vendor">
                <h3 class="text-center">Become a vendor</h3>
                <form class="form-horizontal" method="post" action="{{url('/vendor/become-a-vendor')}}" name="add_vendor" id="add_vendor" novalidate="novalidate">{{ csrf_field() }}
                    <div class="control-group">
                        <label class="control-label">Vendor Name</label>
                        <div class="controls">
                            <input type="text" name="vendor_name" id="vendor_name">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Vendor Address</label>
                        <div class="controls">
                            <input type="text" name="address" id="address">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Phone Number</label>
                        <div class="controls">
                            <input type="tel" name="phone_number" id="phone_number">
                        </div>
                    </div> 
                    <div class="form-actions">
                        <input type="submit" value="Become a Vendor" class="btn btn-success">
                    </div>
                </form>
            </div>
            
        </div>
    </div>
         
    <!-- /Vendors -->
  </div>

@endsection