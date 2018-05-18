<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
*{
	border:none;
	margin:auto;
	padding:0px;
}
body
{
	
	font-size:14px;
}
.KhungNgoai
{
	width:1280px;
	margin:auto;
	padding:0px;
	display:table;
	background-color:#FFF;
}
.TieuDe
{
	width:1280px;
	background-color:#999;
	height:200px;
	text-align:center;
	color:#FFF;
	font-size:36px;
	
}
.banner{
	width:1280px;
	height:200px;
}
.KhungNoiDung
{
	background-color:#0F0;
	display:table;
}
.MenuTrai
{
	width:240px;
	background-color:#CCC;
	display:table-cell;
	padding:5px;
	vertical-align:top;
}
.MenuPhai
{
	width:240px;
	background-color:#CCC;
	display:table-cell;
	padding:3px;
	vertical-align:top;
}
.MenuGiua
{
	width:800px;
	background-color:#FFF;
	display:table-cell;
}
.Foodter
{
	height:180px;
	background-color:#999;
	margin:auto;
	padding:0px;
	font-size:24px;
	color:#FFF;
	text-align:center;
	
}
.MNNgang
{
	background-color:#FF0;
	height:25px;
	font-size:20px;
}
.gioithieu{
	background-color:#F0F;
	margin:auto;
	padding:0px;
	height:50px;
}
#Hinh{
	width:400px;
	height:400px;
}
#dangnhap{	
		width:240px;
		height:200px;
		background-color:#93F;
		padding:3px;
		font-size:16px;
		color:#0F0;
		font-weight:bold
}
#GioHang{
	width:240px;
	height:100px;
	background-color:#0F0;
	padding:3px;
	font-size:30px;
	color:#FFF;
	font-weight:bold
}
</style>
<title>Untitled Document</title>
</head>

<body>
<form action="TrangChu.php" method="post">
	<div class="KhungNgoai">
	  	<div class="TieuDe">
        	<img src="Hinhanh/hinhbanner.jpg" class="banner" />
        </div>
        <div class="MNNgang">
        	<a href="TrangChu.php">Trang chủ</a>|<a href="DangKyTaiKhoang.php">Đăng ký</a>|<a href="TrangTuVan.php">Hòm thư</a>
        </div>
        <div class="KhungNoiDung">
        	<div class="MenuTrai">
        		<?php
					$cngiay= mysql_connect("localhost","root","");
					mysql_select_db("cuahanggiay",$cngiay);
					mysql_query("set names 'utf8'");
					$hang=mysql_query("select * from hanggiay",$cngiay);
					while ( $dong = mysql_fetch_row($hang))
					{
						$Ma = $dong[0];
						$Ten = $dong[1];
						echo "<a style='color:#0F0;text-decoration:none;font-weight:bold' href='TrangChu.php?MaH=$Ma'>$Ten</a><br>";
					}
					echo "<a style='color:#F00;text-decoration:none;font-weight:bold' href='TrangChu.php'>Hiển thị tất cả</a>";
                ?>
        	</div>
            <div class="MenuGiua">
        		<?php
				
				if( isset($_REQUEST["MaH"]))
				{
					$MaNhan = $_REQUEST["MaH"];
					$sql="select * from giay where MaHang='$MaNhan'";
				}
				else
				{
					$sql="select * from giay";
				}

					$cn = mysql_connect("localhost","root","");
					mysql_select_db("cuahanggiay",$cn);
					mysql_query("set names 'utf8'");
					$kq = mysql_query($sql,$cn);
					echo "<table id='Khung'>";
					$i = 0;
					while ( $dong = mysql_fetch_row($kq))
					{
						
						$MaSP = $dong[0];
						$TenSP = $dong[1];
						$Size = $dong[2];
						$Mau = $dong[3];
						$Gia = $dong[4];
						$Chatlieu = $dong[5];
						$Gioithieu = $dong[6];
						$Hinh = $dong[7];
						if($i % 2 == 0)
						{
							echo "<tr id='SP'>";
						}
							echo "<td> <a style='color:#F00; color: #F00; font-weight:bold;text-decoration:none' href='ThongTinGiay.php?MaGiay=$MaSP'>$TenSP<br>$Gia đồng<br><img id ='Hinh' src='Hinhanh/$Hinh' /></a><br></td>";
							$i = $i +1;
						if( $i % 2 == 0)
						{
							echo "</tr>";
						}
					}
					echo "</table>";	
				?>
       		 </div>
             <div class="MenuPhai">
               <?php
					$SL = 0;
					if(isset($_SESSION["GioHang"]))
					{
						foreach($_SESSION["GioHang"] as $SP)
						{
							$SL = $SL + $SP["SL"];
						}
					}
				?>
        		<div id="dangnhap">
                		Tên đăng nhập<br /><input type="text" name="txtTK" value="<?php echo $Tendn ?>"/><br />
                		Mật Khẩu<br /><input type="password" name="txtMK" value="<?php echo $Pass ?>"/><br /><br />
                        <input type="submit" name="btnDangNhap" value="Đăng Nhập"  /> 
                         <?php echo $btndx; ?><br />
                        <?php
							echo $id;
							echo $tb;
						?>
                	
                </div>
                  <div id="GioHang">
                	<div id="soluong">
                    	Số hàng đã chọn:<?php echo $SL; ?>
                    </div>
                    <div id="XemGioHang">
                    	<a href="TrangSuaLuaChon.php">Xem Giỏ Hàng</a>
                    </div>
                </div>
       		 </div>
        </div>
        <div class="Foodter">
       		 <br />
        	CÔNG TY XUẤT NHẬP KHẨU SỈ LẺ GIÀY NAM NỮ QUỐC TẾ 2 THÀNH VIÊN THẮNG & VỸ<BR>
            RẤT HÂN HẠNH ĐƯỢC PHỤC VỤ QUÝ KHÁCH<BR>
            ĐỊA CHỈ LIÊN HỆ SỐ 40 XUÂN DIỆU QUẬN TÂN BÌNH THÀNH PHỐ HỒ CHÍ MINH<BR>
            EMAIL:levi.lv31@gmail.com
        </div>
    </div>
</form>
</body>
</html>