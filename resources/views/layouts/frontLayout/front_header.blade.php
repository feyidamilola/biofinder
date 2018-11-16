
<body>
    <nav class="navbar navbar-fixed-top">
      <div class="container">
        <div class="navbar-header col-md-2">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/')}}">
            <img src="{{ asset('/images/frontend_images/logo.png') }}" alt="Biofinder Plus">
          </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse col-md-10">
          <ul class="nav navbar-nav">
            <li class="active"><a href="{{ url('/')}}">Home</a></li>
            <li><a href="{{ url('/products')}}">products</a></li>
            <li>
                <a href="#" class="dropdown-toggle quote" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">vendors</a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="{{url('/vendors')}}">
                      All Vendors
                    </a>
                  </li>
                  <li>
                    <a href="{{url('/vendor/become-a-vendor')}}">
                        Become a vendor
                    </a>
                  </li>
                </ul>
            </li>
            
            <li class="dropdown menu-quote">
              <a href="#" class="dropdown-toggle quote" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">get quote</a>
              <ul class="dropdown-menu">
                <form method="post" action="{{url('/get-quote')}}" name="get-quote" id="get-quote" novalidate="novalidate">
                    {{ csrf_field() }}
                  <input type="text" name="product_name" placeholder="Product Name">
                  <input type="text" name="category" id="category" placeholder="Category">
                  <input type="email" name="email" id="email" placeholder="Email Address">
                  <button class="butn btn-transparent" value="get-quote" role="button">Send <i class="fa fa-long-arrow-right"></i></button>
                </form>
              </ul>
            </li>

            <li><a href="#"><i class="fa fa-user"></i></a></li>
          </ul>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->
