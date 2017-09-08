<?php
	include_once("../controller/controller.php");

	// code for display wishlist
	if(isset($_SESSION["UserID"]))
	{
	$jf=null;
	$tbl=array("tblwishlist w","tblproduct p");
	$jf=array("w.ProductID"=>"p.ProductID","w.UserID"=>$_SESSION["UserID"]);
	$WishlistData=$modal->joinqry($tbl,0,$jf,$connection);
	}


	
	if(isset($_REQUEST["flag"])) //display the wishlist using ajax
	{	
		if(!empty($WishlistData))
		{	
	?>	
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th colspan="4" class="heading-title">My Wishlist</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($WishlistData as $w) {
					
					
						$jf=null;
						$tbl1=array("tblproductimage");
						$field=array("ImageURL");
						$jf["ProductImageID"]="(select min(ProductImageID) from tblproductimage where ProductID=$w->ProductID and ProductImageStatus=0)";	
						$ImageData=$modal->joinqry($tbl1,$field,$jf,$connection);
						//echo $ImageData["ImageURL"];
						//die();

				?>
				<tr>
					<td class="col-md-2"><img src="../src/images/products/<?php echo $ImageData[0]->ImageURL ; ?>" style="height: 100px;width: auto;max-width: 100%;" class="img img-responsive"></td>
					<td class="col-md-4">
						<div class="product-name"><a href="detail.php?productid=<?php echo $w->ProductID ?>"><?php echo $w->ProductName; ?></a></div>
					</td>	
					<td class="col-md-3">	<div class="price">
							$<?php echo $w->SellingPrice ; ?>
							<span>$<?php echo $w->Cost; ?></span>
						</div>
					</td>	
					
					<td class="col-md-2">
						<a onclick="addtocart(<?php echo $w->ProductID ; ?>,<?php echo $w->WishListID ; ?>)" class="btn-upper btn btn-primary">Add to cart</a>
					</td>
					<td class="col-md-1 close-btn">
						<a title="cancel" name="delete" class="icon" onclick="deletewishlist(<?php echo $w->WishListID ; ?>)"><i class="fa fa-times"></i></a>
					</td>
				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>
	
	<?php
	}
	
	else //when cart is empty it display the image 
	{
	?>	
		<center><img src="../src/images/emptycart.png" class="img img-responsive"></center>
	<?php	
	}	
	}
			if(isset($_REQUEST["wishlistid"])) //code for deleting wishlist
			{
			$jf=null;
			$jf["WishListID"]=$_REQUEST["wishlistid"];	
			$DeleteData=$modal->delete("tblwishlist",$jf,$connection);
			}	

			if(isset($_REQUEST["productid"]) && isset($_REQUEST["wishlistid"])) //code for deleting wishlist and inserting into cart
			{
			$jf=null;
			$jf["WishListID"]=$_REQUEST["wishlistid"];	
			$DeleteWishlist=$modal->delete("tblwishlist",$jf,$connection);
				
			$jf=null;
			$jf["ProductID"]=$_REQUEST["productid"];	
			$jf["UserID"]=$_SESSION["UserID"];
			$jf["CartStatus"]=0;
			$jf['CreateDateTime']=$dt;
			$jf['AmendmentDateTime']=$dt;
			$insertData=$modal->insert("tblcart",$jf,$connection);
			}	
?>