@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> 
            <a href="{{ url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="javascript:;" class="current">All Products</a> 
            </div>
                    
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
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>S/N </th>
                                        <th>Product Image</th>
                                        <th>Product Name</th>
                                        <th>Product Category</th>
                                        <th>Product Vendor</th>
                                        <th>Product Price</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="table-counter">
                                    @foreach ($bioproducts as $bioproduct)
                                        <tr class="gradeX">
                                            <td></td>
                                            <td>
                                                @if(!empty($bioproduct->image))
                                                    <img src="{{asset('/images/backend_images/bioproducts/small/'.$bioproduct->image)}}" width="50px">
                                                @else 
                                                    <img src="https://via.placeholder.com/50" width="50px">                            
                                                @endif
                                        </td>
                                            <td>{{$bioproduct->product_name}}</td>
                                            <td>{{$bioproduct->category_name}}</td>
                                            <td>{{$bioproduct->vendor_name}}</td>
                                            <td>{{$bioproduct->price}}</td>
                                            <td>
                                                @if ($bioproduct->status == 1)
                                                    <p>Active </p>
                                                @else
                                                    <p>Inactive </p>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <button data-toggle="dropdown" class="btn dropdown-toggle btn-mini btn-primary">Action<span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="{{url('/admin/all-products/'.$bioproduct->url)}}"> View </a> 
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a href="{{url('/admin/edit-product/'.$bioproduct->url)}}"> Edit </a>
                                                        </li>
                                                        <li class="divider"></li>
                                                        <li>
                                                            <a href="{{url('/admin/delete-product/'.$bioproduct->id)}}"> Delete </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection