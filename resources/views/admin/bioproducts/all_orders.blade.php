@extends('layouts.adminLayout.admin_design')
@section('content')

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> 
            <a href="{{ url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
            <a href="javascript:;" class="current">All Orders</a> 
            </div>
        </div>
        @if(Session::has('flash_message_success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
            </div>
        @endif
        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span12">
                    <div class="widget-box">
                        <div class="widget-content nopadding">
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>S/N </th>
                                        <th>Customer Email</th>
                                        <th>Order Id</th>
                                        <th>Payment Method</th>
                                        <th>Amount</th>
                                        <th>Delivery</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                        <th>Update</th>
                                    </tr>
                                </thead>
                                <tbody class="table-counter">
                                    @foreach ($orders as $order)
                                        <tr class="gradeX">
                                            <td></td>
                                            <td>{{$order->user_email}}</td>
                                            <td>{{$order->order_id}}</td>
                                            <td>{{$order->payment}}</td>
                                            <td>{{$order->totalamount}}</td>
                                            <td>{{$order->delivery}}</td>
                                            <form action="{{url('/admin/orders')}}" method="post" name="updateorder" novalidate="novalidate">
                                                {{ csrf_field() }}
                                                <input type="hidden" value="{{$order->order_id}}" name="order_id">
                                                <td style="max-width: 75px">
                                                    <select name="order_status" id="order_status">
                                                        <option value="{{$order->status}}">{{$order->status}}</option>
                                                        <option value="new">New</option>
                                                        <option value="shipped">shipped</option>
                                                        <option value="completed">completed</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <a href="#{{$order->order_id}}" data-toggle="modal">View Order</a>
                                                </td>
                                                <td class="text-right">
                                                    <input type="submit" value="Update" class="btn btn-success">
                                                </td>
                                            </form>
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
    <div id="{{$order->order_id}}" class="modal hide">
        <div class="modal-header">
            <button data-dismiss="modal" class="close" type="button">×</button>
            <h3>Order Details</h3>
        </div>
        <div>
            
        </div>
        <div class="modal-body">
            <table width="100%">
                <thead>
                    @foreach ($userdetails as $userdetail)
                    <tr>
                        <td>Customer Name</td>
                        <td colspan="3" class="text-right">{{$userdetail->name}}</td>
                    </tr>
                    <tr>
                        <td>
                            Phone Number
                        </td>
                        <td colspan="3" class="text-right">
                            {{$userdetail->phone}}
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td colspan="3" class="text-right">{{$userdetail->address}}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>Additional Information</td>
                        <td colspan="3" class="text-right">{{$order->additional_info}}</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Product Name</td>
                        <td>Price</td>
                        <td>Qty</td>
                        <td class="text-right">Total</td>
                    </tr>
                    @foreach ($orderproducts as $orderproduct)
                        @php
                            $productprice = 0;
                            $productprice = $orderproduct->product_qty * $orderproduct->product_price;
                        @endphp
                        <tr class="cart-card">
                            <td>
                                {{$orderproduct->product_name}}
                            </td>
                            <td>
                                {{$orderproduct->product_price}}
                            </td>
                            <td>
                                {{$orderproduct->product_qty}}
                            </td>
                            <td class="text-right">
                                &#8358;
                                    @php
                                        echo $productprice;
                                    @endphp
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot class="cart-card">
                    <tr>
                        <td colspan="3" class="text-right">
                            Payment Method: 
                        </td>
                        <td class="text-right" > 
                            {{$order->payment}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">
                            Delivery Method: 
                        </td>
                        <td class="text-right" > 
                            {{$order->delivery}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">
                            Vendor: 
                        </td>
                        <td class="text-right" > 
                            @foreach ($vendors as $vendor)
                                {{$vendor->vendor_name}}                               
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">
                            Total Amount: 
                        </td>
                        <td class="text-right" > 
                            {{$order->totalamount}}
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection