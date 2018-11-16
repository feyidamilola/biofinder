
		<div class="container margin-bottom-60">
	    <hr class="col-md-12">
	</div>
    <footer>
 		<div class="container"> 
 			<div>
 				<img src="{{ asset('/images/frontend_images/logo.png') }}" alt="Biofinder Plus">
 			</div>
 			<div>
 				<ul class="footer-link">
 					<li> 
 						<a href="{{ url('/')}}">home</a>
 					</li>
 					<li> 
 						<a href="{{ url('/products')}}">product</a>
 					</li>
 					<li> 
 						<a href="#">articles</a>
 					</li>
 					<li> 
 						<a href="#">videos</a>
 					</li>
 					<li> 
 						<a href="#">more</a>
 					</li>
 				</ul>
 			</div>
 			<div>
				<div class="col-md-2"></div>
				<div class="col-md-8 col-sm-12">
					<div class="home-search footer-form">
						@include('products.searchform')
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
			<div class="footer-icons col-md-12">
				<a href="#">
					<i class="fa fa-facebook"></i>
				</a>
				<a href="#">
					<i class="fa fa-twitter"></i>
				</a>
				<a href="#">
					<i class="fa fa-instagram"></i>
				</a>
				<a href="#">
					<i class="fa fa-youtube"></i>
				</a>
			</div>
 		</div>
 	</footer>
 	<div class="footer-bottom">
		 copyright @<?php echo date("Y"); ?>		 
 	</div>

  </body>
</html>
