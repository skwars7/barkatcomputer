<?php 
	include_once("orderdetailCnt.php");
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
				<li><a href="index.php">Home</a></li>
				<li><a href="myorders.php">MyOrders</a></li>
				<li class='active'>Order Details</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

	<div class="col-md-12">
		<div class="col-md-1">
		</div>
        <div class="col-md-11"><a href="myorders.php"  class="link-black text-sm" style="font-size: 21px;padding:2em;"><i class="glyphicon glyphicon-hand-left"></i> Go Back</a></div>
    </div>
<div class="body-content" style="padding: 1em;">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-12">
				
					<div class="blog-post col-md-6" style="height:100%;">
							<div class="col-md-12"><label><h5 style="padding-right: 10em;">ORDER DETAIL</h5></label></div>
							<div class="col-md-12">
								<div class="col-md-6">
									<div><label><h5>Order ID</h5></label></div>
									<div><label><h5>Order Date</h5></label></div>
									<div><label><h5>Amount Paid</h5></label></div>
								</div>
								<div class="col-md-6">
									<div><label><h5><?php echo $OrderDetail[0]->OrderID ; ?></h5></label></div>
									<div><label><h5><?php echo $OrderDetail[0]->CreateDateTime ; ?></h5></label></div>
									<div><label><h5>&#8377;<?php
										$sum=0;
										foreach ($OrderDetail as $od) {
										$sum+=$od->OrderPrice*$od->OrderQuantity ; 
										}
										
										 echo $sum;
									?>
										
									</h5></label></div>
								</div>
							</div>
							
					</div>
					<div class="blog-post col-md-6" style="height:100%;">
						<div><label><h5 style="padding-right: 10em;">ADDRESS</h5></label></div>
						<div><label><h5><?php echo $Shippment[0]->ReceiverName ; ?></h5></label></div>
						<address><h6><?php echo $Shippment[0]->ReceiverAddress ; ?>,<?php echo $Shippment[0]->CityName ; ?>,<?php echo $Shippment[0]->StateName ; ?></h6></address>
						<div>
							<label><h5>Phone No</h5></label>&nbsp;
							<label><h5><?php echo $Shippment[0]->ContactNo ; ?></h5></label>
						</div>		
					</div>
					
				</div>
			</div>		
		</div>
	</div>
</div>
<div class="body-content" style="padding: 1em;">
	<div class="container">
		<div class="row">
			<div class="blog-page">
				<div class="col-md-12">
					<div class="blog-post" >
							<div class="table-responsive">
							<div><label><h5 style="padding-right: 10em;">PRODUCT DETAIL</h5></label></div>
		<table class="table">
			<thead>
				<tr>
					<th class="cart-product-name item">Product Name</th>
					<th class="cart-description item">Image</th>
					<th class="cart-sub-total item">Amount</th>
					<th class="cart-qty item">Size</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-total last-item">Total</th>
				</tr>
			</thead><!-- /thead -->
			<?php 
				foreach ($Product as $p) {
						$jf=null;
						$tbl1=array("tblproductimage");
						$field=array("ImageURL");
						$jf["ProductImageID"]="(select min(ProductImageID) from tblproductimage where ProductID=$p->ProductID and ProductImageStatus=0)";	
						$Image=$modal->joinqry($tbl1,$field,$jf,$connection);

			?>
			<tbody>
				<tr>
					<td class="cart-product-name-info">
						<h5 class='cart-product-description'><a href="detail.php?productid=<?php echo $p->ProductID ; ?>"><?php echo $p->ProductName ; ?></a></h5>
					</td>
					<td >
						<a class="entry-thumbnail" href="detail.php?productid=<?php echo $p->ProductID ; ?>">
						    <img src="../src/images/products/<?php echo $Image[0]->ImageURL ; ?>" alt="" style="width:60px;height:60px;" class="img img-responsive">
						</a>
					</td>
					<td class="cart-product-sub-total"><span style="color: black;" class="cart-sub-total-price"><h5>&#8377;<?php echo $p->OrderPrice ; ?></h5></span></td>
					<td class="cart-product-quantity">
						 <?php
						 if(!empty($p->SizeXQuantity))
						 {
						 ?>	
				         <h5><?php echo $p->SizeXQuantity ; ?></h5>
				         <?php
				     	 }
				     	 else
				     	 {
				     	 ?>
				     	 <h3>-</h3>
				     	 <?php	
				     	 }	
				     	 ?>
		            </td>
					<td class="cart-product-quantity">
				         <h5><?php echo $p->OrderQuantity ; ?></h5>
		            </td>
					<td class="cart-product-grand-total">
						<span class="cart-grand-total-price" style="color: black;">
						<h5>&#8377;<?php 
							echo $p->OrderPrice*$p->OrderQuantity ;
						?>	</h5>
						</span>
					</td>
				</tr>
				
			</tbody><!-- /tbody -->

			<?php
				}
			?>	
				<tfoot class="cart-shopping-total">
				<tr>
				<th>
					<div class="cart-grand-total">
						Grand Total
						<span class="inner-left-md" style="font-weight: bolder;color: black;">
							&#8377;
							<?php
							$sum=0;
							foreach ($Product as $p) {
							$sum+=$p->OrderPrice*$p->OrderQuantity ; 
							}
							echo $sum;
							?>
						</span>
					</div>
				</th>
			</tr>
			</tfoot>
			</table>
		</table><!-- /table -->
	</div>	

					</div>
					
				</div>
			</div>		
		</div>
	</div>
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
