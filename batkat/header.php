<?php
  include_once("header_cnt.php");
?>
<style>
	#demo1 , #demo15{
		color: red;
	}
</style>
<script type="text/javascript">
      function categories()
      {
        var abc;
        if(window.XMLHttpRequest)
        {
          abc=new XMLHttpRequest();
        }
        else
        {
          abc=new ActiveXObject("Microsoft.XMLHTTP");
        }
       
        abc.open("GET","header_cnt.php?flag=true",true);
        abc.send();

        abc.onreadystatechange=function(){
          if(abc.readyState == 4 && abc.status == 200)
          {
            
             document.getElementById("categories").innerHTML = abc.responseText;

          }
          
       }
       
    }

    function myFunction() {
     
     var abc;

     var a = document.getElementById("duplicate").value;
    

     if(window.XMLHttpRequest)
     {
      abc=new XMLHttpRequest();
     }
     else
     {
      abc=new ActiveXObject("Microsoft.XMLHTTP");
     }
   
     abc.open("GET","header_Cnt.php?checkmail="+a,true);
     abc.send();
     //alert(a);
     abc.onreadystatechange=function() {
       if(abc.readyState==4 && abc.status==200)
       {
       document.getElementById("demo").innerHTML=abc.responseText;
       }
     }

   }
    categories();
    </script>
<header class="header-style-1" style="background: none">
	<!-- ============================================== TOP MENU ============================================== -->
     	<div class="top-bar animate-dropdown">
	<div class="container">
		<div class="header-top-inner">
			<div class="cnt-account">
				<ul class="list-unstyled">
				    <?php
				    if(isset($_SESSION["UserID"])){
				    ?>
            <li><a href="myorders.php"  style="color:black"><i class="icon fa fa-user"></i>My Orders</a></li>
					  <li><a href="UserProfile.php" style="color:black"><i class="icon fa fa-user"></i>My Account</a></li>
					<?php
			     	}
			     	?>	
					<li><a href="my-wishlist.php" style="color:black"><i class="icon fa fa-heart"></i>Wishlist</a></li>
					<li><a href="shopping-cart.php" style="color:black"><i class="icon fa fa-shopping-cart"></i>My Cart</a></li>
					<li><a href="checkout.php"  style="color:black"><i class="icon fa fa-check"></i>Checkout</a></li>
					<li>
                    <?php
                    if(!isset($_SESSION['UserID'])){
                    ?>
					 <!--  <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Login</button> -->
					  <button class="btn btn-primary btn-lg" href="#signup" data-toggle="modal" data-target=".bs-modal-sm">Sign In/Register</button>
                     <?php
                    }
                    else
                    {
                    ?>
		            <li class="dropdown" style="padding: 1em;"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $_SESSION["FirstName"];?><span class="caret"></span></a>
	                   <ul class="dropdown-menu" style="padding: 1em;">
	                       <li class="menu-item">
	                          <form method="post">
	                             <span>
	                             <a href="logout.php">Logout</a>
	                             </span>
	                         </form>
	                      </li>
                     </ul>
                  </li> 
                    	<?php
                    }
                    ?>
					</li>
					
					  <!-- Trigger the modal with a button -->
					 
										 <div class="modal fade bs-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
        <br>
        <div class="bs-example bs-example-tabs">
            <ul id="myTab" class="nav nav-tabs">
              <button type="button" class="btn btn-default" data-dismiss="modal" style="float:right; margin-top: -1em; background-color: #428bca; ">x</button>
              <li class="active"><a href="#signin" data-toggle="tab" class="btn btn-info" >Sign In</a></li>
              <li class=""><a href="#signup" data-toggle="tab" class="btn btn-info">Register</a></li>
            </ul>
        </div>
      <div class="modal-body">
        <div id="myTabContent" class="tab-content">
        <div class="tab-pane fade active in" id="signin">
            <form class="form-horizontal" method="post">
            <!-- Sign In Form -->
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="userid">Email ID:</label>
              <div class="controls">
                <input required="" name="email" type="text" class="form-control" placeholder="Enter Your Email" class="input-medium" required="">
              </div>
            </div>

            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="passwordinput">Password:</label>
              <div class="controls">
                <input required="" id="passwordinput" name="password" class="form-control" type="password" placeholder="********" class="input-medium">
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="signin"></label>
              <div class="controls" >
                <button id="signin" name="btnLogin" class="btn btn-info">Sign In</button>
              </div>
            </div>
            </form>
        </div>
        <div class="tab-pane fade" id="signup">
            <form class="form-horizontal" method="post" name="myform" onsubmit="return validateForm()">
            <!-- Sign Up Form -->
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="Email">Email:</label>
              <div class="controls">
                <input  name="emailid" class="form-control" id="duplicate" onkeyup="myFunction()" type="text" placeholder="Enter Your Email" class="input-large" title="Write Your Correct Email">
                <label id="demo1"></label>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="userid">First Name:</label>
              <div class="controls">
                <input  name="fname" id="fname" class="form-control" type="text" placeholder="Enter yor Firstname" class="input-large">
              </div>
              <p id="demo2"></p>
            </div>
            
             <div class="control-group">
              <label class="control-label" for="userid">Last Name:</label>
              <div class="controls">
                <input name="lname" id="lname" class="form-control" type="text" placeholder="Enter yor Lastname" class="input-large">
              </div>
              <p id="demo3"></p>
            </div>
            <!-- Password input-->
            <div class="control-group">
              <label class="control-label" for="password">Password:</label>
              <div class="controls">
                <input id="Password" name="password" class="form-control input-large" type="password" placeholder="********">

                <label id="demo15" value=""></label>
              </div>

            </div>
            
            <!-- Text input-->
            
            <!-- Multiple Radios (inline) -->
            <br>
            
            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="confirmsignup"></label>
              <div class="controls" id="demo">
                   <p id="demo16"></p>
              </div>
            </div>
            </form>
      </div>
    </div>
      </div>
    </div>
  </div>
</div>

					  <!-- Modal -->
					   <!--  <div class="modal fade" id="myModal" role="dialog">
					      <form method="post">
						    <div class="modal-dialog" style="width: 25%; margin-top: 14em;">
						      <div class="modal-content">
							        <div class="modal-header"  style="background-color: #fdd922">
							          <button type="button" class="close" data-dismiss="modal">&times;</button>
							         <center><h4 class="modal-title">Login In</h4></center>
							        </div>
							        <div class="modal-body">
							        <div style="margin: 1em;">
							        <lable>Email ID :</lable>
							          <input type="text" class="form-control" name="email" placeholder="Enter Your Email" style="width: 100%;">
							         </div> 
							          <div style="margin: 1em;">
							         <lable>Password :</lable> 
							          <input type="text" class="form-control" name="password" placeholder="Enter Your Password" style="width: 100%;">
                                       </div>
							        </div>
							        <div class="modal-footer">

							          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							          <input type="submit" name="btnLogin" value="Login" class="btn btn-primary">
							        </div>
						      </div>
						    </div>
						    </form>
                      </div> -->
                  </ul>
			</div><!-- /.cnt-account -->

			<!-- /.cnt-cart -->
			<div class="clearfix"></div>
		</div><!-- /.header-top-inner -->
	</div><!-- /.container -->
</div><!-- /.header-top -->
<!-- ============================================== TOP MENU : END ============================================== -->
	<div class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-3 logo-holder">
					<!-- ============================================================= LOGO ============================================================= -->
					<div class="logo">
						<a href="home.html" style="color: black;">
							<span style="font-size:25px; color: black; font-family:sans-serif;">BarkatComputers</span>
						</a>
					</div>
				</div><!-- /.logo-holder -->

				<div class="col-xs-12 col-sm-12 col-md-2 pull-right animate-dropdown top-cart-row">
					<div class="dropdown dropdown-cart">
						<a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown" style="color: black">
							<div class="items-cart-inner">
				            <div class="basket">
									<i class="glyphicon glyphicon-shopping-cart"></i>
								</div>
								<div class="basket-item-count"><span class="count">2</span></div>
								<div class="total-price-basket">
									<span class="lbl">cart -</span>
									<span class="total-price">
										<span class="sign" style="color: black">₹</span><span class="value" style="color: black">600.00</span>
									</span>
								</div>
								
							
						    </div>
						</a>
						<ul class="dropdown-menu">
							<li>
								<div class="cart-item product-summary">
									<div class="row">
										<div class="col-xs-4">
											<div class="image">
												<a href="detail.html"><img src="assets/images/cart.jpg" alt=""></a>
											</div>
										</div>
										<div class="col-xs-7">
											
											<h3 class="name"><a href="index.php?page-detail">Simple Product</a></h3>
											<div class="price">₹600.00</div>
										</div>
										<div class="col-xs-1 action">
											<a href="#"><i class="fa fa-trash"></i></a>
										</div>
									</div>
								</div><!-- /.cart-item -->
								<div class="clearfix"></div>
							<hr>
						
							<div class="clearfix cart-total">
								<div class="pull-right">
									
										<span class="text">Sub Total :</span><span class='price'>₹600.00</span>
										
								</div>
								<div class="clearfix"></div>
									
								<a href="checkout.html" class="btn btn-upper btn-primary btn-block m-t-20">Checkout</a>	
							</div><!-- /.cart-total-->
									
								
						</li>
						</ul><!-- /.dropdown-menu-->
					</div><!-- /.dropdown-cart -->
				</div><!-- /.top-cart-row -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div>
	<div class="header-nav animate-dropdown" style="margin-left: 3em;margin-right: 3em">
	    <div class="container">
	        <div class="yamm navbar navbar-default" role="navigation">
	            <div class="navbar-header">
	                <button data-target="#mc-horizontal-menu-collapse" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
	                    <span class="sr-only">Toggle navigation</span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                    <span class="icon-bar"></span>
	                </button>
	            </div>
	            <div class="nav-bg-class">
	                <div class="navbar-collapse collapse" id="mc-horizontal-menu-collapse">
						<div class="nav-outer">
							<ul class="nav navbar-nav">
								<li class="active dropdown yamm-fw">
									<a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Home</a>
								</li>
								<li class="dropdown yamm mega-menu">
									<a href="home.html" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Hardware</a>
	             				   <ul class="dropdown-menu container">
										<li>
				               				<div class="yamm-content ">
				            					<div class="row"><!-- /.yamm-content -->					
							                   		<div class="col-xs-12 col-sm-12 col-md-2 col-menu">
											                <h2 class="title">Laptops</h2>
											                <ul class="links">
											                   <li><a href="#">Gaming</a></li>
											                   <li><a href="#">Laptop Skins</a></li>
											                    <li><a href="#">Apple</a></li>
											                    <li><a href="#">Dell</a></li>
											                    <li><a href="#">Lenovo</a></li>
											                    <li><a href="#">Microsoft</a></li>
											                    <li><a href="#">Asus</a></li>
											                     <li><a href="#">Adapters</a></li>
											                     <li><a href="#">Batteries</a></li>
											                     <li><a href="#">Cooling Pads</a></li>
											                </ul>
											            </div>
												</div>
											</div>
										</li>
									</ul>
								</li>
								<li class="dropdown mega-menu">
									<a href="category.html"  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">Peripheral
										<!-- <span class="menu-label hot-menu hidden-xs">hot</span>-->									
									</a>
					                <ul class="dropdown-menu container">
										<li>
											<div class="yamm-content">
											    <div class="row">
											           <!-- /.col -->

											            <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
											                <h2 class="title">Desktops</h2>
											                <ul class="links">
											                    <li><a href="#">Routers & Modems</a></li>
											                    <li><a href="#">CPUs, Processors</a></li>
											                    <li><a href="#">PC Gaming Store</a></li>
											                    <li><a href="#">Graphics Cards</a></li>
											                    <li><a href="#">Components</a></li>
											                    <li><a href="#">Webcam</a></li>
											                    <li><a href="#">Memory (RAM)</a></li>
											                    <li><a href="#">Motherboards</a></li>
											                    <li><a href="#">Keyboards</a></li>
											                    <li><a href="#">Headphones</a></li>
											                </ul>
											            </div><!-- /.col -->
											           <!--  <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
											                <h2 class="title">Mobile Phones</h2>
											                <ul class="links">
											                    <li><a href="#">Apple</a></li>
											                    <li><a href="#">Samsung</a></li>
											                    <li><a href="#">Lenovo</a></li>
											                    <li><a href="#">Motorola</a></li>
											                    <li><a href="#">LeEco</a></li>
											                    <li><a href="#">Asus</a></li>
											                    <li><a href="#">Acer</a></li>
											                    <li><a href="#">Accessories</a></li>
											                    <li><a href="#">Headphones</a></li>
											                     <li><a href="#">Memory Cards</a></li>
											                </ul>
											            </div> -->
											            <!-- 
											             <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner">
											             <a href="#"><img alt="" src="assets/images/banners/banner-side.png"></a>
											             </div> -->
											    </div><!-- /.row -->
											</div><!-- /.yamm-content -->					
										</li>
									</ul>
								</li>
								<li class="dropdown  mega-menu hidden-sm">
									<a href="category.html"  data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown">CCTV
											<!-- <span class="menu-label hot-menu hidden-xs">hot</span>-->
									</a>
					                <ul class="dropdown-menu container">
										<li>
											<div class="yamm-content">
											    <div class="row">

											            <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
											                <h2 class="title">Cameras</h2>
											                <ul class="links">
											                    <li><a href="#">Accessories</a></li>
											                    <li><a href="#">Binoculars</a></li>
											                    <li><a href="#">Telescopes</a></li>
											                    <li><a href="#">Camcorders</a></li>
											                    <li><a href="#">Digital</a></li>
											                     <li><a href="#">Film Cameras</a></li>
											                     <li><a href="#">Flashes</a></li>
											                     <li><a href="#">Lenses</a></li>
											                     <li><a href="#">Surveillance</a></li>
											                      <li><a href="#">Tripods</a></li>
											                     
											                </ul>
											            </div><!-- /.col -->
											           <!--  <div class="col-xs-12 col-sm-12 col-md-2 col-menu">
											                <h2 class="title">Mobile Phones</h2>
											                <ul class="links">
											                    <li><a href="#">Apple</a></li>
											                    <li><a href="#">Samsung</a></li>
											                    <li><a href="#">Lenovo</a></li>
											                    <li><a href="#">Motorola</a></li>
											                    <li><a href="#">LeEco</a></li>
											                    <li><a href="#">Asus</a></li>
											                    <li><a href="#">Acer</a></li>
											                    <li><a href="#">Accessories</a></li>
											                    <li><a href="#">Headphones</a></li>
											                     <li><a href="#">Memory Cards</a></li>
											                </ul>
											            </div> -->
											            <!-- 
											             <div class="col-xs-12 col-sm-12 col-md-4 col-menu custom-banner">
											             <a href="#"><img alt="" src="assets/images/banners/banner-side.png"></a>
											             </div> -->
											    </div><!-- /.row -->
											</div><!-- /.yamm-content -->					
										</li>
									</ul>
								</li>
											<!-- 
								<li class="dropdown hidden-sm">
									<a href="category.html">Watches</a>
								</li>

								<li class="dropdown">
									<a href="contact.html">Jewellery</a>
								</li>
					            
					            <li class="dropdown">
									<a href="contact.html">Shoes</a>
								</li>
					            <li class="dropdown">
									<a href="contact.html">Kids & Girls</a>
								</li>
								
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Pages</a>
									<ul class="dropdown-menu pages">
										<li>
											<div class="yamm-content">
												<div class="row">
													
														<div class="col-xs-12 col-menu">
						                                  <ul class="links">
							                                  	<li><a href="home.html">Home</a></li>
																<li><a href="category.html">Category</a></li>
																<li><a href="detail.html">Detail</a></li>
																<li><a href="shopping-cart.html">Shopping Cart Summary</a></li>
					                                            <li><a href="checkout.html">Checkout</a></li>
																<li><a href="blog.html">Blog</a></li>
																<li><a href="blog-details.html">Blog Detail</a></li>
																<li><a href="contact.html">Contact</a></li>
					                                            <li><a href="sign-in.html">Sign In</a></li>
																<li><a href="my-wishlist.html">Wishlist</a></li>
																<li><a href="terms-conditions.html">Terms and Condition</a></li>
																<li><a href="track-orders.html">Track Orders</a></li>
																<li><a href="product-comparison.html">Product-Comparison</a></li>
							                                  	<li><a href="faq.html">FAQ</a></li>
																<li><a href="404.html">404</a></li>
																
						                                  </ul>
														</div>
														
														
													
												</div>
											</div>
										</li>
					                    
					                   
										
									</ul>
								</li> -->
					             <!-- <li class="dropdown  navbar-right special-menu">
									<a href="#">Todays offer</a>
								</li> -->
							</ul><!-- /.navbar-nav -->
							<div class="clearfix"></div>				
						</div><!-- /.nav-outer -->
					</div><!-- /.navbar-collapse -->
				</div><!-- /.nav-bg-class -->
	        </div><!-- /.navbar-default -->
	    </div><!-- /.container-class -->
	</div><!-- /.header-nav -->
</header>