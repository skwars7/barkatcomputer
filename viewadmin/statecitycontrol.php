<?php
include("../controller/controller.php");
$stt=$modal->display("tblstate",0,0,$connection);
//**************************************Ajax for adding state**********************************
	if(isset($_REQUEST['add_state']))
	{
		?>
		<form method="post">
			<input type="textbox" name="new_state">
			<input type="submit" name="add_new_state" class="btn btn-primary">	
			<a class="close" onclick="ajax('close')">X</a>	
		</form>
		
		<?php
		
	}

	if(isset($_REQUEST['add_new_state']))
	{
		$stt_name=$_REQUEST['new_state'];
		date_default_timezone_set("asia/calcutta");
		$dt=date('Y-m-d h:i:s');

		$data=array("StateName"=>$stt_name,"StateStatus"=>1,"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
		$modal->insert('tblstate',$data,$connection);
		header("location:state-city.php");
	}

	//************************************end of ajax for adding state*****************************


//*********adding city to a selected state***********
		if(isset($_REQUEST['add_city']))
		{
			$stt_id=$_REQUEST['st_id'];
		?>
		<form method="post">
			<input type="textbox" name="new_city">
			<input type="hidden" name="hf_stt" value="<?php echo $stt_id;?>"></input>		
			<input type="submit" name="add_new_city" class="btn btn-primary">	
			<a class="close" onclick="ajax('close')">X</a>	
		</form>
		<?php
		}

		if(isset($_REQUEST['add_new_city']))
		{
		$ctt_name=$_REQUEST['new_city'];
		$st_id=$_REQUEST['hf_stt'];
		date_default_timezone_set("asia/calcutta");
		$dt=date('Y-m-d h:i:s');

		
		$data=array("StateID"=>$st_id,"CityName"=>$ctt_name,"CityStatus"=>1,"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
		$modal->insert('tblcity',$data,$connection);
		header("location:state-city.php?");
		}
		//****************end of adding city*******************
//-----------------------------------------------

if(isset($_REQUEST['close_div']))
	{

	}

	//-------------cities for city_state page--------
	if(isset($_REQUEST['state_city']))
	{
		
		$tot_s_state=0;
		$tot_t_state=0;

		$id=$_REQUEST['state_city'];
		$data=array("StateID"=>$id);
		$state_res=$modal->display('tblstate',0,$data,$connection);

		$data=array("stateid"=>$id);
		$ctt=$modal->display('tblcity',0,$data,$connection);
		if($ctt !="")
		{
?>
		<li class="active col-sm-6"><a href="#tab1" data-toggle="tab"><strong style="color: black">Cityname</strong><div class="clearfix"></div></a></li>
        		   <li class="active col-sm-6"><a href="#tab1" data-toggle="tab"><strong style="color: black">User</strong><div class="clearfix"></div></a></li>
<?php
		foreach($ctt as $ct)
		{
		?>
		 <li class="active col-sm-6"><a href="#tab1" data-toggle="tab"><?php echo $ct->CityName;?></a></li>
		<?php
		$data=array("CityID"=>$ct->CityID);
		$s=array("count(*) as stud");
		//$jf=array("u.addid"=>"a.addid");
		$ctt_stud=$modal->display("tbluser",$s,$data,$connection);
		
		$city_u_count=0;
		foreach($ctt_stud as $ctst)
		{
			$city_u_count+=$ctst->stud;
			$tot_s_state+=$ctst->stud;
			?>
			<li class="active col-sm-6"><a href="#tab1" data-toggle="tab"><?php  echo $ctst->stud ?><div class="clearfix"></div></a></li>
			<?php	
			break;
		}
		}	
	}
	else
	{
		?>
		<li class="active col-sm-12"><a href="#tab1" data-toggle="tab">No city found for this state...<div class="clearfix"></div></a></li>
		<?php
	}
		?>

	<li class="active col-sm-12"><a href="#tab1" onclick="ajax('add_ctt','<?php echo $id; ?>')" data-toggle="tab">+ Add City<div class="clearfix"></div></a></li>

          		 <div id="add_ctt">
          		 	
          		 </div>
          	
                <div >
                <center>
               <li class="active col-sm-12"><h3><b><u><?php echo $state_res[0]->StateName;?></u></b></h3></li>
               <li class="active col-sm-6">Total user</li><li class="active col-sm-6"><?php echo $city_u_count;?></li>
               </center>
                </div>
                
	<?php
}
//----------------------end of cities for pages------

?>