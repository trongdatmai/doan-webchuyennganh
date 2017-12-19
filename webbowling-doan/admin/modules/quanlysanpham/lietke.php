

 <style>
 .firstrow{
	 background:#0CF;
	 color:#000;
	 text-align:center;
	 }
	a{
		text-decoration:none}

 a:hover{
	 color:#F00;
	 }
 </style>
<div style="font-size:30px;color:#F00;float:right">QUẢN LÝ THÔNG TIN SẢN PHẨM</div>
 TRANG:
<?php 
	function kttimkiem($string){
	if(preg_match("/^[a-zA-Z0-9._-]*$/",$string))
		return true;
	return false;
	}
	if(isset($_GET['trang'])){
		$get_trang=$_GET['trang'];
	}else{
		$get_trang='';
	}
	if($get_trang=='' || $get_trang==1)
	{
		$trang1=0;
	}else{
		$trang1=($get_trang*5)-5;
	}
	
	$sql="select * from sanpham limit $trang1,5"; // trang1 (vị trí sản phẩm hiện tại) , lấy 5 sản phẩm
	$objStm = $objPdo->query($sql);
	$data = $objStm->fetchAll(PDO::FETCH_ASSOC);
	
	//-------//đếm số dòng có trong sản phẩm -> tương ứng đếm số sản phẩm
	$sql_sql="SELECT count(*) FROM sanpham";
	$result = $objPdo->query($sql_sql);
	$row = $result->fetch(PDO::FETCH_NUM);
	$a=ceil($row[0]/5);
	
	for($b=1;$b<=$a;$b++){
		echo '<a href="index.php?quanly=quanlysanpham&ac=them&trang='.$b.'" style="text-decoration:none;">'.' '. $b .' '.'</a>';	
	}
	echo '<br>'.'TỔNG SẢN PHẨM LÀ: '.$row[0];
	// ---------------------------- tìm kiếm sp
	if(isset($_POST['sub-timkiem'])){
	$matk=$_POST['timkiem'];
	if(kttimkiem($matk)==false){
		echo '<script>alert("Không được nhập kí tự đặc biệt trong tìm kiếm")</script>';
	}else{
	$sql_tk="select * from sanpham where Masp='$matk'";
	$objStmtk = $objPdo->query($sql_tk);
	$datatk = $objStmtk->fetchAll(PDO::FETCH_ASSOC);
        foreach($datatk as $rowtk)
        { 
			$m=$rowtk['Masp'];
			if($matk=='$m'){
				echo '<script>alert("Không tìm thấy mã sản phẩm")</script>';
			}else{
	?>
    <BR /><hr /><p style="color:#000;background:#3F6">SẢN PHẦM TÌM KIẾM:</p>
	<table width="100%" border="1">
      <tr>
      	
        <td>MÃ SẢN PHẨM</td>
        <td>TÊN SẢN PHẨM</td>
        <td>GIÁ TIỀN</td>
        <td>HÌNH ẢNH</td> 
        <td>HÃNG SX</td>
        <td>NỘI DUNG</td>
        <td>BẢO HÀNH</td>  
        <td>SỐ LƯỢNG</td>    
        <td>MÃ LOẠI SẢN PHẨM</td>
        <td colspan="2">QUẢN LÝ</td>
      </tr>
      
      <tr>
      	
        <td><?php echo $rowtk['Masp'] ?></td>
        <td><?php echo $rowtk['Tensp'] ?></td>
        <td><?php echo $atk=number_format($rowtk['Giatien'],3) ?></td>
        <td><img src="modules/quanlysanpham/uploads/<?php echo $rowtk['image'] ?>" style="width:50px;height:50px" /></td>
        <td><?php echo $rowtk['Hangsx'] ?></td>
        <td><?php echo $rowtk['Noidung'] ?></td>
        <td><?php echo $rowtk['Baohanh'] ?></td> 
        <td><?php echo $rowtk['Soluong']?></td>     
        <td><?php echo $rowtk['Maloaisp'] ?></td>
        <td><a href="index.php?quanly=quanlysanpham&ac=sua&id=<?php echo $rowtk['Masp'] ?>"><div class="glyphicon glyphicon-pencil" style="font-size:40px"></div></a></td>
        <td><a href="modules/quanlysanpham/xuly.php?id=<?php echo $rowtk['Masp'];?>" onclick="return confirm('Bạn có chắc xóa sản phẩm <?php echo $rowtk['Tensp']?> chứ')"><div class="glyphicon glyphicon-trash" style="font-size:40px"></div></a></td>
        
      </tr>
      <?php	
       		} 
		}
		}
	?>
	</table>
	<p style="background:#3F6;height:20px"></p>
	<?php } ?>
    <!------- END CODE TÌM KIẾM --------->
     <br />
<p style="width:200px;color:#00F;size:20px;font-style:inherit;float:left"> TRANG HIỆN TẠI LÀ: <?php echo $get_trang?></p>
<form action="" method="post" style="float:right">
		MÃ SẢN PHẨM:<input type="text" name="timkiem" />
    <input type="submit" name="sub-timkiem" value="tìm kiếm sản phẩm" />
</form>
<table width="100%" border="1" >
  <tr class="firstrow" >
    <td>MÃ SẢN PHẨM</td>
        <td>TÊN SẢN PHẨM</td>
        <td>GIÁ TIỀN</td>
        <td>HÌNH ẢNH</td> 
        <td>HÃNG SX</td>
        <td>NỘI DUNG</td>
        <td>BẢO HÀNH</td>  
        <td>SỐ LƯỢNG</td>    
        <td>MÃ LOẠI SẢN PHẨM</td>
    <td>SỬA</td>
    <td>XÓA</td>
   
  </tr>
  <?php
  	foreach($data as $row)
	{ 
  ?>
  <tr>
    <td><?php echo $row['Masp'] ?></td>
    <td><?php echo $row['Tensp'] ?></td>
    <td><?php echo $a=number_format($row['Giatien'],3) ?></td>
    <td><img src="modules/quanlysanpham/uploads/<?php echo $row['image'] ?>" style="width:50px;height:50px" /></td>
  
    <td><?php echo $row['Hangsx'] ?></td>
    <td><?php echo $row['Noidung'] ?></td>
    <td><?php echo $row['Baohanh'] ?></td>
    <TD><?php echo $row['Soluong']?></TD>
    <td><?php echo $row['Maloaisp'] ?></td>
    <td ><a href="index.php?quanly=quanlysanpham&ac=sua&id=<?php echo $row['Masp'] ?>"><div class="glyphicon glyphicon-pencil" style="font-size:40px"></div></a></td>
    
    <td ><a href="modules/quanlysanpham/xuly.php?id=<?php echo $row['Masp'];?>" onclick="return confirm('Bạn có chắc xóa sản phẩm <?php echo $row['Tensp']?> chứ')"><div class="glyphicon glyphicon-trash" style="font-size:40px"></div></a></td>
    
  </tr>
  <?php	
   } 
   ?>
</table>
<BR /><HR />

