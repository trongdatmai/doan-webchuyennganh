<style>
	table .tr1{
		 background:#0CF;
		 color:#000;
		 text-align:center;
		}
		a{
			text-decoration:none;
		}
		a:hover{
			color:red;}
</style>
<?php
	
	// TÌM KIẾM HÓA ĐƠN KHÁCH HÀNG.
	if(isset($_POST['timkiem'])){
		$tk=$_POST['search'];
		?>
			<table width="100%" border="1" class="table table-striped">
                  <tr class="danger">
                    <td>MÃ HÓA ĐƠN</td>
                    <td>NGÀY ĐẶT</td>
                    <td>TÌNH TRẠNG ĐƠN HÀNG</td>
                    <td>TÌNH TRẠNG GIAO HÀNG</td>
                    <td>TÌNH TRẠNG THANH TOÁN</td>
                    <td>MÃ KHÁCH HÀNG</td>
                    <td>MÃ ADMIN</td>
                    <td>SỬA</td>
                    <td>XÓA</td>
                  </tr>
                  <?php 
		$sqltk1="select count(*) from hoadon where MaHD like N'%$tk%' or idkh like N'%$tk%'";
		$objStmtk1=$objPdo->query($sqltk1);
		$data1=$objStmtk1->fetch(PDO::FETCH_NUM);
		if($data1[0]>0){
		
		$sqltk="select * from hoadon where MaHD like N'%$tk%' or idkh like N'%$tk%'";
		$objStmtk=$objPdo->query($sqltk);
		$datatk=$objStmtk->fetchAll(PDO::FETCH_ASSOC);
		
		foreach($datatk as $rowtk){?>
                  <tr>
                    <td><?php echo $rowtk['MaHD']?></td>
                    <td><?php echo $rowtk['Ngaydat']?></td>
                    <td><?php  if($rowtk['Trangthaidonhang']==0) echo "Chưa xác nhận";else if($rowtk['Trangthaidonhang']==1) echo "Đang chờ";else echo "Xác nhận đơn hàng"?></td>
                    <td><?php if($rowtk['Trangthaigiaohang']==0) echo "Chưa giao hàng";else if($rowtk['Trangthaigiaohang']==1) echo "Đang giao hàng";else echo "Giao hàng thành công"?></td>
                    <td><?php if($rowtk['Trangthaithanhtoan']==0) echo "Chưa thanh toán"; else echo "Đã thanh toán";?></td>
                    <td><?php echo $rowtk['idkh']?></td>
                    <td><?php echo $rowtk['Username_AD']?></td>
                    <td><a href="index.php?quanly=quanlydonhang&ac=sua&id=<?php echo $rowtk['MaHD']?>"><div class="glyphicon glyphicon-pencil" style="font-size:40px"></div></a> </td >
                         <?php 	 if(isset($_SESSION['dangnhap'])){
				$iddn=$_SESSION['dangnhap'];
				$sqldn="select * from admin  where Username_AD='$iddn'";
				$objStmdn=$objPdo->query($sqldn);
				$datadn=$objStmdn->fetchAll(PDO::FETCH_ASSOC);
				foreach($datadn as $rowdn){
					if($rowdn['chucvu']==0){
						$tam=$row['MaHD'];
						?>
						<td><a href="modules/quanlydonhang/xuly.php?&id=<?php echo $row['MaHD']?>" onclick="alert('Chức năng này chỉ sử dụng cho chức vụ admin hệ thống')"><div class="glyphicon glyphicon-trash" style="font-size:40px"></div></a> </td>
					<?php }else{?>
						<td><a href="modules/quanlydonhang/xuly.php?&id=<?php echo $tam?>" onclick="return confirm('Bạn có chắc chắn thực hiện hành động có thể gây nguy hiểm này không')"><div class="glyphicon glyphicon-trash" style="font-size:40px"></div></a> </td>
					<?php }
					}
				}?>
                  </tr>
                  <?php }
					}else{
						echo "<p style='color:white;background:#000;width:400px;text-align:center;border-radius:5px'>Không tìm thấy hóa đơn liên quan khóa tìm kiếm</p><br>";
						echo '<script>alert("Không tìm thấy hóa đơn nào liên quan khóa tìm kiếm")</script>';
						}
				}
				?>
			</table>
      <?php
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
	  
	 $sql="select * from hoadon limit $trang1,15";
	$objStm=$objPdo->query($sql);
	$data=$objStm->fetchAll(PDO::FETCH_ASSOC);
	
	$sqlpt="select count(*) from hoadon";
	$objStmpt=$objPdo->query($sqlpt);
	$count=$objStmpt->fetch(PDO::FETCH_NUM);
	
	$a=ceil($count[0]/15);
	echo "TRANG :";
	for($i=1;$i<=$a;$i++){
		echo '<a href="index.php?quanly=quanlydonhang&ac=sua&trang='.$i.'" style="text-decoration:none;">'.' '. $i .' '.'</a>';
	}
	echo "<bR>
	TỔNG SỐ TRANG LÀ: $count[0]";
	?>

<form action="" method="post">
	TÌM THEO ID KHÁCH HÀNG HOẶC MÃ HÓA ĐƠN<input type="search"  name="search" style="width:200px;height:35px;border-radius:15px;background:#999;color:#000"/>
    <input type="submit" name="timkiem" value="TÌM KIẾM" style="width:100px;height:40px;border-radius:15px;background:#000;color:#FFF"/>
</form>
<div class="table-responsive">
<table width="100%" border="1"  class="table table-striped">
  <tr class="danger">
    <td>MÃ HÓA ĐƠN</td>
    <td>NGÀY ĐẶT</td>
    <td>Thành tiền</td>
    <td>TÌNH TRẠNG ĐƠN HÀNG</td>
    <td>TÌNH TRẠNG GIAO HÀNG</td>
    <td>TÌNH TRẠNG THANH TOÁN</td>
    <td>MÃ KHÁCH HÀNG</td>
    <td>MÃ ADMIN</td>
    <td>SỬA</td>
    <td>XÓA</td>
  </tr>
  <?php 
  foreach($data as $row){?>
  <tr >
    <td ><?php echo $row['MaHD']?></td>
    <td><?php echo $row['Ngaydat']?></td>
    <td><?php echo number_format($row['Thanhtien'])?></td>
    <td><?php  if($row['Trangthaidonhang']==0) echo "Chưa xác nhận";else if($row['Trangthaidonhang']==1) echo "Đang chờ";else echo "Xác nhận đơn hàng"?></td>
    <td><?php if($row['Trangthaigiaohang']==0) echo "Chưa giao hàng";else if($row['Trangthaigiaohang']==1) echo "Đang giao hàng";else echo "Giao hàng thành công"?></td>
    <td><?php if($row['Trangthaithanhtoan']==0) echo "Chưa thanh toán"; else echo "Đã thanh toán";?></td>
    <td><?php echo $row['idkh']?></td>
    <td><?php echo $row['Username_AD']?></td>
    <td><a href="index.php?quanly=quanlydonhang&ac=sua&id=<?php echo $row['MaHD']?>"><div class="glyphicon glyphicon-pencil" style="font-size:40px"></div></a> </td>
    <?php 	 if(isset($_SESSION['dangnhap'])){
				$iddn=$_SESSION['dangnhap'];
				$sqldn="select * from admin  where Username_AD='$iddn'";
				$objStmdn=$objPdo->query($sqldn);
				$datadn=$objStmdn->fetchAll(PDO::FETCH_ASSOC);
				foreach($datadn as $rowdn){
					if($rowdn['chucvu']==0){
						?>
						<td><a href="modules/quanlydonhang/xuly.php?&id=<?php echo $row['MaHD']?>" onclick="alert('Chức năng này chỉ sử dụng cho chức vụ admin hệ thống')"><div class="glyphicon glyphicon-trash" style="font-size:40px"></div></a> </td>
					<?php }else{?>
						<td><a href="modules/quanlydonhang/xuly.php?&id=<?php echo $row['MaHD']?>" onclick="return confirm('Bạn có chắc chắn thực hiện hành động có thể gây nguy hiểm này không')"><div class="glyphicon glyphicon-trash" style="font-size:40px"></div></a> </td>
					<?php }
				}
				}?>
    
  
  </tr>
  <?php } ?>
</table>
</div>
