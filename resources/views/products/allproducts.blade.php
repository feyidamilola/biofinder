@extends('layouts.frontLayout.front_design')

@section('content')
<div class="container margin-top-120">
    <div class="col-md-12">
        @if(Session::has('flash_message_error'))
          <div class="alert alert-error alert-block bg-deep-blue">
              <button type="button" class="close" data-dismiss="alert">×</button> 
                  <strong>{!! session('flash_message_error') !!}</strong>
          </div>
        @endif   
    </div>
    @include('products.sidebar')
    <div class="col-md-9">
      <!-- Search -->
        @include('products.searchform')
      <!-- /search -->

      <!-- Products -->
        <div class="full-width all-products overflow">
            <div class="row">
              <form method="get" action="{{url('/products')}}">
                  @foreach ($bioproducts as $product)
                  <div class="col-md-4 col-sm-12">
                      <div class="single-product">
                          <div class="product-img">
                              <a href="{{ url('/products/'.$product->url) }}">
                                  <img src="{{ asset('/images/backend_images/bioproducts/small/'.$product->image) }}" alt="{{ $product->product_name }}" width="100%">
                              </a>
                          </div>
                        <div class="product-detail">
                          <h3 class="title">{{ $product->product_name }}</h3>
                          <p>{!! str_limit($product->description, $limit = 40)  !!}</p>
                        </div>
                        <div class="product-bottom">
                          <p>
                            <span>
                                &#8358;{{ $product->price }}
                            </span>
                            <a href="{{ url('/products/'.$product->url) }}">
                              <i class="fa fa-long-arrow-right"></i>
                            </a>
                          </p>
                        </div>
                      </div>
                      <div class="product-checkbox">
                        <label class="checkbox-container"> 
                          <input type="checkbox" value="{{ $product->id }}" name="compares[]">
                          <span class="checkbox-container__checkmark"></span>
                        </label>
                      </div> 
                  </div>
              @endforeach
              <button class="compare" value="compare" type="submit"> Compare Products</button>
              </form>
            </div>
            <p class="text-center">
              {{$bioproducts->links()}}
            </p>
        </div>
        {{-- image --}}
      <!-- /Products -->
    </div>
    
  </div>

@endsection