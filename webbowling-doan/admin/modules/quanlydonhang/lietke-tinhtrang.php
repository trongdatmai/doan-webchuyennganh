<style>
	table tr td{
		width:200px;
		height:50px;		
		}
</style>
<form action="" method="post">
<table>
    <tr>
        <td class="td">TÌNH TRẠNG ĐƠN HÀNG: 
     	<td class="td"><input   type="radio" name="ttdh" value="0" > CHƯA XÁC NHẬN
        <td class="td"><input  class="form" type="radio"name="ttdh" value="1"> ĐANG CHỜ
      	<td class="td"><input  class="form" type="radio" name="ttdh" value="2">    ĐÃ XÁC NHẬN
        <td style="margin:auto"><input type="submit" name="sub-ttdh" value="Xem"  onClick="return confirm('Xác nhận xem thông tin đã chọn ?')"></td>
    </tr>
    <tr>
        <td class="td">TRÌNH TRẠNG GIAO HÀNG
        <td class="td"><input   type="radio" name="ttgh" value="0">  CHƯA GIAO HÀNG
        <td class="td"><input  class="form" type="radio" name="ttgh" value="1"> ĐANG GIAO HÀNG
        <td class="td"><input  class="form" type="radio" name="ttgh" value="2"> GIAO HÀNG THÀNH CÔNG 
       <td style="margin:auto"> <input type="submit" name="sub-ttgh" value="Xem" onClick="return confirm('Xác nhận xem thông tin đã chọn ?')"></td>
    </tr>
    <tr>
        <td class="td">TÌNH TRẠNG THANH TOÁN
        <td class="td"><input   type="radio" name="tttt" value="0"> CHƯA THANH TOÁN
       <td class="td"><input  class="form" type="radio" name="tttt" value="1">ĐÃ THANH TOÁN 
       <td> <input type="submit" name="sub-tttt" value="Xem" onClick="return confirm('Xác nhận xem thông tin đã chọn ?')"></td>
    </tr>
    </table>
</form>
<?PHP 
	//include('../config.php');
	
?>
<table width="100%" border="1">
 
<!--------------- SUBMIT TTDH XUẤT RA FORM TTDH--------------->
<?php if(isset($_POST['sub-ttdh'])){ ?>
  <tr>
    <td>MÃ HÓA ĐƠN</td>
    <td>NGÀY ĐẶT</td>
    <td>Thành tiền</td>
    <td>TÌNH TRẠNG ĐƠN HÀNG</td>
    <td>MÃ KHÁCH HÀNG</td>
    <td>MÃ ADMIN</td>
  </tr>
  
  <?php }?>
  <!--------------- SUBMIT TTGH XUẤT RA FORM TTGH--------------->
  <?PHP if(isset($_POST['sub-ttgh'])){ ?>
  <tr>
    <td>MÃ HÓA ĐƠN</td>
    <td>NGÀY ĐẶT</td>
    <td>Thành tiền</td>
    <td>TÌNH TRẠNG GIAO HÀNG</td>
    <td>MÃ KHÁCH HÀNG</td>
    <td>MÃ ADMIN</td>
  </tr><?php } ?>
  
  <!--------------- SUBMIT TTTT XUẤT RA FORM TTTT--------------->
  <?PHP if(isset($_POST['sub-tttt'])){ ?>
  <tr>
    <td>MÃ HÓA ĐƠN</td>
    <td>NGÀY ĐẶT</td>
    <td>Thành tiền</td>
    <td>TÌNH TRẠNG THANH TOÁN</td>
    <td>MÃ KHÁCH HÀNG</td>
    <td>MÃ ADMIN</td>
    <?php }?>
	<!--------------- KIỂM TRA TÌNH TRẠNG ĐƠN HÀNG--------------->
     <?php
	if(isset($_POST['sub-ttdh'])){
	$tam= $_POST['ttdh'];
	$sql="select * from hoadon where Trangthaidonhang=$tam";
	$objStm=$objPdo->query($sql);
	$sqlcount="select count(*) from hoadon where Trangthaidonhang=$tam";
	$objStmcount=$objPdo->query($sqlcount);
	$count=$objStmcount->fetch(PDO::FETCH_NUM);
	$data=$objStm->fetchAll(PDO::FETCH_ASSOC);
	if($count[0]==0){
		if($tam=='0'){
			echo "Không có đơn hàng nào chưa xác nhận ";
		}else if($tam=='1'){
			echo "Không có đơn hàng nào đang chờ ";
		}else{
			echo "Không có đơn hàng nào đã xác nhận ";
			}
	}else{
		echo "Có $count[0] đơn hàng theo tìm kiếm";
		foreach($data as $row){;?>
  <tr>
    <td><?php echo $row['MaHD']?></td>
    <td><?php echo $row['Ngaydat']?></td>
    <td><?php echo number_format($row['Thanhtien'])?></td>
    <td style="background:#9FC"><?php  if($row['Trangthaidonhang']==0) echo "Chưa xác nhận";else if($row['Trangthaidonhang']==1) echo "Đang chờ";else echo "Đã xác nhận"?></td>
    <td><?php echo $row['idkh']?></td>
    <td><?php echo $row['Username_AD']?></td>
  </tr>
  <?php } } }?>
  <!--------------- KIỂM TRA TÌNH TRẠNG THANH TOÁN--------------->
   <?php
if(isset($_POST['sub-tttt'])){
	$tam= $_POST['tttt'];
	$sql="select * from hoadon where Trangthaithanhtoan=$tam";
	$objStm=$objPdo->query($sql);
	$sqlcount="select count(*) from hoadon where Trangthaithanhtoan=$tam";
	$objStmcount=$objPdo->query($sqlcount);
	$count=$objStmcount->fetch(PDO::FETCH_NUM);
	$data=$objStm->fetchAll(PDO::FETCH_ASSOC);
	if($count[0]==0){
		if($tam=='0'){
			echo "Không có đơn hàng nào chưa thanh toán ";
		}else if($tam=='1'){
			echo "Không có đơn hàng nào đã thanh toán ";
		}
	}else{
		echo "Có $count[0] đơn hàng theo tìm kiếm";
 		 foreach($data as $row){?>
  <tr>
    <td><?php echo $row['MaHD']?></td>
    <td><?php echo $row['Ngaydat']?></td>
    <td><?php echo number_format($row['Thanhtien'])?></td>
    <td style="background:#9FC"><?php  if($row['Trangthaithanhtoan']==0) echo "Chưa thanh toán";else if($row['Trangthaithanhtoan']==1) echo "Đã thanh toán";?></td>
    <td><?php echo $row['idkh']?></td>
    <td><?php echo $row['Username_AD']?></td>
  </tr>
  <?php } } }?>
  <!--------------- KIỂM TRA TÌNH TRẠNG GIAO HÀNG--------------->
   <?php
if(isset($_POST['sub-ttgh'])){
	$tam= $_POST['ttgh'];
	$sql="select * from hoadon where Trangthaigiaohang=$tam";
	$objStm=$objPdo->query($sql);
	$sqlcount="select count(*) from hoadon where Trangthaigiaohang=$tam";
	$objStmcount=$objPdo->query($sqlcount);
	$count=$objStmcount->fetch(PDO::FETCH_NUM);
	$data=$objStm->fetchAll(PDO::FETCH_ASSOC);
	if($count[0]==0){
		if($tam=='0'){
			echo "Không có đơn hàng nào chưa giao hàng ";
		}else if($tam=='1'){
			echo "Không có đơn hàng nào đang giao hàng";
		}else{
			echo "Không có đơn hàng nào đã giao hàng thành công ";
			}
	}else{
		echo "Có $count[0] đơn hàng theo tìm kiếm";
		foreach($data as $row){;?>
  <tr>
    <td><?php echo $row['MaHD']?></td>
    <td><?php echo $row['Ngaydat']?></td>
    <td><?php echo number_format($row['Thanhtien'])?></td>
    <td style="background:#9FC"><?php  if($row['Trangthaigiaohang']==0) echo "Chưa giao hàng";else if($row['Trangthaigiaohang']==1) echo "Đang giao hàng";else echo "Đã giao hàng thành công"?></td>
    <td><?php echo $row['idkh']?></td>
    <td><?php echo $row['Username_AD']?></td>
  </tr>
  <?php } } }?>
</table>
