<?php 
// kiểm tra tài khoản
	function checkString($string){
	if (preg_match("/^[a-zA-Z0-9._-]*$/",$string)) 
		return true;
	return false;
	}
	function checksdt($string){
	if (preg_match("/^[0-9]*$/",$string)) 
		return true;
	return false;
	}
	// kiểm tra email
	function checkEmail($string)
	{ 
		if (preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/", $string))
		 return true;
		return false;	
		
	}
	// kiểm tra mật khẩu
	function checkMK($string){
		if(preg_match("/^[a-zA-Z0-9._-]{8,20}$/",$string));
			return  true;
		return false;
	}
	include('modules/config.php');
	if(isset($_POST['dangky'])){
		$taikhoan=$_POST['emaildn-dk'];
		$matkhau=md5($_POST['matkhau-dk']);
		$matkhau2=md5($_POST['rematkhau-dk']);
		$tenkh=$_POST['hotenkh-dk'];
		$email=$_POST['email-dk'];
		$sdt=$_POST['sdt'];
		if($matkhau!=$matkhau2){
			echo '<script>alert("Nhập lại mật khẩu!")</script>';
			exit();
		}if(!preg_match("/[0-9]/",$sdt)){
			echo '<script>alert("Sđt chỉ nhập số!")</script>';exit();
		}if(checkString($taikhoan)==false){
				echo '<script>alert("Tài khoản không được nhập kí tự đặt biệt")</script>';	exit();
		}if(checkEmail($email)==false){
			echo '<script>alert("Email không hợp lệ")</script>';exit();
		}if(checkMK($matkhau)==false){
			echo '<script>alert("Mật khẩu không được nhập kí tự đặc biết")</script>';exit();	
		}if(checksdt($sdt)==false){
				echo '<script>alert("số điện thoại không được nhập chữ")</script>';exit();
		}
			$sql_1="select id from khachhang";
			$objStm1=$objPdo->query($sql_1);
			$data1=$objStm1->fetchAll(PDO::FETCH_ASSOC);
			foreach($data1 as $row1){
				$idkhdtb=$row1['id'];
				if($taikhoan == $idkhdtb){
					echo "<script>alert('Da ton tai tai khoan nay')</script>";
				}else{	
			$sql="insert into khachhang(Tenkh,id,password,sdt,email) value('$tenkh','$taikhoan','$matkhau','$sdt','$email')";
			$objPdo->query($sql);
				}
			}
	}
?>
<div class="form">
       
      <ul class="tab-group" style="width:1050px">
        <li class="tab active" ><a href="#signup">Nhấn để tạo tài khoản</a></li>
       
      </ul>
       
      <div class="tab-content">
        <div id="signup" >   
          <h1 style="text-align:center;font-size:30px;color:#CCC;margin-bottom:30px">Tạo tài khoản miễn phí</h1>
           
<form action="" method="post" enctype="multipart/form-data">
           
          
            <div class="field-wrap">
              <label class="singup-dk">
                Tài khoản<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name="emaildn-dk"/>
            </div>       
         
          <div class="field-wrap">
            <label class="singup-dk">
              Mật khẩu<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="matkhau-dk"/>
          </div>
           
          <div class="field-wrap">
            <label class="singup-dk">
              Nhập lại mật khẩu<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name="rematkhau-dk"/>
          </div>
          
            <div class="field-wrap">
              <label class="singup-dk">
                Họ và tên khách hàng<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name="hotenkh-dk"/>
            </div>
            
          <div class="field-wrap">
          	<label class="singup-dk">
              Email<span class="req">*</span>
            </label>
            <input type="email" name="email-dk" />	
          </div>
          <div class="field-wrap">
            <label class="singup-dk" >
              Số điện thoại liên hệ<span class="req">*</span>
            </label>
            <input type="text"required autocomplete="off" name="sdt"/>
          </div>
          
            
          
          <button type="submit" class="button button-block" name="dangky"/>Hoàn thành đăng ký</button>
           
 </form>
 
        </div>
         
       
         
      </div><!-- tab-content -->
       
</div> <!-- /form -->

<script src="framework/sigup-login-form/js/jquery.min.js"></script>
<script type="text/javascript">
   $('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
  var $this = $(this),
      label = $this.prev('label');

	  if (e.type === 'keyup') {
				if ($this.val() === '') {
          label.removeClass('active highlight');
        } else {
          label.addClass('active highlight');
        }
    } else if (e.type === 'blur') {
    	if( $this.val() === '' ) {
    		label.removeClass('active highlight'); 
			} else {
		    label.removeClass('highlight');   
			}   
    } else if (e.type === 'focus') {
      
      if( $this.val() === '' ) {
    		label.removeClass('highlight'); 
			} 
      else if( $this.val() !== '' ) {
		    label.addClass('highlight');
			}
    }

});

$('.tab a').on('click', function (e) {
  
  e.preventDefault();
  
  $(this).parent().addClass('active');
  $(this).parent().siblings().removeClass('active');
  
  target = $(this).attr('href');

  $('.tab-content > div').not(target).hide();
  
  $(target).fadeIn(600);
  
});
</script>