
<?php
	if(isset($_POST['timkiem']))
	{
		$tk=$_POST['timkiem'];
		if($tk==''){
			echo '<script>alert("Bạn chưa nhập tên mã sản phẩm hoặc tên sản phẩm để tìm kiếm")</script>';
		}else{
               include('xulytimkiem.php');
		}
	}
?>
