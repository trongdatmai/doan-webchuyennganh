<style>
	.menu ul li{
		width:210px;
		margin-left:2px;
		background:#000;
		height:48px;
		border-radius:15px;
		text-align:center;	
		 position: relative;
		}
	.menu ul li a{
		color:#FFF;
		display:block;

		}
	.menu ul li a hover {
		color:#F00;
			}
	.sub-menu li {
  	display: none;
	}
	
	.menu li:hover .sub-menu {
	 display: block;
	}
	.menu li:hover .sub-menu li{
	 display: block;
	}
</style>
<div class="menu" style="height:100px">
    <div id="menu">
      <ul>
        <li><a href="index.php">Trang chủ</a></li>
        <li ><a href="index.php?quanly=quanlyloaisanpham&ac=them">QUẢN LÝ LOẠI SẢN PHẨM</a></li>
        <li ><a href="index.php?quanly=quanlydonhang&ac=sua" >QUẢN LÝ ĐƠN HÀNG</a>
        	<ul class="sub-menu">
            	<li style="width:300px"><a href="index.php?quanly=quanlydonhang&tt=lietketinhtrang">QUẢN LÝ TÌNH TRẠNG ĐƠN HÀNG</a></li>  
          	</ul>
        </li>
        <li ><a href="index.php?quanly=quanlysanpham&ac=them" >QUẢN LÝ SẢN PHẨM</a>
          <ul class="sub-menu">
            <li ><a href="index.php?quanly=banh&ac=them">QUẢN LÝ BANH</a></li>
            <li><a href="index.php?quanly=quanlysize&ac=them">QUẢN LÝ SIZE SẢN PHẨM</a></li>
            <li ><a href="index.php?quanly=quanlysale&ac=them">QUẢN LÝ SALE</a></li>
          </ul>
      	</li>
       
      </ul>
    </div>
   
    
       
    
</div>
    	