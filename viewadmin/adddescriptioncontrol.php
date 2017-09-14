<?php
require_once("../controller/controller.php");
$loadCat=$modal->display("tbldescription",0,0,$connection);
if(isset($_REQUEST['cname']))
{
	$ccond['Attribute']=$_REQUEST['cname'];
	$cat=$modal->display("tbldescription",0,$ccond,$connection);
	if($cat==0)
	{
		$Cdata['Attribute']=$_REQUEST['cname'];
		$Cdata['Status']=1;
		$Cdata['CreateDateTime']=$dt;
		$modal->insert("tbldescription",$Cdata,$connection);
	}
	else
	{
		?>
		<div class="alert alert-danger alert-dismissible">
	        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	        <h4><i class="icon fa fa-ban"></i>Attribute Exist</h4>
	        Alert!! This Arttibute Is Already Exist.
	   	</div>
		<?php
	}
}
if (isset($_REQUEST['unblock']))
		{
			if($_REQUEST['unblock']==1)
        	{
	        	$newval['Status']=1;
				$cond['DescriptionID']=$_REQUEST['id'];
				$modal->update("tbldescription",$newval,$cond,$connection);
				$s=$modal->display("tbldescription",0,$cond,$connection);
	            if($s[0]->Status==1)
	            	echo "Enable";
	            else
	            	echo "Disable";
        	}
			else if($_REQUEST['unblock']==0)
			{
				$newval['Status']=0;
				$cond['DescriptionID']=$_REQUEST['id'];
				$modal->update("tbldescription",$newval,$cond,$connection);
				$s=$modal->display("tbldescription",0,$cond,$connection);
	            if($s[0]->Status==1)
	            	echo "Enable";
	            else
	            	echo "Disable";

        	}
        }			
?>