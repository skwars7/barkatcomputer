<?php 
require_once '../controller/controller.php';
$prod=$modal->display("tblproduct",0,0,$connection);
//print_r($prod);
$inarray[]="";
$deals=$modal->display("tblspecialoffer",0,0,$connection);
$cnt=1;
if(isset($deals))
{
	foreach ($deals as $d) 
	{
		$inarray[$cnt]=$d->ProductID;
		$cnt++;
	}
}
//print_r($inarray);
if(isset($_REQUEST['val']))
{
	//die("welcome");
	if($_REQUEST['state']==2)
	{
		//die("insert");
			$dcond1['ProductID']=$_REQUEST['val'];
			$dcond1['CreateDateTime']=$dt;
			$dcond1['AmendmentDateTime']=$dt;
			$dcond1['Status']=0;
			$modal->insert("tblspecialoffer",$dcond1,$connection);
			echo "heloo";
	}
	else if($_REQUEST['state']==1)
	{
			$dcond['ProductID']=$_REQUEST['val'];
			$modal->delete("tblspecialoffer",$dcond,$connection);
			echo "deded";
	}
}
?>