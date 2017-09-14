<?php
require_once '../controller/controller.php';
$image=$modal->display("tblhomeslider",0,0,$connection);

if(isset($_REQUEST['btndelete']))
{
	$imgcond['HomeSliderID']=$_REQUEST['btndelete'];
	$modal->delete("tblhomeslider",$imgcond,$connection);
	header("location:homeslider.php");
}
if(isset($_REQUEST['btnsub']))
{
	$ifile=uniqid().$_FILES['file']['name'];
	move_uploaded_file($_FILES['file']['tmp_name'], "../src/images/homeslider/".$ifile);
	$idata=array("Title"=>$_REQUEST['title'],"Description"=>$_REQUEST['description'],"ImageURL"=>$ifile,"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
	$modal->insert("tblhomeslider",$idata,$connection);
	header("location:homeslider.php");
}
if(isset($_REQUEST['btnupd']))
{
	$bid=$_REQUEST['btnupd'];
	if(isset($_FILES['file'.$bid]['name']))
	{
		if($_FILES['file'.$bid]['name']!="")
		{
		$uifile=uniqid().$_FILES['file'.$bid]['name'];
		move_uploaded_file($_FILES['file'.$bid]['tmp_name'], "../src/images/homeslider/".$uifile);
		$data["ImageURL"]=$uifile;
		}
	}

	$data["Title"]=$_REQUEST['title'.$bid];
	$data["Description"]=$_REQUEST['description'.$bid];
	$cond['HomeSliderID']=$bid;
	$modal->update("tblhomeslider",$data,$cond,$connection);
	header("location:homeslider.php");
}
?>