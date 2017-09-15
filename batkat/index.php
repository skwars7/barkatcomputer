<?php
	include_once("homecnt.php");
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

		

		
		<!-- Icons/Glyphs -->
		<link rel="stylesheet" href="assets/css/font-awesome.css">

        <!-- Fonts --> 
		<link href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600,600italic,700,700italic,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

        <style type="text/css">
        	.dropdown:active{
        		background-color:red;
        	}
        </style>
	</head>
    <body class="cnt-home">
		<!-- ============================================== HEADER ============================================== -->
<?php
include_once("header.php");
?>

<div class="body-content outer-top-xs" id="top-banner-and-menu">
	<div class="container">
		<div class="row">	
			<div class="col-xs-12 col-sm-12 col-md-3 sidebar">
				<div class="side-menu animate-dropdown outer-bottom-xs">
				    <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>        
				    <nav class="yamm megamenu-horizontal" role="navigation">
				        <ul class="nav">
				        	<?php 
				                	foreach ($category1 as $ca) {
									$field=array("SubCategoryName","CategoryID","SubCategoryID");
								    $jf1["CategoryID"]=$ca->CategoryID;
								    $jf1["SubCategoryStatus"]=0;
								    $DisplayCategory=$modal->display("tblsubcategory",$field,$jf1,$connection);
				                ?>
				            <li class="dropdown menu-item">
				                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa fa-shopping-bag" aria-hidden="true"></i><?php echo $ca->CategoryName?></a>
				                <ul class="dropdown-menu mega-menu">
								    <li class="">
								        <div class="row">
								            <div class="col-sm-12 col-md-3">
								            	<ul class="links list-unstyled"> 
								            		<?php
								                	foreach($DisplayCategory as $sc1)
								                	{
								                	?>	 
								                 	<li><a href=""><?php echo $sc1->SubCategoryName; ?></a></li> 
								                 	<?php
								                	}
								                	?>
								       		    </ul>
								            </div><!-- /.col -->
								        </div><!-- /.row -->
								    </li><!-- /.yamm-content -->                    
								</ul><!-- /.dropdown-menu -->            
							</li>
							<?php
							}
							?><!-- /.menu-item -->
				        </ul><!-- /.nav -->
				    </nav><!-- /.megamenu-horizontal -->
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder">
				<div id="hero">
					<div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">
						<?php
						foreach($slider as $s)
						{
						?>	
						<div class="item" style="background-image: url(../src/images/homeslider/<?php echo $s->ImageURL ; ?>);">
							<div class="container-fluid">
								<div class="caption bg-color vertical-center text-left">
									<div class="big-text fadeInDown-1">
										<?php echo $s->Title; ?>
									</div>

									<div class="excerpt fadeInDown-2 hidden-xs">
									
									<span><?php echo $s->Description; ?></span>

									</div>
								</div><!-- /.caption -->
							</div><!-- /.container-fluid -->
						</div><!-- /.item -->
						<?php
						}
						?>
					</div>
				</div>
				<div class="info-boxes wow fadeInUp">
					<div class="info-boxes-inner">
						<div class="row">
							<div class="col-md-6 col-sm-4 col-lg-4">
								<div class="info-box">
									<div class="row">
										
										<div class="col-xs-12">
											<h4 class="info-box-heading green">money back</h4>
										</div>
									</div>	
									<h6 class="text">30 Days Money Back Guarantee</h6>
								</div>
							</div><!-- .col -->

							<div class="hidden-md col-sm-4 col-lg-4">
								<div class="info-box">
									<div class="row">
										
										<div class="col-xs-12">
											<h4 class="info-box-heading green">free shipping</h4>
										</div>
									</div>
									<h6 class="text">Shipping on orders over ₹99</h6>	
								</div>
							</div><!-- .col -->

							<div class="col-md-6 col-sm-4 col-lg-4">
								<div class="info-box">
									<div class="row">
										
										<div class="col-xs-12">
											<h4 class="info-box-heading green">Special Sale</h4>
										</div>
									</div>
									<h6 class="text">Extra ₹5 off on all items </h6>	
								</div>
							</div><!-- .col -->
						</div><!-- /.row -->
					</div><!-- /.info-boxes-inner -->
				</div>
				<?php
	
	foreach ($categorywiseslider as $cws)
	 {
	 	$jf=null;
		$tbl=array("tblproduct p","tblcategoryslider cs","tblcategorysliderdetails csd");
    	$jf=array("cs.CategorySliderStatus"=>0,"csd.Status"=>0,"cs.CategorySliderID"=>"csd.CategorySliderID","csd.ProductID"=>"p.ProductID","p.CategoryID"=>$cws->CategoryID,"p.ProductStatus"=>0);
    	$categoryslider=$modal->joinqry($tbl,0,$jf,$connection);

?>
<section class="section featured-product wow fadeInUp">
	<h3 class="section-title"><?php echo $cws->CategoryName ; ?></h3>
	<div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">  
		<?php
			if(!empty($categoryslider))
			{	
			foreach($categoryslider as $cs)
	        		{
	        		$jf=null;
	        		$tbl1=null;
	        		$field=null;
	        		$ImageData=null;
					$tbl1=array("tblproductimage");
					$field=array("ImageURL");
					$jf["ProductImageID"]="(select min(ProductImageID) from tblproductimage where ProductID=$cs->ProductID and ProductImageStatus=0)";	
					$ImageData=$modal->joinqry($tbl1,$field,$jf,$connection);
		?>	
		<div class="item item-carousel">
			<div class="products" >			
				<div class="product" style="height: 350px;">	
					
					<div class="product-image" style="height: 250px;width: 250px;" >
						<div class="image">
							<a href="detail.php?productid=<?php echo $cs->ProductID ; ?>">
								<img  src="../src/images/products/<?php echo $ImageData[0]->ImageURL ; ?>" style="position: absolute; height:200px;width:auto;max-width: 100%" class="img img-responsive" alt="">
							</a>

						</div><!-- /.image -->				

			            <?php
							if($cs->DiscountPercentage != 0)
							{
							?>
							<div class="tag hot"><span><?php echo $cs->DiscountPercentage ; ?>%off</span></div>
							<?php
							}
							?>	 

					</div><!-- /.product-image -->

					<div class="product-info text-left product-price">
						<h3 class="name"><a href="detail.php?productid=<?php echo $cs->ProductID ; ?>"><?php echo $cs->ProductName ; ?></a></h3>
						<div class="product-price" style="">	
							<?php
										if($cs->DiscountPercentage == 0)
										{
										?>
									    <span class="price">
									    	&#8377;<?php echo $cs->Cost; ?>
									    </span>	
									    <?php
									    }
									    else
									    {
									    ?>	
									    <span class="price">
									    	&#8377;<?php echo $cs->SellingPrice; ?>
									    </span>
									    <span class="price-before-discount">
									    	&#8377;<?php echo $cs->Cost; ?>
									    </span>	
									    <?php
									    }	
									    ?>	
						</div><!-- /.product-price -->
					  </div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
						<div class="action">
							<ul class="list-unstyled">
				                <li class="lnk wishlist">
									<a class="add-to-cart" href="?pid=<?php echo $cs->ProductID ; ?>" title="Wishlist">
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
			}
			else
			{
			?>
			<center><img src="../src/images/nodata.png" height="100px" width="100px"></center>
			<?php	
			}	
		?>
		</div><!-- /.home-owl-carousel -->
</section><!-- /.section -->
<?php
	}
?>
			</div>
		</div>
	</div><!-- /.container -->
</div>

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