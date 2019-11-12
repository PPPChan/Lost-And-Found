<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/initialization.css">
	<link rel="stylesheet" type="text/css" href="css/succ.css">
	<title>Lost and Found</title>
</head>
<body>
	<!-- head -->
	<div id="head">
		<a href="index.html">
		<img src="images/newSIClogo.png" width= 20%>
		</a>
		<span>发布信息</span>
	</div>
	<!-- head END -->

	<!-- main -->
	<div id="main">
	<?php
	$servername = "localhost";
	$username = "root";
	$password = "1234";
	//创建连接
	$conn = new mysqli($servername,$username,$password);
	//检测连接
	// if($conn->connect_error) {
	// 	die("Connection failed:" .$conn->connect_error);
	// }
	// echo "Connected successfully";
	mysqli_query($conn,"set names 'utf8'");
	mysqli_select_db($conn,"try");
	if(isset($_POST['tijiao'])) {
		$sql = "INSERT INTO laf(title,time,place,ttype,pnumber,name,wnumber,infotype,infopro,nowdate,campus) values ('$_POST[title]','$_POST[time]','$_POST[place]','$_POST[ttype]','$_POST[pnumber]','$_POST[name]','$_POST[wnumber]','$_POST[infotype]','$_POST[infopro]',now(),'$_POST[campus]')";
		if($conn->query($sql) === TRUE) {
			echo"<p class='inf'>发布成功</p>";
		} else {
			//echo"Error:" . $sql ."<br>" . $conn-> error;
			echo"<p class='inf'>信息填写错误，请检查后提交！</p>";
			
		}
	}
	$conn -> close();
	?>

		<div id="back">
			<a href="index.html">
			<p>返回首页</p>
			</a>
		</div>

	</div>
	<!-- main END -->
</body>
</html>