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
		<?php
		$cnt=0;
			require_once 'categoryCnt.php';
		?>
			<script type="text/javascript">
			var x="",Scid="";
			// var Occ=new Array();
			// var Col=new Array();
      function getproduct(cid)
      {
        var abc;
        var pqr;
        if(window.XMLHttpRequest)
        {
          abc=new XMLHttpRequest();
          pqr=new XMLHttpRequest();
        }
        else
        {
          abc=new ActiveXObject("Microsoft.XMLHTTP");
          pqr=new ActiveXObject("Microsoft.XMLHTTP");
        }
        abc.open("GET","categoryCnt.php?set=1&cid="+cid,true);
        abc.send();
        pqr.open("GET","categoryCnt.php?sub=1&cid="+cid,true);
        pqr.send();
        abc.onreadystatechange=function(){
          if(abc.readyState == 4 && abc.status == 200)
          {
             document.getElementById("product").innerHTML = abc.responseText;
          }
          if(pqr.readyState == 4 && pqr.status == 200)
          {
             document.getElementById("subc").innerHTML = pqr.responseText;
          }
       }
    }
    function setscid(id)
    {
    	Scid=document.getElementById('scid'+id).value;
    }
    // function setcol(col,cid)
    // {
    // 	var rst=document.getElementById("col"+cid).checked;
    //   	if(rst==true)
    //   		Col.push(col);
    //   	else if(rst==false)
    //   	{
    //   		 var colid2 = Col.indexOf(col);
    //   		 Col.splice(colid2,1);
    //   	}
    // }
    // function setocc(occ,oid)
    // {
    // 	var rst=document.getElementById("occ"+oid).checked;
    //   	if(rst==true)
    //   		Occ.push(occ);
    //   	else if(rst==false)
    //   	{
    //   		 var occid2 = Occ.indexOf(occ);
    //   		 Occ.splice(occid2,1);
    //   	}
    // }
    function callproduct(min,max)
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
        var str="categoryCnt.php?set=1&cid=<?php echo $_REQUEST['cid'] ?>";
        if(Scid !="")
        	str +="&scid="+Scid;
        if(min!="")
        	str +="&min="+min;
        if(max!="")
        	str +="&max="+max;
        if(Col.toString()!="")
    		str +="&col="+Col.toString();
    	if(Occ.toString()!="")
    		str +="&occ="+Occ.toString();
        abc.open("GET",str,true);
        abc.send();
        abc.onreadystatechange=function(){
          if(abc.readyState == 4 && abc.status == 200)
          {
             document.getElementById("product").innerHTML = abc.responseText;
          }
       }
    }
		</script>
	</head>
    <body>
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
				<li class='active'>Categoty</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->
<div class="body-content outer-top-xs">
	<div class='container'>
		<div class='row'>
			<div class='col-md-3 sidebar'>
	            <!-- ================================== TOP NAVIGATION ================================== -->
<div class="side-menu animate-dropdown outer-bottom-xs"> 
  <nav class="yamm megamenu-horizontal" role="navigation">
    <ul class="nav">
      <li class="dropdown menu-item">
        <ul class="dropdown-menu mega-menu">
          <li class="yamm-content">
            <div class="row">
            </div>
          </li>  
       </ul><!-- /.dropdown-menu -->            
      </li><!-- /.menu-item -->
    </ul><!-- /.nav -->
  </nav><!-- /.megamenu-horizontal -->
</div><!-- /.side-menu -->
<!-- ================================== TOP NAVIGATION : END ================================== -->	            <div class="sidebar-module-container" style="padding-bottom:2em;">
	            	
	            	<div class="sidebar-filter">
	            	
		            	<!-- ============================================== SIDEBAR CATEGORY ============================================== -->
<form method="post">
<div class="sidebar-widget wow fadeInUp">
<h1>shop by</h1>
	<div class="widget-header">
		<h4>Category <span class="caret"></span></h4>
	</div>
  <hr>
	<div class="sidebar-widget-body">
		<div class="accordion">
		<?php foreach ($category as $c) { ?>
	    	<div class="accordion-group">
	            <div class="accordion-heading">
	                <input type="radio" name="cid" id="cid<?php echo $c->CategoryID ?>" onchange="window.location.href='category.php?cid='+this.value" value="<?php echo $c->CategoryID ?>" <?php if($c->CategoryID==$_REQUEST['cid'])echo "checked" ?> >
	                <label for="cid<?php echo $c->CategoryID ?>"><?php echo $c->CategoryName ?></label>
	            </div><!-- /.accordion-heading -->
              <!-- /.accordion-body -->
	        </div>
	        <?php } ?>
	    </div><!-- /.accordion -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<div class="sidebar-widget wow fadeInUp">
	<div class="widget-header">
		<h4>Sub Category <span class="caret"></span></h4>
	</div>
  <hr>
	<div class="sidebar-widget-body" id="subc">
		<div class="accordion">
		<?php foreach ($subcategory as $c) { ?>
	    	<div class="accordion-group">
	            <div class="accordion-heading">
	                <input type="radio" onchange="setscid(<?php echo $c->SubCategoryID ?>)" name="scid" id="scid<?php echo $c->SubCategoryID ?>" value="<?php echo $c->SubCategoryID ?>" <?php if(isset($_REQUEST['scid'])){ if($c->SubCategoryID==$_REQUEST['scid']) echo "checked"; }?>>
	                <label for="scid<?php echo $c->SubCategoryID ?>"><?php echo $c->SubCategoryName ?></label>
	            </div><!-- /.accordion-heading -->
              <!-- /.accordion-body -->
	        </div>
	        <?php } ?>
	    </div><!-- /.accordion -->
	</div><!-- /.sidebar-widget-body -->
</div>
<!-- ============================================== SIDEBAR CATEGORY : END ============================================== -->

		            	<!-- ============================================== PRICE SILDER============================================== -->
<div class="sidebar-widget wow fadeInUp">
	<div class="widget-header">
		<h4>Price <span class="caret"></span></h4>
	</div>
  <hr>
	<div class="sidebar-widget-body m-t-10">
		<div class="price-range-holder">
     <table class="table-responsive" width="40%">
      <tbody>
      <tr>
      <td>
        <input type="text" name="min" id="min" class="form-control" style="width: 7em;" placeholder="Min" value="<?php if(isset($_REQUEST['min'])) echo $_REQUEST['min'] ?>">
      </td>
      <td style="padding: 2em;">
        <input type="text" name="max" id="max" class="form-control" style="width: 7em;" placeholder="Max" value="<?php if(isset($_REQUEST['max'])) echo $_REQUEST['max'] ?>">
      </td>
      </tr>
      </tbody>
      </table>	
    </div><!-- /.price-range-holder -->
	</div><!-- /.sidebar-widget-body -->
</div><!-- /.sidebar-widget -->
<!-- ============================================== PRICE SILDER : END ============================================== -->
		            	<!-- ============================================== MANUFACTURES============================================== -->
<!-- /.sidebar-widget -->
<div class="sidebar-widget wow fadeInUp">
	<div class="sidebar-widget-body">
		<input type="button" class="btn btn-primary btn-lg btn-block" onclick="callproduct(document.getElementById('min').value,document.getElementById('max').value)" value="Filter">
	</div><!-- /.sidebar-widget-body -->
</div>
<!-- /.sidebar-widget -->
<!-- ============================================== COLOR: END ============================================== -->
		            	<!-- ============================================== COMPARE============================================== -->


    
<!-- ============================================== Testimonials: END ============================================== -->
						</form>
	            	</div><!-- /.sidebar-filter -->
	            	</div><!-- /.sidebar-module-container -->
            </div><!-- /.sidebar -->
			<div class='col-md-9'>
					<!-- ========================================== SECTION – HERO ========================================= -->

		

			
<!-- ========================================= SECTION – HERO : END ========================================= -->
				<div class="clearfix filters-container m-t-10">
	<div class="row">
		<div class="col col-sm-12 col-md-6">
			<div class="col col-sm-3 col-md-8 no-padding">
				<div class="lbl-cnt">
					<span class="lbl">Show</span>
					<div class="fld inline">
						<div class="dropdown dropdown-small dropdown-med dropdown-white inline">
							<button data-toggle="dropdown" type="button" class="btn dropdown-toggle">
								1 <span class="caret"></span>
							</button>
							<ul role="menu" class="dropdown-menu">
								<li role="presentation"><a href="#">1</a></li>
								<li role="presentation"><a href="#">2</a></li>
								<li role="presentation"><a href="#">3</a></li>
								<li role="presentation"><a href="#">4</a></li>
								<li role="presentation"><a href="#">5</a></li>
								<li role="presentation"><a href="#">6</a></li>
								<li role="presentation"><a href="#">7</a></li>
								<li role="presentation"><a href="#">8</a></li>
								<li role="presentation"><a href="#">9</a></li>
								<li role="presentation"><a href="#">10</a></li>
							</ul>
						</div>
					</div><!-- /.fld -->
				</div><!-- /.lbl-cnt -->
			</div><!-- /.col -->
		</div><!-- /.col -->
		<div class="col col-sm-12 col-md-6 text-right">
			<div class="pagination-container">
				<ul class="list-inline list-unstyled">
					<li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
					<li><a href="#">1</a></li>	
					<li class="active"><a href="#">2</a></li>	
					<li><a href="#">3</a></li>	
					<li><a href="#">4</a></li>	
					<li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
				</ul><!-- /.list-inline -->
			</div><!-- /.pagination-container -->		
		</div><!-- /.col -->
		</div><!-- /.row -->
	</div>
				<div class="search-result-container ">
					<div id="myTabContent" class="tab-content category-list">
						<div class="tab-pane active " id="grid-container">
							<div class="category-product">
								<div class="row" id="product">				
						<?php 
						if(isset($product))
						{
						foreach ($product as $pd) { 
								$icon['ProductID']=$pd->ProductID;
								$img=$modal->display("tblproductimage",0,$icon,$connection);
							?>				
		<div class="col-sm-6 col-md-4 wow fadeInUp">
			<div class="products">
				
	<div class="product" style="height: 350px;">		
		<div class="product-image" style="height: 250px;width: 250px;" >
			<div class="image">
				<a href="detail.php?productid=<?php echo $pd->ProductID ; ?>"><img  src="../src/images/products/<?php echo $img[0]->ImageURL ?>" style="position: absolute; height:200px;width:auto;max-width: 100%" class="img img-responsive" alt=""></a>
			</div><!-- /.image -->			
			<?php
							if($pd->DiscountPercentage != 0)
							{
							?>
							<div class="tag new"><span><?php echo $pd->DiscountPercentage ; ?>%</span></div>
							<?php
							}
							?>                      		   
		</div><!-- /.product-image -->
			
		
		<div class="product-info text-left">
			<h3 class="name"><a href="detail.php?productid=<?php echo $pd->ProductID ; ?>"><?php echo $pd->ProductName ; ?></a></h3>
			<div class="rating rateit-small"></div>
			<div class="description"></div>

			<div class="product-price">	
				<span class="price">&#8377;<?php echo $pd->SellingPrice; ?></span>
				<span class="price-before-discount">&#8377;<?php echo $pd->Cost; ?></span>
									
			</div><!-- /.product-price -->
			
		</div><!-- /.product-info -->
					<div class="cart clearfix animate-effect">
				<div class="action">
					<ul class="list-unstyled">
						

	                   
		                <li class="lnk wishlist">
							<a class="add-to-cart" href="?productid=<?php echo $pd->ProductID ; ?>" title="Wishlist">
								<i class="icon fa fa-heart"></i>
							</a>
						</li>

						
					</ul>
				</div><!-- /.action -->
			</div><!-- /.cart -->
			</div><!-- /.product -->
      
			</div><!-- /.products -->
		</div><!-- /.item -->
		<?php } }
		else echo "<center><h3>No Match Found.</h3></center>" ?>
					</div><!-- /.row -->
							</div><!-- /.category-product -->
						
						</div><!-- /.tab-pane -->
							
					</div><!-- /.tab-content -->
					<div class="clearfix filters-container">
						
							<div class="text-right">
						         <div class="pagination-container">
	<ul class="list-inline list-unstyled">
		<li class="prev"><a href="#"><i class="fa fa-angle-left"></i></a></li>
		<li><a href="#">1</a></li>	
		<li class="active"><a href="#">2</a></li>	
		<li><a href="#">3</a></li>	
		<li><a href="#">4</a></li>	
		<li class="next"><a href="#"><i class="fa fa-angle-right"></i></a></li>
	</ul><!-- /.list-inline -->
</div><!-- /.pagination-container -->						    </div><!-- /.text-right -->
						
					</div><!-- /.filters-container -->

				</div><!-- /.search-result-container -->

			</div><!-- /.col -->
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
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
	<script src="assets/js/scripts.js"></script>

	

	

</body>
</html>