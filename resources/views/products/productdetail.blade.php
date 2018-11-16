@extends('layouts.frontLayout.front_design')

@section('content')
  <div class="height-40 margin-bottom-60"></div>
  <div class="container">
    <div class="col-md-12">
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
    <!-- Featured Image and Description -->
  <form action="{{url('/add-to-cart')}}" name="addtocartform" id="addtocartform" method="post">
    {{ csrf_field() }}
    <input type="hidden" name="product_id" value="{{ $productdetail->id }}" />
    <input type="hidden" name="product_name" value="{{ $productdetail->product_name }}" />
    <input type="hidden" name="price" id="price" value="{{ $productdetail->price }}" />
      <div class="full-width product-feature">
        <div class="container">
          <div class="col-md-6">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                {{-- <li data-target="#myCarousel" data-slide-to="1"></li> --}}
              </ol>
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <div class="container">
                    <div class="carousel-caption" style="position: absolute;">
                      <div class="">
                        <img src="{{ asset('/images/backend_images/bioproducts/medium/'.$productdetail->image) }}" alt="{{$productdetail->product_name}}">
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          </div>
          <div class="col-md-6">
              <div class="breadcrumb">
                <ul>
                  <li>
                    <a href="{{ url('/products/') }}">
                      All Products
                    </a>
                  </li>
                  <li class="active">
                  <a href="{{ url('/products/category/'.str_slug($productdetail->category_name)) }}">
                        {{$productdetail->category_name}}
                    </a>
                  </li>
                </ul>
              </div>
              <h1>
                    {{$productdetail->product_name}}
              </h1>
              <div class="price">
                <p>
                    &#8358;{{$productdetail->price}}
                </p>
              </div>
              <div class="seller">
                <p>
                    {{$productdetail->vendor_name}}
                </p>
              </div>
              <p>
                    {!! str_limit($productdetail->description, $limit = 220)  !!}
              </p>
              <div class="carousel-caption-bottom">
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="number" class="form-control" placeholder="1" name="quantity" style="height: 46px" min="1">
                        <div class="input-group-btn">
                            <button class="butn btn-primary" type="submit" value="add-to-cart" >
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    <!-- /Featured Image and Description -->

    <!-- Product Description -->
      <div class="bg-blue padding-bottom-150 height-40"></div>
      <div class="container product-description">
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#description">Description</a></li>
            <li><a data-toggle="tab" href="#specifications">Specification</a></li>
            <li><a data-toggle="tab" href="#review">Reviews</a></li>
            <li><a data-toggle="tab" href="#return">Return Policy</a></li>
          </ul>

          <div class="tab-content">
            <div id="description" class="tab-pane fade in active">
                {!! $productdetail->description !!}
            </div>
            <div id="specifications" class="tab-pane fade">
                {!! $productdetail->specifications !!}
            </div>
            <div id="review" class="tab-pane fade">
              <p>No review yet</p>
            </div>
            <div id="return" class="tab-pane fade">
                {!! $productdetail->return_policy !!}
            </div>
        </div>

      </div>
    <!-- /Product Description -->
  </form>
    <!-- SImilar Products -->
      <div class="full-width bg-blue margin-bottom-120">
        <div class="height-40"></div>
        <div class="container">
          <div class="col-md-12">
            <h2 class="title">
              <span class="pull-left">
                Similar Products
              </span>
              <span class="pull-right">
                <a href="#">
                  explore more <i class="fa fa-long-arrow-right"></i>
                </a>
              </span>
            </h2>
          </div>
          <div class="home-products">
                @foreach ($similarproducts as $similarproduct)
                    <div class="col-md-3 col-sm-12">
                        <div class="single-product">
                          <div class="product-img">
                              <a href="{{ url('/products/'.$similarproduct->url) }}">
                                <img src="{{ asset('/images/backend_images/bioproducts/small/'.$similarproduct->image) }}" alt="$similarproduct->product_name">
                              </a>
                          </div>
                          <div class="product-detail">
                            <h3>{{$similarproduct->product_name}}</h3>
                            <p>{!! str_limit($similarproduct->description, $limit = 40)  !!}</p>
                          </div>
                          <div class="product-bottom">
                            <a href="{{ url('/products/'.$similarproduct->url) }}">
                              <i class="fa fa-long-arrow-right"></i>
                            </a>
                          </div>
                        </div>
                    </div>
                @endforeach 
          </div>
        </div>
      </div>
    <!--/ SImilar products -->

@endsection