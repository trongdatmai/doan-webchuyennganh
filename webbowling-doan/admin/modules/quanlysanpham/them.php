<script>
function KT(){
	ma=document.getElementById('maSP').value;
	ten=document.getElementById('tenSP').value;
	gia=document.getElementById('giaTIEN').value;
	hinhanh=document.getElementById('hinhANH').value;
	//ten=hinhanh['name'];
	//tam=hinhanh['tmp_name'];
	
	hangsx=document.getElementById('HSX').value;
	nd=document.getElementById('noiDUNG').value;
	bh=document.getElementById('baoHANH').value;
	sl=document.getElementById('soLUONG').value;
	if(ma==''){
		alert('Bạn chưa nhập mã sản phẩm');
		return false;
	}
	if( ten==''){
		alert('Bạn chưa nhập tên sản phẩm');
		return false;
	}
	if( gia==''){
		alert('Bạn chưa nhập giá sản phẩm');
		return false;
	}if(hinhanh==''){alert('Bạn chưa chọn hình ảnh');return false;}
	
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
<form action="modules/quanlysanpham/xuly.php" method="post" enctype="multipart/form-data" onsubmit="return KT()">
<table width="100%" border="1">
  <tr>
    <td colspan="2"><div align="center">Thêm sản phẩm</div></td>
  </tr>
  <tr>
    <td width="48%">Mã sản phẩm</td>
    <td width="52%"><input type="text" name="masp" id="maSP"></td>
  </tr>
  <tr>
    <td>Tên sản phẩm</td>
    <td><input type="text" name="tensp" id="tenSP"></td>
  </tr>
  <tr>
    <td>Gía tiền</td>
    <td><input type="text" name="giatien" id="giaTIEN"></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinhanh" id="hinhANH"></td>
  </tr>

  <tr>
    <td>Hãng sản xuất</td>
    <td><input type="text" name="hangsx" id="HSX"></td>
  </tr>
  <tr>
    <td>Nội dung</td>
    <td><textarea name="noidung" cols="40" rows="15" id="noiDUNG"></textarea></td>
  </tr>
  <tr>
    <td>Bảo hành</td>
    <td><input type="text" name="baohanh" id="baoHANH"></td>
  </tr>
  <tr>
  	<td>SỐ LƯỢNG</td>
    <td><input type="text" name="soluong" id="soLUONG" /></td>
  </tr>
  <?php //load lấy mã loại sp gắn vào combobox
		$sql="select * from loaisanpham";
		$objStm = $objPdo->query($sql);
		$data = $objStm->fetchAll(PDO::FETCH_ASSOC);
		
	?>
  <tr>
    <td>Mã loại sản phẩm</td>
    <td><select name="maloaisp">
    <?php // tạo vòng lập lấy giá trị cho combobox
	foreach($data as $row)  
		{
	?>
    <option><?php echo $row['Maloaisp']?></option>
    <?php } ?>
    </select>
    </td>
  </tr>
  
  <tr>
    <td colspan="2"><div align="center">
      <button name="them" value="thêm" onclick="return confirm('Bạn có chắc chắn thông tin nhập vào không')">Thêm</button>
    </div></td>
  </tr>

</table>
</form>
