<style>
	a{
		text-decoration:none}
</style>
<div>
	<div style="float:left">
<?php
	include('modules/config.php');
	// phân trang sản phẩm sale
	if(isset($_GET['trang'])){
		$get_trang=$_GET['trang'];
	}else{
		$get_trang='';
	}
	if($get_trang=='' || $get_trang==1)
	{
		$trang1=0;
	}else{
		$trang1=($get_trang*15)-15;
	}
	$sql="select * from sales limit $trang1,15"; // trang1 (vị trí sản phẩm hiện tại) , lấy 5 sản phẩm
	$objStm = $objPdo->query($sql);
	$data = $objStm->fetchAll(PDO::FETCH_ASSOC);
	
	//-------//đếm số dòng có trong sản phẩm -> tương ứng đếm số sản phẩm
	$sql_sql="SELECT count(*) FROM sales";
	$result = $objPdo->query($sql_sql);
	$row = $result->fetch(PDO::FETCH_NUM);
	$asale=ceil($row[0]/15);
	
	for($b=1;$b<=$asale;$b++){
		echo '<a href="index.php?quanly=quanlysale&ac=them&trang='.$b.'" style="text-decoration:none;">'.' '. $b .' '.'</a>';	
	}
	echo '<br>'.'TỔNG SẢN PHẨM LÀ: '.$row[0];
	
?>
<p style="color:#00F;size:20px;font-style:inherit;width:300px;"> TRANG HIỆN TẠI LÀ: <?php echo $get_trang?></p></div>
<div style="float:right;font-size:30px;color:#F00">QUẢN LÝ THÔNG TIN SALE</div></div>
<table width="100%" border="1">
  <tr>
    <td>MÃ SẢN PHẨM</td>
    <td>TÌNH TRẠNG SALE</td>
    <td>GIÁ TRỊ SALE</td>
    <td colspan="2">QUẢN LÝ</td>
  </tr>
  <?php foreach($data as $row){?>
  <tr>
    <td><?php echo $row['Masp'] ?></td>
    <td><?php echo $row['Tinhtrangsale'] ?></td>
    <td><?php echo $row['Giatrisale'] ?></td>
    <td><a href="index.php?quanly=quanlysale&ac=sua&id=<?php echo $row['Masp']?>"><div class="glyphicon glyphicon-pencil" style="font-size:40px"></div></a></td>
    <td><a href="modules/quanlysale/xuly.php?id=<?php echo $row['Masp']?>" onclick="return confirm('Bạn có chắc chắn xóa hay không')"><div class="glyphicon glyphicon-trash" style="font-size:40px"></div></a></td>
  </tr><?php }?>
</table>
