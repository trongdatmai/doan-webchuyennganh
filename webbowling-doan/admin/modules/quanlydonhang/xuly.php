<?php
 	session_start();
	include('../config.php');
	$id=$_GET['id'];
	if(isset($_POST['sua'])){
		if(isset($_SESSION['dangnhap'])){
			$username_ad=$_SESSION['dangnhap'];
			$ttdh=$_POST['ttdh'];
			$ttgh=$_POST['ttgh'];
			$tttt=$_POST['tttt'];
			$arr=array();
 			if($username_ad==0){
				if($tttt==1){
				$sql_sua="update hoadon set Trangthaidonhang='$ttdh',Trangthaigiaohang='$ttgh',Trangthaithanhtoan='$tttt',Xacnhan='1',Username_AD='$username_ad' where MaHD='$id'";
				$objPdo->query($sql_sua);
				//duyet hd cthd va sp de lay masp và số lượng
				$sqlAll="select chitiethoadon.Masp,chitiethoadon.Soluong from sanpham inner join chitiethoadon inner join hoadon on sanpham.Masp=chitiethoadon.Masp and hoadon.MaHD=chitiethoadon.Mahd where hoadon.MaHD='$id' ";
				$objStmAll=$objPdo->query($sqlAll);
				$dataAll=$objStmAll->fetchAll(PDO::FETCH_ASSOC);
				foreach($dataAll as $rowAll)
				{	
					$masp=$rowAll['Masp'];
					$slhd=$rowAll['Soluong'];
					$arr+=array($masp=>$slhd);
				}
				//duyệt từng sản phẩm và số lượng đê thực hiện trừ sản phẩm
				foreach($arr as $k=>$v){
					$sqlsp="select * from sanpham where Masp='$k'";
					$objSmsp=$objPdo->query($sqlsp);
					$datasp=$objSmsp->fetchAll(PDO::FETCH_ASSOC);
					foreach($datasp as $rowsp){
						$slAll=$rowsp['Soluong'];
						$tam=$slAll-$v;
						$sqlsp2="update sanpham set Soluong='$tam' where Masp='$k'";
						$objPdo->query($sqlsp2);
					}
				}
				header('location:../../index.php?quanly=quanlydonhang&ac=sua');	
				}else{
					$sql_sua="update hoadon set Trangthaidonhang='$ttdh',Trangthaigiaohang='$ttgh',Trangthaithanhtoan='$tttt',Xacnhan='0',Username_AD='$username_ad' where MaHD='$id'";
				$objPdo->query($sql_sua);
				header('location:../../index.php?quanly=quanlydonhang&ac=sua');	
				}
			}else{
				$sql_sua="update hoadon set Trangthaidonhang='$ttdh',Trangthaigiaohang='$ttgh',Trangthaithanhtoan='$tttt',Xacnhan='1',Username_AD='$username_ad' where MaHD='$id'";
				$objPdo->query($sql_sua);
				header('location:../../index.php?quanly=quanlydonhang&ac=sua');	
				}
		}
	}else{ // hàm xóa hóa đơn
		if(isset($_SESSION['dangnhap'])){
			$dn=$_SESSION['dangnhap'];
			echo $dn;
			/*$sql_sql="SELECT count(*) FROM loaisize";
			$result_1 = $objPdo->query($sql_sql);
			$row_1 = $result_1->fetch(PDO::FETCH_NUM);
			$a=$row_1[0];
			echo $a;*/
			$sqldn="select * from admin where Username_AD='$dn' limit 1";
			$objStmdn=$objPdo->query($sqldn);
			$count=$objStmdn->fetchAll(PDO::FETCH_ASSOC);
			foreach($count as $row){
				if($row['chucvu']=='1'){
				$sql_xoa="delete from hoadon where MaHD='$id'";
				$objPdo->query($sql_xoa);
				header('location:../../index.php?quanly=quanlydonhang&ac=sua');
				}else{
					echo '<script>alert("Chúc vụ admin mới có thể xóa được!")</script>';}
					header('location:../../index.php?quanly=quanlydonhang&ac=sua');
				}
		}
	}
?>