<?php
	include_once("checkoutcnt.php");
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
		<script type="text/javascript">

		function loginsignupblock()
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
        
        abc.open("GET","checkoutcnt.php?LoginSignup=true",true);
        
        abc.send();
       
        abc.onreadystatechange=function(){
          if(abc.readyState == 4 && abc.status == 200)
          {
             document.getElementById("loginsignup").innerHTML = abc.responseText;
          }
          
       }
    }

    	
    	function changelogin()
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
        
        
        abc.open("GET","checkoutcnt.php?Change=true",true);
        abc.send();
        abc.onreadystatechange=function(){
          if(abc.readyState == 4 && abc.status == 200)
          {
             document.getElementById("changelogin").innerHTML = abc.responseText;
          }
          
       }

         loginsignupblock();

      }

      	function addnewaddress()
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
        
        abc.open("GET","checkoutcnt.php?AddNewAddress=true",true);
        
        abc.send();
       
        abc.onreadystatechange=function(){
          if(abc.readyState == 4 && abc.status == 200)
          {
             document.getElementById("AddNewAddress").innerHTML = abc.responseText;
          }
          
       }
    }

    function addaddress()
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
        
        abc.open("GET","checkoutcnt.php?AddAddress=true",true);
        
        abc.send();
       
        abc.onreadystatechange=function(){
          if(abc.readyState == 4 && abc.status == 200)
          {
             document.getElementById("AddNewAddress").innerHTML = abc.responseText;
          }
          
       }

    }

    	function citystate(state_id)
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

			abc.open("GET","checkoutcnt.php?add_state="+state_id,true);
			abc.send();

			abc.onreadystatechange=function(){
				if(abc.readyState == 4 && abc.status == 200)
				{
					document.getElementById("city").innerHTML = abc.responseText;
				}
			}
		}


      	
		function order()
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
        
        abc.open("GET","checkoutcnt.php?OrderSummary=true",true);
        
        abc.send();
       
        abc.onreadystatechange=function(){
          if(abc.readyState == 4 && abc.status == 200)
          {
             document.getElementById("ordersummary").innerHTML = abc.responseText;
             alert(abc.responseText);
          }
          
       }
    }

		function deletedata(cart)
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
        //alert("ok");
        abc.open("GET","checkoutcnt.php?cartid="+cart,true);
        abc.send();

        abc.open("GET","checkoutcnt.php?OrderSummary=true",true);
        
        abc.send();
       
        abc.onreadystatechange=function(){
          if(abc.readyState == 4 && abc.status == 200)
          {
             document.getElementById("ordersummary").innerHTML = abc.responseText;
          }
          
       }
      } 
        function qtycalc(num,price,id)
    {
//    	alert("num"+num+"pri"+price);
    	ans=price*num;
    	document.getElementById("calcprice"+id).innerHTML=ans;
    	document.getElementById("quantity"+id).value=num;
    	//document.getElementById("price"+id).value=ans;


    }
     
     function runonload()
     {
     	loginsignupblock();
     	addnewaddress();
     	order();
     }
    </script>
	</head>
    <body class="cnt-home" onload="runonload()">
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
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					
					<div class="panel-group checkout-steps" id="accordion">
						
						<!-- checkout-step-01  -->
							<div class="panel panel-default checkout-step-01">
								<!-- panel-heading -->
								<div class="panel-heading">
    								<h4 class="unicase-checkout-title">
								        <a data-toggle="collapse" class="" data-parent="#accordion" href="#collapseOne">
								          <span>1</span>LOGIN OR SIGNUP
								        </a>
	     							</h4>
    							</div>
    							<!-- panel-heading -->
								<div id="collapseOne" class="panel-collapse collapse in">
									<!-- panel-body  -->
								    <div class="panel-body" id="loginsignup">
										<!-- login signup block using ajax -->			
									</div>
									<!-- panel-body  -->
								</div><!-- row -->
							</div>
						<!-- checkout-step-01  -->
						
					    <!-- checkout-step-02  -->
					    <form name="f1" method="post">
					  	<div  class="panel panel-default checkout-step-02">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="">
						          <span>2</span>DELIVERY ADDRESS
						        </a>
						      </h4>
						    </div>

						    <div id="collapseTwo" class="panel-collapse collapse">
						      <div class="panel-body" id="AddNewAddress">
						      	
						      	<!-- add new address block using ajax -->	
						      	
						      </div>
						    </div>   
					  	</div>
					  	<!-- checkout-step-02  -->

						<!-- checkout-step-03  -->
					  	<div class="panel panel-default checkout-step-03">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="">
						       		<span>3</span>ORDER SUMMARY
						        </a>
						      </h4>
						    </div>
						    <div id="collapseThree" class="panel-collapse collapse">
						    	 <div class="panel-body" id="ordersummary">
						    	 	<!-- displayed order summary block using ajax -->
						    	 </div>		
						    </div>
						</div>
						</form>
					  	<!-- checkout-step-03  -->

						<!-- checkout-step-04  -->
						<div class="panel panel-default checkout-step-04">
						    <div class="panel-heading">
						      <h4 class="unicase-checkout-title">
						        <a data-toggle="collapse" class="collapsed" data-parent="#accordion" href="#collapseFour">
						        	<span>4</span>PAYMENT OPTIONS
						        </a>
						      </h4>
						    </div>
						    <div id="collapseFour" class="panel-collapse collapse">
							    <div class="panel-body">
							     
							    </div>
					    	</div>
						</div>
						<!-- checkout-step-04  -->
					  	
					</div><!-- /.checkout-steps -->
					
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->

<!-- checkout-progress-sidebar -->				
			</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
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