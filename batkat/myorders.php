<!DOCTYPE html>
<?php 
	include_once("myordersCnt.php");

?>
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
				<li class='active'>My Orders</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
		<div class="panel panel-card margin-b-30 col-sm-12">
				<div class="col-md-12"><h4 style="padding-right: 10em;font-weight: bold;"><label>MY ORDERS</label></h4></div>
              	<div class="col-sm-12" style="padding:3em;">
              		<?php
              		if(!empty($vieworder))
              		{	
                  foreach ($vieworder as $vo) {
                  ?>
                  <div class="col-sm-4">
              	<form method="post">
     			<div class="form-group">
                <div class="panel panel-card margin-b-30 table-responsive" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
                 
                  <table class="table table-responsive">
                   <tbody>
                     <tr>
                       <td><lable>OrderId:</lable></td>
                       <td><?php echo $vo->OrderID ;?><input type="hidden" name="orderId" value="<?php echo $vo->OrderID ; ?>" ></td>
                     </tr>
                     <tr>
                       <td><lable>OrderStatus:</lable></td>
                       <td>
                       <?php
                       if($vo->OrderStatus == 0)
                        echo "Pending";
                        ?>	
                       
                       	
                       </td>
                     </tr>
                     <tr>
                       <td><lable>OrderDate/Time:</lable></td>
                       <td><?php echo $vo->CreateDateTime?></td>
                     </tr>
                     <tr>
                     <td><a href="orderdetail.php?OrderId=<?php echo $vo->OrderID ; ?>"><button type="button" class="btn btn-primary">More Info</button></td>

                     </tr>
                    </tbody> 

                  </table>
                  
                </div>
              </div>
              </form>
              </div>
              <?php
              		}
              		}
              		else
              		{
              		?>
              			<center><a href="index.php"><img src="../src/images/empty_cart.jpeg" class="img img-responsive" height="50%" width="50%"></a></center>
              		<?php
              		}	
              		?>
       </div>
       
     </div>   
   
    
           			</div>
				</div>			
			</div><!-- /.row -->
		</div><!-- /.container -->
</div><!-- /.body-content -->
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

	<!-- For demo purposes – can be removed on production -->
	
	<script src="switchstylesheet/switchstylesheet.js"></script>
	
	<script>
		$(document).ready(function(){ 
			$(".changecolor").switchstylesheet( { seperator:"color"} );
			$('.show-theme-options').click(function(){
				$(this).parent().toggleClass('open');
				return false;
			});
		});

		$(window).bind("load", function() {
		   $('.show-theme-options').delay(2000).trigger('click');
		});
	</script>
	<!-- For demo purposes – can be removed on production : End -->

	

</body>
</html>
