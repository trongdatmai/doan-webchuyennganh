<style>
	a{
		text-decoration:none}
</style>
<script>

function xnxoa(){
	
}
</script>
<?php
//code liệt kê danh sách bên content right
// code sql lấy hết dữ diệu database
	$sql="select * from loaisanpham";
	$objStm = $objPdo->query($sql);
	$data = $objStm->fetchAll(PDO::FETCH_ASSOC); // dữ liệu từ dòng
?>
<table width="100%" border="1">
  <tr>
    <td width="60">MÃ LOẠI SẢN PHẨM</td>
    <td width="61">TÊN LOẠI SẢN PHẨM</td>
    <td>Sửa</td>
    <td>Xóa</td>
  </tr>
  <?php
  foreach($data as $row) //duyêt từng dòng lấy ra từng cột gán cho biến lưu trữ
	{
		$m = $row["Maloaisp"];
		$t = $row["Tenloaisp"];
	?>
  <tr>
    <td><?php echo $m ?></td>
    <td><?php echo $t ?></td>
    <td width="25"><a href="index.php?quanly=quanlyloaisanpham&ac=sua&id=<?php echo $m ?>"><div class="glyphicon glyphicon-pencil" style="font-size:40px"></div></a></td> <?php // gán đường link cho sửa và truyền tham số id   ?>
    <td style="width:50px"><a href="modules/quanlyloaisanpham/xuly.php?id=<?php echo $row['Maloaisp'];?>" onclick="return confirm('Ban co chac la muon xoa du lieu')"><div class="glyphicon glyphicon-trash" style="font-size:40px"></div></a></td>
 <?php // gán đường link cho xóa và truyền tham số id   ?>
  </tr>
  <?php
	}
	?>
</table>
