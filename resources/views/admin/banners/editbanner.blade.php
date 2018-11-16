@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
          <a href="{{ url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
          <a href="{{ url('/admin/all-banners')}}">All Banners</a> 
          <a href="javascript:;" class="current">Edit Banner</a> 
        </div>
        <div class="overflow">
          <h1 class="pull-left"> Edit Banner </h1>
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
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('/admin/edit-banner/'.$bannerdetail->id)}}" name="edit-banner" id="edit-banner" novalidate="novalidate">
                            {{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Title</label>
                                <div class="controls">
                                    <input type="text" name="title" id="title" required value="{{$bannerdetail->title}}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Caption</label>
                                <div class="controls">
                                    <input type="text" name="caption" id="caption" required value="{{$bannerdetail->caption}}">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Image</label>
                                <div class="controls">
                                    <div id="uniform-undefined">
                                        <table>
                                            <tr>
                                                <td>
                                                <input name="image" id="image" type="file">
                                                @if(!empty($bannerdetail->image))
                                                    <input type="hidden" name="current_image" value="{{ $bannerdetail->image }}"> 
                                                @endif
                                                </td>
                                                
                                            </tr>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Enable</label>
                                <div class="controls">
                                    <input type="checkbox" name="status[]" id="status" @if($bannerdetail->status == "1") checked @endif value="{{$bannerdetail->status}}"> 
                                </div>
                            </div>

                            <div class="form-actions">
                                <input type="submit" value="Edit Banner" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection