<?php
require_once '../controller/controller.php';
$ocond['OrderID']=$_REQUEST['id'];
$status=$modal->display("tblorder",0,$ocond,$connection);
$rstatus=$modal->display("tblreturn",0,$ocond,$connection);
if(isset($_REQUEST['btnstatus']))
{
	$newdata['OrderStatus']=$_REQUEST['chgstatus'];
	$ucond['OrderID']=$_REQUEST['id'];
	$modal->update("tblorder",$newdata,$ucond,$connection);
	header("location:orderdetails.php?id=".$_REQUEST['id']);
}
$urcond['UserID']=$status[0]->UserID;
$usr=$modal->display("tbluser",0,$urcond,$connection);
$ship=$modal->display("tblshipping",0,$ocond,$connection);
$ccond['c.CityID']=$ship[0]->CityID;
$ccond['s.StateID']="c.StateID";
$city=$modal->joinqry(array("tblcity c","tblstate s"),0,$ccond,$connection);
$pcond['p.ProductID']="od.ProductID";
$pcond['od.OrderID']=$_REQUEST['id'];
$prod=$modal->joinqry(array("tblproduct p","tblorderdetail od"),0,$pcond,$connection);
?>