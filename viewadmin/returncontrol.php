<?php
require_once '../controller/controller.php';
$tbl=array("tblreturn r","tbluser u","tblorder o");
$ocond=array("u.UserID"=>"r.UserID","r.OrderID"=>"o.OrderID");
$f=array("o.CreateDateTime as odate","o.*","u.*","r.*");
$ord[0]=array("ReturnID");
$ord[1]="desc";
$orders=$modal->joinqry($tbl,$f,$ocond,$connection,0,$ord);

//print_r($orders);
?>