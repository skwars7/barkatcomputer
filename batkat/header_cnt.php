<?php

	include_once("../controller/controller.php");
	
	if(isset($_REQUEST["btnLogin"]))
	{
//	    session_start();
		$data=null;
		$data["UserStatus"]=0;
		$data["Email"]=$_REQUEST["email"];
		$data["UserPassword"]=$_REQUEST["password"];

		$userData=$modal->display("tbluser",0,$data,$connection);

		if($userData !=0)
		{

			$_SESSION["Email"]=$userData[0]->Email;
            $_SESSION["FirstName"]=$userData[0]->FirstName;
            $_SESSION["ProfileImage"]=$userData[0]->ProfileImage;
            $_SESSION["UserID"]=$userData[0]->UserID;
			
            // echo ($_SESSION["ProfileImage"]);
            // die();
			header("location:index.php");
		}
		else
		{
			?>
				<script type="text/javascript">
					alert("Invalid Email or Password");
				</script>
			<?php
            
			
		}
	}

    if(isset($_REQUEST["checkmail"]))
    {
      // die("okk");
      $email=null;
      $email["Email"]=$_REQUEST["checkmail"];
      $data3 = $modal->display('tbluser',0,$email,$connection);
       // print_r($data3);
       // die();
      
      if($data3 == 0)
      {
      	echo "<button name='btnsubmit' class='btn btn-success'>Sign Up</button>";
      }
      else
      {
      	echo "this email is already exits";
      }
    }


	if(isset($_REQUEST["btnsubmit"]))
   {
   
        $dataIns=null;
        $fname=$_REQUEST["fname"];
        $lname=$_REQUEST["lname"];
        $password=$_REQUEST["password"];
        $emailid=$_REQUEST["emailid"];

        $dataIns["FirstName"]=$fname;
        $dataIns["LastName"]=$lname;
        $dataIns["Email"]=$emailid;
        $dataIns["UserPassword"]=$password;
        $dataIns["CreateDateTime"]=$dt;
           
        $modal->insert("tbluser",$dataIns,$connection);

        $data=null;
		$data["UserStatus"]=0;
		$data["Email"]=$_REQUEST["emailid"];
		$data["UserPassword"]=$_REQUEST["password"];

		$userData=$modal->display("tbluser",0,$data,$connection);

		if($userData !=0)
		{

			$_SESSION["Email"]=$userData[0]->Email;
            $_SESSION["FirstName"]=$userData[0]->FirstName;
            $_SESSION["ProfileImage"]=$userData[0]->ProfileImage;
            $_SESSION["UserID"]=$userData[0]->UserID;
			
            // echo ($_SESSION["ProfileImage"]);
            // die();
			header("location:index.php");
		}

        

   }  


	$cond=null;
	$cond=array("CategoryStatus"=>0);
	$category1=$modal->display("tblcategory",array('CategoryName','CategoryID'),$cond,$connection);

	if(isset($_REQUEST["flag"]))
	{
	?>
		<ul class="nav navbar-nav">
			<li class="active dropdown yamm-fw">
				<a href="index.php" >Home</a>	
			</li>
			<?php
				foreach ($category1 as $ca) {
				$field=array("SubCategoryName","CategoryID","SubCategoryID");
                $jf1["CategoryID"]=$ca->CategoryID;
                $jf1["SubCategoryStatus"]=0;
                $SubCategory1=$modal->display("tblsubcategory",$field,$jf1,$connection);
			?>
			<li class="dropdown yamm mega-menu">
				<a href="index.php" data-hover="dropdown" class="dropdown-toggle" data-toggle="dropdown"><?php echo $ca->CategoryName ?></a>
                <ul class="dropdown-menu container">
					<li>
               			<div class="yamm-content ">
            				<div class="row">
			                	<?php
			                	foreach($SubCategory1 as $sc1)
			                	{
			                	?>	
			                   	<div class="col-sm-4">
			                        <ul class="links">
			                            <li><a href="category.php?cid=<?php echo $sc1->CategoryID.'&scid='.$sc1->SubCategoryID ?>"><?php echo $sc1->SubCategoryName; ?></a></li>
			                        </ul>
			                    </div><!-- /.col -->
			                    <?php
			                	}
			                	?>					
							</div>
						</div>
					</li>
				</ul>
			</li>
			<?php
			}
			?>		
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Pages</a>
				<ul class="dropdown-menu pages">
					<li>
						<div class="yamm-content">
							<div class="row">
								<div class="col-xs-12 col-menu">
	                                <ul class="links">
		                                <li><a href="index.php">Home</a></li>
		                                <li><a href="my-wishlist.php">Wishlist</a></li>
										<!--<li><a href="category.php">Category</a></li>
										<li><a href="detail.php">Detail</a></li>-->
										<li><a href="shopping-cart.php">Shopping Cart Summary</a></li>
                                        <li><a href="checkout.php">Checkout</a></li>
										<!--<li><a href="blog.php">Blog</a></li>
										<li><a href="blog-details.php">Blog Detail</a></li>
										<li><a href="contact.php">Contact</a></li>
                                        <li><a href="sign-in.php">Sign In</a></li>
										<li><a href="terms-conditions.php">Terms and Condition</a></li>
										<li><a href="track-orders.php">Track Orders</a></li>
										<li><a href="product-comparison.php">Product-Comparison</a></li>
		                                <li><a href="faq.php">FAQ</a></li>
										<li><a href="404.php">404</a></li>-->
									</ul>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</li>
            
		</ul><!-- /.navbar-nav -->
		<div class="clearfix"></div>
	<?php	
	}	

	if(isset($_SESSION["UserID"]))
	{	
	$jf=null;
	$tbl=array("tblcart c,tblproduct p");
	$field=array("p.SellingPrice");
	$jf=array("c.ProductID"=>"p.ProductID","c.UserID"=>$_SESSION["UserID"]);
	$displaycart=$modal->joinqry($tbl,$field,$jf,$connection);



	$jf=null;
	$tbl=array('tblcart c');
	$f=array("count(c.CartID) as cnt");
	$jf=array("c.UserID"=>$_SESSION["UserID"]);
	$CartCount=$modal->joinqry($tbl,$f,$jf,$connection);
	}

?>