<?php
	//code xử lý database ở content
	include('../config.php'); // load dữ liệu
	
	
	
	if(isset($_POST['them'])){ 
	 // nhận id từ trang lietke
	$masp=$_POST['masp']; // lấy thông tin từ form thêm và sửa , method=post
	$tensp=$_POST['tensp'];
	$giatien=$_POST['giatien'];
	$h=$_POST['hinhanh'];
	$hinhanh=$_FILES['hinhanh']['name'];
	$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
	move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);

	$hangsx=$_POST['hangsx'];
	$noidung=$_POST['noidung'];
	$baohanh=$_POST['baohanh'];
	$sl=$_POST['soluong'];
	$maloaisp=$_POST['maloaisp'];// khi submit nút thêm sẽ chạy code này -> 
		
		if($h["type"]!="image/jpg" && $h["type"]!="image/png"&& $h["type"]!="image/bmp"&& $h["type"]!="image/gif"&&$h["type"]!="image/jpeg"){
			echo '<script>alert("Không phải file hình, chọn lại hình ảnh !")</script>';
			header('location:../../index.php?quanly=quanlysanpham&ac=them');//trở lại vị trí như đường dẫn
		}else{
			$sql="insert into sanpham(Masp,Tensp,Giatien,image,Hangsx,Noidung,Baohanh,Soluong,Maloaisp) values('$masp','$tensp','$giatien','$hinhanh','$hangsx','$noidung','$baohanh','$sl','$maloaisp')";
			$objPdo->query($sql);
			header('location:../../index.php?quanly=quanlysanpham&ac=them');//trở lại vị trí như đường dẫn
		}
	}else if(isset($_POST['sua'])){
		 // nhận id từ trang lietke
	$id=$_GET['id']; // lấy thông tin từ form thêm và sửa , method=post
	$tensp=$_POST['tensp'];
	$giatien=$_POST['giatien'];
	$hinhanh=$_FILES['hinhanh']['name'];
	$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
	move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);

	$hangsx=$_POST['hangsx'];
	$noidung=$_POST['noidung'];
	$baohanh=$_POST['baohanh'];
	$sl=$_POST['soluong'];
	$maloaisp=$_POST['maloaisp'];
		if($hinhanh!=''){
		$sql="update sanpham set Tensp='$tensp',Giatien='$giatien',image='$hinhanh',Hangsx='$hangsx',Noidung='$noidung',Baohanh='$baohanh',Soluong='$sl',Maloaisp='$maloaisp' where Masp='$id'";}
		else{
			$sql="update sanpham set Tensp='$tensp',Giatien='$giatien',Hangsx='$hangsx',Noidung='$noidung',Baohanh='$baohanh',Soluong='$sl',Maloaisp='$maloaisp' where Masp='$id'";}
		$objPdo->query($sql);
		header('location:../../index.php?quanly=quanlysanpham&ac=sua&id='.$id);//trở lại vị trí như đường dẫn
		}else{	// khi click thẻ xóa 
		 $id=$_GET['id'];// lấy thông tin từ form thêm và sửa , method=post
		$sql="delete from sanpham where Masp='$id' ";
		$objPdo->query($sql);
		header('location:../../index.php?quanly=quanlysanpham&ac=them');//trở lại vị trí như đường dẫn
	}


	?>