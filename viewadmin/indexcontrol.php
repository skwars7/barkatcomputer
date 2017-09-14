<?php
require_once("../controller/controller.php");
if(isset($_REQUEST['btnlogin']))
{
		$field=array("AdminID","UserName","Password","ProfilePic","Status");
    	$cond['UserName']=$_REQUEST['username'];
    	$cond['Password']=$_REQUEST['password'];
    	#$cond['Status']=1;
   		$data=$modal->display("tbladmin",$field,$cond,$connection);
		if(isset($data) or $data != 0)
		{
			if($data[0]->Status==0)
			{
				?>
				<script type="text/javascript">
					alert("Your ID is Blocked by the admin.Please contact admin.")
				</script>
				<?php
			}
			if($_REQUEST['username']==$data[0]->UserName && $_REQUEST['password']==$data[0]->Password)
			{
				$_SESSION["admin"]=$data[0]->UserName;
				$_SESSION["adminid"]=$data[0]->AdminID;
				$_SESSION["aprofile"]=$data[0]->ProfilePic;
				header("location:home.php");
			}
			else
			{
				?>
				<script type="text/javascript">
					alert("username or password is wrong.")
				</script>
				<?php
			}
		}
		else
			{
				?>
				<script type="text/javascript">
					alert("username or password is wrong.")
				</script>
				<?php
			}
}
?>