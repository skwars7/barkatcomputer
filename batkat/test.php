<?php
$content=file_get_contents("http://cricscore-api.appspot.com/csa");
$array = json_decode($content,true);
print_r($array);
echo "<br>"."Match Id :- ".$array[0]['id'];
$u=$array[0]['id'];
echo '<br/>';
$content=file_get_contents("http://cricscore-api.appspot.com/csa?id=$u");
echo $content;
$array = json_decode($content,true);
echo "<br>Feed#========================================================================#<br>";
echo "1) ";
print_r($array);
echo '<br/>';
echo "2) ";
echo $array[0]['de'];
$u=$array[0]['de'];
header('Refresh:10;URL=test.php');
?>