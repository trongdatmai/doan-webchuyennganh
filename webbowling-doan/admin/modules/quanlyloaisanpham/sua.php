<script type="text/javascript">
function kt(){
	t=document.getElementById('tenloaiSP').value;
	if(t=='')
	{alert('Nhập tên bạn ơi');
	return false;}
	return true;
}
</script>
<?php
	// code sửa
	$m=$_GET['id']; // nhận giá trị id bên lietke.php và sử lí
	$sql="select * from loaisanpham where Maloaisp='$m'";
	$objStm = $objPdo->query($sql);
	$data = $objStm->fetchAll(PDO::FETCH_ASSOC); 
?>
<?php	
 foreach($data as $row) {
 ?>
<form action="modules/quanlyloaisanpham/xuly.php?id=<?php echo $row['Maloaisp'] ?>" method="post" enctype="multipart/form-data" onsubmit="return kt();">
<table width="100%" border="1">
  <tr>
    <td colspan="2"><div align="center">Sửa loại sản phẩm</div></td>
  </tr>
 
  <tr>
    <td>Mã loại sp</td>
    <td><input type="text" name="maloaisp" value="<?php echo $row['Maloaisp']; ?>" disabled/></td>
  </tr>
  <tr>
    <td>Tên loại sp</td>
    <td><input type="text" name="tenloaisp" id="tenloaiSP" value="<?php echo $row['Tenloaisp']; ?>" /></td>
  </tr>
  <tr>
  
   <td colspan="2"><div align="center">
      <input type="submit" name="sua" value="sửa">
    </div></td>
  </tr>
</table>
</form>
<?php 
  }
  ?>