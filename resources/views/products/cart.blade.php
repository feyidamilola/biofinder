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
          	<div class="">
            	<h2 class="title">
                	Your Cart <i class="fa fa-shopping-cart"></i>
            	</h2>
			  </div>
			  
          	<div class="cart">
				@if (count($usercart) > 0)
					<table width="100%">
						<thead>
							<th>SN</th>
							<th>Product Details</th>
							<th>quantity</th>
							<th class="text-right">Price</th>
							<th></th>
						</thead>
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
										<img src="{{ asset('/images/backend_images/bioproducts/small/'.$cart->image) }}" alt="{{ $cart->product_name }}">
										<h3>{{ $cart->product_name }}</h3>
									</td>
									<td>
										<div class="input-group">
											<span class="input-group-btn">
												@if ($cart->quantity > 1)
													<button class="btn btn-primary">
														<a href="{{url('/cart/update-quantity/'.$cart->id.'/-1')}}">
															<i class="fa fa-minus"></i>
														</a>
													</button>
												@endif
											</span>
											<input type="number" class="form-control text-center" value="{{$cart->quantity}}" disabled>
											<span class="input-group-btn">
												<button class="btn btn-primary">
													<a href="{{url('/cart/update-quantity/'.$cart->id.'/1')}}">
														<i class="fa fa-plus"></i>
													</a>
												</button>
											</span>
										</div>
									</td>
									<td>
										<p>&#8358;
											@php
												echo $productprice;
											@endphp
										</p>
									</td>
									<td>
										<a href="{{ url('/cart/delete/'.$cart->id) }}" title="Remove item from cart" class="btn-transparent">
											<i class="fa fa-times" style="color: #23a743"></i>
										</a>
									</td>
								</tr>
								@php
									$totalamount = $totalamount + ($cart->price * $cart->quantity);
									
								@endphp
							@endforeach
						</tbody>
						<tfoot class="cart-card">
							<tr>
								<td colspan="3" class="text-right">
									Total Amount: 
								</td>
								<td class="text-right" > 
										&#8358;@php
										echo $totalamount;
									@endphp
								</td>
								<td></td>
							</tr>
						</tfoot>
					</table>
					
					<p class="pull-right margin-top-60">
						<a href="{{url('/checkout')}}" class="butn btn-primary">
							Checkout
						</a>

					</p>
					@else 
						<p>
							Your cart is empty
						</p>
				@endif
          	</div>
        </div>
    </div>
    <!-- /cart -->
	  	<div class="container">
			<p class="pull-left margin-top-60">
				<a href="{{url('/products')}}" class="butn btn-primary">
					Back to products
				</a>
			</p>
			{{--  --}}
	  	</div>
@endsection