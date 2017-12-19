<link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
<style>
	
	table tr td{
		text-align:center;
		font-family:Georgia, "Times New Roman", Times, serif;
		background:#B4B4B4;
		color:#000;
		}
	table tr td.chan{
		background:#fff;
		color:#00CCFF;
		
		}
</style>
<?php //truy cập database
include('modules/config.php');
$id=$_GET['id'];
$idloai=$_GET['idloai'];
function doitien($a)
{	// 7 000 000
	$b=substr($a, -3);
	$c=substr($a, -6,3);
	if(strlen($a)>6){
	$d=substr($a, -7,1);
	$e=$d.','.$c.','.$b;
	}else
	$e=$c.','.$b;
	return $e;
}
?>
<div class="contentRightleft" style="width:950px;height:1100px;">
		<?php 
			$sql="select * from sanpham where Masp='$id'";
			$objStm=$objPdo->query($sql);
			$data=$objStm->fetchAll(PDO::FETCH_ASSOC);
			foreach($data as $row){
		?>
	<div class="img-spct" style="width:600px;height:300px;border-radius:25px;float:left">
    
    <img src="<?php if($row['Maloaisp']=='BA'){?>sanpham/Banh/<?php echo $row['image'];}
               else if($row['Maloaisp']=='GI'){?>sanpham/Giay/<?php echo $row['image'];}
				else if($row['Maloaisp']=='GA'){?>sanpham/Gangtay/<?php echo $row['image'];}?>" style="width:300px;height:300px;margin-left:150px;padding:10px;border-radius:45px" /></div>
                <!----------------------->
    <div class="formSanphamtuychon" style="float:left;width:260px;height:350px">
        <form class="pure-form pure-form-stacked" action="" style="width:254px;border:2px solid #000;background:#ccc" enctype="multipart/form-data">
            <fieldset>
                <legend style="background:#000;color:#FFF;width:250px;font-style:italic;text-align:center">Đặt thêm theo yêu cầu khách hàng</legend> 
                <div class="pure-g">                    
                    <div class="pure-u-1 pure-u-md-1-3">
                        <label for="weight" style="background:#000;color:#FFF;width:250px;text-align:center">SIZE</label>
                        <select id="state" class="pure-input-1-2" style="width:250px">
                           <?php $sql_3="select * from loaisize where Masp='$id'";
					$objStm_3=$objPdo->query($sql_3);
					$data_3=$objStm_3->fetchAll(PDO::FETCH_ASSOC);
					foreach($data_3 as $row_3){?> <option><?php echo $row_3['size']?></option><?php }?>
               	         </select>
                        <label for="DrillingOptions" style="background:#000;color:#FFF;width:250px;text-align:center">Thửa hàng riêng</label>
                        <select id="DrillingOptions" class="pure-input-1-2" style="width:250px">
                            <option>Không, cảm ơn</option>
                            <option>Khoang tùy chỉnh, +40$</option>
                            <option>Phối màu, +20$</option>
                            <option>Kiểu dáng, +20$</option>
                        </select>
                        <label for="DrillingProtections" style="background:#000;color:#FFF;width:250px;text-align:center">Bảo vệ sản phẩm</label>
                        <select id="DrillingProtections" class="pure-input-1-2" style="width:250px">
                            <option>Không, cản ơn</option>
                            <option>Có,banh +30$</option>
                            <option>Có,giày +15$</option>
                            <option>Có,găng tay +5$</option>
                        </select>
                        <label for="BaoHnah" style="background:#000;color:#FFF;width:250px;text-align:center">x2 Thời gian bảo hành</label>
                        <select id="BaoHanh" class="pure-input-1-2" style="width:250px">
                            <option>Không, cảm ơn</option>
                            <option>Có, +30$</option>
                        </select>	
                    </div>
                </div>  
              <!--  <input type="submit" name="chuyengio" value="Chuyển giỏ hàng/ thanh toán" style="width:200px;font-size:14px;background:#000;text-align:center;margin-left:25px;border-radius:5px;margin-top:10px;height:45px" />---><?php if($row['Maloaisp']=='BA'){?><div style="width:200px;height:40px;border-radius:10px;margin-left:25px;line-height:35px;text-align:center"><a href="index.php?xem=giohang&add=<?php echo $row['Masp']?>" style="color:#FFF"><img src="background/content/buynow2.jpg" width="150px" height="40px"/></a></div><?php }else{ ?>
              
              <div style="width:200px;height:40px;background:#000;border-radius:10px;margin-left:25px;line-height:35px;text-align:center"><input type="text"  value="Chuyển giỏ hàng/Thanh toán"  disabled="disabled" style="font-size:14px"/></div>
              <?php } ?>
              
            </fieldset>
            
        </form>
       
	</div> 
    <!----- sao vote------------->
	<div class="start-top" style="width:600px;height:80px;margin-top:10px">
    	<p style="width:170px;height:50px;float:left;color:#000;font-family:Georgia, 'Times New Roman', Times, serif;font-size:30px;font-style:oblique;margin-top:15px">Bình chọn: </p>
    	<div class="stars" style="float:left;border-radius:15px;">
          <form action="" >
            <input class="star star-5" id="star-5" type="radio" name="star"/>
            <label class="star star-5" for="star-5"></label>
            <input class="star star-4" id="star-4" type="radio" name="star"/>
            <label class="star star-4" for="star-4"></label>
            <input class="star star-3" id="star-3" type="radio" name="star"/>
            <label class="star star-3" for="star-3"></label>
            <input class="star star-2" id="star-2" type="radio" name="star"/>
            <label class="star star-2" for="star-2"></label>
            <input class="star star-1" id="star-1" type="radio" name="star"/>
            <label class="star star-1" for="star-1"></label>
          </form>
        </div>
    </div>
    
    <table width="900px" border="1px">
    	<tr>
        
        	<td>Mã sản phẩm:</td>
            <td class="chan"><?php echo $row['Masp']?></td>
            <td>Tên sản phẩm:</td>
            <td class="chan"><?php echo $row['Tensp']?></td>
        </tr>
        <tr>
        	<td >Gía tiền:</td>
            <?php $sql_sale="select * from sales where Masp='$id'";
										$objStmsale=$objPdo->query($sql_sale);
										$datasale=$objStmsale->fetchAll(PDO::FETCH_ASSOC);
										foreach($datasale as $rowsale){
											if($rowsale['Tinhtrangsale']==1){?>
            <td class="chan"><?php $a=number_format($row['Giatien']*(1-$rowsale['Giatrisale']),3);echo $a?> VNĐ <p>(SALE <?PHP echo $rowsale['Giatrisale']*100 ?> %)</p></td>
        	
            <?php }else{?>
            <td class="chan"><?php $a=number_format($row['Giatien']);echo $a?> VNĐ</td>
			<?php } }?>
            <td>Hãng sản xuất:</td>
            <td class="chan"><?php echo $row['Hangsx']?></td>
        </tr>
        <tr>
        	<td>Mô tả sản phẩm:</td>
            <td colspan="3" class="chan"><?php echo $row['Noidung'] ?></td>
        </tr>
        
        <tr>
        	<td>Thời gian bảo hành:</td>
            <td class="chan"><?php echo $row['Baohanh']?></td>
            <?php }
			$sql_1="select * from banh where Masp='$id'";
			$objStm_1=$objPdo->query($sql_1);
			$data_1=$objStm_1->fetchAll(PDO::FETCH_ASSOC);
			foreach($data_1 as $row_1){
			?>
        	<td>Lõi banh:</td>
            <td class="chan"><?php echo $row_1['Ruotbanh']?></td>
        </tr>
        <tr>
        	<td>Màu sắc:</td>
            <td class="chan"><?php echo $row_1['Color']?></td>
        	<td>Lỗ khoan:</td>
            <td class="chan"><?php echo $row_1['Lokhoan']?></td>
        </tr>
        <tr> 
        	<td>Chất lượng banh:</td>
            <td class="chan"><?php echo $row_1['Chatluongbanh']?></td>
        	<td>Lane phù hợp:</td>
            <td class="chan"><?php echo $row_1['Lanephuhop']?></td>
        </tr>
        <tr>
        	<td>Hiệu năng banh:</td>
            <td class="chan"><?php echo $row_1['Hieunang']?></td>
            <?php }?>
			
            
        	<td>Size banh hiện có</td>
            <td class="chan"><select style="width:100px;border-radius:10px;margin-left:10px;border:2px solid #000"><?php $sql_2="select * from loaisize where Masp='$id'";
			$objStm_2=$objPdo->query($sql_2);
			$data_2=$objStm_2->fetchAll(PDO::FETCH_ASSOC);
			foreach($data_2 as $row_2){?><option><?php echo $row_2['size']?></option><?php }?></select> </td>      
    </table>
   
     
 	<!---------------------SHOW SẢN PHẨM CÙNG LOẠI ----------------------------->
    
    <p style="color:#00F;font-size:24px;margin-top:10px;text-align:center;"><h2 align="center">SẢN PHẨM CÙNG LOẠI</h2><p>
   <?php 
   	$sql_spcl="select * from sanpham where Maloaisp='$idloai' order by rand() limit 3";
	$objStm_spcl=$objPdo->query($sql_spcl);
	$data_spcl=$objStm_spcl->fetchAll(PDO::FETCH_ASSOC);
	foreach($data_spcl as $row_spcl){
		$maspcl=$row_spcl['Masp'];
    ?>
 <div class="container-item" style="width:250px;height:200px">
                <div class="item">
                    <div class="item-overlay">
                        <a href="index.php?xem=Chitietsanpham&id=<?php echo $row_spcl['Masp'] ?>&idloai=<?php echo $row_spcl['Maloaisp']?>" class="item-button info"><i class="fa fa-info"></i></a>
                        <a href="#" class="item-button share share-btn">
                            <i class="fa fa-share-alt"></i></a>
                            <!-------------- code gắn mác sale cho sản phẩm sale -->
                        <?php $sql_sale2="select * from sales where Masp='$maspcl'";
										$objStmsale2=$objPdo->query($sql_sale2);
										$datasale2=$objStmsale2->fetchAll(PDO::FETCH_ASSOC);
										foreach($datasale2 as $rowsale2){
											if($rowsale2['Tinhtrangsale']==1){?>
                                        <div class="sale-tag"><span>SALE</span></div><?php } }?>
                    </div>
                    <!-- item image -->
                    <div class="item-img">
                        <img src="<?php if($row_spcl['Maloaisp']=='BA')
										{?>sanpham/Banh/<?php echo $row_spcl['image'];}
                                    	else if($row_spcl['Maloaisp']=='GI'){?>sanpham/Giay/<?php echo $row_spcl['image'];}
										else if($row_spcl['Maloaisp']=='GA'){?>sanpham/Gangtay/<?php echo $row_spcl['image'];}?>" width="260" height="260" />
                    </div>
                    <!-- end item image -->
                    <div class="item-content">
                        <div class="item-top-content">
                            <div class="item-top-content-inner">
                                <div class="item-product">
 
                                    <div class="item-top-title">
                                        <h3><?php echo $row_spcl['Tensp'] ?></h3>
                                        <p class="subdescription">
                                          Hãng sx:  <?php echo  $row_spcl['Hangsx']?>
                                        </p>
                                        <p class="subdescription">
                                          Bảo hành:  <?php echo  $row_spcl['Baohanh']?>
                                        </p>
                                    </div>
                                </div>
                                <div class="item-product-price">   
                          			<?php $sql_sale3="select * from sales where Masp='$maspcl'";
										$objStmsale3=$objPdo->query($sql_sale3);
										$datasale3=$objStmsale3->fetchAll(PDO::FETCH_ASSOC);
										foreach($datasale3 as $rowsale3){
											if($rowsale3['Tinhtrangsale']==1){?>
                                            <!--- code cập nhật giá sản phẩm sau khi sale-->
									<span class="price-num"><?php echo $b1=number_format($row_spcl['Giatien']*(1-$rowsale3['Giatrisale']))?></span>				                         
                                     <span class="subdescription"><?php  $a1=number_format($row_spcl['Giatien']);echo $a1?> VNĐ</span>
                                      <div class="old-price"></div>
                                      <?php }else if($rowsale3['Tinhtrangsale']==0||$rowsale3['Tinhtrangsale']==''){?>
                                      <span class="price-num"><?php  $a1=number_format($row_spcl['Giatien']);echo $a1?> VNĐ</span>
									 <?php } } ?>	
                                </div>
                            </div>  
                        </div>
                        <div class="item-add-content">
                            <div class="item-add-content-inner">
                                <div class="section">
                                    <h4>Sizes</h4>	
                                    <p>40,41,42,43,44,45</p>
                                </div> 
                                <div class="section">
                                    <a href="index.php?xem=giohang&add=<?php echo $row_spcl['Masp']?>" class="btn buy expand">Đặt mua ngay</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Social icons -->
                <div class="item-menu popout-menu">
                    <ul>
                        <li><a href="#" class="popout-menu-item"> <i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="popout-menu-item"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#" class="popout-menu-item"> <i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#" class="popout-menu-item"> <i class="fa fa-tumblr"></i></a></li>
                        <li><a href="#" class="popout-menu-item"> <i class="fa fa-envelope"></i></a></li>
                    </ul>
                </div>
                <!-- end social icons -->
		 </div>
<?php } ?>
    <!-------------------------------------------------->
</div>

>>>>