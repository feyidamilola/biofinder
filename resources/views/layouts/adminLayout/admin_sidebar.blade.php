@php
    $url = url()->current();
@endphp
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li <?php if (preg_match("/dashboard/", $url)) { ?>  class="active" <?php } ?>><a href="{{ url('/admin')}}" ><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>

    <li class="submenu"> <a href="#"><i class="icon icon-external-link"></i> <span>Categories</span> </a>
      <ul <?php if (preg_match("/categor/i", $url)) { ?>  style="display:block;" <?php } ?>>
       <li <?php if (preg_match("/main-categories/", $url)) { ?>  class="active" <?php } ?>><a href="{{ url('/admin/main-categories')}}">All Main Categories</a></li>
       <li <?php if (preg_match("/add-main-category/", $url)) { ?>  class="active" <?php } ?>><a href="{{ url('/admin/add-main-category')}}">Add Main Category</a></li>
     </ul> 
     <ul <?php if (preg_match("/categor/i", $url)) { ?>  style="display:block;" <?php } ?>>
        <li <?php if (preg_match("/sub-categories/", $url)) { ?>  class="active" <?php } ?>><a href="{{ url('/admin/sub-categories')}}">Sub Categories</a></li>
        <li <?php if (preg_match("/add-sub-category/", $url)) { ?>  class="active" <?php } ?>><a href="{{ url('/admin/add-sub-category')}}">Add Sub Category</a></li>
      </ul> 
    </li> 

    <li class="submenu"> <a href="#"><i class="icon icon-shopping-cart"></i> <span>Products</span> </a>
      <ul <?php if (preg_match("/product/i", $url)) { ?>  style="display:block;" <?php } ?>>
        <li <?php if (preg_match("/create-product/", $url)) { ?>  class="active" <?php } ?>><a href="{{ url('/admin/create-product')}}">Create Product</a></li>
        <li <?php if (preg_match("/all-products/", $url)) { ?>  class="active" <?php } ?>><a href="{{ url('/admin/all-products')}}">All Products</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-globe"></i> <span>Vendors</span> </a>
      <ul <?php if (preg_match("/vendor/i", $url)) { ?>  style="display:block;" <?php } ?>>
        <li <?php if (preg_match("/all-vendors/", $url)) { ?>  class="active" <?php } ?>><a href="{{ url('/admin/all-vendors')}}">All Vendors</a></li>
        <li <?php if (preg_match("/add-vendor/", $url)) { ?>  class="active" <?php } ?>><a href="{{ url('/admin/add-vendor')}}">Add Vendor</a></li>
        <li <?php if (preg_match("/new-vendors/", $url)) { ?>  class="active" <?php } ?>><a href="{{ url('/admin/new-vendors')}}">Applicants</a></li>
      </ul> 
    </li> 

    <li  <?php if (preg_match("/orders/", $url)) { ?>  class="active" <?php } ?>><a href="{{ url('/admin/orders')}}"><i class="icon icon-shopping-cart"></i> All Orders</a></li>

    <li <?php if (preg_match("/quotes/", $url)) { ?>  class="active" <?php } ?>><a href="{{ url('/admin/quotes')}}"><i class="icon icon-home"></i> <span>Quotes</span></a> </li>

    <li class="submenu"> <a href="#"><i class="icon icon-info-sign"></i> <span>Services/Solutions</span> </a>
      <ul <?php if (preg_match("/service/i", $url)) { ?>  style="display:block;" <?php } ?>>
        <li  <?php if (preg_match("/all-services/", $url)) { ?>  class="active" <?php } ?>><a href="{{ url('/admin/all-services')}}">All Services</a></li>
        <li  <?php if (preg_match("/create-service/", $url)) { ?>  class="active" <?php } ?>><a href="{{ url('/admin/create-service')}}">Add Service</a></li>
      </ul>
    </li>

    <li  <?php if (preg_match("/banner/", $url)) { ?>  class="active" <?php } ?>><a href="{{ url('/admin/all-banners')}}"><i class="icon icon-camera"></i> Homepage Banner</a></li>
  </ul>
</div>
<!--sidebar-menu-->