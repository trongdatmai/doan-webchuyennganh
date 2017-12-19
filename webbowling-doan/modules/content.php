
 <div class="content" style="height:1050px;background:url(background/header/header22.jpg)">
 		<div class="left" style="height:800px;width:270px;float:left;" >
    	<?php
			 include('contentLeft/contentleft.php');
     	?>
        </div>
        <div class="right" style="width:950px;height:790px;float:right;margin-top:10px" > 
        <?php
		include('modules/config.php');
			if(isset($_GET['xem'])){
				$tam=$_GET['xem'];
			}else{
				$tam='';
			}if($tam=='Lienhe'){
				include('contentRight/Lienhe.php');
			}if($tam=='hoadon'){
				include('contentRight/hoadon.php');
			}if($tam=='GioiThieu'){
				include('contentRight/GioiThieu.php');
			}if($tam=='Chitietsanpham'){
				include('contentRight/Chitietsanpham.php');
			}if($tam=='DangKy'){
				include('contentRight/DangKy.php');
			}if($tam=='tatcasanpham'){
				include('contentRight/tatcasanpham.php');
			}if($tam=='sanphambanchay'){
				include('contentRight/sanphambanchay.php');
			}if($tam=='banh'){
				include('contentRight/banh.php');
			}if($tam=='giay'){
				include('contentRight/Giay.php');
			}if($tam=='gangtay'){
				include('contentRight/gangtay.php');
			}if($tam=='giohang'){
				include('contentRight/giohang.php');
			}if($tam=='timkiem'){
				include('contentRight/timkiem.php');
			}if($tam=='chitiethoadon'){
				include('contentRight/chitiethoadon.php');
			}if($tam=='index' || $tam==''){
					include('contentRight/tatcasanpham.php');
			}
		?>
        
            	<!--<form class="pure-form pure-form-stacked">
                	<fieldset>
                    	<legend style="font-size:24px;">ĐĂNG KÝ</legend>
                        <div class="pure-g">
                        	<div class="pure-u-1 pure-u-md-1-3">
                            	<label for="tendn">Tên đăng ký</label>
                               	<input id="tendangnhap" class="pure-u-23-24" type="text">  
                            </div>
                            <div class="pure-u-1 pur-u-md-1-3">
                            	<label for="matkhau">Mật khẩu</label>
                                <input id="matkhau" class="pure-u-23-24" type="text" />
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>-->
       <!---     <p style="font-size:26px;color:#FFF">Đăng ký</p>
            <div style="width:450px;height:500px; background:#C09;float:left;margin-top:20px;"> 
                    <form class="pure-form pure-form-stacked">
                            <fieldset>
                                <div class="pure-g">
                                    <div class="pure-u-1 pure-u-md-1-3">
						                <label for="last-name">Tên đăng nhập</label>
						                <input id="last-name" class="pure-u-23-24" type="text">
						            </div>
						             <div class="pure-u-1 pure-u-md-1-3">
						                <label for="last-name">Mật khẩu</label>
						                <input id="last-name" class="pure-u-23-24" type="text">
						            </div>
                                    <div class="pure-u-1 pur-u-md-1-3">
                                        <label for="matkhau">Họ và tên</label>
                                        <input id="matkhau" class="pure-u-23-24" type="text" />
                                    </div>
                                </div>
                            </fieldset>
                        </form>
             </div>
            <div style="width:450px;background:#C09;height:500px; float:right;margin-right:20px;margin-top:20px;">
            	<form class="pure-form pure-form-stacked">
                            <fieldset>
                                <div class="pure-g">
                                    <div class="pure-u-1 pure-u-md-1-3">
						                <label for="last-name">Tuổi</label>
						                <input id="last-name" class="pure-u-23-24" type="text">
						            </div>
						             <div class="pure-u-1 pure-u-md-1-3">
						                <label for="last-name">Last Name</label>
						                <input id="last-name" class="pure-u-23-24" type="text">
						            </div>
                                    <div class="pure-u-1 pur-u-md-1-3">
                                        <label for="matkhau">Mật khẩu</label>
                                        <input id="matkhau" class="pure-u-23-24" type="text" />
                                    </div>
                                </div>
                            </fieldset>
                     	</form>
            </div>-->
       </div>
</div>