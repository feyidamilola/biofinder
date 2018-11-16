@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> 
      <a href="{{ url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
      <a href="{{ url('/admin/all-vendors')}}">All Vendors</a> 
      <a href="javascript:;" class="current">Add Vendor</a> 
    </div>
    <div class="overflow">
      <h1 class="pull-left"> Add Vendor </h1>
      <span class="pull-right"><a href="{{ url('/admin/all-vendors')}}" class="btn btn-info">View All Vendors</a> </span>
    </div>
    
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
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-content nopadding">
            <form class="form-horizontal" method="post" action="{{url('/admin/add-vendor')}}" name="add_vendor" id="add_vendor" novalidate="novalidate">{{ csrf_field() }}
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
                <input type="submit" value="Add Vendor" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection