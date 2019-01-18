@extends('layouts.adminLayout.admin_design')
@section('content')
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
<!--End-breadcrumbs-->

<!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        
        <li class="bg_lo span3"> <a href="{{ url('/admin/orders')}}"> <i class="icon-shopping-cart"></i> Orders</a> </li>
        <li class="bg_ls"> <a href="{{ url('/admin/all-products')}}"> <i class="icon icon-shopping-cart"></i> Products</a> </li>
        <li class="bg_lb"> <a href="{{ url('/admin/all-vendors')}}"> <i class="icon icon-globe"></i>Vendors</a> </li>
        <li class="bg_lg"> <a href="{{ url('/admin/quotes')}}"> <i class="icon-home"></i> Quotes</a> </li>
        <li class="bg_ls"> <a href="{{ url('/admin/all-services')}}"> <i class="icon-info-sign"></i> Services</a> </li>

      </ul>
    </div>
<!--End-Action boxes-->    

    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>Orders</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
              <table class="table table-bordered data-table">
                  <thead>
                      <tr>
                          <th>S/N </th>
                          <th>Date</th>
                          <th>Customer Email</th>
                          <th>Order Id</th>
                          <th>Payment Method</th>
                          <th>Amount</th>
                          <th>Delivery</th>
                          <th>Actions</th>
                      </tr>
                  </thead>
                  <tbody class="table-counter">
                      @foreach ($orders as $order)
                          <tr class="gradeX">
                              <td></td>
                              <td>{{$order->created_at}}</td>
                              <td>{{$order->user_email}}</td>
                              <td>{{$order->order_id}}</td>
                              <td>{{$order->payment}}</td>
                              <td>{{$order->totalamount}}</td>
                              <td>{{$order->delivery}}</td>
                              <td>
                                  <a href="#{{$order->order_id}}" data-toggle="modal">View Order</a>
                               </td>
                              </form>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
              <ul class="recent-posts">
                <li>
                  <a href="{{ url('/admin/orders')}}" class="btn btn-warning btn-mini">View All</a>
                </li>
              </ul>
            </div>
        </div>
      </div>
      
    </div>
    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>Quotes</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
              <table class="table table-bordered data-table">
                  <thead>
                      <tr>
                          <th>S/N </th>
                          <th>Product Name</th>
                          <th>Category</th>
                          <th>Email Address</th>
                      </tr>
                  </thead>
                  <tbody class="table-counter">
                      @foreach ($quotes as $quote)
                          <tr class="gradeX">
                              <td></td>
                              <td>{{$quote->product_name}}</td>
                              <td>{{$quote->category}}</td>
                              <td>{{$quote->email}}</td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>
            <ul class="recent-posts">
              <li>
                <a href="{{ url('/admin/quotes')}}" class="btn btn-warning btn-mini">View All</a>
              </li>
            </ul>
          </div>
        </div>
        
      </div>
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><i class="icon-chevron-down"></i></span>
            <h5>New Vendor Applicant</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
              <table class="table table-bordered data-table">
                  <thead>
                    <tr>
                      <th>S/N </th>
                      <th>Vendors</th>
                      <th>Address</th>
                      <th>Phone </th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody class="table-counter">
                    @foreach ($vendors as $vendor)
                        <tr class="gradeX">
                            <td></td>
                            <td>{{$vendor->vendor_name}}</td>
                            <td>{!!$vendor->address!!}</td>
                            <td>{{$vendor->phone_number}}</td>
                            <td class="text-center">
                                <a href="{{url('/admin/edit-vendor/'.$vendor->id)}}" class="btn btn-primary btn-mini"> Approve </a>                             
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            <ul class="recent-posts">
              
              <li>
                <a class="btn btn-warning btn-mini" href="{{ url('/admin/new-vendors')}}">View All</a>
              </li>
            </ul>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</div>

<!--end-main-container-part-->

@endsection