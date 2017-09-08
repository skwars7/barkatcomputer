<?php
require 'Instagram-API-master/src/Instagram.php';
/////// CONFIG ///////
$username = 'hasnain_1746';
$password = '';
$debug    = false;
$photo    = '1.jpg';     // path to the photo
$caption  = null;   // caption
//////////////////////
$i = new \InstagramAPI\Instagram($username, $password, $debug);
try{
  $i->login();
} catch (InstagramException $e)
{
  $e->getMessage();
  exit();
}
try {
  $i->uploadPhoto($photo, $caption);
} catch (Exception $e)
{
  echo $e->getMessage();
}
