@extends('layouts.frontLayout.front_design')

@section('content')

<!-- Carousel
================================================== -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      @foreach ($banners as $key => $banner)
        <li data-target="#myCarousel" data-slide-to="{{$key}}" class="@if($key == 0) active @endif"></li>
      @endforeach
      
    </ol>
    <div class="carousel-inner" role="listbox">
      @foreach ($banners as $key => $banner)
        <div class="item @if($key == 0) active @endif">
            <div class="">
              <img src="{{ asset('/images/frontend_images/banners/'.$banner->image) }}" alt="Product">
              <div class="carousel-caption">
                  <div class="carousel-caption-inner">
                      <h1>{{$banner->caption}}</h1>
                  </div>
              </div>
            </div>
        </div>
      @endforeach
    </div>
  </div>
<!-- /.carousel -->



    <!-- Latest Products -->
      <div class="full-width bg-blue margin-bottom-120">
        <div class="height-40"></div>
        <div class="container">
          <div class="col-md-12">
            <h2 class="title">
              <span class="pull-left">
                Latest Products
              </span>
              <span class="pull-right">
                <a href="{{ url('/products') }}">
                  explore more <i class="fa fa-long-arrow-right"></i>
                </a>
              </span>
            </h2>
          </div>
          <div class="home-products">
          	@foreach($productsAll as $product)
            <div class="col-md-3 col-sm-12">
              <div class="single-product">
                <div class="product-img">
                	<a href="{{ url('/products/'.$product->url) }}">
                  		<img src="{{ asset('/images/backend_images/bioproducts/small/'.$product->image) }}" alt="{{ $product->product_name }}">
                  	</a>
                </div>
                <div class="product-detail">
                  <h3 class="title">{{$product->product_name}}</h3>
                  <p style="">{!! str_limit($product->description, $limit = 40)  !!}</p>
                </div>
                <div class="product-bottom">
                  <a href="{{ url('/products/'.$product->url) }}">
                    <i class="fa fa-long-arrow-right"></i>
                  </a>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    <!--/ latest products -->

    <!-- Search -->
      <div class="container">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            @include('products.searchform')
        </div>
        <div class="col-md-2"></div>
        <hr class="col-md-12">
      </div>
    <!-- /search -->

    <!-- Solutions -->
      <div class="container margin-bottom-60">
        <div class="full-width">
          <div class="col-md-12">
            <h2 class="title">
                Our Solutions
            </h2>
          </div>
          <div class="col-md-12">
            @foreach ($services as $service)
              <div class="col-md-3">
                <div class="solution">
                  <div>
                    <img src="{{asset('/images/backend_images/services/small/'.$service->image)}}" alt="Solution">
                  </div>
                  <div class="solution-details">
                    <h4>{{$service->title}}</h4>
                    <p>{!! $service->description !!}</p>
                  </div>
                </div>
              </div> 
            @endforeach
            
            
          </div>
        </div>
      </div>
      <div class="container margin-bottom-60">
        <hr class="col-md-12">
      </div>
    <!-- /Solutions -->

    <!-- About Us -->
      <div class="full-width margin-bottom-60 about-section">
        <div class="col-md-7 col-sm-12 about-detail">
          <h2 class="title">About Us</h2>
          <p>Biofinder Plus is a platform for product and service listings from Life Science brands. Through our platform, life science researchers can search, compare, and make relevant product decisions while accessing technical supports and scientific information. We go the extra mile for our customers!</p>
        </div>
        <div class="col-md-5 col-sm-12 about-detail-img">
          <img src="{{ asset('/images/frontend_images/product.jpeg') }}" width="100%">
        </div>
      </div>
    <!-- /About Us -->

    <!-- Clients -->
      {{-- <div class="full-width bg-deep-blue">
        <div class="container">
          <div class="col-md-2 clients">
            <img src="{{ asset('/images/frontend_images/logo1.png') }}">
          </div>
          <div class="col-md-2 clients">
            <img src="{{ asset('/images/frontend_images/logo2.png') }}">
          </div>
          <div class="col-md-2 clients">
            <img src="{{ asset('/images/frontend_images/logo3.png') }}">
          </div>
          <div class="col-md-2 clients">
            <img src="{{ asset('/images/frontend_images/logo4.png') }}">
          </div>
          <div class="col-md-2 clients">
            <img src="{{ asset('/images/frontend_images/logo5.png') }}">
          </div>
          <div class="col-md-2 clients">
            <img src="{{ asset('/images/frontend_images/logo6.png') }}">
          </div>
        </div>
      </div> --}}
    <!-- /Clients -->

    <!--Video  -->
      {{-- <div class="full-width bg-blue padding-bottom-250 margin-bottom-60 overflow">
        <div class="height-40"></div>
        <div class="container">
          <div class="col-md-12">
            <h2 class="title">
              <span class="pull-left">
                Latest Videos/Webinars
              </span>
              <span class="pull-right">
                <a href="#">
                  explore more <i class="fa fa-long-arrow-right"></i>
                </a>
              </span>
            </h2>
          </div>
        </div>
      </div>
      <div class="video overflow">
        <div class="col-md-3 col-sm-12">
          <img src="{{ asset('/images/frontend_images/1.jpg') }}" alt="Product" width="100%">
        </div>
        <div class="col-md-6 col-sm-12">
          <div class="">
            <iframe width="100%" height="400" src="https://www.youtube.com/embed/J_ub7Etch2U" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen controls></iframe>
          </div>
          <div>
            <h4>
              reproduct ability compatibility
            </h4>
            <p>
              Cotton candy sugar plum chocolate cake jelly gummies candy lemon drops. Donut marzipan 
            </p>
          </div>
        </div>
        <div class="col-md-3 col-sm-12">
          <img src="{{ asset('/images/frontend_images/2.jpg') }}" alt="Product" width="100%">
        </div>
      </div>
      <div class="container margin-bottom-60">
        <hr class="col-md-12">
      </div> --}}
    <!-- /Video -->

    <!-- Articles -->
      {{-- <div class="container margin-bottom-30">
        <div class="full-width">
          <div class="col-md-12">
            <h2 class="title">
                Articles
            </h2>
          </div>
          <div class="">
            <div class="col-md-6">
              <div class="single-article">
                <img src="{{ asset('/images/frontend_images/articles/1.jpg') }}" alt="Sinlge Article">
                <div class="article-detail">
                  <h4 class="article-title">
                    main headline
                  </h4>
                  <p>
                    Cotton candy sugar plum chocolate cake jelly gummies candy lemon drops. Donut marzipan 
                  </p>
                  <p class="date">march 25, 2018</p>
                  <p  class="view-more">
                    <a href="#">view more</a>
                  </p>
                </div>
              </div>
              <div class="bookmark">
                <i class="fa fa-bookmark"></i>
              </div>
            </div>
            <div class="col-md-6">
              <div class="single-article">
                <img src="{{ asset('/images/frontend_images/articles/2.jpg') }}" alt="Sinlge Article">
                <div class="article-detail">
                  <h4 class="article-title">
                    main headline
                  </h4>
                  <p>
                    Cotton candy sugar plum chocolate cake jelly gummies candy lemon drops. Donut marzipan 
                  </p>
                  <p class="date">march 25, 2018</p>
                  <p  class="view-more">
                    <a href="#">view more</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="single-article">
                <img src="{{ asset('/images/frontend_images/articles/3.jpg') }}" alt="Sinlge Article">
                <div class="article-detail">
                  <h4 class="article-title">
                    main headline
                  </h4>
                  <p>
                    Cotton candy sugar plum chocolate cake jelly gummies candy lemon drops. Donut marzipan 
                  </p>
                  <p class="date">march 25, 2018</p>
                  <p  class="view-more">
                    <a href="#">view more</a>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="single-article">
                <img src="{{ asset('/images/frontend_images/articles/4.jpg') }}" alt="Sinlge Article">
                <div class="article-detail">
                  <h4 class="article-title">
                    main headline
                  </h4>
                  <p>
                    Cotton candy sugar plum chocolate cake jelly gummies candy lemon drops. Donut marzipan 
                  </p>
                  <p class="date">march 25, 2018</p>
                  <p  class="view-more">
                    <a href="#">view more</a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> --}}
      {{-- <div class="container margin-bottom-60">
        <hr class="col-md-12">
      </div> --}}
    <!-- /Articles -->

    <!--Events  -->
      {{-- <div class="full-width bg-blue padding-bottom-250 margin-bottom-60 overflow">
        <div class="height-40"></div>
        <div class="container">
          <div class="col-md-12">
            <h2 class="title">
              <span class="pull-left">
                Latest Events
              </span>
              <span class="pull-right">
                <a href="#">
                  explore more <i class="fa fa-long-arrow-right"></i>
                </a>
              </span>
            </h2>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="video event overflow">
          <div class="col-md-5">
            <img src="{{ asset('/images/frontend_images/event.jpg') }}" width="100%">
          </div>
          <div class="col-md-7 event-detail bg-white">
            <h5 class="location"> lagos</h5>
            <h4>Cotton candy sugar plum chocolate cake jelly gummies candy lemon drops. Donut marzipan </h4>
            <p class="tag">Cotton, candy sugar, plum chocolate, cake</p>
            <div>
              <p class="text-right">
                <a href="#" class="butn btn-success">Tickets</a>
              </p>
            </div>
          </div>
        </div>
      </div> --}}
      
    <!-- /Events -->

@endsection