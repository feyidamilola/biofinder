@extends('layouts.frontLayout.front_design')

@section('content')
    <div class="height-40 margin-bottom-60"></div>
    <div class="container margin-top-120">
        <div class="breadcrumb">
            <ul>
                <li>
                    <a href="{{url('/products')}}">
                       Products
                    </a>
                </li>
                <li class="active">
                    <a href="#">
                        Compare Products
                    </a>
                </li>
            </ul>
        </div>
        <!-- Products -->
        <div class="full-width compare overflow">
            <div class="row">
                <table width="100%">
                    <tbody>
                        <tr>
                            <td>
                                <h1 class="title text-center" style="padding-top: 0;">Compare<br/>Products</h1>
                            </td>
                            @foreach ($productdetails as $productdetail)
                            <td >
                                <div class="product-img text-center margin-bottom-15">
                                    <img src="{{ asset('/images/backend_images/bioproducts/small/'.$productdetail->image) }}" alt="{{ $productdetail->product_name }}">
                                </div>
                                <div class="single-product ">
                                    <div class="product-detail">
                                        <h3>{{ $productdetail->product_name }}</h3>
                                    </div>
                                    <p>
                                        <a class="butn btn-primary" href="{{ url('/products/'.$productdetail->url) }}" role="button">Buy Now</a>
                                    </p>
                                </div>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /Products -->
        
        <!-- Comparison -->
        <div class="compare margin-top-60">
            <div>
                <h2 class="title margin-bottom-30">
                    Key Features
                </h2>
            </div>
            <div class="full-width comparison">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                Product Application
                            </td>
                            @foreach ($productdetails as $productdetail)
                            <td>
                                {{$productdetail->product_application}}
                            </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>
                                Product Type
                            </td>
                            @foreach ($productdetails as $productdetail)
                            <td>
                                {{$productdetail->product_type}}
                            </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>
                                Category
                            </td>
                            @foreach ($productdetails as $productdetail)
                            <td>
                                {{$productdetail->category_name}}
                            </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>
                                Price
                            </td>
                            @foreach ($productdetails as $productdetail)
                            <td>
                                &#8358;{{$productdetail->price}}
                            </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>
                                Description
                            </td>
                            @foreach ($productdetails as $productdetail)
                            <td>
                                {!! str_limit($productdetail->description, $limit = 200)  !!}
                            </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>
                                Specifications
                            </td>
                            @foreach ($productdetails as $productdetail)
                            <td>
                                {!! str_limit($productdetail->specifications, $limit = 200)  !!}
                            </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>
                                Brand/Vendor
                            </td>
                            @foreach ($productdetails as $productdetail)
                            <td>
                                {{$productdetail->vendor_name}}
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <p class="text-center margin-top-60">
            <a href="{{url('/products')}}" class="butn btn-primary">
                Back to products
            </a>
        </p>
            <!-- /comparison -->
    </div>
    

@endsection