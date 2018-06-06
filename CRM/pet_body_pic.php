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
<h1 style="text-align:center;">客群寵物體型分析</h1>
<hr>
<div class=" col-xs-3 col-md-3" style="background: rgba(100%,100%,100%,0.6); margin: 0 auto;">
  <a href="pet_medicine.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">寵物營養保健品分析</a><br>
  <a href="pet_body_pic.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">客群寵物體型分析(圖)</a><br>
  <a href="pet_body.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">客群寵物體型分析(表)</a><br>
  <!--<a href="pet_personal_pic.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">客製化類別分析(圖)</a><br>
  <a href="pet_personal.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">客製化類別分析(表)</a><br>
  <a href="pet_pet.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">寵物及客製化分析</a><br>-->
</div>
<div class="container col-xs-8 col-md-8">
  <!--內文-->
  <div style="background: rgba(100%,100%,100%,0.6); margin: 0 auto;"><!--div放白色背景透明度60%開始-->
    <div style="margin-left:0px auto;margin-right:0px auto;">
      <div id="container"></div><!--折線圖--><br>
      <div id="container1"></div><!--折線圖--><br>
      <div id="container2"></div><!--折線圖--><br>
      <div id="container3"></div><!--折線圖--><br>
      <div id="container4"></div><!--折線圖--><br>
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
        text: '20以下'
    },
    tooltip: {
        headerFormat: '<span style="font-size:18px;">{series.name}</span><br>',
        pointFormat: '<span style="font-size:18px;">{point.name}:</span> <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true // 设置饼图是否在图例中显示
        }
    },
    series: [{
        type: 'pie',
        name: '20以下',
        data: [
            ['超小型成犬', 7.84],
            ['小型成犬', 3.92],
            {
                name: '雪納瑞',
                y: 11.76,
                sliced: true,
                selected: true
            },
            ['大型成犬', 3.9],
            ['巨型犬',  0],
            ['約克夏', 3.92],
            ['西高地白梗', 3.92],
            ['西施',  9.8],
            ['巴哥', 5.88],
            ['貴賓', 1.96],
            ['中型成犬', 1.96],
            ['馬爾濟斯', 9.8],
            ['拉不拉多', 1.96],
            ['黃金獵犬', 3.92],
            ['法國鬥牛犬', 1.96],
            ['臘腸', 5.88],
            ['吉娃娃', 7.84],
            ['英國鬥牛犬', 3.92],
            ['比熊犬', 3.92],
            ['米格魯', 5.88]
        ]
    }]
});
var chart = Highcharts.chart('container1', {
    title: {
        text: '21-30'
    },
    tooltip: {
        headerFormat: '<span style="font-size:18px;">{series.name}</span><br>',
        pointFormat: '<span style="font-size:18px;">{point.name}:</span> <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true // 设置饼图是否在图例中显示
        }
    },
    series: [{
        type: 'pie',
        name: '21-30',
        data: [
            ['超小型成犬', 4.65],
            ['小型成犬', 5.12],
            ['中型成犬', 2.79],
            {
                name: '大型成犬',
                y: 6.98,
                sliced: true,
                selected: true
            },
            ['巨型犬',  6.51],
            ['約克夏', 1.86],
            ['西高地白梗', 5.58],
            ['西施',  3.72],
            ['巴哥', 6.51],
            ['貴賓', 1.86],
            ['雪納瑞', 6.51],
            ['馬爾濟斯', 7.91],
            ['拉不拉多', 5.58],
            ['黃金獵犬', 5.12],
            ['法國鬥牛犬', 5.58],
            ['臘腸', 3.72],
            ['吉娃娃', 6.05],
            ['英國鬥牛犬', 4.19],
            ['比熊犬', 2.79],
            {
                name: '米格魯',
                y: 6.98,
                sliced: true,
                selected: true
            }
        ]
    }]
});
var chart = Highcharts.chart('container2', {
    title: {
        text: '31-40'
    },
    tooltip: {
        headerFormat: '<span style="font-size:18px;">{series.name}</span><br>',
        pointFormat: '<span style="font-size:18px;">{point.name}:</span> <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true // 设置饼图是否在图例中显示
        }
    },
    series: [{
        type: 'pie',
        name: '31-40',
        data: [
            ['超小型成犬', 3.79],
            ['小型成犬', 5.21],
            ['中型成犬', 3.32],
            ['大型成犬', 8.06],
            ['巨型犬', 6.16],
            ['約克夏', 6.16],
            ['西高地白梗', 5.21],
            ['西施',  3.79],
            ['巴哥', 5.69],
            ['貴賓',  7.58],
            ['雪納瑞', 3.32],
            ['馬爾濟斯', 4.74],
            ['拉不拉多', 3.79],
            {
                name: '黃金獵犬',
                y: 9.48,
                sliced: true,
                selected: true
            },
            ['法國鬥牛犬', 2.37],
            ['臘腸', 4.27],
            ['吉娃娃',  5.21],
            ['英國鬥牛犬',  3.79],
            ['比熊犬', 3.32],
            ['米格魯',  4.74]
        ]
    }]
});
var chart = Highcharts.chart('container3', {
    title: {
        text: '41-50'
    },
    tooltip: {
        headerFormat: '<span style="font-size:18px;">{series.name}</span><br>',
        pointFormat: '<span style="font-size:18px;">{point.name}:</span> <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true // 设置饼图是否在图例中显示
        }
    },
    series: [{
        type: 'pie',
        name: '41-50',
        data: [
            ['超小型成犬', 5.21],
            {
                name: '小型成犬',
                y: 8.06,
                sliced: true,
                selected: true
            },
            ['中型成犬', 1.9],
            ['大型成犬', 5.21],
            ['巨型犬', 5.21],
            ['約克夏', 4.74],
            ['西高地白梗', 5.69],
            ['西施',  6.64],
            ['巴哥', 5.21],
            ['貴賓',  5.21],
            ['雪納瑞', 3.79],
            ['馬爾濟斯', 5.69],
            ['拉不拉多', 5.21],
            ['黃金獵犬', 5.21],
            ['法國鬥牛犬', 2.84],
            ['臘腸', 7.11],
            ['吉娃娃', 2.84],
            ['英國鬥牛犬', 5.21 ],
            ['比熊犬', 3.79],
            ['米格魯',  5.21]
        ]
    }]
});
var chart = Highcharts.chart('container4', {
    title: {
        text: '51以上'
    },
    tooltip: {
        headerFormat: '<span style="font-size:18px;">{series.name}</span><br>',
        pointFormat: '<span style="font-size:18px;">{point.name}:</span> <b>{point.percentage:.1f}%</b>'
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: false
            },
            showInLegend: true // 设置饼图是否在图例中显示
        }
    },
    series: [{
        type: 'pie',
        name: '51以上',
        data: [
            ['超小型成犬', 7.05],
            ['小型成犬', 4.49],
            ['中型成犬', 2.88],
            ['大型成犬', 6.41],
            ['巨型犬', 4.81],
            ['約克夏', 5.77],
            ['西高地白梗', 5.13],
            {
                name: '西施',
                y: 8.01,
                sliced: true,
                selected: true
            },
            ['巴哥', 4.49],
            ['貴賓',  4.49],
            ['雪納瑞', 5.45],
            ['馬爾濟斯', 4.49],
            ['拉不拉多', 2.88],
            ['黃金獵犬', 3.85],
            ['法國鬥牛犬', 6.09],
            ['臘腸', 3.53],
            ['吉娃娃', 5.77],
            ['英國鬥牛犬',  4.17],
            ['比熊犬', 4.49],
            ['米格魯',  5.77]
        ]
    }]
});
</script>
</html>
