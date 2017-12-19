<?php
	include('../config.php');
	$tt=$_POST['ttsale'];
	$gt=$_POST['giatri'];	
	$id=$_GET['id'];
	if(isset($_POST['them'])){ // khi submit nút thêm sẽ chạy code này -> 		
		$ma=$_POST['Masp'];
			
		$sql="insert into sales(Masp,Tinhtrangsale,Giatrisale) values('$ma','$tt','$gt')";
		$objPdo->query($sql);
		header('location:../../index.php?quanly=quanlysale&ac=them');//trở lại vị trí như đường dẫn
	}else if(isset($_POST['sua'])){
		$sql="update sales set Tinhtrangsale='$tt',Giatrisale='$gt' where Masp='$id'";
		$objPdo->query($sql);
		header('location:../../index.php?quanly=quanlysale&ac=sua&id='.$id);
	}else{	// khi click thẻ xóa
	 
		$sql="delete from sales where Masp='$id'";
		$objPdo->query($sql);
		header('location:../../index.php?quanly=quanlysale&ac=them');//trở lại vị trí như đường dẫn
	}
?>