<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Danh Sach San Pham</title>
</head>
<body>
<?php
$con = new mysqli("localhost","root","","buoi3");
$con -> set_charset("utf-8");

if(isset($_POST['dangnhap'])){
	$user = $_POST['uname'];
	$matkhau = md5($_POST['pass']);
	$sql = "SELECT * FROM thanhvien WHERE tendangnhap= '$user' AND matkhau = '$matkhau' ";
	$result = $con -> query($sql) or die($con->error);
  
   $row = $result -> fetch_assoc();

	// $tendangnhap = $row['tendangnhap'];
	if($row == 0){
		echo "<script type='text/javascript'>alert('Nhập sai Tài khoản hoặc Mật khẩu');
			document.location='dangnhap.html';
		</script>";
	}else{
		$_SESSION['tendangnhap1'] = $row['tendangnhap'];
        $_SESSION['matkhau1'] = $row['matkhau'];
		
		echo "<script type='text/javascript'>document.location='thongtincanhan.php'</script>";
	}
}
 
$con ->close();

?>
</body>
</html>
