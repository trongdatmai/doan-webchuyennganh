<?php
	//code xử lý database ở content
	include('../config.php'); // load dữ liệu
	 
	$id=$_GET['id'];
	$maloaisp=$_POST['maloaisp']; // lấy thông tin từ form thêm và sửa , method=post
	$tenloaisp=$_POST['tenloaisp'];
	 // lấy thông tin từ form thêm và sửa , method=post
	if(isset($_POST['them'])){ // khi submit nút thêm sẽ chạy code này -> 	
		$sql="insert into loaisanpham(Maloaisp,Tenloaisp) values('$maloaisp','$tenloaisp')";
		$objPdo->query($sql);
		header('location:../../index.php?quanly=quanlyloaisanpham&ac=them');//trở lại vị trí như đường dẫn
	}
	else if(isset($_POST['sua'])){
		$sql="update loaisanpham set Tenloaisp='$tenloaisp' where Maloaisp='$id'";
		$objPdo->query($sql);
		header('location:../../index.php?quanly=quanlyloaisanpham&ac=sua&id='.$id);//trở lại vị trí như đường dẫn
	}
	else{	// khi click thẻ xóa 
		$sql="delete from loaisanpham where Maloaisp='$id' ";
		$objPdo->query($sql);
		header('location:../../index.php?quanly=quanlyloaisanpham&ac=them');//trở lại vị trí như đường dẫn
	}
?>
