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
$pageRow_records = 10;
//預設頁數
$num_pages = 1;
//若已經有翻頁，將頁數更新
if (isset($_GET['page'])) {
  $num_pages = $_GET['page'];
}
//本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
$startRow_records = ($num_pages -1) * $pageRow_records;
//未加限制顯示筆數的SQL敘述句
$query_RecFlower = "SELECT * FROM `pet_medicine` ORDER BY p_id ";
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



$data = "SELECT * FROM `pet_medicine` ORDER BY `p_id` "; //查詢FROM 資料表 where 判斷式
$resultub = mysql_query($data);
while ($row = mysql_fetch_array($resultub)){
  $pet[]=intval($row["pet"]);
  $eye[]=intval($row["eye"]);
  $heart[]=intval($row["heart"]);
  $body[]=intval($row["body"]);
  $bone[]=intval($row["bone"]);
  $skin[]=intval($row["skin"]);
}
$data = array(array("name"=>"優寶睛","data"=>$eye));
$data = json_encode($data);
$data1 = array(array("name"=>"優寶心","data"=>$heart));
$data1 = json_encode($data1);
$data2 = array(array("name"=>"優寶生","data"=>$body));
$data2 = json_encode($data2);
$data3 = array(array("name"=>"優寶骨","data"=>$bone));
$data3 = json_encode($data3);
$data4 = array(array("name"=>"優寶膚","data"=>$skin));
$data4 = json_encode($data4);
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
<h1 style="text-align:center;">寵物營養保健品分析</h1>
<hr>
<div class=" col-xs-3 col-md-3" style="background: rgba(100%,100%,100%,0.6); margin: 0 auto;">
  <a href="pet_medicine.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">寵物營養保健品分析</a><br>
  <a href="pet_body.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">客群寵物體型分析</a><br>
  <a href="pet_personal_pic.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">客製化類別分析(圖)</a><br>
  <a href="pet_personal.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">客製化類別分析(表)</a><br>
  <a href="pet_pet.php" style="text-align:center;font-size: 30px;font-family: 微軟正黑體;font-weight: bold;color: red"><img src="newimg/20.png" alt="LOGO" width="80" height="50">寵物及客製化分析</a><br>
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
     <br>
      <table width="90%" border="0px" align="center" cellpadding="4" cellspacing="0">
    <tr>
    <td class="tdbline">
    <table width="100%" border="0px" cellspacing="0" cellpadding="10" style="font-size: 20px;">
      <tr valign="top">
        <td class="tdrline"><p class="title" style="text-align: center;font-size: 24px;">寵物營養保健品分析</p>
          <table width="100%"  border="1px" cellpadding="0" cellspacing="0" bgcolor="#F0F0F0" >
            <tr >
              <th width="10%" bgcolor="#81D4FA" style="text-align:center;font-size: 20px;"><p>犬種</p></th>
              <th width="10%" bgcolor="#81D4FA" style="text-align:center;font-size: 20px;"><p>優寶睛</p></th>
              <th width="10%" bgcolor="#81D4FA" style="text-align:center;font-size: 20px;"><p>優寶心</p></th>
              <th width="10%" bgcolor="#81D4FA" style="text-align:center;font-size: 20px;"><p>優寶生</p></th>
              <th width="10%" bgcolor="#81D4FA" style="text-align:center;font-size: 20px;"><p>優寶骨</p></th>
              <th width="10%" bgcolor="#81D4FA" style="text-align:center;font-size: 20px;"><p>優寶膚</p></th>
            </tr>
      <?php while($row_RecFlower=mysql_fetch_assoc($RecFlower)){ ?>
            <tr>
              <td width="10%" align="center" bgcolor="#FFFFFF" style="font-size: 20px;">
                <p><?php echo $row_RecFlower["pet"];?></a></p>
              </td>
              <td width="10%" align="center" bgcolor="#FFFFFF" style="font-size: 20px;"><p>
                <?php echo $row_RecFlower["eye"]; ?>
                </p></td>
                <td width="10%" align="center" bgcolor="#FFFFFF" style="font-size: 20px;"><p>
                <?php echo $row_RecFlower["heart"]; ?>
                </p></td>
                <td width="10%" align="center" bgcolor="#FFFFFF" style="font-size: 20px;"><p>
                <?php echo $row_RecFlower["body"]; ?>
                </p></td>
                <td width="10%" align="center" bgcolor="#FFFFFF" style="font-size: 20px;"><p>
                <?php echo $row_RecFlower["bone"]; ?>
                </p></td>
                <td width="10%" align="center" bgcolor="#FFFFFF" style="font-size: 20px;"><p>
                <?php echo $row_RecFlower["skin"]; ?>
                </p></td>
            </tr>
      <?php }?>
      <hr size="1" />
          <table width="98%" border="0px" align="center" cellpadding="4" cellspacing="0">
            <tr>
              <td valign="middle"><p>資料筆數：<?php echo $total_records;?></p></td>
              <td align="right"><p>
                  <?php if ($num_pages > 1) { // 若不是第一頁則顯示 ?>
                  <a href="?page=1">第一頁</a> | <a href="?page=<?php echo $num_pages-1;?>">上一頁</a> |
                <?php }?>
                  <?php if ($num_pages < $total_pages) { // 若不是最後一頁則顯示 ?>
                  <a href="?page=<?php echo $num_pages+1;?>">下一頁</a> | <a href="?page=<?php echo $total_pages;?>">最末頁</a>
                  <?php }?>
              </p></td>
            </tr>
          </table>
          </table>
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
        text: '優寶睛',
        style:{
            fontSize:'24px'
        }
    },
    subtitle: {
    },
    xAxis: {
        categories: ["超小型成犬", "小型成犬", "中型成犬", "大型成犬", "巨成犬", "約克夏", "西高地白梗", "西施", "巴哥", "貴賓", "雪納瑞", "馬爾濟斯", "拉不拉多", "黃金獵犬", "法國鬥牛犬", "臘腸", "吉娃娃", "英國鬥牛犬", "比熊犬", "米格魯"],
        crosshair: true,
        labels:{
            style:{
                fontSize:'18px'
            }
        }
    },
    yAxis: {
        min: 40,
        title: {
            text: '隻數',
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
        pointFormat: '{series.name}:' +'{point.y:.1f} 隻<br>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            borderWidth: 0
        }
    },
    series: <?php echo $data; ?>,
});
var chart = Highcharts.chart('container1',{
    chart: {
        type: 'column'
    },
    title: {
        text: '優寶心',
        style:{
            fontSize:'24px'
        }
    },
    subtitle: {
    },
    xAxis: {
        categories: ["超小型成犬", "小型成犬", "中型成犬", "大型成犬", "巨成犬", "約克夏", "西高地白梗", "西施", "巴哥", "貴賓", "雪納瑞", "馬爾濟斯", "拉不拉多", "黃金獵犬", "法國鬥牛犬", "臘腸", "吉娃娃", "英國鬥牛犬", "比熊犬", "米格魯"],
        crosshair: true,
        labels:{
            style:{
                fontSize:'18px'
            }
        }
    },
    yAxis: {
        min: 40,
        title: {
            text: '隻數',
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
        pointFormat: '{series.name}:' +'{point.y:.1f} 隻<br>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            borderWidth: 0
        }
    },
    series: <?php echo $data1; ?>,
});
var chart = Highcharts.chart('container2',{
    chart: {
        type: 'column'
    },
    title: {
        text: '優寶生',
        style:{
            fontSize:'24px'
        }
    },
    subtitle: {
    },
    xAxis: {
        categories: ["超小型成犬", "小型成犬", "中型成犬", "大型成犬", "巨成犬", "約克夏", "西高地白梗", "西施", "巴哥", "貴賓", "雪納瑞", "馬爾濟斯", "拉不拉多", "黃金獵犬", "法國鬥牛犬", "臘腸", "吉娃娃", "英國鬥牛犬", "比熊犬", "米格魯"],
        crosshair: true,
        labels:{
            style:{
                fontSize:'18px'
            }
        }
    },
    yAxis: {
        min: 40,
        title: {
            text: '隻數',
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
        pointFormat: '{series.name}:' +'{point.y:.1f} 隻<br>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            borderWidth: 0
        }
    },
    series: <?php echo $data2; ?>,
});
var chart = Highcharts.chart('container3',{
    chart: {
        type: 'column'
    },
    title: {
        text: '優寶骨',
        style:{
            fontSize:'24px'
        }
    },
    subtitle: {
    },
    xAxis: {
        categories: ["超小型成犬", "小型成犬", "中型成犬", "大型成犬", "巨成犬", "約克夏", "西高地白梗", "西施", "巴哥", "貴賓", "雪納瑞", "馬爾濟斯", "拉不拉多", "黃金獵犬", "法國鬥牛犬", "臘腸", "吉娃娃", "英國鬥牛犬", "比熊犬", "米格魯"],
        crosshair: true,
        labels:{
            style:{
                fontSize:'18px'
            }
        }
    },
    yAxis: {
        min: 40,
        title: {
            text: '隻數',
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
        pointFormat: '{series.name}:' +'{point.y:.1f} 隻<br>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            borderWidth: 0
        }
    },
    series: <?php echo $data3; ?>,
});
var chart = Highcharts.chart('container4',{
    chart: {
        type: 'column'
    },
    title: {
        text: '優寶膚',
        style:{
            fontSize:'24px'
        }
    },
    subtitle: {
    },
    xAxis: {
        categories: ["超小型成犬", "小型成犬", "中型成犬", "大型成犬", "巨成犬", "約克夏", "西高地白梗", "西施", "巴哥", "貴賓", "雪納瑞", "馬爾濟斯", "拉不拉多", "黃金獵犬", "法國鬥牛犬", "臘腸", "吉娃娃", "英國鬥牛犬", "比熊犬", "米格魯"],
        crosshair: true,
        labels:{
            style:{
                fontSize:'18px'
            }
        }
    },
    yAxis: {
        min: 40,
        title: {
            text: '隻數',
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
        pointFormat: '{series.name}:' +'{point.y:.1f} 隻<br>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            borderWidth: 0
        }
    },
    series: <?php echo $data4; ?>,
});
</script>
</html>
