<div class="content-left" style="width:430px">
	<?php
		if(isset($_GET['ac'])){
			$tam=$_GET['ac'];
		}else{
			$tam='';
		}if($tam=='them'){
			include('modules/quanlydonhang/them.php');
		}if($tam=='sua'){
			include('modules/quanlydonhang/sua.php');
		}
	 ?>
</div>
<div class="content-right" style="width:860px">
	<?php
		if(isset($_GET['tt'])){
			$tam2=$_GET['tt'];
		}else{
			$tam2='';
		}
		if($tam2=='lietketinhtrang')
		{
			include('modules/quanlydonhang/lietke-tinhtrang.php');
		}else{
			include('modules/quanlydonhang/lietke.php');
		}
	?>
</div>