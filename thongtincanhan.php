<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="thongtincanhan.css" media="screen" />
    <style>
    img {
  border-radius: 50%;
}
</style>
</head>
<body>
<?php
session_start();

?>
    <?php
  
    $con = new mysqli("localhost","root","","buoi3");
    $con -> set_charset("utf-8");
    /*$con = new mysqli("localhost","root","","buoi3");*/
    $sql = " SELECT * FROM thanhvien  where  tendangnhap ='".$_SESSION['tendangnhap1']."' AND matkhau = '".$_SESSION['matkhau1']."' ";    
         
    $result = $con->query($sql)  or die($con->error); 
      

    while($row = $result -> fetch_assoc()){
             
            echo'  
             <div id ="swap">
                <div class="header"> Thong Tin Ca Nhan</div>
                   <div id ="trai">
                        <h3 id="aa"> Ảnh profile </h3>
                              <img src="'.$row['hinhanh'].'" width="400px">
                         <ul>
                            <li><h3> Chao ban:'.$row['tendangnhap'].'</h3></li>
                            <li><h3> Mat khau:.'.$row['matkhau'].'</h3></li>
                            <li><h3> Gioi Tinh: '.$row['gioitinh'].' </h3></li>
                            <li><h3> So thich: '.$row['sothich'].'</h3></li>
                         </ul>
                   </div>
                                      
                   <div class="right"> <h3 class="righth3">CHAO MUNG DEN VOI MY PROFILE </h3> 
                          <form>
                              <textarea rows="30" cols="70"> Feeback</textarea>
                              <input type="submit" value="Submit"/>
                          </form>
                    </div>
                                  
                    <div id="footer"><h3 class="footerh3"> Moi chi tiet xin lien he: '.$row['tendangnhap'].'</h3> 
                    <div class="dangxuat"><a href="dangxuat.php">Log out</a></div>
                    <a href="themsp.html"> Them San Pham </a>
                    </div>
                                   
            </div>
            ';
        //  }
      }
    $con ->close();
  ?>
    
</body>
</html>
