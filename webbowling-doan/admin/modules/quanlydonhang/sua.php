<style>
	.bt {
		text-align:center;
		}
</style>
<?php
	if(isset($_GET['id'])){
	$id=$_GET['id'];
	$sql="select * from hoadon WHERE MaHD='$id'";
	$objStm=$objPdo->query($sql);
	$data=$objStm->fetchAll(PDO::FETCH_ASSOC);
	if(isset($_SESSION['dangnhap'])){ 
		$ten=$_SESSION['dangnhap'];	
		$sqldn="select * from admin WHERE Username_AD='$ten'";
		$objStmdn=$objPdo->query($sqldn);
		$datadn=$objStmdn->fetchAll(PDO::FETCH_ASSOC);
		foreach($datadn as $rowdn){
			$cv=$rowdn['chucvu'];
			if($cv==1){
				foreach($data as $row)
				?>
				<form action="modules/quanlydonhang/xuly.php?id=<?php  echo $id?>" method="post" onsubmit="return confirm('Bạn có xác nhận sửa đơn hàng này hay không!')">
<table width="100%" border="1">
   <tr>
    <td colspan="2" class="bt">SỬA ĐƠN HÀNG</td>
    
  </tr>
  <tr>
    <td class="bt">MÃ ĐƠN HÀNG</td>
    <td class="bt"><input type="text" name="madh" value="<?php echo $row['MaHD']?>" disabled></td>
  </tr>
  <tr>
    <td class="bt">NGÀY ĐẶT</td>
    <td class="bt"><input type="date" name="ngaydat" value="<?php echo $row['Ngaydat']?>" disabled></td>
  </tr>
  <tr>
    <td>TRẠNG THÁI ĐƠN HÀNG</td>
    <td><?php
    	if($row['Trangthaidonhang']=='0'){?>
   		<span style="background:#0FC"><input type="radio" name="ttdh" value="0" checked="checked">CHƯA XÁC NHẬN</span><BR>
    	<input type="radio" name="ttdh" value="1">ĐANG CHỜ<BR>
        <input type="radio" name="ttdh" value="2" />ĐÃ XÁC NHẬN
		<?php }else if($row['Trangthaidonhang']=='1'){?>
   		<input type="radio" name="ttdh" value="0">CHƯA XÁC NHẬN<BR>
    	<span style="background:#0FC"><input type="radio" name="ttdh" value="1"  checked="checked">ĐANG CHỜ</span><BR>
        <input type="radio" name="ttdh" value="2">ĐÃ XÁC NHẬN
		<?php }else{?>
        <input type="radio" name="ttdh" value="0">CHƯA XÁC NHẬN<BR>
    	<input type="radio" name="ttdh" value="1"  >ĐANG CHỜ<BR>
       <span style="background:#0FC"> <input type="radio" name="ttdh" value="2" checked="checked">ĐÃ XÁC NHẬN </span><?php } ?>
    </td>
  </tr>
  <tr>
    <td>TRẠNG THÁI GIAO HÀNG</td>
    <td><?php if($row['Trangthaigiaohang']=='0'){?>
   		<span style="background:#0FC"><input type="radio" name="ttgh" value="0" checked="checked">CHƯA GIAO HÀNG</span><BR>
    	<input type="radio" name="ttgh" value="1">ĐANG GIAO HÀNG<BR>
        <input type="radio" name="ttgh" value="2">GIAO HÀNG THÀNH CÔNG
		<?php }else if($row['Trangthaigiaohang']=='1'){?>
   		<input type="radio" name="ttgh" value="0">CHƯA GIAO HÀNG<BR>
    	<span style="background:#0FC"><input type="radio" name="ttgh" value="1"  checked="checked">ĐANG GIAO HÀNG</span><BR>
        <input type="radio" name="ttgh" value="2">GIAO HÀNG THÀNH CÔNG
		<?php }else{?>
        <input type="radio" name="ttgh" value="0">CHƯA GIAO HÀNG<BR>
    	<input type="radio" name="ttgh" value="1"  >ĐANG GIAO HÀNG<BR>
        <span style="background:#0FC"><input type="radio" name="ttgh" value="2" checked="checked">GIAO HÀNG THÀNH</span> CÔNG <?php } ?>
   </td>
  </tr>
  <tr>
    <td>TRẠNG THÁI THANH TOÁN</td>
    <td>
    	<?php if($row['Trangthaithanhtoan']=='0'){?>
   		 <span style="background:#0FC"><input type="radio" name="tttt" value="0" checked="checked">CHƯA THANH TOÁN</span><BR>
    	<input type="radio" name="tttt" value="1">ĐÃ THANH TOÁN
        <?php } else {?>
        <input type="radio" name="tttt" value="0">CHƯA THANH TOÁN<BR>
    	<span style="background:#0FC"><input type="radio" name="tttt" value="1" checked="checked">ĐÃ THANH TOÁN</span>
		<?php }?>
     </td>
  </tr>
  <?php $m=$row['idkh'];$sql_kh="select * from khachhang where id='$m' ";
						$objStm_kh=$objPdo->query($sql_kh);
						$datakh=$objStm_kh->fetchAll(PDO::FETCH_ASSOC);
						foreach($datakh as $rowkh){?>
  <tr >
    <td class="bt">MÃ-TÊN KHÁCH HÀNG</td>
    <td>
    	<select disabled="disabled">
                        <option><?php echo 'Mã khách hàng: '.$rowkh['id'].' - '.'Tên khách hàng: '.$rowkh['Tenkh'];?></option>
       </select>
    </td> 
  </tr>
  </tr>
  <tr>
    <td class="bt">SỐ ĐIỆN THOẠI</td>
    <td class="bt"><input type="text" name="sdt" disabled="disabled" value="<?php echo $rowkh['sdt']?>"/></td>
  </tr>
  </tr>
  <tr>
    <td class="bt">EMAIL KHÁCH HÀNG</td>
    <td class="bt"><input type="text" name="email" disabled="disabled" value="<?php echo $rowkh['email']?>"/></select></td>
  </tr>
  
  <!-- nếu idadmin = null thì đơn hàng chưa được xác nhận bởi bất kì idadmin nào.-->
  <?php if($row['Username_AD']==''){?>
   <tr>
    <td class="bt">MÃ-TÊN ADMIN</td>
    <td class="bt"><INput type="text" value="Đang update..." disabled="disabled"/></td>
    <?php }else{?>
  </tr>
  <tr>
    <td class="bt">MÃ-TÊN ADMIN</td>
    <td class="bt"><INput type="text" value="<?php echo $row['Username_AD']?>" disabled="disabled"/></td>
  </tr>
  <?php }
   } ?>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="sua" value="SỬA ĐƠN HÀNG" style="border-radius:5px">
    </div></td>
  </tr>
</table>
</form>
			<?php }else{
				foreach($data as $row){
					if($row['Xacnhan']==1){
						echo '<script>alert("Đơn hàng này đã thanh toán nên không được sửa")</script>';
						echo "<p style='font-size:24px;color:red'>Đơn hàng đã thanh toán  nên không được sửa</p>";
					}else{
?>
<form action="modules/quanlydonhang/xuly.php?id=<?php  echo $id?>" method="post" onsubmit="return confirm('Bạn có xác nhận sửa đơn hàng này hay không!')">
<table width="100%" border="1">
   <tr>
    <td colspan="2" class="bt">SỬA ĐƠN HÀNG</td>
    
  </tr>
  <tr>
    <td class="bt">MÃ ĐƠN HÀNG</td>
    <td class="bt"><input type="text" name="madh" value="<?php echo $row['MaHD']?>" disabled></td>
  </tr>
  <tr>
    <td class="bt">NGÀY ĐẶT</td>
    <td class="bt"><input type="date" name="ngaydat" value="<?php echo $row['Ngaydat']?>" disabled></td>
  </tr>
  <tr>
    <td>TRẠNG THÁI ĐƠN HÀNG</td>
    <td><?php
    	if($row['Trangthaidonhang']=='0'){?>
   		<span style="background:#0FC"><input type="radio" name="ttdh" value="0" checked="checked">CHƯA XÁC NHẬN</span><BR>
    	<input type="radio" name="ttdh" value="1">ĐANG CHỜ<BR>
        <input type="radio" name="ttdh" value="2" />ĐÃ XÁC NHẬN
		<?php }else if($row['Trangthaidonhang']=='1'){?>
   		<input type="radio" name="ttdh" value="0">CHƯA XÁC NHẬN<BR>
    	<span style="background:#0FC"><input type="radio" name="ttdh" value="1"  checked="checked">ĐANG CHỜ</span><BR>
        <input type="radio" name="ttdh" value="2">ĐÃ XÁC NHẬN
		<?php }else{?>
        <input type="radio" name="ttdh" value="0">CHƯA XÁC NHẬN<BR>
    	<input type="radio" name="ttdh" value="1"  >ĐANG CHỜ<BR>
       <span style="background:#0FC"> <input type="radio" name="ttdh" value="2" checked="checked">ĐÃ XÁC NHẬN </span><?php } ?>
    </td>
  </tr>
  <tr>
    <td>TRẠNG THÁI GIAO HÀNG</td>
    <td><?php if($row['Trangthaigiaohang']=='0'){?>
   		<span style="background:#0FC"><input type="radio" name="ttgh" value="0" checked="checked">CHƯA GIAO HÀNG</span><BR>
    	<input type="radio" name="ttgh" value="1">ĐANG GIAO HÀNG<BR>
        <input type="radio" name="ttgh" value="2">GIAO HÀNG THÀNH CÔNG
		<?php }else if($row['Trangthaigiaohang']=='1'){?>
   		<input type="radio" name="ttgh" value="0">CHƯA GIAO HÀNG<BR>
    	<span style="background:#0FC"><input type="radio" name="ttgh" value="1"  checked="checked">ĐANG GIAO HÀNG</span><BR>
        <input type="radio" name="ttgh" value="2">GIAO HÀNG THÀNH CÔNG
		<?php }else{?>
        <input type="radio" name="ttgh" value="0">CHƯA GIAO HÀNG<BR>
    	<input type="radio" name="ttgh" value="1"  >ĐANG GIAO HÀNG<BR>
        <span style="background:#0FC"><input type="radio" name="ttgh" value="2" checked="checked">GIAO HÀNG THÀNH</span> CÔNG <?php } ?>
   </td>
  </tr>
  <tr>
    <td>TRẠNG THÁI THANH TOÁN</td>
    <td>
    	<?php if($row['Trangthaithanhtoan']=='0'){?>
   		 <span style="background:#0FC"><input type="radio" name="tttt" value="0" checked="checked">CHƯA THANH TOÁN</span><BR>
    	<input type="radio" name="tttt" value="1">ĐÃ THANH TOÁN
        <?php } else {?>
        <input type="radio" name="tttt" value="0">CHƯA THANH TOÁN<BR>
    	<span style="background:#0FC"><input type="radio" name="tttt" value="1" checked="checked">ĐÃ THANH TOÁN</span>
		<?php }?>
     </td>
  </tr>
  <?php $m=$row['idkh'];$sql_kh="select * from khachhang where id='$m' ";
						$objStm_kh=$objPdo->query($sql_kh);
						$datakh=$objStm_kh->fetchAll(PDO::FETCH_ASSOC);
						foreach($datakh as $rowkh){?>
  <tr >
    <td class="bt">MÃ-TÊN KHÁCH HÀNG</td>
    <td>
    	<select disabled="disabled">
                        <option><?php echo 'Mã khách hàng: '.$rowkh['id'].' - '.'Tên khách hàng: '.$rowkh['Tenkh'];?></option>
       </select>
    </td> 
  </tr>
  </tr>
  <tr>
    <td class="bt">SỐ ĐIỆN THOẠI</td>
    <td class="bt"><input type="text" name="sdt" disabled="disabled" value="<?php echo $rowkh['sdt']?>"/></td>
  </tr>
  </tr>
  <tr>
    <td class="bt">EMAIL KHÁCH HÀNG</td>
    <td class="bt"><input type="text" name="email" disabled="disabled" value="<?php echo $rowkh['email']?>"/></select></td>
  </tr>
  
  <!-- nếu idadmin = null thì đơn hàng chưa được xác nhận bởi bất kì idadmin nào.-->
  <?php if($row['Username_AD']==''){?>
   <tr>
    <td class="bt">MÃ-TÊN ADMIN</td>
    <td class="bt"><INput type="text" value="Đang update..." disabled="disabled"/></td>
    <?php }else{?>
  </tr>
  <tr>
    <td class="bt">MÃ-TÊN ADMIN</td>
    <td class="bt"><INput type="text" value="<?php echo $row['Username_AD']?>" disabled="disabled"/></td>
  </tr>
  <?php }
   } ?>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="sua" value="SỬA ĐƠN HÀNG" style="border-radius:5px">
    </div></td>
  </tr>
</table>
</form>
<?php	 
		}	} } }
		}
 	} else { echo '<p style="font-size:30px">NHẤN ĐƠN HÀNG CẦN SỬA ĐỂ SỬA</p>';
 }?>
