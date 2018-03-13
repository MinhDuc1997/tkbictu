<?php
require_once '../config.php';

$id_ = $_COOKIE['msv'];
$name_ = $_COOKIE['name'];
$class_ = $_COOKIE['class'];

$domain = $con->get_domain();

setcookie("msv", $id_, time() - 604800, "/");
setcookie("name", $name_, time() - 604800, "/");
setcookie("class", $class_, time() - 604800, "/");
header("Location:$domain");
?>