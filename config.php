<?php
require_once 'class/class.php';

// $set_con = "mysqli_connect('localhost','techitvn','01689470862','techitvn_sv') /*or die('Error connect')*/";
$set_dom = "https://techitvn.com/tkb"; 

$con = new connect;
$con->set_connect($set_con);
$con->set_domain($set_dom)

?>