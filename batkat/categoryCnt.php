<?php
include_once("../controller/controller.php");



$color=$modal->display("tblcolor",0,0,$connection);

// $occassion=$modal->display("tbloccassion",0,0,$connection);

$ccond['CategoryStatus']=0;
$category=$modal->display("tblcategory",0,$ccond,$connection);

if(isset($_REQUEST["cid"]))
{
$sccond['SubCategoryStatus']=0;
$sccond['CategoryID']=$_REQUEST['cid'];
$subcategory=$modal->display("tblsubcategory",0,$sccond,$connection);
$pcond=array("p.CategoryID"=>$_REQUEST['cid']);
$sym[]="=";
}	

if(isset($_REQUEST['scid']))
{
		$pcond["p.SubCategoryID"]=$_REQUEST['scid'];
		$sym[]="=";
}

	
if(isset($_REQUEST['col']))
{
		//$colstr=implode(",", $_REQUEST['col']);
		$pcond["ColorID "]=$_REQUEST['col'];
		$sym[]="in";
		$pcond['cp.ProductID']="p.ProductID";
		$sym[]="=";
		$tbls[]="tblcolorxproduct cp";
}
if(isset($_REQUEST['occ']))
{
		//$occstr=implode(",", $_REQUEST['occ']);
		$pcond["OccassionID "]=$_REQUEST['occ'];
		$sym[]="in";
		$pcond['p.ProductID']="op.ProductID";
		$sym[]="=";
		$tbls[]="tbloccassionxproduct op";
}
if(isset($_REQUEST['min']) and isset($_REQUEST['max']))
{
	if($_REQUEST['min']!="" and $_REQUEST['max']!="")
	{
		$pcond['SellingPrice']=array($_REQUEST['min'],$_REQUEST['max']);
		$sym[]="between";
	}
}

if(isset($pcond) && isset($sym))
{	
$tbls[]="tblproduct p";
$product=$modal->joinqry($tbls,0,$pcond,$connection,$sym);
}

if(isset($_REQUEST['sub']))
{
	 foreach ($subcategory as $c) { ?>
	    	<div class="accordion-group">
	            <div class="accordion-heading">
	                <input type="radio" name="Scid" id="scid<?php echo $c->SubCategoryID ?>" value="<?php echo $c->SubCategoryID ?>" <?php if(isset($_REQUEST['scid'])){ if($c->SubCategoryID==$_REQUEST['scid']) echo "checked"; }?>>
	                <label for="scid<?php echo $c->SubCategoryID ?>"><?php echo $c->SubCategoryName ?></label>
	            </div><!-- /.accordion-heading -->
              <!-- /.accordion-body -->
	        </div>
	        <?php }
}
if(isset($_REQUEST['set']))
{
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
			<h3 class="name"><a href="detail.php"><?php echo $pd->ProductName ; ?></a></h3>
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
<?php }} else echo "No Product Found"; }
	

	

	if(isset($_REQUEST["productid"]))
		{	
		

		$data=null;  
	    $data["UserID"]=$_SESSION["UserID"];
	    $data["ProductID"]=$_REQUEST["productid"];
	    $data["CreateDateTime"]=$dt;
	    $data["AmendmentDateTime"]=$dt;
	    $data["WishListStatus"]=0; 
	    $insertwish=$modal->insert("tblwishlist",$data,$connection);


	    $jf=null;
	    $tbl=array("tblproduct p");
	    $jf=array("p.ProductID"=>$_REQUEST["productid"]);
	    $field=array("p.CategoryID","p.SubCategoryID");
	    $productData=$modal->joinqry($tbl,$field,$jf,$connection);
	    header("location:category.php?cid=".$productData[0]->CategoryID."&scid=".$productData[0]->SubCategoryID);
		}

	


?>