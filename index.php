<?php 
  require_once 'config.php';
  $url_back = $con->get_domain()."/mytkb";
  if(isset($_COOKIE['name']) and isset($_COOKIE['msv']) and isset($_COOKIE['class'])){
  header("location:$url_back");
  } ?>
<!DOCTYPE html>
<html lang="Vi">
<head>
  <meta charset="UTF-8">
  <title>Đăng nhập - Thời khóa biểu ICTU</title>
      <link rel="shortcut icon" href="http://techitvn.com/tkb/img/calendar.png"> 
      <link rel="stylesheet" href="css/home.css"> 
</head>

<body>
  <h1>Thời khóa biểu</h1>
  <h5>Đại học CNTT&TT (ĐH Thái Nguyên)</h5>
  <div class="login-page">
  <div class="form">
    <form class="login-form" action="hand/login.php" method="post">
      <input type="text" name="msv" placeholder="Mã sinh viên" required/>
      <input type="password" name="pass" placeholder="Mật khẩu" required/>
      <button>Đăng nhập</button>
    </form>
  </div>
</div>
  <!--<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>-->

</body>
</html>
