@extends('layouts.frontLayout.front_design')

@section('content')
	<div class="height-40 margin-bottom-60"></div>
	<div class="container">
		<div class="">
			@if(Session::has('flash_message_error'))
				<div class="alert alert-error alert-block bg-deep-blue">
					<button type="button" class="close" data-dismiss="alert">×</button> 
						<strong>{!! session('flash_message_error') !!}</strong>
				</div>
			@endif 
			@if(Session::has('flash_message_success'))
				<div class="alert alert-error alert-block bg-deep-blue">
					<button type="button" class="close" data-dismiss="alert">×</button> 
						<strong>{!! session('flash_message_success') !!}</strong>
				</div>
			@endif   
		</div>
	</div>
    <div class="container margin-bottom-60">
        <div class="full-width">
            <div class="alert alert-error alert-block bg-deep-blue text-center" >
                <h2 style="color: #fff;">Thank you. </h2>
                <p style="color: #fff;">Your order with <strong>Order ID: {{Session::get('order_id')}} </strong> has been successfully received.</p> 
            </div>
        </div>
    </div>
    
@endsection
@php
    Session::forget('order_id');
@endphp