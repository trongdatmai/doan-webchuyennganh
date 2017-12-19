<?php
	include("../config.php");
	
	
	
	if(isset($_POST['them'])){
		$ruotbanh=$_POST['ruotbanh'];
		$color=$_POST['color'];
		$lokhoan=$_POST['lokhoan'];
		$chatluongbanh=$_POST['chatluongbanh'];
		$lanephuhop=$_POST['lanephuhop'];
		$hieunang=$_POST['hieunang'];	
		$id=$_POST['masp'];
		$sql="insert into banh(Ruotbanh,Color,Lokhoan,Chatluongbanh,Lanephuhop,Hieunang,Masp) values('$ruotbanh','$color','$lokhoan','$chatluongbanh','$lanephuhop','$hieunang','$id')";
		$objPdo->query($sql);
		header('location:../../index.php?quanly=banh&ac=them');
	}else if(isset($_POST['sua'])){
		$ruotbanh=$_POST['ruotbanh'];
		$color=$_POST['color'];
		$lokhoan=$_POST['lokhoan'];
		$chatluongbanh=$_POST['chatluongbanh'];
		$lanephuhop=$_POST['lanephuhop'];
		$hieunang=$_POST['hieunang'];
		$id=$_GET['id'];
		$sql_sua="update banh set Ruotbanh='$ruotbanh',Color='$color',Lokhoan='$lokhoan',Chatluongbanh='$chatluongbanh',Lanephuhop='$lanephuhop',Hieunang='$hieunang' where Masp='$id' ";
		$objPdo->query($sql_sua);
		header('location:../../index.php?quanly=banh&ac=sua&id='.$id);
	}else{
		$id=$_GET['id'];
		
		$sql_xoa="delete from banh where Masp='$id'";
		$objPdo->query($sql_xoa);
		header('location:../../index.php?quanly=banh&ac=them');
	}
?>