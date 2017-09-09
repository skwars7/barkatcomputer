<?php
	include_once("../controller/controller.php");

	$tbl = array('tblorder o',"tblorderdetail od");
    $jf=null;
    $field=array("o.OrderID","od.OrderPrice","o.CreateDateTime","od.OrderQuantity");
    $jf=array("o.OrderStatus"=>0,"o.UserID"=>$_SESSION["UserID"],"od.OrderID"=>"o.OrderID","o.OrderID"=>$_REQUEST["OrderId"]);
    $OrderDetail=$modal->joinqry($tbl,$field,$jf,$connection);


    $tbl = array('tblorder o',"tblcity c","tblstate s","tblshipping sh");
    $jf=null;
    $field=array("c.CityName","s.StateName","sh.ReceiverAddress","sh.ReceiverName","sh.ContactNo");
    $jf=array("o.OrderStatus"=>0,"o.UserID"=>$_SESSION["UserID"],"sh.OrderID"=>"o.OrderID","o.OrderID"=>$_REQUEST["OrderId"],"sh.CityID"=>"c.CityID","sh.StateID"=>"s.StateID");
    $Shippment=$modal->joinqry($tbl,$field,$jf,$connection);
	
    $tbl = array('tblorder o',"tblorderdetail od","tblproduct p");
    $jf=null;
    $jf=array("o.OrderStatus"=>0,"o.UserID"=>$_SESSION["UserID"],"od.OrderID"=>"o.OrderID","o.OrderID"=>$_REQUEST["OrderId"],"p.ProductID"=>"od.ProductID","p.ProductStatus"=>0);
    $Product=$modal->joinqry($tbl,0,$jf,$connection);

?>	
