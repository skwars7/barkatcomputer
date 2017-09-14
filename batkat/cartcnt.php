<?php
//die($_SESSION["UserID"]);
	include_once("../controller/controller.php");

	if(isset($_SESSION["UserID"]))
	{
		//code to display item into cart
		$tbl=null;
		$jf=null;
		$tbl=array("tblproduct p","tblcart c");
		$jf=array("c.ProductID"=>"p.ProductID","c.UserID"=>$_SESSION["UserID"]);	
		$ProductData=$modal->joinqry($tbl,0,$jf,$connection);
		//end
	}	
		
	

	if(isset($_REQUEST["flag"])) //display cart using ajax
	{
		if(!empty($ProductData))
		{	
	?>	
	<div class="shopping-cart-table">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th class="cart-romove item">Remove</th>
					<th class="cart-romove item">Move To Wishlist</th>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product Name</th>
					<th class="cart-total last-item">Amount</th>
				</tr>
			</thead><!-- /thead -->
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
	
							<span class="">
								<a href="index.php" class="btn btn-upper btn-primary outer-left-xs">Continue Shopping</a>
								
							</span>

						</div><!-- /.shopping-cart-btn -->
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php
					foreach($ProductData as $da)
					{	
						$jf=null;
						$tbl1=array("tblproductimage");
						$field=array("ImageURL");
						$jf["ProductImageID"]="(select min(ProductImageID) from tblproductimage where ProductID=$da->ProductID and ProductImageStatus=0)";	
						$Imagedata=$modal->joinqry($tbl1,$field,$jf,$connection);

				?>
				<tr>
					<td class="romove-item"><a  title="cancel" name="delete" class="icon" onclick="deletecart(<?php echo $da->CartID; ?>)">
					<i class="fa fa-trash-o"></i></a></td>

					<td class="romove-item"><a onclick="movetowishlist(<?php echo $da->ProductID; ?>,<?php echo $da->CartID;?>)" title="move to Wishlist" name="move" class="icon">
					<i class="fa fa-exchange"></i></a></td>
					<td class="cart-image">
						<a class="entry-thumbnail" href="detail.php?productid=<?php echo $da->ProductID ; ?>">
						    <img src="../src/images/products/<?php echo $Imagedata[0]->ImageURL ; ?>" alt="" style="height: 100px;width: auto;max-width: 100%;" class="img img-responsive">
						</a>
					</td>
					<td class="cart-product-name-info">
						<h4 class='cart-product-description'><a href="detail.php?productid=<?php echo $da->ProductID ; ?>"><?php echo $da->ProductName ; ?></a></h4>
					</td>
					
					<td class="cart-product-grand-total"><span class="cart-grand-total-price" id="calcprice<?php echo $da->ProductID ?>">&#8377;<?php echo $da->SellingPrice ; ?></span></td>
				</tr>
				<?php
				}
				?>
			</tbody><!-- /tbody -->
		</table><!-- /table -->
	</div>
	<div class="col-md-4 col-sm-12 cart-shopping-total">
	<table class="table">
		<thead>
			<tr>
				<?php
				$sum=0;
				foreach ($ProductData as $da) {
					$sum+=$da->SellingPrice;
				}	
				?>
				<th>
					
					<div class="cart-grand-total">
						Grand Total<span class="inner-left-md">&#8377;<?php echo $sum;?></span>
					</div>
				</th>
			</tr>
		</thead><!-- /thead -->
		<tbody>
				<tr>
					<td>
						<div class="cart-checkout-btn pull-right">
							<form method="post">	
							<input type="submit" name="checkout" value="PROCCED TO CHEKOUT" class="btn btn-primary checkout-btn">
							</form>
							<span class="">Checkout with multiples address!</span>
						</div>
					</td>
				</tr>
		</tbody><!-- /tbody -->
	</table><!-- /table -->
</div><!-- /.cart-shopping-total -->
	</div><!-- /.shopping-cart-table -->
	<?php
	}
	else //display image when cart is empty
	{
	?>	
		<center><img src="../src/images/emptycart.png" class="img img-responsive"></center>
	<?php	
	}
	}

	if(isset($_REQUEST["cartid"])) //code to delete cart
	{
		$jf=null;
		$jf["CartID"]=$_REQUEST["cartid"];	
		$DeleteData=$modal->delete("tblcart",$jf,$connection);

	}	

	if(isset($_REQUEST["productid"]) && isset($_REQUEST["cartid"])) //code to move item into wishlist and delete from cart
	{
		$data=null;
		$data["ProductID"]=$_REQUEST["productid"];
		$data["UserID"]=$_SESSION["UserID"];
		$wData=$modal->display("tblwishlist",0,$data,$connection);
		
		if($wData==0)
		{
			$jf=null;
			$jf["ProductID"]=$_REQUEST["productid"];	
			$jf["UserID"]=$_SESSION["UserID"];
			$jf["CreateDateTime"]=$dt;
			$jf["AmendmentDateTime"]=$dt;
			$jf["WishListStatus"]=0; 
			$insertData=$modal->insert("tblwishlist",$jf,$connection);
		}
		
		$jf=null;
		$jf["CartID"]=$_REQUEST["cartid"];	
		$DeleteCart=$modal->delete("tblcart",$jf,$connection);
	}

	if(isset($_REQUEST["checkout"])) //redirect to checkout page
	{

		header("location:checkout.php");
	}


	

?>