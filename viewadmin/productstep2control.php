    <?php
require_once("../controller/controller.php");
if(!isset($_SESSION['prod_data']))
    header("location:products.php");

$attributes=$modal->display("tbldescription",0,0,$connection);
if (isset($_REQUEST['size'])) 
{
	if ($_REQUEST['size']=="5-16") { 
			for ($i=5; $i<=16  ; $i++) { 
		?>
		<div class="form-group">
        	<label for="exampleInputEmail1"><?php echo $i ?></label>
           	<input type="text" name="size-<?php echo $i ?>" class="form-control" id="exampleInputEmail1" placeholder="size-<?php echo $i ?>">
        </div>
	<?php
		}
	}
	elseif ($_REQUEST['size']=="s-xxl") { ?>
		<div class="form-group">
        	<label for="exampleInputEmail1">S</label>
           	<input type="text" name="size-S" class="form-control" id="exampleInputEmail1" placeholder="size-S">
        </div>
        <div class="form-group">
        	<label for="exampleInputEmail1">M</label>
           	<input type="text" name="size-M" class="form-control" id="exampleInputEmail1" placeholder="size-M">
        </div>
        <div class="form-group">
        	<label for="exampleInputEmail1">L</label>
           	<input type="text" name="size-L" class="form-control" id="exampleInputEmail1" placeholder="size-L">
        </div>
        <div class="form-group">
        	<label for="exampleInputEmail1">XL</label>
           	<input type="text" name="size-XL" class="form-control" id="exampleInputEmail1" placeholder="size-XL">
        </div>
        <div class="form-group">
        	<label for="exampleInputEmail1">XXL</label>
           	<input type="text" name="size-XXL" class="form-control" id="exampleInputEmail1" placeholder="size-XXL">
        </div>
        <div class="form-group">
        	<label for="exampleInputEmail1">XXXL</label>
           	<input type="text" name="size-XXXL" class="form-control" id="exampleInputEmail1" placeholder="size-XXXL">
        </div>
        <div class="form-group">
        	<label for="exampleInputEmail1">XXXXL</label>
           	<input type="text" name="size-XXXXL" class="form-control" id="exampleInputEmail1" placeholder="size-XXXXL">
        </div>  
        <div class="form-group">
        	<label for="exampleInputEmail1">XXXXXL</label>
           	<input type="text" name="size-XXXXXL" class="form-control" id="exampleInputEmail1" placeholder="size-XXXXXL">
        </div>
    <?php   
	}
	elseif ($_REQUEST['size']=="28-36") { 
		for ($i=28; $i<=36; $i++) { 
		?>
		<div class="form-group">
        	<label for="exampleInputEmail1"><?php echo $i ?></label>
           	<input type="text" name="size-<?php echo $i ?>" class="form-control" id="exampleInputEmail1" placeholder="size-<?php echo $i ?>" required="">
        </div>
	<?php
		}
	}
	elseif ($_REQUEST['size']=="single") { ?>
		<div class="form-group">
        	<label for="exampleInputEmail1">Unique</label>
           	<input type="text" name="unique" class="form-control" id="exampleInputEmail1" placeholder="unique">
        </div>
	<?php
	}
}
if(isset($_REQUEST['btnnext']))
{
	$form_data=unserialize($_SESSION['prod_data']);
    //auto commit of
    $connection->autocommit(false);
	$prod=array("ProductName"=>$form_data['prodname'],"Brand"=>$form_data['brand'],"Cost"=>$form_data['cost'],"DiscountPercentage"=>$form_data['disper'],"DiscountAmount"=>$form_data['disamt'],"SellingPrice"=>$form_data['sellpr'],"ProductStatus"=>$form_data['prodstatus'],"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt,"CategoryID"=>$form_data['category'],"SubCategoryID"=>$form_data['subcategory']);
	$tblprod=$modal->insert("tblproduct",$prod,$connection);
    $pid=$modal->display("tblproduct",array("max(ProductID) as id"),0,$connection);
	$p=$pid[0]->id;
    $flag=0;
    $check['pid']=$pid;
    for($i=1;$i<=4;$i++)
    {
        if(isset($_FILES["file$i"]["name"]))
        {
            if($_FILES["file$i"]["name"]!="")
            {
                 $flag=1;
                $file=uniqid().$_FILES["file$i"]['name'];
                move_uploaded_file($_FILES["file$i"]['tmp_name'],"../src/images/products/".$file);
                $imgdata1=array("ProductID"=>$p,"ImageURL"=>$file,"ProductImageStatus"=>0,"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                $file1[]=$modal->insert("tblproductimage",$imgdata1,$connection);
            }
                // print_r($file1);
                // die();
            if(!array_search(0, $file1))
                $check['files']=1;
        }
    }
    if($flag==0)
    {
        ?>
        <script type="text/javascript">alert("please select atleast one image.")</script>
        <?php
    }
    foreach($attributes as $att)
    {
        if($_REQUEST[$att->Attribute]!="")
        {
            $attdata=array("ProductID"=>$p,"DescriptionID"=>$att->DescriptionID,"Value"=>$_REQUEST[$att->Attribute]);
            $attributes1[]=$modal->insert("tblproductxdescription",$attdata,$connection);
        }
        if(isset($attributes1))
        {
            if(!array_search(0, $attributes1))
                $check['attributes']=1;
        }
    }
    if (isset($_REQUEST['optionsRadios'])) 
    {
        if ($_REQUEST['optionsRadios']=="5-16") 
        { 
            for ($i=5; $i<=16  ; $i++) 
            { 
                if($_REQUEST["size-$i"]!="")
                {
                    $radio1=array('ProductID'=>$p,"Size"=>$i,"Quantity"=>$_REQUEST["size-$i"],"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                    $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
                }
                else
                {
                    $radio1=array('ProductID'=>$p,"Size"=>$i,"Quantity"=>0,"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                    $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
                }
                if(!array_search(0, $size))
                $check['size']=1;
            }
        }
        elseif ($_REQUEST['optionsRadios']=="s-xxl") 
        {
            if($_REQUEST["size-S"]!="")
             {
                $radio1=array('ProductID'=>$p,"Size"=>"S","Quantity"=>$_REQUEST['size-S'],"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
             }
             else
             {
                $radio1=array('ProductID'=>$p,"Size"=>"S","Quantity"=>0,"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
             }
           if($_REQUEST["size-M"]!="")
             {
                $radio1=array('ProductID'=>$p,"Size"=>"M","Quantity"=>$_REQUEST['size-M'],"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
             }
             else
             {
                $radio1=array('ProductID'=>$p,"Size"=>"M","Quantity"=>0,"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
             }
            if($_REQUEST["size-L"]!="")
             {
                $radio1=array('ProductID'=>$p,"Size"=>"L","Quantity"=>$_REQUEST['size-L'],"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
             }
             else
             {
                $radio1=array('ProductID'=>$p,"Size"=>"L","Quantity"=>0,"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
             }
            if($_REQUEST["size-XL"]!="")
             {
                $radio1=array('ProductID'=>$p,"Size"=>"XL","Quantity"=>$_REQUEST['size-XL'],"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
             }
             else
             {
                $radio1=array('ProductID'=>$p,"Size"=>"XL","Quantity"=>0,"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
             }
            if($_REQUEST["size-XXL"]!="")
             {
                $radio1=array('ProductID'=>$p,"Size"=>"XXL","Quantity"=>$_REQUEST['size-XXL'],"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
             }
             else
             {
                $radio1=array('ProductID'=>$p,"Size"=>"XXL","Quantity"=>0,"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
             }
            if($_REQUEST["size-XXXL"]!="")
             {
                $radio1=array('ProductID'=>$p,"Size"=>"XXXL","Quantity"=>$_REQUEST['size-XXXL'],"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
             }
             else
             {
                $radio1=array('ProductID'=>$p,"Size"=>"XXXL","Quantity"=>0,"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
             }
            if($_REQUEST["size-XXXXL"]!="")
             {
                $radio1=array('ProductID'=>$p,"Size"=>"XXXXL","Quantity"=>$_REQUEST['size-XXXXL'],"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
             }
             else
             {
                $radio1=array('ProductID'=>$p,"Size"=>"XXXXL","Quantity"=>0,"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
             }
            if($_REQUEST["size-XXXXXL"]!="")
             {
                $radio1=array('ProductID'=>$p,"Size"=>"XXXXXL","Quantity"=>$_REQUEST['size-XXXXXL'],"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
             }
             else
             {
                $radio1=array('ProductID'=>$p,"Size"=>"XXXXXL","Quantity"=>0,"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
             }
             if(!array_search(0, $size))
                $check['size']=1;
        }
        elseif ($_REQUEST['optionsRadios']=="28-36") { 
            for ($i=28; $i<=36; $i++) {
                if($_REQUEST["size-$i"]!="")
                { 
                $radio1=array('ProductID'=>$p,"Size"=>$i,"Quantity"=>$_REQUEST["size-$i"],"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                    $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
                }
                else
                {
                    $radio1=array('ProductID'=>$p,"Size"=>$i,"Quantity"=>0,"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
                    $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
                }
                if(!array_search(0, $size))
                $check['size']=1;
            }
        }
        elseif ($_REQUEST['optionsRadios']=="single") { 
            $radio1=array('ProductID'=>$p,"Size"=>"Unique","Quantity"=>$_REQUEST["unique"],"CreateDateTime"=>$dt,"AmendmentDateTime"=>$dt);
            $size[]=$modal->insert("tblsizexquantity",$radio1,$connection);
            if(!array_search(0, $size))
                $check['size']=1;
        }
    }
    if(!array_search(0, $check))
    {
        $connection->commit();
    }
    else
    {
        $connection->rollback();
    }
	unset($_SESSION['prod_data']);
    $connection->autocommit(true);
    header("location:products.php");
}
?>