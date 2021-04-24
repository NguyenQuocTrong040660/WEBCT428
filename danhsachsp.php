<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Danh sách sản phẩm</title>
	<link rel="stylesheet" type="text/css" href="danhsachsanpham.css">
</head>
<body>
	<?php
		$con = new mysqli("localhost","root","","buoi3");
		$sql = "SELECT * FROM sanpham";
		$result = $con -> query($sql);
		echo '<div class="container">';
		echo '<h3>Chào bạn '.$_SESSION['tendangnhap'].'</h3>
				<h4>Danh sách sản phẩm của bạn là:</h4>';
		echo '<table>';
		echo '
			<tr>
				<th>STT</th>
				<th>Tên sản phẩm</th>
				<th>Giá sản phẩm</th>
				<th colspan="3">Lựa chọn</th>
			</tr>
		';
		$id = $_SESSION['idtv'];
		$i=0;
		while($row = $result -> fetch_assoc()){
			if($id == $row['idtv']){
				$i++;
				echo '
					<tr>
						<td>'.$i.'</td>
						<td>'.$row['tensp'].'</td>
						<td>'.$row['giasp'].'</td>
						<td><a href="chitietsanpham.php">Xem chi tiết</a></td>
						<td><a href="capnhatsanpham.php"><img src="./capnhatsanpham/edit.png"></a></td>
						<td><a href="xoasanpham.php"><img src="./capnhatsanpham/delete.png"></a></td>
					</tr>
				';
			}
		}
		echo '</table>';
		echo '<button><a href="dangxuat.php">Đăng xuất</a></button>';
		echo '</div>';
	?>
</body>
</html>