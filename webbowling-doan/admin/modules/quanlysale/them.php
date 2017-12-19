<?php
	include('modules/config.php'); 
?>
<script>
function kt(){
	$tt=document.getElementById('TTsale').value;
	$gt=document.getElementById('gtsale').value;
	if($tt==''){
		alert("check vào tình trạng sale");
		return false;
		}
	if($gt==''){
		alert("Điền giá trị sale cho sản phẩm (sale 10% = 0.1)");
		return false;
		} 
		return true;
	}
</script>
<form action="modules/quanlysale/xuly.php" method="post" onsubmit="return kt()">
<table width="100%" border="1">
  <tr>
    <td colspan="2"><div align="center">THÊM CHI TIẾT SALES</div></td>
  </tr>
  <tr>
    <td width="254">MÃ SẢN PHẨM SALES</td>
    <td width="243"><select name="Masp">
	<?php 
		$sql="select * from sanpham";
		$objStm=$objPdo->query($sql);
		$data=$objStm->fetchAll(PDO::FETCH_ASSOC);
		foreach($data as $row){ ?><option><?php echo $row['Masp']?></option>	
	<?php } ?></select></td>
  </tr>
  <tr>
    <td>TÌNH TRẠNG SALE</td>
    <td>&nbsp;<input type="radio" name="ttsale" value="1" id="TTsale">Có &nbsp;
    <input type="radio" name="ttsale" value="0" id="TTsale">Không &nbsp;
    </td>
  </tr>
  <tr>
    <td>GIÁ TRỊ SALE (10%=0.1)</td>
    <td><input type="text" name="giatri" id="gtsale"></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="them" value="THÊM">
    </div></td>
  </tr>
</table>
</form>