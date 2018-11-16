<div class="col-md-3">
        <div class="product-sidebar bg-white">
            <div class="widget">
                <h4>
                    categories
                </h4>
                <div class="widget-subcategories">
                    <div>
                        <ul>
                            @foreach ($subcategories as $subcategory)
                                <li>
                                    <a href="{{ url('/products/category/'.($subcategory->url)) }}"> 
                                        {{$subcategory->category_name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <hr class="full-width">
            </div>
            <div class="widget">
                <h4>
                    Enter Maximum Price
                </h4>
                <div class="widget-price">
                    <form action="{{url('/products')}}" method="get"> 
                        <input type="number" name="maxprice" placeholder="100" class="form-control margin-bottom-15" />
                        <button type="submit" value="submit" class="compare"> Filter </button>
                    </form>
                </div>
                <hr class="full-width">
            </div>
            <div class="widget">
                <h4>
                    brands
                </h4>
                <div class="widget-checklist">
                    <ul>
                        @foreach ($vendors as $vendor)
                            <li>
                                <a href="{{url('/vendors/'.$vendor->url)}}">
                                    {{$vendor->vendor_name}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    
                </div>
            </div>
            
        </div>
    </div>