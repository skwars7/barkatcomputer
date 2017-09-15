<?php
	
	include_once("../controller/controller.php");

	$slider=$modal->display("tblhomeslider","ImageURL",0,$connection);
	// print_r($slider);
	// die();

	$jf=null;
	$tbl=array("tblcategory c","tblcategoryslider cs");
	$jf=array("CategoryStatus"=>0,"cs.CategoryID"=>"c.CategoryID");
	$categorywiseslider=$modal->joinqry($tbl,0,$jf,$connection);

	
	if(isset($_REQUEST["pid"]))
	{		
	$data=null;  
    $data["UserID"]=$_SESSION["UserID"];
    $data["ProductID"]=$_REQUEST["pid"];
    $data["CreateDateTime"]=$dt;
    $data["AmendmentDateTime"]=$dt;
    $data["WishListStatus"]=0; 
    $insertwish=$modal->insert("tblwishlist",$data,$connection);
    header("location:index.php");
	}
	// $categorydata["CategoryStatus"]=0;
	// $DisplayCategory=$modal->display("tblcategory",0,$categorydata,$connection);

	// $jf=null;
	// $categoriestbl=array("tblcategory cat","tblsubcategory sub");
	// $categorydata=array("CategoryStatus"=>0,"sub.CategoryID"=>"cat.CategoryID");
	// $DisplayCategory=$modal->joinqry($categoriestbl,0,$categorydata,$connection);
	// print_r($DisplayCategory);
	// die();

	$cond=null;
	$cond=array("CategoryStatus"=>0);
	$category1=$modal->display("tblcategory",array('CategoryName','CategoryID'),$cond,$connection);


?>