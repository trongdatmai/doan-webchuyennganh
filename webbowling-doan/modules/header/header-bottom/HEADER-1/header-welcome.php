
<link href='http://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
<!--<link rel="stylesheet" type="text/css" href="style/header-1.css"/>-->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
</head>
<style>

.marquee {
        width: 500px;
        height: 50px;
        margin: 25px auto;
        overflow: hidden;
        position: relative;
        border: 1px solid #000;
        margin: 25px auto;
		border-radius:15px;
       	background-color: #FFF;
		
      	-webkit-border-radius: 5px;
      	border-radius: 5px;

      	-webkit-box-shadow: inset 0px 2px 2px rgba(0, 0, 0, .5), 0px 1px 0px rgba(250, 250, 250, .2);
      	box-shadow: inset 0px 2px 2px rgba(0, 0, 0, .5), 0px 1px 0px rgba(250, 250, 250, .2);
    }
 	p a:hover{
		color:#F00;
		}
    .marquee p {
		 font: 400 20px/0.8 'Cookie', Helvetica, sans-serif;
	 	 
	 	 text-shadow: 4px 4px 3px rgba(0,0,0,0.1); 
        position: absolute;
        
        width: 100%;
        height: 100%;
        margin: 0;
        color:#000;
        line-height: 50px;
        text-align: center;
       
        filter: dropshadow(color=#000000, offx=1, offy=1);
    }
	.marquee.down p {
        transform:translateY(-100%);
    }

    .marquee.down p:nth-child(1) {
        animation: down-one 10s ease infinite;
    }
    .marquee.down p:nth-child(2) {
        animation: down-two 10s ease infinite;
    }
	  .marquee.down p:nth-child(3) {
        animation: down-two 10s ease infinite;
    }
	  .marquee.down p:nth-child(4) {
        animation: down-two 10s ease infinite;
    }

    @keyframes down-one {
        0%  {
            transform:translateY(-100%);
        }
        10% {
            transform:translateY(0);
        }
        40% {
            transform:translateY(0);
        }
        50% {
            transform:translateY(100%);
        }
        100%{
            transform:translateY(100%);
        }
    }
    @keyframes down-two {
        0% {
            transform:translateY(-100%);
        }
        50% {
            transform:translateY(-100%);
        }
        60% {
            transform:translateY(0);
        }
        90% {
            transform:translateY(0);
        }
        100%{
            transform:translateY(100%);
        }
    }
	.thongtin{
		color:#FF6600;
		}
</style>
<!------------  CSS ĐỊNH DẠNG FORM THÔNG TIN LIÊN HỆ ------->
<style>
.modalDialog {
		position: fixed;
		font-family: Arial, Helvetica, sans-serif;
		top: 0;
		right: 0;
		bottom: 0;
		left: 0;
		background: rgba(0,0,0,0.8);
		z-index: 99999;
		opacity:0;
		-webkit-transition: opacity 400ms ease-in;
		-moz-transition: opacity 400ms ease-in;
		transition: opacity 400ms ease-in;
		pointer-events: none;
	}

.modalDialog:target {
		opacity:1;
		pointer-events: auto;
	}

.modalDialog > div {
		width: 400px;
		position: relative;
		margin: 10% auto;
		padding: 5px 20px 13px 20px;
		border-radius: 10px;
		background: #fff;
		background: -moz-linear-gradient(#fff, #999);
		background: -webkit-linear-gradient(#fff, #999);
		background: -o-linear-gradient(#fff, #999);
	}

.close {
		background: #606061;
		color: #FFFFFF;
		line-height: 25px;
		position: absolute;
		right: -12px;
		text-align: center;
		top: -10px;
		width: 24px;
		text-decoration: none;
		font-weight: bold;
		-webkit-border-radius: 12px;
		-moz-border-radius: 12px;
		border-radius: 12px;
		-moz-box-shadow: 1px 1px 3px #000;
		-webkit-box-shadow: 1px 1px 3px #000;
		box-shadow: 1px 1px 3px #000;
	}

.close:hover { background: #00d9ff; }
<!------- MARQUEE CHẠY QUẢN CÁO TRÊN HEADER BOTTOM -------->
</style>
<div class="marquee down">
<p><a href="index.php?xem=banh&amp;id=BA">1. Tăng cơ hội trúng Iphone-X khi mua banh bowling trên 5,000,000</a></p>
<p><a href="index.php?xem=banh&amp;id=BA">2. SALE OFF tất cả sản phẩm chào mừng lễ No-el</a></p>
</div>

<div class="button_container">
<h2><a <a href="#openModal"><button class="btn1" style="border-radius:10px"><span  class="thongtin">Click to view my contact information&nbsp;!</span></button><br /></a></h2>
<a href="index.php"><button class="btn1" ><span>All Products</span></button><br /></a>
<a href="index.php?xem=banh&id=BA" ><button class="btn1"><span>Bowling Ball</span></button><br /></a>
<a href="index.php?xem=giay&id=GI"><button class="btn1"><span> Bowling Shoes</span></button><br /></a>
<a href="index.php?xem=gangtay&id=GA"><button class="btn1"><span>Bowling Glaves</span></button><br /></a>
<a href="index.php?xem=giohang"><button class="btn1"><span>Shopping Card</span></button><br /></a>
</div>

<!------------------ THÔN TIN LIÊN HỆ BẢN THÂN---->

<div id="openModal" class="modalDialog">
    <div style="width:600px">
        <a href="#close" title="Close" class="close">X</a>
        
        	<h2 style="font-size:36px;text-align:center">Thank you for your attention to my information</h2>
            <hr/><br>
            <h3 style=" font-size:30px;text-align:center">Get website design in the areas of sales and service</h3>
            <br>
            <h3 style="text-align:center">
            	<!--<div style="width:75px;height:80px;border-radius:10px;margin:auto;background:#000;float:left"><img src="background/header/imageinformation.jpg" width="60px" height="80px" style="float:left"></div>
                <div style="width:75px;height:80px;border-radius:10px;margin:auto;background:#000"><img src="background/header/hoangphuoc.jpg" width="60px" height="80px" style="float:left"></div>-->
                
            	<span style="font-size:24px">Introduce yourself</span><br><br>
                Name: Trong Dat Mai, Phuoc Hoang Nguyen.
                &nbsp; &nbsp; &nbsp;Age:22.<br>
                Educational level: Information Technology engineer.</br>
                Skills: Programming PHP (Back-end,basic Front-end).
            </h3>
            <br>
                <h3 style="text-align:center">✎ Webmaster - Web programming ✔ </h3>
               <h3 style="text-align:center">︵Contact:Binhthien80@gmail.com </h3>
               <h3 style="text-align:center"> ✔ http://www.trongdatmai.tk ✔ </h3>
                <br>
        <h3><em>Contact Facebook: <a href="https://www.facebook.com/datbatista.dd"><img src="background/header/facebook.png" width="50px" height="50px"></a>
        &nbsp;&nbsp;&nbsp; Send Email for me: <a href= "mailto:binhthien80@.com"><img src="background/header/gmail.png" width="50px" height="50px"></a>
        &nbsp;&nbsp;&nbsp; Follow Instagram: <a href="https://www.instagram.com/maidat1511/?hl=vi"><img src="background/header/instagram.png" width="50px" height="50px"></a
        
        ></em></h3>

    </div>
</div>