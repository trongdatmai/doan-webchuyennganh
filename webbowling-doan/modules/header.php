<?php	
	include('modules/config.php');
	session_start();
	if(isset($_POST['submit-dn'])){
		$tk= addslashes($_POST['login']);
		$mk= md5($_POST['password']);
		
		if($tk==""){
		echo '<script>alert("Nhập username bạn ơi");</script>';
		}else if($mk==""){
		echo '<script>alert("Nhập password bạn ơi");</script>';
		}	
		$sql="select * from khachhang where id='$tk' and password='$mk' limit 1";
		$objStm=$objPdo->query($sql);
		$count=$objStm->fetchAll(PDO::FETCH_NUM); // số thứ tự cột	
		$data=$objStm->fetchAll(PDO::FETCH_ASSOC);
		if($count[0]>0){
			//foreach($data as $row){
			$_SESSION['dangnhap']=$tk;//$row['email'];		
			header('location:index.php?xem=giohang');	//}
		}else{
			echo '<script>alert("Đăng nhập thất bại: Sai id hoặc password!")</script>';
			}
		}	
		if(isset($_POST['submit-dx'])){
			unset($_SESSION['dangnhap']);
			}
?>
 <div class="header" >
    <!-- đồng hồ -->
     	 <div id="clock" class="light" style="width:500px; float:left;margin-top:10px;margin-left:80px;border-radius:30px">
                    <div class="display" style="height:100px">
                        <div class="weekdays" ></div>
                        <div class="ampm" ></div>
                        <div class="alarm" ></div>
                        <div class="digits" ></div>
                    </div>
                    
                </div>
                <div class="zero"> 
                    <span class="d1" ></span>
                    <span class="d2"></span>
                    <span class="d3"></span>
                    <span class="d4"></span>
                    <span class="d5" ></span>
                    <span class="d6" ></span>
                    <span class="d7"></span>
                </div>
                <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
                <script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.0.0/moment.min.js"></script>
                <script src="framework/digital-clock/assets/js/dongho.js"></script>
                <!-- end đồng hồ-->
                <!-- dự báo thời tiết -->
        <!-- <div class="weather-wrapper" style="width:250px;height:250px;float:left">
            <div class="weather-card hcm">
                <div class="weather-icon cloud" ></div>
                    <h1>26º</h1>
                    <p>Hồ Chí Minh</p>
    			</div> 
    		</div>
                <!-- end thời tiết-->
                <!---------- form đăng nhập ---->
      <br/><br />
       <div style="margin-left:600px">
        <form  action="" class="form-3" method="post" style="margin:0px 300px;" enctype="multipart/form-data">
       <?php if(!isset($_SESSION['dangnhap'])){?>
            <p class="clearfix">
                <label for="login">Username</label>
                <input type="text" name="login"  placeholder="Username">
            </p>
            <p class="clearfix">
                <label for="password">Password</label>
                <input type="password" name="password"  placeholder="Password"> 
            </p>
        
          
           <!-- <p class="clearfix" >
                <input type="checkbox" name="remember" id="remember" style="width:20px;float:left;margin-top:10px">
                <label for="remember" style="width:100px; float:left">Ghi nhớ đăng nhập</label>
    	 <p class="clearfix">	-->
                <input  type="submit" name="submit-dn" value="Đăng nhập" style="width:140px;float:right"><BR />
            </p>
             <p><a href="index.php?xem=DangKy&id=1" style="color:#00F;">Đăng ký thành viên</a></p>   
           <!--  <p><a href="index.php?xem=GioiThieu&id=1" style="color:#00F;float:left;margin-left:10px">Tìm lại mật khẩu? </a></p>-->
             <?php } else{
					$c=$_SESSION['dangnhap'];	
				 ?>
             
           	<h3 style="color:#F00;text-align:center;font-size:24px">Xin chào <?php echo $c?></h3>
            <br/><Br />
            <p class="clearfix">
                <input  type="submit" name="submit-dx" value="Đăng xuất" style="width:140px;float:right;">
            </p>
 			
            <br /><br /><br />
			  <?php 
			 }
			 ?>

                 
   	 </form>
     
     </div>
	<?php include('header/header-botom.php');?>
</div>
