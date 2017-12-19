<?php
	include('config.php');
	if(isset($_POST['dangxuat'])){
		unset($_SESSION['dangnhap']);
		header('localtion:login.php');
	} 
	
?>
<div class="header" style="text-align:center;font-size:30px;color:#F00;line-height:50px;">
<B>ĐỒ ÁN CHUYÊN NGÀNH: BÁN SẢN PHẢM ONLINE VÀ ĐẶT LANE BOWLING</B>
		<form action="" method="post" onsubmit="return confirm('bạn có chắc chắn đăng xuất không')">
         <input type="submit" name="dangxuat" value="ĐĂNG XUẤT TÀI KHOẢN"  style="width:200px;height:40px;float:right;background:#9F6;color:#F00;border-radius:15px;margin-right:20px;font-size:16px"/>
        </form>
        <?php if(isset($_SESSION['dangnhap'])){
				echo "Xin chào bạn : ".$_SESSION['dangnhap'];
				$id=$_SESSION['dangnhap'];
				$sql="select * from admin  where Username_AD='$id'";
				$objStm=$objPdo->query($sql);
				$data=$objStm->fetchAll(PDO::FETCH_ASSOC);
				foreach($data as $row){
					if($row['chucvu']==0){
						echo "<p>CHỨC VỤ QUẢN LÝ CỦA BẠN : THÀNH VIÊN HỆ THỐNG</p>";
					}else{
						echo "<p>CHỨC VỤ QUẢN LÝ CỦA BẠN : ADMIN HỆ THỐNG</p>";
					}
				}
		}
		?>
</div>
    	