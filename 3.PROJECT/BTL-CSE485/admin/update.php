<?php
$id = $_GET['id'];
$conn = mysqli_connect('localhost', 'root', '') or die("Không thể kết nối ");
mysqli_select_db($conn, 'tlu') or die("Không tồn tại cơ sở dữ liệu tlu");


if (isset($_POST['bt_update'])) {
    $error = array();

    $alert = array();

    
    if (empty($_POST['nganh'])) {
        $error['nganh'] = "Bạn chưa chọn ngành xét tuyển";
    } else {
        $nganh = $_POST['nganh'];
    }

    if (empty($error)) {
        $sql = "UPDATE thisinh SET nganhxt = '$nganh' WHERE id = '$id'" ;
        if (mysqli_query($conn, $sql)) {
            $alert['success'] = 'Sửa dữ liệu thành công';
         header("location:hoso.php"); 

        } else {
            echo mysqli_error($error);
        }
    }
}
$sql= "SELECT *FROM thisinh WHERE id = '$id'";
$result = mysqli_query($conn,$sql);
$item = mysqli_fetch_assoc($result);
?>


<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Form đăng ký tuyển sinh</title>
</head>

<body>
 <style>
     body {
         font-size: 14px;
         font-family: Arial, Helvetica, sans-serif;
         line-height: 23px;
         background-color: #029ef3;
     }

     #wp-form-update {
         width: 250px;
         min-height: auto;
         background-color: #fdfdfd;
         margin: 150px auto;
         border-radius: 3px;

         padding: 30px 20px 20px 20px;
         text-align: center;


     }

     #form_update #bt_update {
         display: block;
         width: 100%;
         background-color: #029ef3;
         border: none;
         color: #fff;
         padding: 10px 0px;
         margin: 15px 0px 10px;
         cursor: pointer;

     }

     #post-tile {
         font-size: 18px;
         padding: 0px 0px 0px 10px;
     }

     #form_update #nganh {
         display: block;
         padding: 10px 10px 10px 0px;
         width: 100%;
         margin-bottom: 10px;
         background-color: #f7f7f7;
         border: none;


     }

     p {
         color: red;
     }

     p.success {
         color: #029ef3;
     }
 </style>
 <div id="wp-form-update">
     <h1 id="post-tile">Sửa thông tin</h1>
     <?php
        if (!empty($alert["success"])) {
        ?>
         <p class="success"><?php echo $alert['success']; ?> </p>
     <?php
        }
        ?>
     <form action="" id="form_update" method="POST">

        


         <select name="nganh" id="nganh">

             <option value="">--Chọn ngành xét tuyển--</option>
             <option  value="<?php if(isset($item['nganh'])&& $item['nganh']=='Công trình thủy') echo "selected ='selected'" ; ?>">Công trình thủy</option>
             <option <?php if(isset($item['nganh'])&& $item['nganh']=='Xây dựng') echo "selected ='selected'" ; ?> value="Xây dựng">Xây dựng</option>
             <option <?php if(isset($item['nganh'])&& $item['nganh']=='Tài nguyên nước') echo "selected ='selected'" ; ?> value="Tài nguyên nước">Tài nguyên nước</option>
             <option <?php if(isset($item['nganh'])&& $item['nganh']=='CNTT') echo "selected ='selected'" ; ?> value="CNTT">Công nghệ thông tin</option>
             <option <?php if(isset($item['nganh'])&& $item['nganh']=='KTPM') echo "selected ='selected'" ; ?> value="KTPM">Kỹ Thuật Phần mềm</option>
             <option <?php if(isset($item['nganh'])&& $item['nganh']=='HTTT') echo "selected ='selected'" ; ?> value="HTTT">Hệ thống thông tin</option>
             <option <?php if(isset($item['nganh'])&& $item['nganh']=='Kế toán') echo "selected ='selected'" ; ?> value="Kế toán">Kế toán</option>
             <option <?php if(isset($item['nganh'])&& $item['nganh']=='QTKD') echo "selected ='selected'" ; ?> value="QTKD">Quản trị kinh doanh</option>

         </select>
         <?php
            if (!empty($error["nganh"])) {
            ?>
             <p><?php echo $error['nganh']; ?> </p>
         <?php
            }
            ?>

         <input type="submit" value="Sửa bản đăng ký" name="bt_update" id="bt_update">
         
     </form>
 </div>
</body>

</html>