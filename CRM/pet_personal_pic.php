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

$query_RecFlower = "SELECT * FROM `pet_medicine`";
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
$query_RecFlower = "SELECT * FROM `pet_medicine`";
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




for ($i=0; $i <12 ; $i++) {
  $pre[$i]=rand(100,150);}

$pre = json_encode($pre);

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
     <a class="navbar-brand" href="index.php" style="font-family: 微軟正黑體;font-size: 30px">顧客關係管理之寵物飼料管理</a>
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
        <!--<li><a href="user_path.php">使用者行為</a></li>-->
        <li><a href="member_path.php">客群分析</a></li>
        <li class="active"><a href="pet_medicine.php">寵物分析</a></li>
        <li><a href="orders.php">訂單分析</a></li>
        <li><a href="?logout=true">登出</a></li>
      </ul>
    </div>
  </div>
</nav>
<br><br><br>
<h1 style="text-align:center;">客製化類別分析(圖)</h1>
<hr>
 <div class=" col-xs-3 col-md-3" style="background: rgba(100%,100%,100%,0.6); margin: 0 auto;">
  <a href="pet_medicine.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">寵物營養保健品分析</a><br>
  <a href="pet_body.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">客群寵物體型分析</a><br>
  <a href="pet_personal_pic.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">客製化類別分析(圖)</a><br>
  <a href="pet_personal.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">客製化類別分析(表)</a><br>
  <a href="pet_pet.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">寵物及客製化分析</a><br>
  <a href="#" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">忠誠客戶關係分析</a><br>
</div>
<div class="container col-xs-8 col-md-8">
  <!--內文-->
  <div style="background: rgba(100%,100%,100%,0.6); margin: 0 auto;"><!--div放白色背景透明度60%開始-->
    <div style="margin-left:0px auto;margin-right:0px auto;">
      <div id="container"></div><!--折線圖--><br>
      <div id="container1"></div><!--折線圖--><br>
      <div id="container2"></div><!--折線圖--><br>
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
var chart = Highcharts.chart('container', {
    title: {
        text: '客製化肉品分析',
        style:{
            fontSize:'24px'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:18px;">{series.name}<br></span>',
        pointFormat: '<span style="font-size:18px;">{point.name}: <b style="font-size:18px;">{point.percentage:.1f}%</b></span>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,  // 可以被选择
            cursor: 'pointer',       // 鼠标样式
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
                    fontSize:'18px'
                }
            }
        }
    },
    series: [{
        type: 'pie',
        name: '客製化肉品',
        data: [
            ['雞肉',25.5],
            ['鹿肉',10.7],
            {
                name: '牛肉',
                y: 34.1,
                sliced: true,  // 默认突出
                selected: true // 默认选中
            },
            ['鴨肉',10.4],
            ['羊肉',20.2]
        ]
    }]
});
var chart = Highcharts.chart('container1', {
    title: {
        text: '客製化加強分析(單一種)',
        style:{
            fontSize:'24px'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:18px;">{series.name}<br></span>',
        pointFormat: '<span style="font-size:18px;">{point.name}: <b style="font-size:18px;">{point.percentage:.1f}%</b></span>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,  // 可以被选择
            cursor: 'pointer',       // 鼠标样式
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
                    fontSize:'18px'
                }
            }
        }
    },
    series: [{
        type: 'pie',
        name: '客製化加強(單一種)',
        data: [
            ['血糖管理', 19.9],
            ['肥胖代謝', 26.8],
            {
                name: '增重',
                y: 33.5,
                sliced: true,  // 默认突出
                selected: true // 默认选中 
            },
            ['腎臟護理', 19.8]
        ]
    }]
});
var chart = Highcharts.chart('container2', {
    title: {
        text: '客製化加強分析',
        style:{
            fontSize:'24px'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:18px;">{series.name}<br></span>',
        pointFormat: '<span style="font-size:18px;">{point.name}: <b style="font-size:18px;">{point.percentage:.1f}%</b></span>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,  // 可以被选择
            cursor: 'pointer',       // 鼠标样式
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                style: {
                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black',
                    fontSize:'16px'
                }
            }
        }
    },
    series: [{
        type: 'pie',
        name: '客製化加強肉品',
        data: [
            ['環境除臭', 11.1],
            ['心臟護理', 21.5],
            {
                name: '消化系統護理',
                y: 25.2,
                /*sliced: true,  // 默认突出
                selected: true // 默认选中 */
            },
            ['泌尿道', 9.1],
            ['關節管理',7.3],
            ['視力保健',8.2],
            ['皮膚護理', 5.7],
            ['亮毛護理', 11.9]
        ]
    }]
});
</script>
</html>
