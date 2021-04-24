<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head> 
	<title> Bài tập 3 - Buổi 2 </title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" type="text/css" href="stylebai3.css" media="screen" />
  <link rel="stylesheet" href="/font-awesome-4.7.0/css/font-awesome.min.css">
  
</head>	
<style>
    form {
        width: 500px;
        height: auto;
       background-color: lightblue;
       margin:0px 250px;
    }

    input {
        width: 50%;
        height: 20px;
    }

    table {

        width: 100%;
        height: 400px;
    }

    .themsp {
        text-align: center;
        font-weight: bold;
        color: blue;
        font-size: 25px;
        margin: 0px auto;
    }

    button {
        background-color: red;
        color: white;
        width: 20%;
    }
    #footer{
        bottom: 0px;
        background-color: black;
        position: absolute;
    }
  .container{
    width: 600px;
    height:auto;
    margin:0px auto;
    
  }
  .dangxuat{
    margin:0px auto;
  }
  table{
    border:1px solid black;
    coll
  }
    </style>
<body>
<div id="wrap">
	<div id="title">
	
	</div> <!--end div title-->
	
	<div id="content">
  <?php
		$con = new mysqli("localhost","root","","buoi3");
		$sql = "SELECT * FROM sanpham";
		$result = $con -> query($sql);
		echo '<div class="container">';
		echo '<h3>Chào bạn '.$_SESSION['tendangnhap1'].'</h3>
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
						<td><a href="chitietsanpham.php">Xemchitiết</a></td>
						<td> <a href="xuli_xoasp.php"> CapnhatSP</a></td>
						<td><a href="xoasanpham.php">XoaSP</a></td>
					</tr>
				';
       }
		}
		echo '</table>';
		echo '<button class="dangxuat"><a href="dangxuat.php">Đăng xuất</a></button>';
		echo '</div>';
	?>
	</div> <!--end div content-->
	<div id="footer">
		<p>Liên hệ</p>
	</div> <!--end div footer-->
</div> <!--end div wrap-->
</body>
</html>
   
