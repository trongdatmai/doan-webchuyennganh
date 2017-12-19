
<style>
	.trtable{
		color:#fff;
		background:#000;
		height:70px;
		font-size:25px;
		text-align:center;
	}
	.tr-tt{
		color :#000;
		height:40x;
		font-size:18px;
		text-align:center;	
	}
	.tr-tt td{
		border:1px solid #000;
	}
</style>
<table width="80%" border="0" class="table table-striped">
              <tr class="trtable">
                <td>Mã Hóa đơn</td>
                <Td>Ngày đặt đơn hàng</Td>
                <td>Thành tiền</td>
                <td>Tình trạng đơn hàng</td>
                <td>Tình trạng giao hàng</td>
                <td>Tình trạng thanh toán</td>
              </tr>
<?php 
	if(!isset($_SESSION['dangnhap'])){
		echo "<script>alert('Đăng nhập để xem thông tin đơn hàng')</script>";
		echo "<p style='font-size:30px;color:blue'>Đăng nhập để xem thông tin đơn hàng</p>";	
	}else{
		$username=$_SESSION['dangnhap'];
		$sql="select * from hoadon where idkh='$username'";
		$objStm=$objPdo->query($sql);
		$data=$objStm->fetchAll(PDO::FETCH_ASSOC);
		$count=$objStm->fetch(PDO::FETCH_NUM);
		$i=1;
		foreach($data as $row){?>
              <tr class="tr-tt" <?php if($i%2==0) echo"style='background-color:#f3fdd5'";?> >
               <td><?php  echo $i;$i++?></td>
                <td><?php echo $row['Ngaydat']?></td>
                <td><?php echo number_format($row['Thanhtien'])?></td>
               <td><?php  if($row['Trangthaidonhang']==0) echo "Chưa xác nhận";else if($row['Trangthaidonhang']==1) echo "Đang chờ";else echo "Xác nhận đơn hàng"?></td>
               <td><?php if($row['Trangthaigiaohang']==0) echo "Chưa giao hàng";else if($row['Trangthaigiaohang']==1) echo "Đang giao hàng";else echo "Giao hàng thành công"?></td>
                <td><?php if($row['Trangthaithanhtoan']==0) echo "Chưa thanh toán"; else echo "Đã thanh toán";?></td>
                 <td><a href="index.php?xem=chitiethoadon&id=<?php echo $row['MaHD'] ?>"><img src="background/content/hd.png" height="35" width="100"></a></td>
              </tr>          
		<?php }
	}
?>
</table>
