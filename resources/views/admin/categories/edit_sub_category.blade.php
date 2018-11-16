@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
          <a href="{{ url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
          <a href="{{ url('/admin/main-categories')}}">Main Categories</a> 
          <a href="javascript:;" class="current">Add Main Category</a> 
        </div>
        <div class="overflow">
          <h1 class="pull-left"> Add Main Category </h1>
          <span class="pull-right"><a href="{{ url('/admin/main-categories')}}" class="btn btn-info">View All Main Categories</a> </span>
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
          <form class="form-horizontal" method="post" action="{{url('/admin/edit-sub-category/'.$subcategorydetails->id)}}" name="add_sub_category" id="add_sub_category" novalidate="novalidate">{{ csrf_field() }}
            <div class="control-group">
                <label class="control-label">Category Name</label>
                <div class="controls">
                    <input type="text" name="category_name" id="category_name" value="{{$subcategorydetails->category_name}}">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Parent Category</label>
                <div class="controls">
                    <select name="parent_category" style="width:220px;">
                    <option value="{{$subcategorydetails->parent_category}}">{{$subcategorydetails->parent_category}}</option>
                    @foreach($parentcategories as $parentcategory)
                        <option value="{{$parentcategory->category_name }}">{{$parentcategory->category_name }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
              
              <div class="form-actions">
                <input type="submit" value="Edit Sub Category" class="btn btn-success">
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection