@extends('layouts.adminLayout.admin_design')
@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb"> 
          <a href="{{ url('/admin/dashboard')}}" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> 
          <a href="javascript:;" class="current">All Quotes</a> 
        </div>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection