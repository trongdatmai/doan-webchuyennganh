<script >
function kt(){
 	
	ten=document.getElementById('tenSP').value;
	gia=document.getElementById('giaTIEN').value;
	//hinhanh=document.getElementById('hinhANH').value;
	//ten=hinhanh['name'];
	//tam=hinhanh['tmp_name'];
	
	hangsx=document.getElementById('HSX').value;
	nd=document.getElementById('noiDUNG').value;
	bh=document.getElementById('baoHANH').value;
	sl=document.getElementById('soLUONG').value;
	
	if( ten==''){
		alert('Bạn chưa nhập tên sản phẩm');
		return false;
	}
	if( gia==''){
		alert('Bạn chưa nhập giá sản phẩm');
		return false;
	}
	
	if( hangsx==''){
		alert('Bạn chưa nhập hãng sản xuất sản phẩm');
		return false;
	}
	if( nd==''){
		alert('Bạn chưa nhập nội dung sản phẩm');
		return false;
	}
	if( bh==''){
		alert('Bạn chưa nhập bảo hành sản phẩm');
		return false;
	}
	if( sl==''){
		alert('Bạn chưa nhập số lượng sản phẩm');
		return false;
	}
	return true;
}
</script>
<?php
	// code sửa
	$m=$_GET['id']; // nhận giá trị id bên lietke.php và sử lí
	$sql="select * from sanpham where Masp='$m'";
	$objStm = $objPdo->query($sql);
	$data = $objStm->fetchAll(PDO::FETCH_ASSOC); 
?>
<?php foreach($data as $row){ ?>
<form action="modules/quanlysanpham/xuly.php?id=<?php  echo $row['Masp']?>" method="post" enctype="multipart/form-data" onsubmit="return kt()" >
<table width="100%" border="1">
  <tr>
    <td colspan="2"><div align="center">Sửa thông tin sản phẩm</div></td>
  </tr>
  
  <tr>
    <td>Mã sản phẩm</td>
    <td><input type="text" name="masp" readonly="readonly" value="<?php echo $row['Masp'] ?>" disabled="disabled"/></td>
  </tr>
  <tr>
    <td>Tên sản phẩm</td>
    <td><input type="text" name="tensp" value="<?php echo $row['Tensp'] ?>" id='tenSP'/></td>
  </tr>
  <tr>
    <td>Gía tiền</td>
    <td><input type="text" name="giatien" value="<?php echo $row['Giatien'] ?>" id="giaTIEN"/></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh" style="width:150px;margin-bottom:20px"/><img src="modules/quanlysanpham/uploads/<?php echo $row['image']?>" style="width:50px;height:50px;margin-top:20px" /> </td>
 
  </tr>
  <tr>
    <td>Hãng sản xuất</td>
    <td><input type="text" name="hangsx" value="<?php echo $row['Hangsx'] ?>" id="HSX"/></td>
  </tr>
  <tr>
    <td>Nội dung</td>
    <td><textarea name="noidung" cols="40" rows="15" id="noiDUNG"><?php echo $row['Noidung'] ?></textarea></td>
  </tr>
  <tr>
    <td>Bảo hành</td>
    <td><input type="text" name="baohanh" value="<?php echo $row['Baohanh'] ?>" id="baoHANH"  /></td>
  </tr>
   <tr>
    <td>SỐ LƯỢNG</td>
    <td><input type="text" name="soluong" value="<?php echo $row['Soluong'] ?>" id="soLUONG"  /></td>
  </tr>
  <?php //load lấy mã loại sp gắn vào combobox
		$sql_1="select Maloaisp from loaisanpham";
		$objstm = $objPdo->query($sql_1);
		$data_1 = $objstm->fetchAll(PDO::FETCH_ASSOC);
		
	?>
  <tr>
    <td>Mã loại sản phẩm</td>
    <td><select name="maloaisp">
    <?php // tạo vòng lập lấy giá trị cho combobox
	foreach($data_1 as $row_1)  
		{
	?>
    <option ><?php echo $row_1['Maloaisp']?></option>
    <?php } ?>
    </select>
    </td>
  </tr>
  <?php } ?>
  <tr>
    <td colspan="2"><div align="center">
      <button name="sua" value="Sửa" onclick="return confirm('Bạn có chắc chọn mã loại sản phẩm hiện tại chứ')">Sửa</button>
    </div></td>
  </tr>

</table>
</form>
