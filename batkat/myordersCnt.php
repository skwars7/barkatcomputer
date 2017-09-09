<?php
  include_once("../controller/controller.php");

  
    $tbl = array('tblorder o');
    $jf=null;
    $field=array("o.OrderID","o.OrderStatus","o.CreateDateTime");
    $jf=array("o.OrderStatus"=>0,"o.UserID"=>$_SESSION["UserID"]);
    $vieworder=$modal->joinqry($tbl,$field,$jf,$connection);
  
?>
