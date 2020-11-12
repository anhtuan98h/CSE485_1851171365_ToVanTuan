<?php 
setcookie("user", "", time() - 3600);
echo "Đăng xuất thành công" ;
header("location: index.php");
?>

 