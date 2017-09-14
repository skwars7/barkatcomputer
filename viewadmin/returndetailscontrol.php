<?php
require_once '../controller/controller.php';
$ocond['ReturnID']=$_REQUEST['id'];
$status=$modal->display("tblreturn",0,$ocond,$connection);
$odcond['OrderID']=$status[0]->OrderID;
$order=$modal->display("tblorder",0,$odcond,$connection);
if(isset($_REQUEST['btnstatus']))
{
	$newdata['ReturnStatus']=$_REQUEST['chgstatus'];
	$ucond['ReturnID']=$_REQUEST['id'];
	$modal->update("tblreturn",$newdata,$ucond,$connection);
	header("location:returndetails.php?id=".$_REQUEST['id']);
}
$urcond['UserID']=$status[0]->UserID;
$usr=$modal->display("tbluser",0,$urcond,$connection);
$ocond1['OrderID']=$status[0]->OrderID;
$ship=$modal->display("tblshipping",0,$ocond1,$connection);
$ccond['c.CityID']=$ship[0]->CityID;
$ccond['s.StateID']="c.StateID";
$city=$modal->joinqry(array("tblcity c","tblstate s"),0,$ccond,$connection);
$pcond['p.ProductID']="rd.ProductID";
$pcond['rd.ReturnID']=$_REQUEST['id'];
$prod=$modal->joinqry(array("tblproduct p","tblreturndetails rd"),0,$pcond,$connection);
?>