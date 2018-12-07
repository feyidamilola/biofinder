@extends('layouts.frontLayout.front_design')

@section('content')
    <div class="container margin-top-120"></div>
    
    <div class="container ">
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
        
        <div class="col-md-7 col-sm-12 ">
            
            <div class="register ">
                <form class="form-horizontal" method="post" action="{{url('/checkout')}}" name="checkout" id="checkout" novalidate="novalidate">
                    {{ csrf_field() }}
                    <h3 class="text-center">Delivery Details </h3>
                    <div class="control-group">
                        <label class="control-label">Name</label>
                        <div class="controls">
                            <input type="text" name="name" id="name" value="{{$userDetails->name}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Address</label>
                        <div class="controls">
                            <input type="text" name="address" id="address" value="{{$userDetails->address}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">State</label>
                        <div class="controls">
                            <input type="text" name="state" id="state" value="{{$userDetails->state}}">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Phone Number</label>
                        <div class="controls">
                            <input type="tel" name="phone" id="phone" value="{{$userDetails->phone}}">
                        </div>
                    </div>
                    <hr class="full-width">
                    <h3 class="text-center">Delivery Method </h3>
                    <div class="control-group">
                        <div class="controls" style="margin-bottom: 25px">
                            <input type="radio" name="delivery" id="delivery" value="pickup" checked> Pickup
                        </div>
                        <div class="controls">
                            <input type="radio" name="delivery" id="delivery" value="shipping"> Shipping (1,500 flat rate)
                        </div>
                    </div>
                    <hr class="full-width">
                    
                    <div class=" ">
                        <h3 class="text-center">Payment Method </h3>
                        <div class="control-group">
                            <div class="controls" style="margin-bottom: 25px">
                                <input type="radio" name="payment" id="payment" value="cash" checked> Cash on Delivery
                            </div>
                            <div class="controls">
                                <input type="radio" name="payment" id="payment" value="transfer"> Online Transfer
                            </div>
                        </div>
                        
                    </div>

                    <hr class="full-width">

                    <div class=" ">
                        <h3 class="text-center">Additional Information </h3>
                        <div class="control-group">
                            <div class="controls">
                                <input type="text" name="additional_info" id="additional_info">
                            </div>
                        </div>
                    </div>
                    
            </div>
        </div>
        <div class="col-md-5">
            <p class="pull-left margin-top-60">
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
										<img src="{{ asset('/images/backend_images/bioproducts/small/'.$cart->image) }}" alt="{{ $cart->product_name }}" style="width: 50px">
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
							<tr>
								<td colspan="3" class="text-right">
									Total Amount: 
								</td>
								<td class="text-right" > 
										&#8358;@php
										echo $totalamount;
									@endphp
                                </td>
                                <input type="hidden" name="totalamount" id="totalamount" value="<?php echo $totalamount ?>">
								<td></td>
							</tr>
						</tfoot>
					</table>
					
					
					@else 
						<p>
							Your cart is empty
						</p>
				@endif
          	</div>
        </div>
       <div class="col-md-12 margin-top-30">
            <div class="form-actions">
                <input type="submit" value="Checkout" class="btn btn-success">
            </div>
       </div>
    </form>
    </div>
@endsection
  