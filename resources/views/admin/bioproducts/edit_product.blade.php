@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
          <a href="{{ url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
          <a href="{{ url('/admin/all-products')}}">All Products</a> 
          <a href="javascript:;" class="current">Edit Product</a> 
        </div>
        <div class="overflow">
          <h1 class="pull-left"> Edit Product </h1>
          <span class="pull-right"><a href="{{ url('/admin/all-products')}}" class="btn btn-info">View All Products</a> </span>
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
                        <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('/admin/edit-product/'.$productdetail->id)}}" name="edit-product" id="eidt-product" novalidate="novalidate">{{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Product Name</label>
                                <div class="controls">
                                    <input type="text" name="product_name" id="product_name" required value="{{$productdetail->product_name}}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Select Category</label>
                                <div class="controls">
                                    <select name="category_name" style="width:98%;" required>
                                        <option>{{$productdetail->category_name}}</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->category_name }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Price</label>
                                <div class="controls">
                                    <input type="text" name="price" id="price" required value="{{$productdetail->price}}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Cell Type</label>
                                <div class="controls">
                                    <input type="text" name="product_type" id="product_type" required value="{{$productdetail->price}}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Application</label>
                                <div class="controls">
                                    <textarea name="product_application" id="product_application">{{$productdetail->product_application}} </textarea> 
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Description</label>
                                <div class="controls">
                                    <textarea name="description" required>{{$productdetail->description}} </textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Specification</label>
                                <div class="controls">
                                    <textarea name="specifications" required>{{$productdetail->specifications}} </textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Return Policy</label>
                                <div class="controls">
                                    <textarea name="return_policy" required>{{$productdetail->return_policy}}</textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Select Vendor</label>
                                <div class="controls">
                                    <select name="vendor_name" width="98%" required>
                                        <option>{{$productdetail->vendor_name}}</option>
                                        @foreach($vendors as $vendor)
                                            <option value="{{$vendor->vendor_name }}">{{ $vendor->vendor_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Image</label>
                                <div class="controls">
                                    <div id="uniform-undefined">
                                        <table>
                                            <tr>
                                                <td>
                                                <input name="image" id="image" type="file">
                                                @if(!empty($productdetail->image))
                                                    <input type="hidden" name="current_image" value="{{ $productdetail->image }}"> 
                                                @endif
                                                </td>
                                                <td>
                                                @if(!empty($productdetail->image))
                                                    <img style="width:30px;" src="{{ asset('/images/backend_images/product/small/'.$productdetail->image) }}"> 
                                                    | <a href="{{ url('/admin/delete-product-image/'.$productdetail->id) }}">Delete</a>
                                                @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Enable</label>
                                <div class="controls">
                                <input type="checkbox" name="status[]" id="status" @if($productdetail->status == "1") checked @endif value="{{$productdetail->status}}"> 
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Edit Product" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection