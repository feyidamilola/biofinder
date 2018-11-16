@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
          <a href="{{ url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
          <a href="{{ url('/admin/all-services')}}">All Service</a> 
          <a href="javascript:;" class="current">Edit Service</a> 
        </div>
        <div class="overflow">
          <h1 class="pull-left"> Edit Service </h1>
          <span class="pull-right"><a href="{{ url('/admin/all-services')}}" class="btn btn-info">View All Services</a> </span>
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
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('/admin/edit-service/'.$servicedetail->id)}}" name="edit-service" id="edit-service" novalidate="novalidate">{{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Title</label>
                                <div class="controls">
                                    <input type="text" name="title" id="title" required value="{{$servicedetail->title}}">
                                </div>
                            </div>
                            
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea name="description" required>{{$servicedetail->description}} </textarea>
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
                                                @if(!empty($servicedetail->image))
                                                    <input type="hidden" name="current_image" value="{{ $servicedetail->image }}"> 
                                                @endif
                                                </td>
                                                
                                            </tr>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            
                            <div class="form-actions">
                                <input type="submit" value="Edit Service" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection