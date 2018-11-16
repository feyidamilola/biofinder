@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
          <a href="{{ url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
          <a href="javascript:;" class="current">Main Categories</a> 
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
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>S/N </th>
                  <th>Date Created</th>
                  <th>Category Name</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-counter">
              	@foreach ($parentcategories as $parentcategory)
                    <tr class="gradeX">
                        <td></td>
                        <td>{{$parentcategory->created_at}}</td>
                        <td>{{$parentcategory->category_name}}</td>
                        <td class="text-center">
                            <a href="{{url('/admin/edit-main-category/'.$parentcategory->id)}}" class="btn btn-primary btn-mini"> Edit </a> | 
                            <a href="{{url('/admin/delete-main-category/'.$parentcategory->id)}}" class="btn btn-danger btn-mini" id="delParentCat"> Delete </a> 
                        </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection