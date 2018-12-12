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
    <!-- Cart -->
    <div class="container margin-bottom-60">
        <div class="full-width">
            <div class="col-md-6">
                <p class="pull-left margin-top-25">
                    <a href="{{url('/cart')}}" class="butn btn-primary">
                        Edit Cart
                    </a>
                </p>
                <div class="cart">
                    @if (count($usercart) > 0)
                        <table width="100%">
                            <tbody>
                                <?php 
                                    $totalamount = 0;
                                ?>
                                @foreach ($usercart as $cart)
                                    @php
                                        $productprice = 0;
                                        $productprice = $cart->quantity * $cart->price;
                                    @endphp
                                    
                                    <tr class="cart-card">
                                        <td></td>
                                        <td >
                                            <h3>{{ $cart->product_name }}</h3>
                                        </td>
                                        <td>
                                            <div class="input-group">
                                                <input type="number" class="form-control text-center" value="{{$cart->quantity}}" disabled>
                                            </div>
                                        </td>
                                        <td>
                                            <p>&#8358;
                                                @php
                                                    echo $productprice;
                                                @endphp
                                            </p>
                                        </td>
                                    </tr>
                                    @php
                                    
                                        $totalamount = $totalamount + ($cart->price * $cart->quantity);									
                                    @endphp
                                    
                                @endforeach
                            </tbody>
                            <tfoot class="cart-card">
                                @php
                                    $delivery_fee = 1500;
                                @endphp
                                @if ($orderDetails->delivery == 'shipping')
                                    <tr style="border-bottom: 1px solid #e5f8ff;">
                                        <td colspan="3" class="text-right">
                                            Delivery Fee: 
                                        </td>
                                        <td class="text-right" style="padding-right:15px"> 
                                                &#8358;@php
                                                echo '1500';
                                            @endphp
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <td colspan="3" class="text-right">
                                        Total Amount: 
                                    </td>
                                    <td class="text-right" style="padding-right:15px" > 
                                        @if ($orderDetails->delivery == 'shipping') 
                                            
                                        @php
                                            $totalamount = $delivery_fee + $totalamount;
                                        @endphp
                                            &#8358;@php
                                            echo $totalamount;
                                        @endphp
                                           
                                        @else 
                                            &#8358;@php
                                            echo $totalamount;@endphp
                                        @endif
                                    </td>
                                    <input type="hidden" name="totalamount" id="totalamount" value="<?php echo $totalamount ?>">
                                    <td></td>
                                </tr>
                            </tfoot>
                        </table>
                    @endif
                </div>
            </div>
          	

          	<div class="order col-md-6">
                <div class="">
                    <h2 class="title">
                        Delivery Details <i class="fa fa-shopping-cart"></i>
                    </h2>
                </div>
                <table style="">
                    <tr class="cart-card">
                        <td >
                            Name
                        </td>
                        <td>
                            <span>{{$userDetails->name}}</span>
                        </td>
                    </tr>
                    <tr class="cart-card">
                        <td>
                            address
                        </td>
                        <td>
                            <span>{{$userDetails->address}}</span>
                        </td>
                    </tr>
                    <tr class="cart-card">
                        <td>
                            state
                        </td>
                        <td>
                            <span>{{$userDetails->state}}</span>
                        </td>
                    </tr>
                    <tr class="cart-card">
                        <td>
                            phone
                        </td>
                        <td>
                            <span>{{$userDetails->phone}}</span>
                        </td>
                    </tr>
                    <tr class="cart-card">
                        <td>
                            Delivery Method
                        </td>
                        <td>
                            <span>{{$orderDetails->delivery}}</span>
                        </td>
                    </tr>
                    <tr class="cart-card">
                        <td>
                            Payment Method
                        </td>
                        <td>
                            @if ($orderDetails->payment == 'online')
                            @php
                                echo 'Online Transfer';
                            @endphp
                            @endif
                        </td>
                    </tr>
                </table>
                <p class="pull-right margin-top-25">
                    <a href="{{url('/confirm-order')}}" class="butn btn-primary">
                        Confirm Order
                    </a>
                </p>
            </div>
        </div>
    </div>
    
@endsection