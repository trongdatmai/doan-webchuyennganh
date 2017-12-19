<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="sanpham/images.png" rel="icon" />
<link rel="stylesheet" href="style/css.css" type="text/css" />
<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
<script src="//code.jquery.com/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<title>Quản trị database</title>
</head>

<body>
<?php
include('modules/config.php');
session_start();
 if(!isset($_SESSION['dangnhap'])){
	header('location:login.php'); 
 }else{
		$id1=$_SESSION['dangnhap'];
		$sql1="select * from admin where Username_AD='$id1' limit 1";
		$objStm1=$objPdo->query($sql1);
		$count=$objStm1->fetchAll(PDO::FETCH_NUM);
		if($count[0]==''){
			header('location:login.php'); 
			}
 }

?>
<div class="wrapper">
    	<?php
			include('modules/config.php');
			include('modules/header.php'); 
			include('modules/menu.php'); 
			include('modules/content.php'); 
			include('modules/footer.php'); 
		?>
    	
    </div>
</body>
</html>