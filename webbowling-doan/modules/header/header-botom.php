<head><link rel="stylesheet" href="header-bottom.css">
</head>
<div class="body-header" style="height:680px;border-radius:50px;background:url(background/header/header15.jpg)">
    <div class="container-header">
    <div class="tab-slider--nav">
            <ul class="tab-slider--tabs" style="margin-left:580px;margin-top:20px;">
                <li class="tab-slider--trigger active" rel="tab1"><h3>Tab 1</h3></li>
                <li class="tab-slider--trigger" rel="tab2"><h3>Tab 2</h3></li>
               <!-- <li class="tab-slider--trigger" rel="tab3">Tab 3</li>-->
               </ul>
            
        </div>
        <div class="tab-slider--container">
            <div id="tab1" class="tab-slider--body" style="margin-left:30px">
                
				<?php include('header-bottom/HEADER-1/header1.php');?>
                
            </div>
            <div id="tab2" class="tab-slider--body" style="margin-bottom: 20px;width:100%;height:680px;border-radius:50px;background:url(background/header/header14.jpg)" >
               <div style="margin-left:30px"> 
               <?php include('header-bottom/HEADER-2/header-2.php');?>
                
            </div>
            </div>
            
        </div>
        </div>
</div>
<script src="header-bottom/jquery.min.js"></script>
<script src="header-bottom/script.js"></script>   
<script>
$("document").ready(function(){
  $(".tab-slider--body").hide();
  $(".tab-slider--body:first").show();
});
 
$(".tab-slider--nav li").click(function() {
  $(".tab-slider--body").hide();
  var activeTab = $(this).attr("rel");
  $("#"+activeTab).fadeIn();
    if($(this).attr("rel") == "tab2"){
        $('.tab-slider--tabs').addClass('slide');
    }else{
        $('.tab-slider--tabs').removeClass('slide');
    }
  $(".tab-slider--nav li").removeClass("active");
  $(this).addClass("active");
});
 
</script>   