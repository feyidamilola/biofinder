@php
    $url = url()->current();
@endphp
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="active"><a href="{{ url('/admin')}}"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>

    <li class="submenu"> <a href="#"><i class="icon icon-external-link"></i> <span>Categories</span> </a>
      <ul>
       <li><a href="{{ url('/admin/main-categories')}}">All Main Categories</a></li>
       <li><a href="{{ url('/admin/add-main-category')}}">Add Main Category</a></li>
     </ul> 
     <ul>
        <li><a href="{{ url('/admin/sub-categories')}}">Sub Categories</a></li>
        <li><a href="{{ url('/admin/add-sub-category')}}">Add Sub Category</a></li>
      </ul> 
    </li> 

    <li class="submenu"> <a href="#"><i class="icon icon-shopping-cart"></i> <span>Products</span> </a>
      <ul>
        <li><a href="{{ url('/admin/create-product')}}">Create Product</a></li>
        <li><a href="{{ url('/admin/all-products')}}">All Products</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-globe"></i> <span>Vendors</span> </a>
      <ul>
        <li><a href="{{ url('/admin/all-vendors')}}">All Vendors</a></li>
        <li><a href="{{ url('/admin/add-vendor')}}">Add Vendor</a></li>
        <li><a href="{{ url('/admin/new-vendors')}}">Applicants</a></li>
      </ul> 
    </li> 

    {{-- <li class="submenu"> <a href="#"><i class="icon icon-shopping-cart"></i> <span>Orders</span> </a>
      <ul>
        <li><a href="#">All Orders</a></li>
        <li><a href="#">Add Order</a></li>
      </ul> 
    </li>  --}}

    <li><a href="{{ url('/admin/quotes')}}"><i class="icon icon-home"></i> <span>Quotes</span></a> </li>

    <li class="submenu"> <a href="#"><i class="icon icon-cog"></i> <span>Services/Solutions</span> </a>
      <ul>
        <li><a href="{{ url('/admin/all-services')}}">All Services</a></li>
        <li><a href="{{ url('/admin/create-service')}}">Add Service</a></li>
      </ul>
    </li>

    {{-- <li class="submenu"> <a href="#"><i class="icon icon-folder-open"></i> <span>Articles</span> </a>
      <ul>
        <li><a href="#">All Articles</a></li>
        <li><a href="#">Add Article</a></li>
      </ul>
    </li> --}}

    {{-- <li class="submenu"> <a href="#"><i class="icon icon-group"></i> <span>Users</span> </a>
      <ul>
        <li><a href="#">All Users</a></li>
        <li><a href="#">Add Article</a></li>
      </ul>
    </li>

    <li class="submenu"> <a href="#"><i class="icon icon-pencil"></i> <span>Reviews</span> </a>
      <ul>
        <li><a href="#">All Reviews</a></li>
        <li><a href="#">Add Review</a></li>
      </ul>
    </li> --}}

    <li class="submenu"> <a href="#"><i class="icon icon-align-justify"></i> <span>Pages/Banner</span> </a>
      <ul>
        {{-- <li><a href="#">All Pages</a></li>
        <li><a href="#">Add Page</a></li> --}}
        <li><a href="{{ url('/admin/all-banners')}}">Homepage Banner</a></li>
      </ul>
    </li>

    {{-- <li> <a href="{{ url('/admin/social-links')}}"><i class="icon icon-share"></i> <span>Social Media Links</span> </a></li> --}}
  </ul>
</div>
<!--sidebar-menu-->