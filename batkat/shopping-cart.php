<?php 
	include_once("cartcnt.php");
?>	
<!DOCTYPE html>
<html lang="en">
    <head>
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
	<script type="text/javascript">
		function cart()
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
		        
		        abc.open("GET","cartcnt.php?flag=true",true);
		        
		        abc.send();
		       
		        abc.onreadystatechange=function(){
		          if(abc.readyState == 4 && abc.status == 200)
		          {
		             document.getElementById("cart").innerHTML = abc.responseText;
		          }
		          
		       }
	       }		
	</script>
	<script type="text/javascript">
      
	    	function deletecart(cart)
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
	        
	        abc.open("GET","cartcnt.php?cartid="+cart,true);
	        abc.send();
	       
	        abc.open("GET","cartcnt.php?flag=true",true);
	        abc.send();
	        abc.onreadystatechange=function(){
	          if(abc.readyState == 4 && abc.status == 200)
	          {
	             document.getElementById("cart").innerHTML = abc.responseText;
	          }
	          
	       }
	    }
	    	function movetowishlist(pid,cid)
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
	        abc.open("GET","cartcnt.php?productid="+pid+"&cartid="+cid,true);
	        abc.send();
	        abc.open("GET","cartcnt.php?flag=true",true);
	        abc.send();
	        abc.onreadystatechange=function(){
	          if(abc.readyState == 4 && abc.status == 200)
	          {
	             document.getElementById("cart").innerHTML = abc.responseText;
	          }
	          
	       }
	    }
	    function qtycalc(num,price,id)
	    {
	    	ans=price*num;
	    	document.getElementById("calcprice"+id).innerHTML=ans;
	    }
	
	</script>
    </head>
    <body class="cnt-home" onload="cart()">
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
				<li class='active'>Shopping Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs" style="padding-bottom:2em;">
	<div class="container">
		<div class="row ">
			<div class="shopping-cart" id="cart" >
				<!-- display cart using ajax -->
			</div><!-- /.shopping-cart -->
		</div> <!-- /.row -->
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

	

	

</body>
</html>
