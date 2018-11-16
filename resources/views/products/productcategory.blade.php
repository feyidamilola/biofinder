@extends('layouts.frontLayout.front_design')

@section('content')
    <div class="container margin-top-120">
        <div class="col-md-12">
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href="{{ url('/products/') }}">
                            All Products
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:;">
                            {{$category_name->category_name}}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="full-width all-products overflow">
                    <div class="row">
                        @foreach ($products as $product)
                            <div class="col-md-4 col-sm-12">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{ url('/products/'.$product->id) }}">
                                            <img src="{{ asset('/images/backend_images/bioproducts/small/'.$product->image) }}" alt="{{ $product->product_name }}" width="100%">
                                        </a>
                                    </div>
                                  <div class="product-detail">
                                    <h3>{{ $product->product_name }}</h3>
                                    <p>{!! str_limit($product->description, $limit = 40)  !!}</p>
                                  </div>
                                  <div class="product-bottom">
                                    <p>
                                      <span>
                                        N{{ $product->price }}
                                      </span>
                                      <a href="{{ url('/products/'.$product->id) }}">
                                        <i class="fa fa-long-arrow-right"></i>
                                      </a>
                                    </p>
                                  </div>
                                </div>
                                <div class="product-checkbox">
                                  <label class="checkbox-container"> 
                                    <input type="checkbox">
                                    <span class="checkbox-container__checkmark"></span>
                                  </label>
                                </div> 
                            </div>
                        @endforeach
                      
                      
                    </div>
                    
                </div>
        </div>
        
    </div>

@endsection