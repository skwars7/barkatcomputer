<?php
	
	include_once("../controller/controller.php");
	//$citys=$modal->display("tblcity",0,)
	if(isset($_REQUEST["FirstLogin"])) //code to login in
	{
//	    session_start();
		$data["UserStatus"]=0;
		$data["Email"]=$_REQUEST["email"];
		$data["UserPassword"]=$_REQUEST["password"];

		$userData=$modal->display("tbluser",0,$data,$connection);
		//print_r($userData);
		//die();
		if($userData !=0)
		{

			$_SESSION["Email"]=$userData[0]->Email;
            $_SESSION["FirstName"]=$userData[0]->FirstName;
            $_SESSION["ProfileImage"]=$userData[0]->ProfileImage;
            $_SESSION["UserID"]=$userData[0]->UserID;
			
            // echo ($_SESSION["ProfileImage"]);
            // die();
			//header("location:index.php");
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

	if(isset($_SESSION["UserID"])) //for display the emailid of loggedin user
	{	
	$data["UserID"]=$_SESSION["UserID"];
	$userData1=$modal->display("tbluser",0,$data,$connection);
	}

	

	if(isset($_SESSION["UserID"])) // code to display item from cart into order summary
	{
	$jf=null;
	$tbl=array("tblproduct p","tblcart c","tblsizexquantity sq");
	$jf=array("c.ProductID"=>"p.ProductID","c.UserID"=>$_SESSION["UserID"],"sq.SizeXQuantityID"=>"c.SizeXQuantityID","p.ProductID"=>"sq.ProductID");	
	$CartData=$modal->joinqry($tbl,0,$jf,$connection);	
	}

	if(isset($_REQUEST["LoginSignup"])) //login/signup block using ajax
	{
		?>
		<div class="row">		

				<!-- already-registered-login -->
				<?php
					if(!isset($_SESSION["UserID"])) 
					{	
				?>
				<div class="col-md-6 col-sm-6 already-registered-login" id="login">
					<form class="register-form" role="form" method="post">
						<div class="form-group">
					    <input type="text" name="email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email Address">
					  </div>
					  <div class="form-group">
					    <input type="password" class="form-control unicase-form-control text-input" id="exampleInputPassword1" name="password" placeholder="Password">
					    <a href="#" class="forgot-password">Forgot your Password?</a>
					  </div>
					  <input type="submit" name="FirstLogin" value="login" class="btn-upper btn btn-primary checkout-page-button">
					</form>
				</div>	
				<?php
					}
					else
					{
					?>
					<div class="col-sm-12">
					<div class="col-sm-6">
					<h5><label><?php echo $userData1[0]->Email ; ?></label></h5>
					</div>
					<div class="col-sm-2">
					<i class="fa fa-check" style="font-size:32px;color:green;">
					</i>
					</div>
					<div class="col-sm-4">
					<form method="post">
					<input type="button" value="change" class="btn-upper btn btn-info checkout-page-button" name="change" onclick="changelogin()">
					</form>

					</div>
					</div>
					<div id="changelogin">
						<!-- it display the change login/signup block using ajax -->
					</div>
					<div>
					<br/>
					</div>
					<div><a data-toggle="collapse" class="collapsed btn-upper btn btn-primary checkout-page-button" name="continue" data-parent="#accordion" href="#collapseTwo">Continue</a></div>
					<?php	
					}
				?>	
				<!-- already-registered-login -->		

			</div>
		<?php	
	}	

					if(isset($_REQUEST["Change"])) //change the login/signup using ajax
					{
					?>	
					<div class="col-sm-12">
					<div>
						<a href="logout.php" name="logout">LOGOUT & SIGN IN TO ANOTHER ACCOUNT</a>
					
					</div>
					</div>
					<div>
					<br/>
					</div>
					<?php
					}

										$jf=null;
										$tbl=array("tblstate s");
										$field=array("s.StateID","s.StateName");
										$jf=array("s.StateStatus"=>0);
										$StateData=$modal->joinqry($tbl,$field,$jf,$connection);

							if(isset($_REQUEST["AddNewAddress"]))
							{
							?>
										<div>
										<div class="col-md-12">
											<?php

												$jf=null;
												$tbl=array("tbluser");
												$jf=array("UserID"=>$_SESSION["UserID"]);
												$address=$modal->joinqry($tbl,0,$jf,$connection);
												//echo $address[0]->UserAddress ;
												//die();

												$cond=null;
												$cond["CityID"]=$address[0]->CityID;
												$DisplayCity1=$modal->display("tblcity","CityName",$cond,$connection);

												$cond=null;
												$cond["StateID"]=$address[0]->StateID;
												$DisplayState1=$modal->display("tblstate","StateName",$cond,$connection);

												
												if($address[0]->UserAddress != null )
												{
											?>		
											<div class="blog-post col-md-12" style="height:100%;">
											<div><label><h5 style="padding-right: 10em;">ADDRESS</h5></label></div>

											<address><label><h5>
												<?php echo $address[0]->UserAddress; ?>,
												<?php echo $DisplayCity1[0]->CityName; ?>,
												<?php echo $address[0]->PinCode ; ?>,
												<?php echo $DisplayState1[0]->StateName ; ?>.</h5></label>
											</address>		
											</div>	
											<div class="col-md-12">
											<div class="col-md-6">
												<input type="button" name="checkaddress" value="CHANGE" class="btn btn-info" onclick="addaddress()">
											</div>
											<div class="col-md-6">
						      					<a data-toggle="collapse" class="collapsed btn-upper btn btn-danger checkout-page-button" name="delivery" data-parent="#accordion" href="#collapseThree">Save AND DELIVER HERE</a>
						      				</div>
						      				</div>
											<?php
												}	
												else
												{	
											?>		
											<div class="col-md-12">
							      		
							      			<span class="fa fa-plus-circle">ADD NEW ADDRESS</span>
							      		
							      		</div>
							      		<br/>
						      			<div class="col-sm-12" >
						      				<div class="form-group col-sm-6">
						      					<input class="form-control unicase-form-control text-input" type="text" name="name" placeholder="Name" required="required" tabindex="1">
						      				</div>
						      				<div class="form-group col-sm-6">
						      					<input class="form-control unicase-form-control text-input" type="text" name="phoneno" placeholder="Phone Number" pattern="^[0-9]{10}$" tabindex="2">
						      				</div>
						      			</div>
						      			<div class="col-sm-12">
						      				<div class="form-group col-sm-6">
						      					<input class="form-control unicase-form-control text-input" type="text" name="pincode" placeholder="Pincode" required="required" tabindex="3" pattern="^[0-9]{6}$">
						      				</div>
						      				<div class="form-group col-sm-6">
						      					<input class="form-control unicase-form-control text-input" type="text" name="locality" placeholder="Locality" tabindex="4">
						      				</div>
						      			</div>
						      			<div class="form-group col-sm-12">
						      				<div class="col-sm-12">
						      				<textarea placeholder="Address" class="form-control unicase-form-control text-input" name="address" rows="4" cols="87" tabindex="5" required="" autocomplete="street-address"></textarea>
						      				</div>
						      			</div>
						      			<div class="col-sm-12">
						      				<div class="form-group col-sm-6">
						      					<select class="form-control" onchange="citystate(this.value)" name="state" required="">
						          					<option value=null> Select a state</option>
						          					<?php
						            					foreach ($StateData as $stt) 
						            					{

						          					?>
						              				<option value="<?php echo $stt->StateID ?>">
						                			<?php
						                
						                  				echo $stt->StateName;
						                			?>
						              				</option>
						          					<?php
						            				}
						          					?>
						          				</select>
						      				</div>
						      				<div class="form-group col-sm-6">
						      					<div id="city" >
           						 					Select a State to select a city
          										</div>
						      				</div>
						      			</div>
						      			<div class="col-sm-12">
						      				<div class="form-group col-sm-6">
						      					<a data-toggle="collapse" class="collapsed btn-upper btn btn-danger checkout-page-button" name="delivery" data-parent="#accordion" href="#collapseThree">Save AND DELIVER HERE</a>
						      				</div>
						      			</div>
						      			<?php 
						      			
						      			}
						      			?>	
								</div>
							</div>		
						<?php	
						}				
							

	if(isset($_REQUEST["AddAddress"]))
	{

	?>
										<div class="col-md-12">
							      		
							      			<span class="fa fa-plus-circle">ADD NEW ADDRESS</span>
							      		
							      		</div>
							      		<br/>
						      			<div class="col-sm-12" >
						      				<div class="form-group col-sm-6">
						      					<input class="form-control unicase-form-control text-input" type="text" name="name" placeholder="Name" required="required" tabindex="1">
						      				</div>
						      				<div class="form-group col-sm-6">
						      					<input class="form-control unicase-form-control text-input" type="text" name="phoneno" placeholder="Phone Number" pattern="^[0-9]{10}$" tabindex="2">
						      				</div>
						      			</div>
						      			<div class="col-sm-12">
						      				<div class="form-group col-sm-6">
						      					<input class="form-control unicase-form-control text-input" type="text" name="pincode" placeholder="Pincode" required="required" tabindex="3" pattern="^[0-9]{6}$">
						      				</div>
						      				<div class="form-group col-sm-6">
						      					<input class="form-control unicase-form-control text-input" type="text" name="locality" placeholder="Locality" tabindex="4">
						      				</div>
						      			</div>
						      			<div class="form-group col-sm-12">
						      				<div class="col-sm-12">
						      				<textarea placeholder="Address" class="form-control unicase-form-control text-input" name="address" rows="4" cols="87" tabindex="5" required="" autocomplete="street-address"></textarea>
						      				</div>
						      			</div>
						      			<div class="col-sm-12">
						      				
						      				<div class="form-group col-sm-6">
						      					<select class="form-control" onchange="citystate(this.value)" name="state" required="">
						          					<option value=null> Select a state</option>
						          					<?php
						            					foreach ($StateData as $stt) 
						            					{

						          					?>
						              				<option value="<?php echo $stt->StateID ?>">
						                			<?php
						                
						                  				echo $stt->StateName;
						                			?>
						              				</option>
						          					<?php
						            				}
						          					?>
						          				</select>
						      				</div>
						      				<div class="form-group col-sm-6">
						      					<div id="city" >
           						 					Select a State to select a city
          										</div>
						      				</div>
						      			</div>
						      			<div class="col-sm-12">
						      				<div class="form-group col-sm-6">
						      					<a data-toggle="collapse" class="collapsed btn-upper btn btn-danger checkout-page-button" name="delivery" data-parent="#accordion" href="#collapseThree">Save AND DELIVER HERE</a>
						      				</div>
						      			</div>
	<?php	
	}			
		
	if(isset($_REQUEST["add_state"]))
	{
		$data=null;
		$tbl=array("tblcity");
		$sid=$_REQUEST["add_state"];
		$data["StateID"]=$sid;
		$data["CityStatus"]=0;
		$citydata=$modal->joinqry($tbl,0,$data,$connection);
		?>
		<select class="form-control" name="city">
			<?php
			 foreach ($citydata as $city) {
			 ?>
			 <option value="<?php echo $city->CityID ; ?>"> <?php echo $city->CityName ; ?></option>	
			<?php

			 }
			 ?>
		</select>
		<?php
	}				
	
	if(isset($_REQUEST["OrderSummary"])) //displayed order summary block using ajax
	{

						    	if(!empty($CartData))
						    	{
						    	foreach($CartData as $cd)
						    	{
									$jf=null;
									$tbl1=array("tblproductimage");
									$field=array("ImageURL");
									$jf["ProductImageID"]="(select min(ProductImageID) from tblproductimage where ProductID=$cd->ProductID and ProductImageStatus=0)";	
									$ImageData=$modal->joinqry($tbl1,$field,$jf,$connection);
								?>		
						      
						      	<div class="col-sm-12">
						      	<div class="col-sm-3">
						      			<img src="../src/images/products/<?php echo $ImageData[0]->ImageURL ; ?>" class="img img-responsive" height="150px" width="100%">
						      	</div>
						      	<div class="product-info text-left m-t-20 col-sm-9">
						      		<div class="product-info text-left m-t-20">
										<h4 class="name" style="font-family: arial;"><?php echo $cd->ProductName; ?></h4>
										<div class="name" style="color: grey;"><h5><?php echo $cd->Brand ; ?></h5></div>
										<div class="name" style="color: grey;"><h5>Size: <?php echo $cd->Size ; ?></h5></div>
										<div class="col-sm-12">
										<div class="product-price col-sm-2">
											<?php
											if($cd->DiscountPercentage != 0)
											{
											?>	
											<span class="price" style="font-weight: bolder;color: black;">
											<h4>
											<label>
												&#8377;<span class="cart-sub-total-price" id="calcprice<?php echo $cd->ProductID ?>">
												<?php echo $cd->SellingPrice ; ?>
												</span>
											</label>	
											</h4>	
											</span>	
										    <span class="price-strike" style="color: grey;">
									    		<strike><h5>&#8377;<?php echo $cd->Cost; ?></h5></strike>
									    	</span>		
									    			
										</div><!-- /.product-price -->
										
											<div class="sale-offer-tag col-sm-8">
											<span style="color:green;"><h5><?php echo $cd->DiscountPercentage ; ?> % off</h5></span></div>
											<?php
											}
											else
											{
											?>
											<span class="price-strike" style="color: grey;">
									    		<h5>&#8377;<?php echo $cd->Cost; ?></h5>
									    	</span>
											<?php	
											}	
											?>	
										</div>
									</div>
						      	</div>
						      </div>
						      <div>
						      <br/>
						      </div>
						      <div class="col-sm-12">
						      	<div class="col-sm-4">
						                <div class="quant-input">
				                			<input type="number" onchange="qtycalc(this.value,<?php echo $cd->SellingPrice ?>,<?php echo $cd->ProductID ?>)" name="quantity<?php echo $cd->ProductID ; ?>"  min="1" max="20" value="1">
			              				</div>
						        </div>        
						      	<div class="col-sm-8">
						      		<h5 style="font-weight: bold;"><a name="remove" onclick="deletedata(<?php echo $cd->CartID ; ?>)" style="color: black;">
						      		REMOVE</a>
						      		</h5>
						      	</div>
						      </div>
						      <br/>
						      <?php
						  		}
						  		?>
						  		<div class="col-sm-12">
						      	<!--<a name="ordersummery" href="?Pid=<?php // echo $cd->ProductID; ?>&Size=<?php // echo $cd->Size; ?>&Qty=<?php // echo $cd->Quantity;?>&Price=<?php // echo $cd->SellingPrice;?>" class="btn-primary">CONTINUE</a>-->
						      	<br/>
						      	<form method="post">
						      	<input type="submit" class="btn btn-info" name="continue" value="CONTINUE" >
						      
						      	</form>
						      	<br/>
						      	</div>
						      	<?php	
						  		}
						  		else
						  		{
						  		?>
						  		<div class="col-sm-12">
						  			<center><img src="../src/images/emptycart.png" class="img img-responsive"></center>
						  		</div>
						  		<?php	
						  		}
	}					  			
						  	   

	if(isset($_REQUEST["cartid"])) //remove item form order order summary
	{
		$jf=null;
		$jf["CartID"]=$_REQUEST["cartid"];	
		$DeleteCart=$modal->delete("tblcart",$jf,$connection);
	}	




	if(isset($_REQUEST["continue"])) // insert into order table and orderdetail table and shippment table
	{	

			$jf=null;
			$jf["UserID"]=$_SESSION["UserID"];
			$jf["OrderStatus"]=0;
			$jf["CreateDateTime"]=$dt;
			$jf["AmendmentDateTime"]=$dt;
			$insertorder=$modal->insert("tblorder",$jf,$connection);

			$Display=$connection->insert_id;

			foreach ($CartData as $cd)
		{
			$jf=null;
			$jf["ProductID"]=$cd->ProductID;
			$jf["SizeXQuantity"]=$cd->Size;
			$jf["OrderQuantity"]=$_REQUEST["quantity$cd->ProductID"];
			$jf["OrderPrice"]=$cd->SellingPrice;
			$jf["OrderID"]=$Display;
			$jf["OrderDetailsStatus"]=0;
			$jf["CreateDateTime"]=$dt;
			$jf["AmendmentDateTime"]=$dt;
			$insertorderdetail=$modal->insert("tblorderdetail",$jf,$connection);
		}	
	

			$jf=null;
			$tbl=array("tbluser");
			$jf=array("UserID"=>$_SESSION["UserID"]);
			$checkaddress=$modal->joinqry($tbl,0,$jf,$connection);
			//echo $checkaddress[0]->UserAddress ;
			//die();	


		$jf=null;
		if(isset($_REQUEST["name"]))
	    $jf["ReceiverName"]=$_REQUEST["name"];

	    if(isset($_REQUEST["phoneno"]))	
	    {	
		$jf["ContactNo"]=$_REQUEST["phoneno"];
		$cond1["MobileNo"]=$_REQUEST["phoneno"];
		}

		$jf["OrderID"]=$Display;

		if(isset($_REQUEST["city"]))
		{
			$jf["CityID"]=$_REQUEST["city"];
			$cond1["CityID"]=$_REQUEST["city"];
		}	

		if(isset($_REQUEST["state"]))
		{
			$jf["StateID"]=$_REQUEST["state"];
			$cond1["StateID"]=$_REQUEST["state"];

		}
		if(isset($_REQUEST["address"]) && isset($_REQUEST["pincode"]))
		{
			$Address=array($_REQUEST["address"],$_REQUEST["pincode"],".");
			$address=implode(",",$Address);
			$jf["ReceiverAddress"]=$address;
			$cond1["UserAddress"]=$_REQUEST["address"];
			$cond1["PinCode"]=$_REQUEST["pincode"];
			$jf["Status"]=0;
			$insertintotblshipment=$modal->insert("tblshipping",$jf,$connection); //insert into tbl shippment when user fill add new address form
		}
		else //insert into tbl shippment from tbluser .
		{
					$cond2=null;
					$ReceiverName=array($checkaddress[0]->FirstName,$checkaddress[0]->LastName);
					$receivername=implode(" ",$ReceiverName);
					$cond2["ReceiverName"]=$receivername;
					$Address=array($checkaddress[0]->UserAddress,$checkaddress[0]->PinCode);
					$address=implode(",",$Address);
					$cond2["ReceiverAddress"]=$address;
					$cond2["ContactNo"]=$checkaddress[0]->MobileNo;
					$cond2["OrderID"]=$Display;
					$cond2["CityID"]=$checkaddress[0]->CityID;
					$cond2["StateID"]=$checkaddress[0]->StateID;
					$cond2["Status"]=0;
					$tblshipment=$modal->insert("tblshipping",$cond2,$connection);	
		}		
		
			if($checkaddress[0]->UserAddress == null) //update address nd contactno in tbluser when user first time done shopping
			{	
				$data=null;
				$data["UserID"]=$_SESSION["UserID"];
            	$cond1["AmendmentDateTime"]=$dt;

				$insertaddress=$modal->update("tbluser",$cond1,$data,$connection);
			}
	
				$jf=null;
				$jf["UserID"]=$_SESSION["UserID"];
				$delete=$modal->delete("tblcart",$jf,$connection);				

	}
		
?>