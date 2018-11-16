@extends('layouts.frontLayout.front_design')

@section('content')
<div class="container margin-top-120">
    <div class="col-md-12">
      <!-- Products -->
        <div class="full-width all-products overflow">
            <div class="row">
                @foreach ($products as $product)
                <div class="">
                    <div class="col-md-12">
                        <div class="single-article search">
                            <a href="{{ url('/products/'.$product->id) }}">
                                <img src="{{ asset('/images/backend_images/bioproducts/small/'.$product->image) }}" alt="{{ $product->product_name }}" width="150px">
                            </a>
                            <div class="article-detail ">
                                <a href="{{ url('/products/'.$product->url) }}">
                                    <h4 class="article-title">
                                        {{ $product->product_name }}
                                    </h4>
                                </a>
                                <p>
                                    {!! str_limit($product->description, $limit = 120)  !!}
                                </p>
                                <p>
                                    <strong>Type: </strong>{{ $product->product_type }}
                                </p>
                                <p>
                                    <strong>Application: </strong> {!! str_limit($product->product_application, $limit = 120)  !!}
                                </p>
                                <p class="date">
                                    Price:- &#8358;{{ $product->price }} | 
                                    Vendor:- {{ $product->vendor_name }} | 
                                    Category:- {{ $product->category_name }} 
                                </p>
                                
                            </div>
                          </div>
                          
                        </div>
                      </div>
                @endforeach
              
              
            </div>
            
        </div>
      <!-- /Products -->
    </div>
    
  </div>

@endsection