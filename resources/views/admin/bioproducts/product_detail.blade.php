@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
          <a href="{{ url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
          <a href="{{ url('/admin/all-products')}}" class="current">All Products</a> 
          <a href="javascript:;" class="current">Single Product</a> 
        </div>
        <div class="overflow">
          <span class="pull-right"><a href="{{ url('/admin/edit-product/'.$productdetail->id)}}" class="btn btn-info btn-mini">Edit Product</a> </span>
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
            <div class="card">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#details" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Details</span></a> </li>
                  <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#description" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Description</span></a> </li>
                  <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#returnpolicy" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Return Policy</span></a> </li>
                  <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#images" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Images</span></a> </li>
              </ul>
              <!-- Tab panes -->
              <div class="tab-content tabcontent-border">
                  <div class="tab-pane active" id="details" role="tabpanel">
                      <div class="p-20">
                        <div class="details"> 
                            <div class="span2"> Product Name : </div>
                              <div class="span10">{{$productdetail->product_name}}</div>
                        </div>
                        <div class="details"> 
                            <div class="span2">Product Category : </div>
                            <div class="span10">{{$productdetail->category_name}}</div>
                        </div>
                        <div class="details"> 
                            <div class="span2">Price : </div>
                              <div class="span10">{{$productdetail->price}}</div>
                        </div>
                        <div class="details"> 
                            <div class="span2">Product Type : </div>
                              <div class="span10">{{$productdetail->product_type}}</div>
                        </div>
                        <div class="details"> 
                            <div class="span2">Product Application : </div>
                              <div class="span10">{!!$productdetail->product_application!!}</div>
                        </div>
                        <div class="details"> 
                              <div class="span2">Product Specifications : </div>
                              <div class="span10"> {!!$productdetail->specifications!!} </div>
                        </div>
                        <div class="details"> 
                            <div class="span2">Vendor Name : </div>
                            <div class="span10">{{$productdetail->vendor_name}}</div>
                          </div>
                      </div>
                  </div>
                  <div class="tab-pane  p-20" id="description" role="tabpanel">
                      <div class="p-20">
                          <div class="details"> 
                              <div class="span2">Product Description : </div>
                              <div class="span10">{!!$productdetail->description!!}</div>
                          </div>
                      </div>
                  </div>
                  <div class="tab-pane p-20" id="returnpolicy" role="tabpanel">
                      <div class="p-20">
                          <div class="details"> 
                              <div class="span2">Return Policy : </div>
                              <div class="span10">{!!$productdetail->return_policy!!}</div>
                            </div>
                      </div>
                  </div>
                  
                  <div class="tab-pane p-20" id="images" role="tabpanel">
                      <div class="p-20">
                          <div class="details"> 
                              <div class="span2">Product Images : </div>
                              <div class="span10">
                                @if(!empty($productdetail->image))
                                    <img src="{{asset('/images/backend_images/bioproducts/small/'.$productdetail->image)}}" width="50px">
                                @else 
                                    <img src="https://via.placeholder.com/50" width="50px">                            
                                @endif
                              </div>
                            </div>
                      </div>
                  </div>
              </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection