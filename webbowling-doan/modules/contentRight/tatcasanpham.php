<?php //truy cập database
include('modules/config.php');


function doitien($a){
	$b=number_format($a);
	return $b;
}
?>					 
<script src="framework/content-loaisanpham/js/modernizr.custom.63321.js"></script>
<?php 
	include('framwork-style/text-style-loading.php');
?>
<div id="mi-slider" class="mi-slider" style="height:600px;margin-top:260px">
	<ul>		<!-- trang banh-->	
				<?php

					if(isset($_GET['trang'])){
						$get_trang=$_GET['trang'];
					}else{
						$get_trang='';
					}
					if($get_trang=='' || $get_trang==1)
					{
						$trang1=0;
					}else{
						$trang1=($get_trang*8)-8;
					}
					$sql="select * from sanpham where Maloaisp='BA' limit $trang1,8"; // trang1 (vị trí sản phẩm hiện tại) , lấy 5 sản phẩm
					$objStm = $objPdo->query($sql);
					$data = $objStm->fetchAll(PDO::FETCH_ASSOC);
					foreach($data as $row){
						$masp=$row['Masp'];
					?>
    
        <li><a href="index.php?xem=Chitietsanpham&id=<?php echo $row['Masp'] ?>&idloai=<?php echo $row['Maloaisp'] ?>">
        <img src="sanpham/Banh/<?php echo $row['image']?>" alt="img01" >
        <h4><?php echo $row['Tensp']?></h4><br />
        <!------------------ code tính tiền sản phẩm sau khi sale -->
        <?php $sql_sale="select * from sales where Masp='$masp'";
										$objStmsale=$objPdo->query($sql_sale);
										$datasale=$objStmsale->fetchAll(PDO::FETCH_ASSOC);
										foreach($datasale as $rowsale){
											if($rowsale['Tinhtrangsale']==1){?>
		<h4 style="color:#F6F;height:20px"><marquee behavior="alternate" width="10%" style="color:#F00" >>></marquee><?php $t=$row['Giatien']*(1-$rowsale['Giatrisale']);echo doitien($t)?><marquee behavior="alternate" width="10%" style="color:#F00" ><<</marquee></marquee></h4>
        <marquee behavior="alternate" width="100%" ><h4 style="color:#F60">
        HOT.SALE&nbsp<?php echo $rowsale['Giatrisale']*100; ?> % </h4></marquee>
		<?php }
		 else if($rowsale['Tinhtrangsale']==0||$rowsale['Tinhtrangsale']=='')
		 { ?> <br /><h4><?php $t=number_format($row['Giatien']);echo $t?> VNĐ<?PHP } }?></h4></a></li>
 				<?php } ?>
                <br/>
                <li  style="width:600px;height:50px;margin-left:180px">
              
                <!-- phân trang sản phẩm -->    
				 <?php
                 $sql_sql="SELECT count(*) FROM sanpham where Maloaisp='BA'";
                    $result = $objPdo->query($sql_sql);
                    $row = $result->fetch(PDO::FETCH_NUM);
                    $a=ceil($row[0]/8);
                    for($b=1;$b<=$a;$b++){     
					?>
                    <a class="page" href="index.php?xem=tatcasanpham&id=1&trang=<?php echo $b ?>" style="float:left;width:30px;color:#000;margin-left:8px;"><?php echo $b?></a>
                    
                    <?php 
					}
                    ?>
                </li>
    </ul> <!-- end trang banh-->
<!------------------------------------------------------------------------------------------------------------------>
 
    <ul> <!-- trang giay -->
   				<?php
					
					if(isset($_GET['tranggi'])){
						$get_tranggi=$_GET['tranggi'];
					}else{
						$get_tranggi='';
					}
					if($get_tranggi=='' || $get_tranggi==1)
					{
						$trang1gi=0;
					}else{
						$trang1gi=($get_tranggi*8)-8;
					}
					$sqlgi="select * from sanpham where Maloaisp='GI' limit $trang1gi,8"; // trang1 (vị trí sản phẩm hiện tại) , lấy 5 sản phẩm
					$objStmgi = $objPdo->query($sqlgi);
					$datagi = $objStmgi->fetchAll(PDO::FETCH_ASSOC);
					foreach($datagi as $rowgi){
					?>
        <li><a href="index.php?xem=Chitietsanpham&id=<?php echo $rowgi['Masp'] ?>&idloai=<?php echo $rowgi['Maloaisp'] ?>"><img src="sanpham/Giay/<?php echo $rowgi['image']?>" alt="img01"><h4><?php echo $rowgi['Tensp']?></h4><h4><?php  $dtgi=$rowgi['Giatien'];echo doitien($dtgi)?> VNĐ</h4></a></li>
        <?php }?>
    		 <br/>
                <li style="width:600px;height:50px;margin-left:180px">
                	<?php
                	$sql_sqlgi="SELECT count(*) FROM sanpham where Maloaisp='GI'";
                    $resultgi = $objPdo->query($sql_sqlgi);
                    $rowgi = $resultgi->fetch(PDO::FETCH_NUM);
                    $a1=ceil($rowgi[0]/8);
                    for($b1=1;$b1<=$a1;$b1++){     
					?>
                    <a class="page" href="index.php?xem=tatcasanpham&id=1&tranggi=<?php echo $b1 ?>" style="float:left;width:30px;color:#000;margin-left:8px;"><?php echo $b1?></a>
                    <?php 
					}
                    ?>
                </li>
    </ul> <!-- end trang giay -->
    				<!------------------------------------------------------------------------------------------------------------------>

    <ul><!-- trang gang tay -->
    				<?php
					if(isset($_GET['trangga'])){
						$get_trangga=$_GET['trangga'];
					}else{
						$get_trangga='';
					}
					if($get_trangga=='' || $get_trangga==1)
					{
						$trang1ga=0;
					}else{
						$trang1ga=($get_trangga*8)-8;
					}
					$sqlga="select * from sanpham where Maloaisp='GA' limit $trang1ga,8"; // trang1 (vị trí sản phẩm hiện tại) , lấy 5 sản phẩm
					$objStmga = $objPdo->query($sqlga);
					$dataga = $objStmga->fetchAll(PDO::FETCH_ASSOC);
					foreach($dataga as $rowga){
					?>
        <li><a href="index.php?xem=Chitietsanpham&id=<?php echo $rowga['Masp'] ?>&idloai=<?php echo $rowga['Maloaisp'] ?>"><img src="sanpham/Gangtay/<?php echo $rowga['image']?>" alt="img01"><h4><?php echo $rowga['Tensp']?></h4><h4><?php $dtga=$rowga['Giatien'];echo doitien($dtga)?> VNĐ</h4></a></li>
        <?php }?>
        <br/>
                <li style="width:600px;height:50px;margin-left:180px">
                <?php
                	$sql_sqlga="SELECT count(*) FROM sanpham where Maloaisp='GA'";
                    $resultga = $objPdo->query($sql_sqlga);
                    $rowga = $resultga->fetch(PDO::FETCH_NUM);
                    $a2=ceil($rowga[0]/8);
                    for($b2=1;$b2<=$a2;$b2++){     
					?>
                    <a class="page" href="index.php?xem=tatcasanpham&id=1&trangga=<?php echo $b2 ?>" style="float:left;width:30px;color:#000;margin-left:8px;"><?php echo $b2?></a>
                    <?php 
					}
                    ?>
                </li>
    </ul> <!-- end gang tay-->
    
    <br /><br /><br />
    <nav >
        <a href="#">Banh Bowling</a>
        <a href="#">Giày Bowling</a>
        <a href="#">Găng tay Bowling</a>
    </nav>
</div>
<script src="framework/content-loaisanpham/js/jquery.min.js"></script>
<script src="framework/content-loaisanpham/js/jquery.catslider.js"></script>
<script type="text/javascript">
    $(function() {

        $( '#mi-slider' ).catslider();

	});
</script>