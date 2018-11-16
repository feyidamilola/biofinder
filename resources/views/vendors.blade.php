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
            @foreach ($vendors as $vendor)
                <div class="col-md-4 vendor">
                    <h3>
                        {{$vendor->vendor_name}}
                    </h3>
                    <p>
                        <a href="{{url('/vendors/'.$vendor->url)}}">View Products</a>
                    </p>
                </div>
            @endforeach
        </div>
    </div>
         
    <!-- /Vendors -->
  </div>

@endsection