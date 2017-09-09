<?php
	
	include_once("../controller/controller.php");

	$slider=$modal->display("tblmainslider","ImageURL",0,$connection);
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

	
?>