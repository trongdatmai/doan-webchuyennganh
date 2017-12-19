<div class="content-left">
	<?php
		if(isset($_GET['ac'])){
			$tam=$_GET['ac'];
		}else{
			$tam='';
		}if($tam=='them'){
			include('modules/banh/them.php');
		}if($tam=='sua'){
			include('modules/banh/sua.php');
		}
	 ?>
</div>
<div class="content-right">
	<?php
		include('modules/banh/lietke.php');
	?>
</div>