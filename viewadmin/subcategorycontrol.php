<?php
require_once("../controller/controller.php");
$scond['CategoryID']=$_REQUEST['categoryid'];
$loadCat=$modal->display("tblsubcategory",0,$scond,$connection);
if(isset($_REQUEST['cname']))
{
	$ccond['SubCategoryName']=$_REQUEST['cname'];
	$ccond['CategoryID']=$_REQUEST['categoryid'];
	$cat=$modal->display("tblsubcategory",0,$ccond,$connection);
	if($cat==0)
	{
		$Cdata['SubCategoryName']=$_REQUEST['cname'];
		$Cdata['SubCategoryStatus']=0;
		$Cdata['CategoryID']=$_REQUEST['categoryid'];
		$Cdata['CreateDateTime']=$dt;
		$Cdata['AmendmentDateTime']=$dt;
		$modal->insert("tblsubcategory",$Cdata,$connection);
	}
	else
	{
		?>
		<div class="alert alert-danger alert-dismissible">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	        <h4><i class="icon fa fa-ban"></i>SubCategory Exist</h4>
	        Alert!! This SubCategory Is Already Exist.
	   	</div>
		<?php
	}
}
if (isset($_REQUEST['unblock']))
		{
			if($_REQUEST['unblock']==1)
        	{
	        	$newval['SubCategoryStatus']=1;
	        	$newval['AmendmentDateTime']=$dt;
				$cond['SubCategoryID']=$_REQUEST['id'];
				$modal->update("tblsubcategory",$newval,$cond,$connection);
				$s=$modal->display("tblsubcategory",0,$cond,$connection);
	            if($s[0]->SubCategoryStatus==1)
	            	echo "Disable";
	            else
	            	echo "Enable";
        	}
			else if($_REQUEST['unblock']==0)
			{
				$newval['SubCategoryStatus']=0;
	        	$newval['AmendmentDateTime']=$dt;
				$cond['SubCategoryID']=$_REQUEST['id'];
				$modal->update("tblsubcategory",$newval,$cond,$connection);
				$s=$modal->display("tblsubcategory",0,$cond,$connection);
	            if($s[0]->SubCategoryStatus==1)
	            	echo "Disable";
	            else
	            	echo "Enable";

        	}
        }			
?>