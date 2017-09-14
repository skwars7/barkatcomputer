<?php
require_once '../controller/controller.php';
$tbl=array("tblorder o","tbluser u","tblshipping s","tblcity c");
$ocond=array("o.OrderID"=>"s.OrderID","u.UserID"=>"o.UserID","s.CityID"=>"c.CityID");
$orders=$modal->joinqry($tbl,0,$ocond,$connection);
//print_r($orders);
?>