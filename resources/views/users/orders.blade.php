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
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif  
    </div>
    @include('users.sidebar')
    <div class="col-md-9">
        
      <!-- user -->
        <div class="full-width overflow user-profile">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>S/N </th>
                        <th>Order Id</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Product Price</th>
                        <th>Order Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody class="table-counter table-order">
                    @foreach ($orderproducts as $orderproduct)
                        <tr class="gradeX">
                            <td></td>
                            <td>
                                {{$orderproduct->order_id}}
                            </td>
                            <td>
                                {{$orderproduct->product_name}}
                            </td>
                            <td>
                                {{$orderproduct->product_qty}}
                            </td>
                            <td>
                                {{$orderproduct->product_price}}
                            </td>
                            <td>
                                {{$orderproduct->created_at}}
                            </td>
                            <td>
                                {{$orderproduct->status}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
      <!-- /user -->
    </div>
    
  </div>

@endsection