<?php
require_once '../controller/controller.php';
$procond['CategoryID']=$_REQUEST['prod'];
$prod=$modal->display("tblproduct",0,$procond,$connection);
$tbl=array("tblcategorysliderdetails cd","tblcategoryslider cs");
$scond=array("cs.CategoryID"=>$_REQUEST['prod'],"cd.CategorySliderID"=>"cs.CategorySliderID");
$sliderprod=$modal->joinqry($tbl,0,$scond,$connection);
//print_r($sliderprod);
foreach ($sliderprod as $sp) {
	$sarr[$sp->CategorySliderDetailsID]=$sp->ProductID;
}
//print_r($sarr);
if(isset($_REQUEST['btnadd']))
{
	if(count($sliderprod)>=10 or count($sliderprod)<=25)
	{
		$setdata=array("CategorySliderID"=>$_REQUEST['btnadd'],"ProductID"=>$_REQUEST['pid'],"Status"=>0,"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
		$modal->insert("tblcategorysliderdetails",$setdata,$connection);
		header("location:sliderproduct.php?prod=".$_REQUEST['prod']);
	}
	else
	{
		?>
		<script type="text/javascript">alert("Product should be more than 10 and less than 25 ")</script>
		<?php
	}
}
if(isset($_REQUEST['btndelete']))
{
	if(count($sliderprod)>=10 or count($sliderprod)<=25)
	{
		$setdata=array("CategorySliderDetailsID"=>$_REQUEST['btndelete']);
		$modal->delete("tblcategorysliderdetails",$setdata,$connection);
		header("location:sliderproduct.php?prod=".$_REQUEST['prod']);
	}
	else
	{
		?>
		<script type="text/javascript">alert("Product should be more than 10 and less than 25 ")</script>
		<?php
	}
}
?>