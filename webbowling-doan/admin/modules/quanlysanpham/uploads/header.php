<!-- khuyến mãi-->
<div class="row header-promotional">
  <div class="col-md-3"><a href="#" class="biliboard electronic">Sale tổng hóa đơn 30% so với giá thị trường</a></div>
  <div class="col-md-3"><a href="#" class="biliboard repeating">Hoa hồng 20% tổng hóa đơn khi tìm được sản phẩm</a></div>
  <div class="col-md-3"><a href="#" class="biliboard">Bảo hành trọn đời khi đăng ký thiết kế web tại Web giá sinh viên</a></div>
  <div class="col-md-3"><a href="#" class="biliboard radial">Cập nhật liên tục các giao diện mới cho khách hàng</a></div>
</div>
 <!-- form slide image -->
<div class="row">
    <div id="carousel-example-generic" class="carousel slide slidemenu" data-ride="carousel" style="margin-top:20px;margin-bottom:20px" >
              <!-- Indicators -->
              <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <?php for($i=1;$i<=4;$i++){?>
        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i?>"></li>
        <?php }?>
      </ol>
  
  <!-- Wrapper for slides -->
 <div class="carousel-inner" role="listbox" id="item-active">
		    <div class="item active" >
		      <img src="background/header/br10.jpg" alt="..." style="height:500px;margin:auto">
		      <div class="carousel-caption">
		        ...
		      </div>
		    </div>
    <?php for($i2=11;$i2<=14;$i2++){?>
    <div class="item">
      <img src="background/header/br13.jpg" alt="..." style="margin:auto ; height:500px;width:90%">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    
    <?php } ?>

  </div>

  <!-- 2 nut Controls slide imeage-->
		  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev" style="width:250px">
		    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next" style="width:250px">
		    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
</div>	
<!-- end form slide image -->
<!-- danh sach mau-->
<?php
	include('danhsachmau.php');
 ?>

<!-- form ưu đãi nhận được -->
<div class="row" id="form-uudaikh">
  <h2>Thiết kế website tại Webgiasinhvien.tk tuân thủ các yếu tố</h2>
  <div class="col-md-4">
    <div>
      <img src="background/header/seo.png" alt="..." class="img-rounded img-cangiua">
      <h3>Thân thiện với google,chuẩn SEO</h3>
      <p><span class="glyphicon glyphicon-ok"></span>&nbsp Chuẩn hình ảnh, mô tả chuyên nghiệp</p>
      <p><span class="glyphicon glyphicon-ok"></span>&nbsp URL thân thiện</p>
      <p><span class="glyphicon glyphicon-ok"></span>&nbsp Tối ưu khả năng SEO</p>
    </div>
  </div>
  <div class="col-md-4">
    <img src="background/header/reponsive.png" alt="..." class="img-rounded img-cangiua">
    <h3>Tối ưu hiển thị người dùng</h3>
    <p><span class="glyphicon glyphicon-ok"></span>&nbsp Giao diện website đẹp & bắt mắt & dễ sử dụng</p>
    <p><span class="glyphicon glyphicon-ok"></span>&nbsp Hỗ trợ Desktop - table - mobile (reponsive)</p>
    <p><span class="glyphicon glyphicon-ok"></span>&nbsp Chuẩn trải nghiệm người dùng</p>
  </div>
  <div class="col-md-4">
    <img src="background/content/hieuxuat.png" alt="..." class="img-rounded img-cangiua">
    <h3>Tối ưu hiệu xuất làm việc</h3>
    <p><span class="glyphicon glyphicon-ok"></span>&nbsp Tối ưu tốc độ load web</p>
    <p><span class="glyphicon glyphicon-ok"></span>&nbsp Chuyển đồi cuộc gọi, đơn hàng cao</p>
  </div>
</div>
