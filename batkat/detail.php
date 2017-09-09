<?php
include_once("detailcnt.php");
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Meta -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
		<meta name="description" content="">
		<meta name="author" content="">
	    <meta name="keywords" content="MediaCenter, Template, eCommerce">
	    <meta name="robots" content="all">

	    <title>Flipmart premium HTML5 & CSS3 Template</title>

	    <!-- Bootstrap Core CSS -->
	    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
	    
	    <!-- Customizable CSS -->
	    <link rel="stylesheet" href="assets/css/main.css">
	    <link rel="stylesheet" href="assets/css/blue.css">
	    <link rel="stylesheet" href="assets/css/owl.carousel.css">
		<link rel="stylesheet" href="assets/css/owl.transitions.css">
		<link rel="stylesheet" href="assets/css/animate.min.css">
		<link rel="stylesheet" href="assets/css/rateit.css">
		<link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
        <link href="assets/css/lightbox.css" rel="stylesheet">
		

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

        <style>
        .fa-disabled{
        	opacity: 0.6;
        	cursor:not-allowed;
        }
        </style>

	</head>
    <body class="cnt-home">
		<!-- ============================================== HEADER ============================================== -->
<?php
	include_once("header.php");
?>

<!-- ============================================== HEADER : END ============================================== -->
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="#">Home</a></li>
				<li><a href="#">Clothing</a></li>
				<li class='active'>Floral Print Buttoned</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row single-product'>
			<div class='col-md-3 sidebar'>
				<div class="sidebar-module-container">
					<div class="home-banner outer-top-n">
						<img src="assets/images/banners/LHS-banner.jpg" alt="Image">
					</div>
				</div>
			</div><!-- /.sidebar -->
			<div class='col-md-9'>
	            <div class="detail-block">
					<div class="row  wow fadeInUp">
	                	<div class="col-xs-12 col-sm-6 col-md-5 gallery-holder">
						    <div class="product-item-holder size-big single-product-gallery small-gallery">
								<div id="owl-single-product">
									<div class="" id="slide1">
						           		<a data-lightbox="image-2" data-title="Gallery" href="../src/images/products/<?php echo $data[0]->ImageURL ; ?>">
						                    <img class="img-responsive" alt="" src="../src/images/products/<?php echo $data[0]->ImageURL ; ?>" data-echo="../src/images/products/<?php echo $data[0]->ImageURL ; ?>" style="height:280px; width: 200px; "/>
						                </a>
						            </div>
									<?php
									 $i=1;
										foreach ($data as $d) {
											$i = $i+1;
											?>
									            <div class="" id="<?php echo 'slide'.$i; ?>">
									           		<a data-lightbox="<?php echo 'image-'.$i; ?>" data-title="Gallery" href="../src/images/products/<?php echo $d->ImageURL ; ?>">
									                    <img class="img-responsive" alt="" src="../src/images/products/<?php echo $d->ImageURL ; ?>" data-echo="../src/images/products/<?php echo $d->ImageURL ; ?>" style="height:280px; width: 200px; "/>
									                </a>
									            </div>
								            <?php
										}
									?>
								</div>
								<div class="single-product-gallery-thumbs gallery-thumbs">
									<div id="owl-single-product-thumbnails">
										<?php
											$i=0;
											foreach ($data as $d) {
												
											?>
												<div class="item">
													<?php
														$i = $i+1;
													?>
												    <a class="horizontal-thumb" data-target="#owl-single-product" data-slide="<?php echo $i; ?>" href="<?php echo '#slide'.$i; ?>">
								                        <img class="img-responsive" width="85" alt="" src="../src/images/products/<?php echo $d->ImageURL ; ?>" data-echo="../src/images/products/<?php echo $d->ImageURL ; ?>" style="height: 100px; width:100px;"/>
								                    </a>
					              			    </div>
					              			<?php	
											}
										?>
						            </div><!-- /#owl-single-product-thumbnails -->
								</div>
							</div>
						</div>       			
						<div class='col-sm-6 col-md-7 product-info-block'>
							<div class="product-info">
								<h1 class="name"><?php echo $data[0]->ProductName; ?></h1>
								
								<div class="rating-reviews m-t-20">
									<div class="row">
										<div class="col-sm-3">
											
										</div>
										<div class="col-sm-8">
											<div class="reviews">
											
											</div>
										</div>
									</div><!-- /.row -->		
								</div><!-- /.rating-reviews -->

								<div class="stock-container info-container m-t-10">
									<div class="row">
										<div class="col-sm-2">
											<div class="stock-box">
												<span class="label">Availability :</span>
											</div>	
										</div>
										<div class="col-sm-9">
											<div class="stock-box">
												<?php
													$qtydata["ProductID"]=$_REQUEST["productid"];
													$qtydisplay=$modal->display("tblsizexquantity",0,$qtydata,$connection);
												?>
												<span class="value"><?php if($qtydisplay !=0){echo "IN STOCK";} else{echo "OUT OF STOCK";}?></span>
											</div>	
										</div>
									</div><!-- /.row -->	
								</div><!-- /.stock-container -->

								
								<div class="price-container info-container m-t-20">
									<div class="row">
										

										<div class="col-sm-12">
											<div class="price-box">
												<span class="price"><?php echo $data[0]->SellingPrice.".00"?></span>
												<span class="price-strike"><?php echo $data[0]->Cost?></span>
												<span class="price pull-right" style="color:black;"><?php echo $data[0]->DiscountPercentage."% Discount"?></span>
											</div>
										</div>

										<div class="col-sm-12">
											<div class="favorite-button m-t-10">
												<form method="post">
													<?php
														if($wishdisplay ==0){
														?>
													<input type="submit" id="submitwishlist" name="wishlist" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Wishlist" style="display:none;">

													<i class="fa fa-heart" style="font-size:25px;" onclick="document.getElementById('submitwishlist').click()"></i>
													 <?php
													}
													else
													{
													?>
														<i class="fa fa-heart fa-disabled" data-toggle="tooltip"
														title="This Product Already In Wishlist" style="font-size: 25px;"></i>
													<?php
													}
													?>
												</form>
											</div>
										</div>

									</div><!-- /.row -->
								</div><!-- /.price-container -->

								<div class="quantity-container info-container">
									<div class="row">
										
										<div class="col-sm-2">
											<span class="label">Qty :</span>
										</div>
										
										<div class="col-sm-2">
											<div class="cart-quantity">
												<div class="quant-input">
									                <div class="arrows">
									                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
									                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
									                </div>
									                <input type="text" value="1">
								              </div>
								            </div>
										</div>

										<div class="col-sm-7">
											<a href="#" class="btn btn-primary"><i class="fa fa-shopping-cart inner-right-vs"></i> ADD TO CART</a>
										</div>

										
									</div><!-- /.row -->
								</div><!-- /.quantity-container -->

								

								

								
							</div><!-- /.product-info -->
						</div>
					</div>
	            </div>
				<div class="product-tabs inner-bottom-xs  wow fadeInUp">
					<div class="row">
						<div class="col-sm-3">
							<ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
								<li class="active"><a data-toggle="tab" href="#description">DESCRIPTION</a></li>
								<!--<li><a data-toggle="tab" href="#review">REVIEW</a></li>
								<li><a data-toggle="tab" href="#tags">TAGS</a></li> -->
							</ul><!-- /.nav-tabs #product-tabs -->
						</div>
						<div class="col-sm-9">
							<div class="tab-content">
								<div id="description" class="tab-pane in active">
									<div class="product-tab">
										<p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.<br><br> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
									</div>	
								</div><!-- /.tab-pane -->

								<div id="review" class="tab-pane">
									<div class="product-tab">
																				
										<div class="product-reviews">
											<h4 class="title">Customer Reviews</h4>

											<div class="reviews">
												<div class="review">
													<div class="review-title"><span class="summary">We love this product</span><span class="date"><i class="fa fa-calendar"></i><span>1 days ago</span></span></div>
													<div class="text">"Lorem ipsum dolor sit amet, consectetur adipiscing elit.Aliquam suscipit."</div>
																										</div>
											
											</div><!-- /.reviews -->
										</div><!-- /.product-reviews -->
										

										
										<div class="product-add-review">
											<h4 class="title">Write your own review</h4>
											<div class="review-table">
												<div class="table-responsive">
													<table class="table">	
														<thead>
															<tr>
																<th class="cell-label">&nbsp;</th>
																<th>1 star</th>
																<th>2 stars</th>
																<th>3 stars</th>
																<th>4 stars</th>
																<th>5 stars</th>
															</tr>
														</thead>	
														<tbody>
															<tr>
																<td class="cell-label">Quality</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Price</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
															<tr>
																<td class="cell-label">Value</td>
																<td><input type="radio" name="quality" class="radio" value="1"></td>
																<td><input type="radio" name="quality" class="radio" value="2"></td>
																<td><input type="radio" name="quality" class="radio" value="3"></td>
																<td><input type="radio" name="quality" class="radio" value="4"></td>
																<td><input type="radio" name="quality" class="radio" value="5"></td>
															</tr>
														</tbody>
													</table><!-- /.table .table-bordered -->
												</div><!-- /.table-responsive -->
											</div><!-- /.review-table -->
											
											<div class="review-form">
												<div class="form-container">
													<form role="form" class="cnt-form">
														
														<div class="row">
															<div class="col-sm-6">
																<div class="form-group">
																	<label for="exampleInputName">Your Name <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="exampleInputName" placeholder="">
																</div><!-- /.form-group -->
																<div class="form-group">
																	<label for="exampleInputSummary">Summary <span class="astk">*</span></label>
																	<input type="text" class="form-control txt" id="exampleInputSummary" placeholder="">
																</div><!-- /.form-group -->
															</div>

															<div class="col-md-6">
																<div class="form-group">
																	<label for="exampleInputReview">Review <span class="astk">*</span></label>
																	<textarea class="form-control txt txt-review" id="exampleInputReview" rows="4" placeholder=""></textarea>
																</div><!-- /.form-group -->
															</div>
														</div><!-- /.row -->
														
														<div class="action text-right">
															<button class="btn btn-primary btn-upper">SUBMIT REVIEW</button>
														</div><!-- /.action -->

													</form><!-- /.cnt-form -->
												</div><!-- /.form-container -->
											</div><!-- /.review-form -->

										</div><!-- /.product-add-review -->										
										
							        </div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

								<div id="tags" class="tab-pane">
									<div class="product-tag">
										
										<h4 class="title">Product Tags</h4>
										<form role="form" class="form-inline form-cnt">
											<div class="form-container">
									
												<div class="form-group">
													<label for="exampleInputTag">Add Your Tags: </label>
													<input type="email" id="exampleInputTag" class="form-control txt">
													

												</div>

												<button class="btn btn-upper btn-primary" type="submit">ADD TAGS</button>
											</div><!-- /.form-container -->
										</form><!-- /.form-cnt -->

										<form role="form" class="form-inline form-cnt">
											<div class="form-group">
												<label>&nbsp;</label>
												<span class="text col-md-offset-3">Use spaces to separate tags. Use single quotes (') for phrases.</span>
											</div>
										</form><!-- /.form-cnt -->

									</div><!-- /.product-tab -->
								</div><!-- /.tab-pane -->

							</div><!-- /.tab-content -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div>
				<section class="section featured-product wow fadeInUp">
					<h3 class="section-title">upsell products</h3>
					<div class="owl-carousel home-owl-carousel upsell-product custom-carousel owl-theme outer-top-xs">
        <?php
            foreach($Product as $pd)
                    {
                    $jf=null;
                    $tbl1=null;
                    $field=null;
                    $ImageData=null;
                    $tbl1=array("tblproductimage");
                    $field=array("ImageURL");
                    $jf["ProductImageID"]="(select min(ProductImageID) from tblproductimage where ProductID=$pd->ProductID and ProductImageStatus=0)";  
                    $ImageData=$modal->joinqry($tbl1,$field,$jf,$connection);
        ?>            
		<div class="item item-carousel">
			<div class="products">		
	           <div class="product" style="height: 350px;">		
            		<div class="product-image" style="height: 250px;width: 250px;">
            			<div class="image">
            				<a href="detail.php?productid=<?php echo $pd->ProductID ; ?>"><img  src="../src/images/products/<?php echo $ImageData[0]->ImageURL ; ?>" style="position: absolute; height:200px;width:auto;max-width: 100%" alt=""></a>
            			</div><!-- /.image -->            		   
            		</div><!-- /.product-image -->
        		<div class="product-info text-left">
        			<h3 class="name"><a href="detail.php?productid=<?php echo $pd->ProductID ; ?>""><?php echo $pd->ProductName ; ?></a></h3>
        			<div class="rating rateit-small"></div>
        			<div class="description"></div>
                    <?php
                    if($pd->DiscountPercentage != 0)
                    {
                    ?>    
        			<div class="product-price">	
        				<span class="price">
        					&#8377;<?php echo $pd->SellingPrice ; ?>
                        </span>
        			    <span class="price-before-discount">
                            &#8377;<?php echo $pd->Cost ; ?>
                        </span>					
        			</div><!-- /.product-price -->
                    <?php
                    }
                    else
                    {
                    ?>
                    <div class="product-price"> 
                        <span class="price">
                            &#8377;<?php echo $pd->Cost ; ?>
                        </span>                
                    </div><!-- /.product-price -->
                    <?php    
                    }    
                    ?>	
        		</div><!-- /.product-info -->
        		<div class="cart clearfix animate-effect">
    				<div class="action">
    					<ul class="list-unstyled">
    						<li class="add-cart-button btn-group">
    							<button class="btn btn-primary icon" data-toggle="dropdown" type="button">
    								<i class="fa fa-shopping-cart"></i>							
    							</button>
    							<button class="btn btn-primary cart-btn" type="button">Add to cart</button>						
    						</li>
    		                <li class="lnk wishlist">
    							<a class="add-to-cart" href="detail.php" title="Wishlist">
    								 <i class="icon fa fa-heart"></i>
    							</a>
    						</li>
    					</ul>
    				</div><!-- /.action -->
			    </div><!-- /.cart -->
			    </div><!-- /.product -->
		    </div><!-- /.products -->
		</div><!-- /.item -->
        <?php
            }
        ?>  
    </div><!-- /.home-owl-carousel -->
				</section>
			</div><!-- /.col -->
			<div class="clearfix"></div>
		</div><!-- /.row -->
	</div><!-- /.logo-slider -->
</div>

<!-- ============================================================= FOOTER ============================================================= -->
<?php 
include_once("footer.php");
?>
<!-- ============================================================= FOOTER : END============================================================= -->


	<!-- For demo purposes – can be removed on production -->
	
	
	<!-- For demo purposes – can be removed on production : End -->

	<!-- JavaScripts placed at the end of the document so the pages load faster -->
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	
	<script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/js/bootstrap-hover-dropdown.min.js"></script>
	<script src="assets/js/owl.carousel.min.js"></script>
	
	<script src="assets/js/echo.min.js"></script>
	<script src="assets/js/jquery.easing-1.3.min.js"></script>
	<script src="assets/js/bootstrap-slider.min.js"></script>
    <script src="assets/js/jquery.rateit.min.js"></script>
    <script type="text/javascript" src="assets/js/lightbox.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	

	

</body>
</html>