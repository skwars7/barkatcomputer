<?php
require_once("../controller/controller.php");
$loadCat=$modal->display("tblcategory",0,0,$connection);
if(isset($_REQUEST['cname']))
{
	$ccond['CategoryName']=$_REQUEST['cname'];
	$cat=$modal->display("tblcategory",0,$ccond,$connection);
	if($cat==0)
	{
		$Cdata['CategoryName']=$_REQUEST['cname'];
		$Cdata['CategoryStatus']=0;
		$Cdata['CreateDateTime']=$dt;
		$Cdata['AmendmentDateTime']=$dt;
		$modal->insert("tblcategory",$Cdata,$connection);
	}
	else
	{
		?>
		<div class="alert alert-danger alert-dismissible">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	        <h4><i class="icon fa fa-ban"></i>Category Exist</h4>
	        Alert!! This Category Is Already Exist.
	   	</div>
		<?php
	}
}
if (isset($_REQUEST['unblock']))
		{
			if($_REQUEST['unblock']==1)
        	{
	        	$newval['CategoryStatus']=1;
	        	$newval['AmendmentDateTime']=$dt;
				$cond['CategoryID']=$_REQUEST['id'];
				$modal->update("tblcategory",$newval,$cond,$connection);
				$s=$modal->display("tblcategory",0,$cond,$connection);
	            if($s[0]->CategoryStatus==1)
	            	echo "Disable";
	            else
	            	echo "Enable";
        	}
			else if($_REQUEST['unblock']==0)
			{
				$newval['CategoryStatus']=0;
	        	$newval['AmendmentDateTime']=$dt;
				$cond['CategoryID']=$_REQUEST['id'];
				$modal->update("tblcategory",$newval,$cond,$connection);
				$s=$modal->display("tblcategory",0,$cond,$connection);
	            if($s[0]->CategoryStatus==1)
	            	echo "Disable";
	            else
	            	echo "Enable";

        	}
        }			
?>