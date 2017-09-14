<?php
	include("connection.php");
	require '../src/mail/PHPMailer-master/PHPMailerAutoload.php';
	class modal
	{
		public function display($tbl,$field,$data,$conn,$sym=0,$order=0,$grp=0,$have=0,$limit=0)
		{
			if($field !=0)
			{
				$vv=array_values($field);
				$f=implode(",",$vv);	
			}
			else
				$f="*";
			
			$selq="select $f from $tbl";
			
			if($data !=0)
			{
				$cnt=1;
				$i=0;
				$selq.=" where ";
				foreach ($data as $key => $value)
				 {
					if($sym!=0)
						$selq.="$key $sym[$i] $value ";
					else	
						$selq.="$key = '$value' ";
					$i++;
					
					if($cnt<count($data))
					{
						$selq.= " and ";
						$cnt++;	
					}	
				}
			}
			if($grp !=0)
			{
				$vv2=array_values($grp);
				$f2=implode(",",$vv2);
				$selq.=" group by $f2";	
			}
			if($have !=0)
			{
				$vv1=array_values($have);
				$f1=implode(",",$vv1);
				$selq.=" having $f1";	
			}
			if($order !=0)
			{
				$vv3=array_values($order[0]);
				$f3=implode(",",$vv3);
				$selq.=" order by $f3 $order[1]";	
			}
			if($limit !=0)
			{
				$selq.=" limit $limit";	
			}
			//die($selq);
			$r=$conn->query($selq);
			if(!$r)
			{
				die($conn->error);
			}
			else
			{
			while ($dd=$r->fetch_object())
			{
				$rr[]=$dd;
			}
			}
			if(isset($rr))
			return $rr;
		}

		public function insert($tbl,$data,$conn)
		{
			$kk=array_keys($data);
			$vv=array_values($data);
			
			$kkk=implode(",", $kk);
			$vvv=implode("','", $vv);
			
			$insQry="insert into $tbl ($kkk) values ('$vvv')";
			// echo $insQry;
			//$conn->query($insQry);
			return $conn->query($insQry);
			
		}

		public function delete($tbl,$data,$conn)
		{
			$delq="delete from $tbl";
			if($data !=0)
			{
				$cnt=1;
				$delq.=" where ";
				foreach ($data as $key => $value)
				 {

					$delq.="$key = '$value'";
					
					if($cnt<count($data))
					{
						$delq.= " and ";
						$cnt++;	
					}
				}
			}
			//die($delq);
			return $conn->query($delq);
		}

		public function update($tbl,$newdata,$data,$conn)
		{
			$updq="update $tbl set ";
			$cnt=1;
			foreach ($newdata as $key => $value)
			{
				$updq.="$key = '$value'";
				
				if($cnt<count($newdata))
				{
					$updq.= ",";
					$cnt++;	
				}
			}

			if($data !=0)
			{
				$count=1;
				$updq.=" where ";
				foreach ($data as $key => $value)
				 {

					$updq.="$key = '$value '";
					
					if($count<count($data))
					{
						$updq.= " and ";
						$count++;	
					}
				}
			}
			//die($updq);
				$conn->query($updq);
			
		}

		public function joinqry($tbl,$field,$data,$conn,$sym=0,$order=0,$grp=0,$have=0,$limit=0)
		{
			$tab_arr=array_values($tbl);
			$tab_str=implode(",", $tab_arr);

			if($field !=0)
			{
				$vv=array_values($field);
				$f=implode(",",$vv);	
			}
			else
				$f="*";

			$joinq="select $f from $tab_str";
			
			if($data !=0)
			{
				$cnt=1;
				$i=0;
				$joinq.=" where ";
				foreach ($data as $key => $value)
				 {
					if($sym!=0)
					{
						if($sym[$i]=="in")
							$joinq.="$key $sym[$i] ($value) ";
						else if($sym[$i]=="between")
							$joinq.="$key $sym[$i] $value[0] and $value[1] ";
						else
							$joinq.="$key $sym[$i] $value ";
					}
					else	
						$joinq.="$key = $value ";
					$i++;
					
					if($cnt<count($data))
					{
						$joinq.= " and ";
						$cnt++;	
					}	
				}
			}
			if($grp !=0)
			{
				$vv2=array_values($grp);
				$f2=implode(",",$vv2);
				$joinq.=" group by $f2";	
			}
			if($have !=0)
			{
				$vv1=array_values($have);
				$f1=implode(",",$vv1);
				$joinq.=" having $f1";	
			}
			if($order !=0)
			{
				$vv3=array_values($order[0]);
				$f3=implode(",",$vv3);
				$joinq.=" order by $f3 $order[1]";	
			}
			if($limit !=0)
			{
				$joinq.=" limit $limit";	
			}
			//die($joinq);
			$r=$conn->query($joinq);
			while ($dd=$r->fetch_object())
			{
				$rr[]=$dd;
			}
			if(isset($rr))
			return $rr;
		}
	
		public function sendmail($to,$msg,$sub)
		{
			$mail = new PHPMailer();
		   $mail->IsSmtp();
		   $mail->SMTPDebug = 0;
		   $mail->SMTPAuth = true;
		   $mail->SMTPSecure = 'ssl';
		   $mail->Host = "smtp.gmail.com";
		   $mail->Port = 465; // or 587
		   $mail->IsHTML(true);
		   $mail->Username = "info.mr.driver@gmail.com";
		   $mail->Password = "hellomrdriver";
		   $mail->SetFrom("info.mr.driver@gmail.com");
		   $mail->Subject = $sub;
		   $mail->Body = $msg;
		   $mail->AddAddress($to);
		   if($mail->Send())
		   {
		   	?><script>alert("mail sent");</script><?php
		   }
		   else
		   {
		   	?><script>alert("mail not sent");</script><?php
		   }
		}
			var $main;
		  public function paginate($val,$valperpage)
		  {
		      $totalval=count($val);
		      if(isset($_REQUEST['page']))
		        $currpage=$_REQUEST['page'];
		      else
		        $currpage=1;

		      $counts=ceil($totalval/$valperpage);
		      $par1=($currpage-1)*$valperpage;
		      $this->main=array_slice($val,$par1,$valperpage);
		      for($x=1;$x<=$counts;$x++)
		      {
		        $num[]=$x;
		      }
		      return $num;
		  }
		  public function fetchdata()
		  {
		    $result=  $this->main;
		    return $result;
		  }
	}
?>