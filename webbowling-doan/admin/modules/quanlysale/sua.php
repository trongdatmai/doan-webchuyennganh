<?php
	include('modules/config.php'); 
	$id=$_GET['id'];
	$sql="select * from sales where Masp='$id'";
	$objStm=$objPdo->query($sql);
	$data=$objStm->fetchAll(PDO::FETCH_ASSOC);
		
	 foreach($data as $row){ ?>
<form action="modules/quanlysale/xuly.php?id=<?php  echo $row['Masp']?>" method="post">
<table width="100%" border="1">
  <tr>
    <td colspan="2"><div align="center">THÊM CHI TIẾT SALES</div></td>
  </tr>
 
  <tr>
    <td width="254">MÃ SẢN PHẨM SALES</td>
    <td width="243"><select disabled><option><?php echo $row['Masp']?></option></select></td>
  </tr>
  <tr>
    <td>TÌNH TRẠNG SALE</td>
   
    <td>&nbsp;<input type="radio" name="ttsale" value="1" <?php if ($row['Tinhtrangsale']==1){?> checked="true"<?php }?>>Có &nbsp;
    &nbsp;<input type="radio" name="ttsale" value="0" <?php if ($row['Tinhtrangsale']==0){?> checked="true"<?php }?>>Không
    </td>
  </tr>
  <tr>
    <td>GIÁ TRỊ SALE (10%=0.1)</td>
    <td><input type="text" name="giatri" value="<?php echo $row['Giatrisale']?>" ></td>
  </tr>
  
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="sua" value="SỬA">
    </div></td>
  </tr>
</table>
</form>
<?php } ?> 