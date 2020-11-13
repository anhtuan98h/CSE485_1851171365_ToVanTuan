<?php
$conn = mysqli_connect('localhost', 'root', '') or die("Không thể kết nối ");
mysqli_select_db($conn, 'tlu') or die("Không tồn tại cơ sở dữ liệu tlu");
$user_id = $_GET['user_id'];
$sql = "DELETE FROM user WHERE user_id ='$user_id'";
if(mysqli_query($conn,$sql)) 
{
    header("location:user.php");
}
?>