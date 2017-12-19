
<script type="text/javascript">
function kt(){
	ma=document.getElementById('maloaiSP').value; 
	ten=document.getElementById('tenloaiSP').value;
	if (ma=='')
     {
         alert('nhập mã bạn ơi'); return false; 
     }if (ten=='')
     {
         alert('Nhập tên bạn ơi'); return false; 
     }
	return true;
}
</script>

<form action="modules/quanlyloaisanpham/xuly.php" method="post" enctype="multipart/form-data" onSubmit="return kt()"; >
<table width="100%" border="1">
  <tr>
    <td colspan="2"><div align="center">THÊM LOẠI SẢN PHẨM</div></td>
  </tr>
  <tr>
    <td>MÃ LOẠI SẢN PHẨM</td>
    <td><input type="text" name="maloaisp"  id="maloaiSP"/></td>
  </tr>
  <tr>
    <td>TÊN LOẠI SẢN PHẨM</td>
    <td><input type="text" name="tenloaisp" id="tenloaiSP"/></td>
  </tr>
  
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="them" value="thêm" ">
          </div></td>
  </tr>
</table>
</form>
