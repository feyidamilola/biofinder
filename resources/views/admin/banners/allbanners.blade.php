@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
          <a href="{{ url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
          <a href="javascript:;" class="current">All Banners</a> 
        </div>
        <div class="overflow">
            <span class="pull-right"><a href="{{ url('/admin/add-banner')}}" class="btn btn-info">Add New Banner</a> </span>
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
                  <th>Image</th>
                  <th>Title</th>
                  <th>Caption</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="table-counter">
                @foreach ($banners as $banner)
                    <tr class="gradeX">
                        <td></td>
                        <td>
                            <img src="{{asset('/images/frontend_images/banners/'.$banner->image)}}" width="50px">
                        </td>
                        <td>{{$banner->title}}</td>
                        <td>{{$banner->caption}}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <button data-toggle="dropdown" class="btn dropdown-toggle btn-mini btn-primary">Action<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{url('/admin/edit-banner/'.$banner->id)}}"> Edit </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{url('/admin/delete-banner/'.$banner->id)}}"> Delete </a>
                                    </li>
                                </ul>
                            </div>
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