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
		height:130px;
		font-size:18px;
		text-align:center;	
	}
	.tr-tt td{
	
	}
	.p{
		font-size:30px;
		color:#F03;
		float:right;
		margin:20px 50px 0px;
	}
</style>
<table width="90%" border="0">
          <tr class="trtable">
			<td>Hình ảnh: </td>
          	<td>Mã sản phẩm:</td>
            <td>Tên sản phẩm:</td>
            <td>Gía tiền:</td>
            <td>Bảo hành: </td>
            <td>Số lượng mua:</td>
            <td>Ngày đặt hàng:</td>
           
          </tr>
<?php 
	$mahd=$_GET['id'];
	$tam=0;
	$sql="select * from sanpham INNER join chitiethoadon inner join hoadon on sanpham.Masp=chitiethoadon.Masp AND chitiethoadon.Mahd=hoadon.MaHD WHERE hoadon.MaHD='$mahd' ";
	$objStm=$objPdo->query($sql);
	$data=$objStm->fetchAll(PDO::FETCH_ASSOC);
	foreach($data as $row){
			$tam=$row['Thanhtien'];
		?>
          <tr class="tr-tt">
          	<td><img src="sanpham/Banh/<?php echo $row['image']?>" width="100" height="100"></td>
            <td><?php echo $row['Masp']?></td>
            <td><?php echo $row['Tensp']?></td>
            <td><?php echo number_format($row['Giatien'])?></td>
            <td><?php echo $row['Baohanh']?></td>
            <td><?php echo $row['Soluong']?></td>
            <td><?PHP  echo $row['Ngaydat']?></td>
          </tr>     
        	     
	<?php }
?>
  </table>
  <p class="p">Thành tiền: <?php echo number_format($tam) ?> VNĐ</p>
