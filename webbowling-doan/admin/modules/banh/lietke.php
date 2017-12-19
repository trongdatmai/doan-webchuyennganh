<style>
	a{
		text-decoration:none}
</style>
<div> <div style="float:left"
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
		$trang1=($get_trang*20)-20;
	}
	$sql="select * from banh limit $trang1,20"; // trang1 (vị trí sản phẩm hiện tại) , lấy 5 sản phẩm
	$objStm = $objPdo->query($sql);
	$data = $objStm->fetchAll(PDO::FETCH_ASSOC);
	
	//-------//đếm số dòng có trong sản phẩm -> tương ứng đếm số sản phẩm
	$sql_sql="SELECT count(*) FROM banh";
	$result_1 = $objPdo->query($sql_sql);
	$row_1 = $result_1->fetch(PDO::FETCH_NUM);
	$a=ceil($row_1[0]/20);
	for($b=1;$b<=$a;$b++){
		echo '<a href="index.php?quanly=banh&ac=them&trang='.$b.'" style="text-decoration:none;">'.' '. $b .' '.'</a>';
	}
	echo '<br>'.'TỔNG THÔNG TIN BANH: '.$row_1[0];
 ?>
 <p style="color:#00F;size:20px;font-style:inherit;width:300px;"> TRANG HIỆN TẠI LÀ: <?php echo $get_trang?></p></div>
 <div style="float:right;font-size:30px;color:#F00">QUẢN LÝ THÔNG TIN BANH</div></div>
<table width="100%" border="1" style="text-align:center">
  <tr>
    <td>MÃ BANH</td>
    <td>RUỘT BANH</td>
    <td>MÀU SẮT</td>
    <td>LỖ KHOAN</td>
    <td>CHẤT LƯỢNG BANH</td>
    <td>LANE PHÙ HỢP</td>
    <td>HIỆU NĂNG</td>
    <td>SỬA</td>
    <td>XÓA</td>
  </tr>
  <?php foreach($data as $row){?>
  <tr>
    <td><?php echo $row['Masp'] ?></td>
    <td><?php echo $row['Ruotbanh'] ?></td>
    <td><?php echo $row['Color'] ?></td>
    <td><?php echo $row['Lokhoan'] ?></td>
    <td><?php echo $row['Chatluongbanh'] ?></td>
    <td><?php echo $row['Lanephuhop'] ?></td>
    <td><?php echo $row['Hieunang'] ?></td>
    
    <td><a href="index.php?quanly=banh&ac=sua&id=<?php echo $row['Masp']?>"><div class="glyphicon glyphicon-pencil" style="font-size:40px"></div></a></td>
    
    <td><a href="modules/banh/xuly.php?id=<?php echo  $row['Masp']?>" onclick="return confirm('Bạn có chắc chắn xóa thông tin sản phẩm <?php echo $row['Masp'] ?> chứ')"><div class="glyphicon glyphicon-trash" style="font-size:40px"></div></a></td>
  </tr>
  <?php } ?>
</table>
