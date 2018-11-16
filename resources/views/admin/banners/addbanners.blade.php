@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
          <a href="{{ url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
          <a href="{{ url('/admin/all-banners')}}">All Banners</a> 
          <a href="javascript:;" class="current">Add Banner</a> 
        </div>
        <div class="overflow">
          <h1 class="pull-left"> Add Banner </h1>
          <span class="pull-right"><a href="{{ url('/admin/all-banners')}}" class="btn btn-info">View All Banners</a> </span>
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
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('/admin/add-banner')}}" name="add-banner" id="add-banner" novalidate="novalidate">
                            {{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Title</label>
                                <div class="controls">
                                    <input type="text" name="title" id="title" required>
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Caption</label>
                                <div class="controls">
                                    <input type="text" name="caption" id="caption" max="250" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Banner Image</label>
                                <div class="controls">
                                    <input type="file" name="image" id="image" required>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Status</label>
                                <div class="controls">
                                    <input type="checkbox" name="status[]" id="status"> Enable
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Add Banner" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection