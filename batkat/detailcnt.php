<?php
include_once("../controller/controller.php");

if(isset($_REQUEST["productid"]))
{ 
	

	$data=null;
	$tblprods=array("tblproduct p","tblproductimage pi");
	$prods=array("pi.ProductID"=>"p.ProductID","p.ProductID"=>$_REQUEST["productid"]);
	$data=$modal->joinqry($tblprods,0,$prods,$connection);
	// print_r($data);
	// die();
}

if(isset($_REQUEST["productid"]))
{ 
	

	$data=null;
	$tblprods=array("tblproduct p","tblproductimage pi");
	$prods=array("pi.ProductID"=>"p.ProductID","p.ProductID"=>$_REQUEST["productid"]);
	$data=$modal->joinqry($tblprods,0,$prods,$connection);
	
}

if(isset($_REQUEST["productid"]))
{ 
	

	$data1=null;
	$tblprods=array("tblcolor c","tblcolorxproduct cp");
	$prods=array("cp.ColorID"=>"c.ColorID","ColorXProductID"=>$_REQUEST["productid"]);
	$data1=$modal->joinqry($tblprods,0,$prods,$connection);
	// print_r($data1);
	// die();
	
}


 $sizeqty=null;
 $qty=null;
 $qty["ProductID"]=$_REQUEST["productid"];
 $sizeqty=$modal->display("tblsizexquantity",0,$qty,$connection);

if(isset($_REQUEST["sizestock"]))
    //echo $_REQUEST["state"];
    {
        //die("yoyo");
        $data=null;
        $size=null;
        $stateid=$_REQUEST["sizestock"];
        //$data["Size"]=$stateid;

        $product=$_REQUEST["productid"];
        $data["SizeXQuantityID"]=$_REQUEST["sizestock"];
        $size=$modal->display("tblsizexquantity",0,$data,$connection);
        $_SESSION['sqid']=$_REQUEST["sizestock"];
    
      if($size[0]->Quantity == 0 || $size == NULL)
      {
      	echo "Out Of Stock";
      }
      else
      {
      	echo "In Stock";
      }	
    }
      if(isset($_REQUEST["wishlist"]))
   {
    $data=null;  
    $data["UserID"]=$_SESSION["UserID"];
    $data["ProductID"]=$_REQUEST["productid"];
    $data["CreateDateTime"]=$dt;
    $data["AmendmentDateTime"]=$dt;
    $data["WishListStatus"]=0; 
    $insertwish=$modal->insert("tblwishlist",$data,$connection);
    // print_r($data);
    // die();
    header("location:detail.php?productid=".$_REQUEST["productid"]);
   }

   	$wishdata["UserID"]=$_SESSION["UserID"];
   	$wishdata["ProductID"]=$_REQUEST["productid"];
   	$wishdisplay=$modal->display("tblwishlist",0,$wishdata,$connection);
   	// print_r($data);
   	// die();
	$jf=null;
	$tbl=array("tblproduct p");
	$field=array("p.CategoryID");
	$jf["p.ProductID"]=$_REQUEST["productid"];
	$Categories=$modal->joinqry($tbl,$field,$jf,$connection);
	// print_r($Categories);
	// die();

   	$jf=null;
	$tbl=array("tblproduct p");
	$jf["p.ProductID"]=$_REQUEST["productid"];
	$jf["p.CategoryID"]=$Categories[0]->CategoryID;
	$sym=array("<>","=");
	$Product=$modal->joinqry($tbl,0,$jf,$connection,$sym);
	// print_r($sym);


  if(isset($_REQUEST["addcart"]))
   {

    $data5["UserID"]=$_SESSION["UserID"];
    $data5["ProductID"]=$_REQUEST["productid"];
    $data5["SizeXQuantityID"]=$_SESSION['sqid'];
    $modal->insert("tblcart",$data5,$connection);
   
    unset($_SESSION['sqid']);

    header("location:detail.php?productid=".$_REQUEST["productid"]);

   }

   if(isset($_REQUEST["productid"]))
{ 
	

	$description=null;
	$tbldesc=array("tbldescription de"," tblproductxdescription pde");
	$desc=array("pde.DescriptionID"=>"de.DescriptionID","ProductxDescriptionID"=>$_REQUEST["productid"]);
	$description=$modal->joinqry($tbldesc,0,$desc,$connection);
	
}
?>