@php
    $url = url()->current();
@endphp

<div class="col-md-3">
    <div class="user-sidebar">
        
        <a href="{{ url('/profile')}}" <?php if (preg_match("/profile/", $url)) { ?>  class="active" <?php } ?>>
            <i class="fa fa-user"></i> Profile
        </a>

        <a href="{{ url('/password')}}" <?php if (preg_match("/password/", $url)) { ?>  class="active" <?php } ?>>
            <i class="fa fa-cog"></i> Password
        </a>
    
        <a href="/orders" <?php if (preg_match("/order/", $url)) { ?>  class="active" <?php } ?>>
            <i class="fa fa-shopping-cart"></i>  Orders
        </a>
    
        <a href="/reviews" <?php if (preg_match("/review/", $url)) { ?>  class="active" <?php } ?>>
            <i class="fa fa-pencil"></i>  Reviews
        </a>
    
    
        <a href="{{ url('/user-logout')}}">
            <i class="fa fa-sign-out"></i>  LogOut
        </a>
        
    </div>  
</div>