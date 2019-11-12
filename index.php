<!DOCTYPE html>
<html> 
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />  
<head>
	<style type="text/css">
    body {

    }

		 table {
        padding-right: 20px;
        -webkit-box-shadow: 0 10px 20px #b0b3b6;
        text-align:center;  
         border-radius: 10px;
    }

    .color{color:#2a6496}
    .footer {
            text-align:center;
            position: relative;
            font-size:80%;
            margin-top: 30px;
            line-height:60%;
        }
    .li_width{width:25%;}
    .hr_height{height:1px;position:relative;top:-10px;}
    .allinfo {
      margin: 25px auto;
      background-color: #81BB55;
      width: 95%;
    }
    .lostinfo {
      background-color: rgba(229, 86, 107, 0.9) ;
      float: top;
      text-align: left;
    }
    .foundinfo {
      background-color: rgba(139,192,74,0.9) ;
      float: top;
      text-align: left;
    }
    .fenye {
      padding: 822px;
    }
    .serch {
      text-align: center;
       padding-right: 20px;
        text-align:center;
         border-radius: 5px;
    }
  </style>
	<title></title>
  <link rel="stylesheet" type="text/css" href="css/index3.css" media="screen and (min-width: 400px)">
  <link rel="stylesheet" type="text/css" href="css/index4.css" media="screen and (min-width: 250px) and (max-width:400px)">
	<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <div class="container-fliud">
       <ul class="nav nav-tabs" role="tablist">
            <!-- 返回首页 -->
            <li class="li_width" style="text-align: center;">
              <a style="padding: -10%; " href="index.html">
              <img src="images/newSIClogo.png" />
            </a>
            </li>
            <!--全部信息-->
           <li class="li_width" role="presentation" style="text-align: center; &#39;微软雅黑&#39;"><a href="index.php"><font color="black"><strong>全部</strong></font></a></li>
            
            <!-- 校区选择 -->
            <li class="li_width" role="presentation" style="text-align: center; &#39;微软雅黑&#39;"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"><font color="black"><strong>校区</strong></font><span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li role="presentation"><a role="menuitem" href="index.php?position=西丽湖">西丽湖校区</a></li>
                    <li role="presentation"><a role="menuitem" href="index.php?position=留仙洞">留仙洞校区</a></li>
                    <li role="presentation"><a role="menuitem" href="index.php?position=官龙山">官龙山校区</a></li>
                    <li role="presentation"><a role="menuitem" href="index.php?position=其他">其他（或校外）</a></li>
                </ul>
            </li>
            <li class="li_width" role="presentation" style="text-align: center; &#39;微软雅黑&#39;"><a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false"><font color="black"><strong>信息</strong></font><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                    <li role="presentation"><a role="menuitem" href="index.php?position=招领">招领信息</a></li>
                    <li role="presentation"><a role="menuitem" href="index.php?position=遗失">遗失信息</a></li>
                </ul>              
            </li>
    </ul></div>

 <!-- <div class="container">

      <li role="presentation" class="active">
        <a href="http://1.quanyibuscut.sinaapp.com/lost_found/lost&amp;found/output.php?position=&amp;sql=lost"><span class="glyphicon glyphicon-search" aria-hidden="true"></span>&nbsp;遗失信息</a>      </li>
      <li role="presentation">
        <a href="http://1.quanyibuscut.sinaapp.com/lost_found/lost&amp;found/output.php?position=&amp;sql=found"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span>&nbsp;招领信息</a>      </li>
      <li role="presentation">
        <a href="http://1.quanyibuscut.sinaapp.com/lost_found/lost&amp;found/input.php"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>&nbsp;发布信息</a>
      </li>
    </ul>
 </div> -->


 

       <form style=" height: 25px; " class="serch" action="index.php" method="post">  
        <input class="serch" type="text" name="serch" placeholder="请输入搜索名称"/>    
        <button style="height: 25px; background-color: #87CEEB;" type="Submit" name="sousuo" class="btn btn-default"> 搜索</button>    
       </form>
       



  <?php
   // 第一步，连接数据库  
    $con = mysqli_connect("localhost","root","1234") or die('数据库连接失败，错误信息：'.mysqli_error());  
    // 第二步，选择指定的数据库，设置字符集  
    mysqli_select_db($con,"try");  
    mysqli_query($con,"set names 'utf8'");
    //搜索功能
    if(isset($_POST['sousuo'])||isset($_GET['position'])) {
        if (isset($_GET['position'])) {
        $serch=$_GET['position'];
      }
      else {
      $serch = $_POST['serch'];
      }
      $num_rec_per_page=4;   // 每页显示数量
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; //页数不存在时为1
    $start_from = ($page-1) * $num_rec_per_page; //从0开始所以-1 
    $sql = "SELECT * FROM `laf` WHERE CONCAT(`title`,`place`,`ttype`,`infopro`,`name`,`pnumber`,`wnumber`,`infotype`,`campus`) LIKE '%$serch%'   ORDER BY nowdate DESC LIMIT $start_from, $num_rec_per_page"; 
    $rs_result = mysqli_query($con, $sql); // 查询数据
    $i=1;
    while($row = mysqli_fetch_assoc($rs_result)){  
      if ($row["infotype"]=="遗失") {
        $sb="丢失";
        $color="'lostinfo'";
      }
      else {
        $sb="拾取";
        $color="'foundinfo'";
      }
    echo"<table class='allinfo'width='100%'height='150px'border='0'><tbody><tr><td><table class=".$color."width='100%'height='100%'border='0'><tbody><tr><td><ul><li style='list-style-type:none;'><h3>".$row["title"]."</h3></li><li style='list-style-type:none;'><span class='glyphicon glyphicon-star'></span>&nbsp;信息类型：".$row["infotype"]."</li><li style='list-style-type:none;'><span class='glyphicon glyphicon-time'></span>&nbsp;".$sb."时间：".$row["time"]."</li><li style='list-style-type:none;'><span class='glyphicon glyphicon-road'></span>&nbsp;".$sb."地点：".$row["place"]."</li><li style='list-style-type:none;'><span class='glyphicon glyphicon-tag'></span>&nbsp;".$sb."物品：".$row["ttype"]."</li><li style='list-style-type:none; color: #696969 ;'type='text'data-toggle='collapse'data-target='#demo".$i."'>点击查看更多信息...<span class='glyphicon glyphicon-chevron-down'></span></li><div id='demo".$i."'class='collapse'><li style='list-style-type:none;'><span class='glyphicon glyphicon-list-alt'></span>&nbsp;详情：".$row["infopro"]."</li><li style='list-style-type:none;'><span class='glyphicon glyphicon-user'></span>&nbsp;联系人：".$row["name"]."</li><li style='list-style-type:none;'><span class='glyphicon glyphicon-phone'></span>&nbsp;手机号：".$row["pnumber"]."</li><li style='list-style-type:none;'><span class='glyphicon glyphicon-envelope'></span>&nbsp;微信号：".$row["wnumber"]."</li><li style='list-style-type:none;'><span class='glyphicon glyphicon-time'></span>&nbsp;发布时间：".$row["nowdate"]."</li></div></td></tr></tbody></table></td></tr></tbody></table>";  
      $i++;
    }
    $sql = "SELECT * FROM `laf` WHERE CONCAT(`title`,`place`,`ttype`,`infopro`,`name`,`pnumber`,`wnumber`,`infotype`,`campus`) LIKE '%$serch%' "; //要改的地方
    $rs_result = mysqli_query($con, $sql); //查询数据
    $total_records = mysqli_num_rows($rs_result);  // 统计总共的记录条数
    $total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数

    echo "<div align='center'><nav><ul class='pagination'><li><a href='index.php?position=西丽湖&page=1'>首页</a></li> "; // 第一页

    for ($i=1; $i<=$total_pages; $i++) { 
                echo "<li><a href='index.php?position=西丽湖&page=".$i."'>".$i."</a><li> "; 
    }; 
    echo "<li><a href='index.php?position=西丽湖&page=$total_pages'>末页</a></li></ul></nav></div> "; // 最后一页
    }
    //未搜索
    else {
    //分页开始
    $num_rec_per_page=4;   // 每页显示数量
    if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; }; //页数不存在时为1
    $start_from = ($page-1) * $num_rec_per_page; //从0开始所以-1
    $sql = "SELECT * FROM laf ORDER BY nowdate DESC LIMIT $start_from, $num_rec_per_page"; 
    $rs_result = mysqli_query($con, $sql); // 查询数据
    $i=1;
    while($row = mysqli_fetch_assoc($rs_result)){  
      if ($row["infotype"]=="遗失") {
        $sb="丢失";
        $color="'lostinfo'";
      }
      else {
        $sb="拾取";
        $color="'foundinfo'";
      }
    echo"<table class='allinfo'width='100%'height='150px'border='0'><tbody><tr><td><table class=".$color."width='100%'height='100%'border='0'><tbody><tr><td><ul><li style='list-style-type:none;'><h3>".$row["title"]."</h3></li><li style='list-style-type:none;'><span class='glyphicon glyphicon-star'></span>&nbsp;信息类型：".$row["infotype"]."</li><li style='list-style-type:none;'><span class='glyphicon glyphicon-time'></span>&nbsp;".$sb."时间：".$row["time"]."</li><li style='list-style-type:none;'><span class='glyphicon glyphicon-road'></span>&nbsp;".$sb."地点：".$row["place"]."</li><li style='list-style-type:none;'><span class='glyphicon glyphicon-tag'></span>&nbsp;".$sb."物品：".$row["ttype"]."</li><li style='list-style-type:none; color: #696969 ;'type='text'data-toggle='collapse'data-target='#demo".$i."'>点击查看更多信息...<span class='glyphicon glyphicon-chevron-down'></span></li><div id='demo".$i."'class='collapse'><li style='list-style-type:none;'><span class='glyphicon glyphicon-list-alt'></span>&nbsp;详情：".$row["infopro"]."</li><li style='list-style-type:none;'><span class='glyphicon glyphicon-user'></span>&nbsp;联系人：".$row["name"]."</li><li style='list-style-type:none;'><span class='glyphicon glyphicon-phone'></span>&nbsp;手机号：".$row["pnumber"]."</li><li style='list-style-type:none;'><span class='glyphicon glyphicon-envelope'></span>&nbsp;微信号：".$row["wnumber"]."</li><li style='list-style-type:none;'><span class='glyphicon glyphicon-time'></span>&nbsp;发布时间：".$row["nowdate"]."</li></div></td></tr></tbody></table></td></tr></tbody></table>";  
      $i++;
    }
    $sql = "SELECT * FROM laf"; 
    $rs_result = mysqli_query($con, $sql); //查询数据
    $total_records = mysqli_num_rows($rs_result);  // 统计总共的记录条数
    $total_pages = ceil($total_records / $num_rec_per_page);  // 计算总页数

    echo "<div align='center'><nav><ul class='pagination'><li><a href='index.php?page=1'>首页</a></li> "; // 第一页

    for ($i=1; $i<=$total_pages; $i++) { 
                echo "<li><a href='index.php?page=".$i."'>".$i."</a><li> "; 
    }; 
    echo "<li><a href='index.php?page=$total_pages'>末页</a></li></ul></nav></div> "; // 最后一页
  }  

?>
</html>