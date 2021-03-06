<?php
	require_once '../controller/controller.php';

	//tbpproduct details..
	$prodcond['ProductID']=$_REQUEST['pid'];
	$uproduct=$modal->display("tblproduct",0,$prodcond,$connection);
	
	//tbldescription details..
	$tbldesc=array("tblproductxdescription pd","tbldescription d");
	$desccond=array("pd.ProductID"=>$_REQUEST['pid'],"d.DescriptionID"=>"pd.DescriptionID");
	$desc=$modal->joinqry($tbldesc,0,$desccond,$connection);

	//tblimagexproduct..
	$imgcond['ProductID']=$_REQUEST['pid'];
	$img=$modal->display("tblproductimage",0,$imgcond,$connection);

	if(isset($_REQUEST['updprod']))
	{
		$prodnew=array("ProductName"=>$_REQUEST['prodname'],"Brand"=>$_REQUEST['brand'],"Cost"=>$_REQUEST['cost'],"DiscountPercentage"=>$_REQUEST['disper'],"DiscountAmount"=>$_REQUEST['disamt'],"SellingPrice"=>$_REQUEST['sellpr'],"AmendmentDateTime"=>$dt,"ProductStatus"=>$_REQUEST['status']);
		$proddata['ProductID']=$_REQUEST['pid'];
		$modal->update("tblproduct",$prodnew,$proddata,$connection);
		header("location:productdetails.php?pid=".$_REQUEST['pid']);
	}
	if(isset($_REQUEST['upddesc']))
	{
		foreach ($desc as $d) {
			$decsnew['Value']=$_REQUEST[$d->Attribute];
			$descond['ProductID']=$_REQUEST['pid'];
			$descond['ProductxDescriptionID']=$d->ProductxDescriptionID;
			$modal->update("tblproductxdescription",$decsnew,$descond,$connection);
			header("location:productdetails.php?pid=".$_REQUEST['pid']);
		}
	}

	if(isset($_REQUEST['imgid']))
	{
		$id=$_REQUEST['imgid'];
		$file=uniqid().$_FILES["img$id"]['name'];
        move_uploaded_file($_FILES["img$id"]['tmp_name'],"../src/images/products/".$file);
        $imgnew['ImageURL']=$file;
        $imgnew['AmendmentDateTime']=$dt;
        $imgcond['ProductImageID']=$id;
        $modal->update("tblproductimage",$imgnew,$imgcond,$connection);
        header("location:productdetails.php?pid=".$_REQUEST['pid']);
	}

	if(isset($_FILES['imgadd']['name']))
	{
		$file=uniqid().$_FILES["imgadd"]['name'];
        move_uploaded_file($_FILES["imgadd"]['tmp_name'],"../src/images/products/".$file);
        $imgdata=array("ProductID"=>$_REQUEST['pid'],"ImageURL"=>$file,"ProductImageStatus"=>0,"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
        $modal->insert("tblproductimage",$imgdata,$connection);
	}
?>