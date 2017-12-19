<script>
function kt(){
	$ruot=document.getElementById('ruotbanh').value;
	$color=document.getElementById('color').value;
	$hieunang=document.getElementById('hieunang').value;
	$lanephuhop=document.getElementById('lanephuhop').value;
	$lokhoan=document.getElementById('lokhoan').value;
	$chatluongbanh=document.getElementById('chatluongbanh').value;
	if($ruot==''){
		alert("Chưa nhập thông tin ruột banh!");
		return false;}
		if($color==''){
		alert("Chưa nhập thông tin màu banh!");
		return false;}
		if($lokhoan==''){
		alert("Chưa nhập thông tin lỗ khoan banh!");
		return false;}
		if($chatluongbanh==''){
		alert("Chưa nhập thông tin chất lượng banh!");
		return false;}
		if($lanephuhop==''){
		alert("Chưa nhập thông tin lane phù hợp!");
		return false;}
		if($hieunang==''){
		alert("Chưa nhập thông tin hiệu năng banh!");
		return false;}
	return true;
}
</script>
<?php
	$sql="select * from banh where Masp='$_GET[id]'";
	$objStm = $objPdo->query($sql);
	$data = $objStm->fetchAll(PDO::FETCH_ASSOC); 
?>
<?php	
 foreach($data as $row) {
 ?>
<form action="modules/banh/xuly.php?id=<?php  echo $row['Masp']?>" method="post" enctype="multipart/form-data" onsubmit="return kt()">

<table width="100%" border="1">
  <tr>
    <td colspan="2"><div align="center">SỬA THÔNG TIN BANH</div></td>
  </tr>
  <tr>
    <td>RUỘT BANH</td>
    <td><input type="text" name="ruotbanh" value="<?php echo $row['Ruotbanh'] ?>" id="ruotbanh"></td>
  </tr>
  <tr>
    <td>MÀU SẮT</td>
    <td><input type="text" name="color" value="<?php echo $row['Color'] ?>" id="color"></td>
  </tr>
  <tr>
    <td>LỖ KHOAN</td>
    <td><input type="text" name="lokhoan" value="<?php echo $row['Lokhoan'] ?>" id="lokhoan"></td>
  </tr>
  <tr>
    <td>CHẤT LƯỢNG BANH</td>
    <td><input type="text" name="chatluongbanh" value="<?php echo $row['Chatluongbanh'] ?>" id="chatluongbanh"></td>
  </tr>
  <tr>
    <td>LANE PHÙ HỢP</td>
    <td><input type="text" name="lanephuhop" value="<?php echo $row['Lanephuhop'] ?>" id="lanephuhop"></td>
  </tr>
  <tr>
    <td>HIỆU NĂNG</td>
    <td><input type="text" name="hieunang" value="<?php echo $row['Hieunang'] ?>" id="hieunang" /></td>
  </tr>
  
  <tr>
   <?php //load lấy mã loại sp gắn vào combobox
		$sql_1="select Masp from banh where Masp='$_GET[id]'";
		$objstm_1 = $objPdo->query($sql_1);
		$data_1 = $objstm_1->fetchAll(PDO::FETCH_ASSOC);
		
	?>
    <td>MÃ SẢN PHẨM;</td>
    <td><select name="masp"  disabled="disabled">
	<?php // tạo vòng lập lấy giá trị cho combobox
	foreach($data_1 as $row_1)  
		{
	?><option><?php echo $row_1['Masp']?></option>
    <?php } ?></select></td>
  </tr>
  <tr>
  
    <td colspan="2"><div align="center">
      <INPUT type="submit" name="sua" value="SỬA">
    </div></td>
  </tr>
</table>

</form>
<?php } ?>