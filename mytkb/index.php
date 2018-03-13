<?php require_once '../config.php'; 
	  require_once '../lib/simple_html_dom.php'; 
	  require_once '../function/function.php';
	  if(!isset($_COOKIE['msv']) || !isset($_COOKIE['name']) || !isset($_COOKIE['class'])){
	      $dm = $con->get_domain();
	      header("location:$dm");
	  }
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $_COOKIE['name']." - Thời khóa biểu"; ?></title>
	    <link rel="shortcut icon" href="http://techitvn.com/tkb/img/calendar.png"> 
		<!--  -->
		<link rel="stylesheet" href="../css/mytkb.css" media="screen" type="text/css" />
</head>
<body>

<br><br>

<?php
if(isset($_COOKIE['msv'])){
	$url_file = $con->get_domain()."/file_data/".$_COOKIE['msv'].".html";
}
require_once 'calender.php';
?>
</body>
</html>