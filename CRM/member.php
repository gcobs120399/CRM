<?php
header("Content-Type: text/html; charset=utf-8");
require_once("MYSQL.php");
session_start();
//檢查是否經過登入
if(!isset($_SESSION["loginMember"]) || ($_SESSION["loginMember"]=="")){
  header("Location: index.php");
}
//執行登出動作
if(isset($_GET["logout"]) && ($_GET["logout"]=="true")){
  unset($_SESSION["loginMember"]);
  unset($_SESSION["memberLevel"]);
  header("Location: index.php");
}
//繫結登入會員資料
$query_RecMember = "SELECT * FROM `memberdata` WHERE `m_username`='".$_SESSION["loginMember"]."'";
$RecMember = mysql_query($query_RecMember);
$row_RecMember=mysql_fetch_assoc($RecMember);
?>
<html lang="en">
<head>
  <title>顧客關係管理之寵物飼料管理</title>
<!--呆的巡覽列-->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="./css/bootstrap.min.css" rel="stylesheet">
  <script src="./js/ie-emulation-modes-warning.js"></script> 
  <link rel="icon" href="./img/title.png">
<!--呆-->
  <meta  http-equiv="Content-Type" content="text/html;charset=utf-8">
  <link href="style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/menu.css"><!--菜單CSS+頂端-->

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</head>
<body style="text-align:left;font-size:18px;background-image: url(img/46505.png);background-size: cover;background-attachment: fixed; font-family: 微軟正黑體;margin:30px">
<!--巡覽列black-->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header"> 
     <a class="navbar-brand" href="member_center.php" style="font-size: 24pt;">顧客關係管理之寵物飼料管理</a>
    </div>
  </div>
</nav>
<!--巡覽列white-->
<nav class="navbar navbar-default navbar-fixed-top" style="top: 50px;" role="navigation">
  <div class="container">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> 
          <span class="sr-only"></span> 
          <span class="icon-bar"></span> 
          <span class="icon-bar"></span> 
          <span class="icon-bar"></span> 
        </button>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav" style="font-size: 20px;">
        <li class="active"><a href="member.php">客群分析</a></li>
        <li><a href="user.php">使用者行為</a></li>
        <li><a href="consumption.php">消費行為</a></li>
        <li><a href="personal.php">個人化行銷</a></li>
        <li><a href="sell.php">行銷分析</a></li>
        <li><a href="?logout=true">登出</a></li>
      </ul>
    </div>
  </div>
</nav>
<div class=" col-xs-1 col-md-1"></div>
<div class="container col-xs-10 col-md-10">
  <!--內文-->
  <h1 style="text-align:center;">顧客關係管理之寵物飼料管理</h1>
  <div style="background: rgba(100%,100%,100%,0.6); margin: 0 auto;"><!--div放白色背景透明度60%開始-->
    <div style="text-align: center"><h1>客群分析</h1></div>
    <div style="margin-left:0px auto;margin-right:0px auto;">
      <div style="display: table-cell;vertical-align: middle;">
        <table>
          <tr>
          <td style="font-size: 30px">
           
            </p>
          </td>
          </tr>
        </table>
    </div>
    <div style="display: table-cell;vertical-align: middle;"></div>
</div>

  <footer align="center" style="font-size: 18px;">© 2018 顧客關係管理之寵物飼料管理 ©</footer>
</div><!--div放白色透明度60%結束-->
</div>
<!--呆的巡覽列-->
<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/ie10-viewport-bug-workaround.js"></script>
<!--呆-->
</body>
<script type="text/javascript">/*這為左邊菜單的JS，來源http://codepen.io/vkbansal/pen/QbapGz*/
  'use strict';
var burger = document.getElementById('burger-button');
burger.addEventListener('click', function (e) {
    e.preventDefault();
    document.body.classList.toggle('open');
    burger.classList.toggle('open');
});
</script>
</html>
