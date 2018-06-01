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

$query_RecFlower = "SELECT * FROM `path`";
$RecFlower = mysql_query($query_RecFlower);
$row_RecFlower=mysql_fetch_assoc($RecFlower);
//選取所有一般會員資料
//預設每頁筆數
$pageRow_records = 12;
//預設頁數
$num_pages = 1;
//若已經有翻頁，將頁數更新
if (isset($_GET['page'])) {
  $num_pages = $_GET['page'];
}
//本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
$startRow_records = ($num_pages -1) * $pageRow_records;
//未加限制顯示筆數的SQL敘述句
$query_RecFlower = "SELECT * FROM `path`";
//加上限制顯示筆數的SQL敘述句，由本頁開始記錄筆數開始，每頁顯示預設筆數
$query_limit_RecFlower = $query_RecFlower." LIMIT ".$startRow_records.", ".$pageRow_records;
//以加上限制顯示筆數的SQL敘述句查詢資料到 $resultMember 中
$RecFlower = mysql_query($query_limit_RecFlower);
//以未加上限制顯示筆數的SQL敘述句查詢資料到 $all_resultMember 中
$all_RecFlower = mysql_query($query_RecFlower);
//計算總筆數
$total_records = mysql_num_rows($all_RecFlower);
//計算總頁數=(總筆數/每頁筆數)後無條件進位。
$total_pages = ceil($total_records/$pageRow_records);

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
  <link rel="icon" href="./newimg/02.png">
<!--呆-->
  <meta  http-equiv="Content-Type" content="text/html;charset=utf-8">
  <link href="style.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="css/menu.css"><!--菜單CSS+頂端-->

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
</head>
<body style="text-align:left;font-size:18px;background-image: url(newimg/bg.gif);background-size: cover;background-attachment: fixed; font-family: 微軟正黑體;margin:30px">
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
        <li class="active"><a href="user_path.php">使用者行為</a></li>
        <li><a href="member_path.php">客群分析</a></li>
        <li><a href="consumption.php">寵物分析</a></li>
        <li><a href="personal.php">訂單分析</a></li>
        <li><a href="?logout=true">登出</a></li>
      </ul>
    </div>
  </div>
</nav>
<br><br><br>
<h1 style="text-align:center;">瀏覽路徑紀錄</h1>
<hr>
<div class=" col-xs-3 col-md-3" style="background: rgba(100%,100%,100%,0.6); margin: 0 auto;">
  <a href="user_path.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">瀏覽路徑紀錄</a><br>
  <a href="user_stay.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">網頁停留時間</a><br>
  <a href="user_shop.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">購物車歷史紀錄</a><br>
  <a href="#" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">客製化紀錄器</a><br>
  <a href="apparatus.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">使用者裝置紀錄</a><br>
  <a href="area.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">使用者地區紀錄</a>
</div>
<div class="container col-xs-8 col-md-8">
  <!--內文-->
  
  <div style="background: rgba(100%,100%,100%,0.6); margin: 0 auto;"><!--div放白色背景透明度60%開始-->
    <div style="margin-left:0px auto;margin-right:0px auto;">
      <div id="container"></div><!--折線圖-->
      <br>
      <table width="90%" border="0px" align="center" cellpadding="4" cellspacing="0">
    <tr>
    <td class="tdbline">
    <table width="100%" border="0px" cellspacing="0" cellpadding="10" style="font-size: 20px;">
      <tr valign="top">
        <td class="tdrline"><p class="title" style="text-align: center;">平均瀏覽路徑紀錄</p>
          <table width="100%"  border="1px" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0" >
            <tr >
              <th width="10%" bgcolor="#81D4FA" style="text-align:center;"><p>月份</p></th>
              <th width="10%" bgcolor="#81D4FA" style="text-align:center;"><p>FB</p></th>
              <th width="10%" bgcolor="#81D4FA" style="text-align:center;"><p>MOMO</p></th>
              <th width="10%" bgcolor="#81D4FA" style="text-align:center;"><p>搜尋引擎</p></th>
              <th width="10%" bgcolor="#81D4FA" style="text-align:center;"><p>部落格</p></th>
            </tr>
      <?php while($row_RecFlower=mysql_fetch_assoc($RecFlower)){ ?>
            <tr>
              <td width="10%" align="center" bgcolor="#FFFFFF">
                <p><?php echo $row_RecFlower["p_month"];?></a></p>
              </td>
              <td width="10%" align="center" bgcolor="#FFFFFF"><p>
                <?php echo $row_RecFlower["p_fb"]; ?>
                </p></td>
                <td width="10%" align="center" bgcolor="#FFFFFF"><p>
                <?php echo $row_RecFlower["p_momo"]; ?>
                </p></td>
                <td width="10%" align="center" bgcolor="#FFFFFF"><p>
                <?php echo $row_RecFlower["p_find"]; ?>
                </p></td>
                <td width="10%" align="center" bgcolor="#FFFFFF"><p>
                <?php echo $row_RecFlower["p_blog"]; ?>
                </p></td>
            </tr>
      <?php }?>
          </table>
    <div style="display: table-cell;vertical-align: middle;"></div>
</div>
</div><!--div放白色透明度60%結束-->
<div class=" col-xs-2 col-md-2"></div>
<div class="col-xs-12 col-md-12" style="text-align: center;">© 2018 顧客關係管理之寵物飼料管理 ©</div>
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
<script>
var chart = Highcharts.chart('container',{
    chart: {
        type: 'column'
    },
    title: {
        text: '平均瀏覽路徑紀錄',
        style:{
                fontSize:'24px'
              }
    },
    subtitle: {
    },
    xAxis: {
        categories: [
            '一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'
        ],
        crosshair: true,
        labels:{
              style:{
                fontSize:'18px'
              }
            }
    },
    yAxis: {
        min: 60,
        title: {
            text: '平均次數',
            style:{
                fontSize:'18px'
              }
        },
        labels:{
              style:{
                fontSize:'18px'
              }
            }
    },
    tooltip: {
        // head + 每个 point + footer 拼接成完整的 table
        headerFormat: '<span style="font-size:14px">{point.key}</span><table><br>',
        pointFormat: '{series.name}:' +'{point.y:.1f} 次<br>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            borderWidth: 0
        }
    },
    series: [{
        name: 'FB',
        data: [89.9, 91.5, 106.4, 129.2, 134.0, 156.0, 135.6, 148.5, 166.4, 154.1, 95.6, 105.4]
    }, {
        name: 'MOMO',
        data: [93.6, 88.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
    }, {
        name: '搜尋引擎',
        data: [88.9, 88.8, 99.3, 101.4, 117.0, 98.3, 99.0, 89.6, 112.4, 95.2, 109.3, 91.2]
    }, {
        name: '部落格',
        data: [92.4, 93.2, 84.5, 99.7, 92.6, 105.5, 87.4, 90.4, 97.6, 99.1, 106.8, 89.1]
    }]
});
</script>
</html>
