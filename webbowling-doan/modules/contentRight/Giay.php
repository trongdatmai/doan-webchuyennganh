<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
<?php 


	include('modules/config.php');
	$id_name=$_GET['id'];

					if(isset($_GET['trang'])){
						$get_trang=$_GET['trang'];
					}else{
						$get_trang='';
					}
					if($get_trang=='' || $get_trang==1)
					{
						$trang1=0;
					}else{
						$trang1=($get_trang*9)-9;
					}
					$sql="select * from sanpham where Maloaisp='GI' limit $trang1,9"; // trang1 (vị trí sản phẩm hiện tại) , lấy 5 sản phẩm
					$objStm = $objPdo->query($sql);
					$data = $objStm->fetchAll(PDO::FETCH_ASSOC);
					foreach($data as $row){
				
					
?>

<div class="sanpham" style="float:left">
     <div class="container-item">
                <div class="item">
                    <div class="item-overlay">
                        <a href="index.php?xem=Chitietsanpham&id=<?php echo $row['Masp'] ?>&idloai=<?php echo $row['Maloaisp']?>" class="item-button info"><i class="fa fa-info"></i></a>
                        <a href="#" class="item-button share share-btn">
                            <i class="fa fa-share-alt"></i></a>
                        
                    </div>
                    <!-- item image -->
                    <div class="item-img">
                        <img src="<?php if($row['Maloaisp']=='BA')
										{?>sanpham/Banh/<?php echo $row['image'];}
                                    	else if($row['Maloaisp']=='GI'){?>sanpham/Giay/<?php echo $row['image'];}
										else if($row['Maloaisp']=='GA'){?>sanpham/Gangtay/<?php echo $row['image'];}?>" width="260" height="260" />
                    </div>
                    <!-- end item image -->
                    <div class="item-content">
                        <div class="item-top-content">
                            <div class="item-top-content-inner">
                                <div class="item-product">
 
                                    <div class="item-top-title">
                                        <h3><?php echo $row['Tensp'] ?></h3>
                                        <p class="subdescription">
                                          Hãng sx:  <?php echo $row['Hangsx']?>
                                        </p>
                                        <p class="subdescription">
                                          Bảo hành:  <?php echo $row['Baohanh']?>
                                        </p>
                                    </div>
                                </div>
                                <div class="item-product-price">                             
                                     <span class="price-num"><?php  $a=number_format($row['Giatien']);echo $a?> VNĐ</span>
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
                                    <a href="#" class="btn buy expand">Buy now</a>
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
 </div>

 <?php } ?>
 <!-- phân trang-->
 <div style="margin-left:300px;width:500px;height:50px;margin-top:700px">
 <?php
                 $sql_sql="SELECT count(*) FROM sanpham where Maloaisp='GI'";
                    $result = $objPdo->query($sql_sql);
                    $row = $result->fetch(PDO::FETCH_NUM);
                    $a=ceil($row[0]/9);
                    for($b=1;$b<=$a;$b++){     
					?>
                    <ul class="pagination modal-4">
                      
                      <li><a href="index.php?xem=giay&id=GI&trang=<?php echo $b ?>" ><?php echo $b?></a></li>
                      
                      
                    </ul>
                    <?php 
					}
                    ?>
 </div>
 
<script type="text/javascript">
   $(document).ready(function() {
 
        $(".share-btn").mouseenter(function() {
 
            // find the closest class .item-menu
             
            $(this).closest("div.container-item").find(".item-menu").addClass("visible")
        });
        $(".share-btn").mouseleave(function() {
            setTimeout(function() {
            $(".item-menu").removeClass("visible")
            }, 500);
        });
 
         
 
        $(".container-item").hover(function() {
            setTimeout(function() {
            $(".container-item").css("z-index","1000")
            }, 500);
        });
 
 
});
 
</script> 
