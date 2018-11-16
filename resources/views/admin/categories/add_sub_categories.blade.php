@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
          <a href="{{ url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
          <a href="{{ url('/admin/sub-categories')}}">Sub Categories</a> 
          <a href="javascript:;" class="current">Add Sub Category</a> 
        </div>
        <div class="overflow">
          <h1 class="pull-left"> Add Sub Category </h1>
          <span class="pull-right"><a href="{{ url('/admin/sub-categories')}}" class="btn btn-info">View All Sub Categories</a> </span>
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
            <form class="form-horizontal" method="post" action="{{url('/admin/add-sub-category')}}" name="add-sub-category" id="add-sub-category" novalidate="novalidate">{{ csrf_field() }}
              <div class="control-group">
                <label class="control-label">Category Name</label>
                <div class="controls">
                  <input type="text" name="category_name" id="category_name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Parent Category</label>
                <div class="controls">
                  <select name="parent_category" style="width:98%;">
                    <option value="0">Select Parent Category</option>
                    @foreach($parentcategories as $parentcategory)
                        <option value="{{$parentcategory->category_name }}">{{ $parentcategory->category_name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              
              <div class="form-actions">
                <input type="submit" value="Add Sub Category" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection