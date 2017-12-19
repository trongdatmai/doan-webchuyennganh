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

<form action="modules/banh/xuly.php?" method="post" enctype="multipart/form-data" onsubmit="return kt()">
<table width="100%" border="1">
  <tr>
    <td colspan="2"><div align="center">THÊM THÔNG TIN BANH</div></td>
  </tr>
  <tr>
    <td>RUỘT BANH</td>
    <td><input type="text" name="ruotbanh" id="ruotbanh"></td>
  </tr>
  <tr>
    <td>MÀU SẮT</td>
    <td><input type="text" name="color" id="color"></td>
  </tr>
  <tr>
    <td>LỖ KHOAN</td>
    <td><input type="text" name="lokhoan" id="lokhoan"></td>
  </tr>
  <tr>
    <td>CHẤT LƯỢNG BANH</td>
    <td><input type="text" name="chatluongbanh" id="chatluongbanh"></td>
  </tr>
  <tr>
    <td>LANE PHÙ HỢP</td>
    <td><input type="text" name="lanephuhop" id="lanephuhop"></td>
  </tr>
  <tr>
    <td>HIỆU NĂNG</td>
    <td><input type="text" name="hieunang" id="hieunang"></td>
  </tr>
  
  <tr>
    <td>MÃ SẢN PHẨM;</td>
    <td><select name="masp" style="width:80px;"><?php
  	$sql="select Masp from sanpham";
	$objStm=$objPdo->query($sql);
	$data=$objStm ->fetchAll(PDO::FETCH_ASSOC);
	foreach($data as $row){
		
  ?><option><?php echo $row['Masp'];?></option><?php } ?></select></td>
  </tr>
  <tr>
  
    <td colspan="2"><div align="center">
      <INPUT type="submit" name="them" value="THÊM" onclick="return confirm('Bạn có chắc chắn thông tin nhập vào không')">
    </div></td>
  </tr>
</table>

</form>