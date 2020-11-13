<?php
$user_id = $_GET['user_id'];
$conn = mysqli_connect('localhost', 'root', '') or die("Không thể kết nối ");
mysqli_select_db($conn, 'tlu') or die("Không tồn tại cơ sở dữ liệu tlu");


if (isset($_POST['bt_update'])) {
    $error = array();

    $alert = array();
     
    if (empty($_POST['per'])) {
        $error['per'] = "Bạn chưa chọn sự cho phép";
    } else {
        $per = $_POST['per'];
    }

    if (empty($_POST["username"])) {
        $error["username"] = "Không được để trống username";
    } else {
        if (!(strlen($_POST["username"]) >= 6 && strlen($_POST["username"]) <= 32)) {
            $error["username"] = "Số lượng bạn nhập không đủ từ 6 ->32 kí tự";
        } else {

            $partten = "/^[A-Za-z0-9_\.]{6,32}$/";
            if (!preg_match($partten, $_POST["username"])) {
                $error["username"] = "Username bạn nhập phải từ 6-32 kí tự , được phép sử dụng các kí tự /^[A-Za-z0-9_\.]{6,32}$/ ";
            } else {
                $username = $_POST["username"];
            }
        }
    }
    if(empty($_POST["password"]))
    {
       $error['pass'] = "Không được để trống password" ;
    }
   else {
    
     $partten ="/^([a-z]){1}([\w_\.!@#$%^&*()]+){5,31}$/" ; 
     if(!preg_match($partten,$_POST["password"])){
     $error["password"] = "Password được phép sử dụng các ký tự ^([a-z]){1}([\w_\.!@#$%^&*()]+){5,31}$ " ;
     }
     else {
     $password = md5($_POST["password"]) ;
    
  }
   }
     



    if (empty($_POST['email'])) {
        $error['email'] = "Không được để trống trường email";
    } else {
        $pattern = '/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/';
        if (!preg_match($pattern, $_POST['email'])) {
            $error['email'] = "Email không đúng định dạng";
        } else {

            $email = $_POST['email'];
        }
    }
   


    if (empty($error)) {
        $sql = "UPDATE user SET permission='$per', username='$username', password = '$password', email = '$email' WHERE user_id = '$user_id'";
        if (mysqli_query($conn, $sql)) {
            $alert['success'] = 'Sửa liệu thành công';
        } else {
            echo mysqli_error($error);
        }
    }
}
$sql = "SELECT *FROM user WHERE user_id = '$user_id'";
$result = mysqli_query($conn, $sql);
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

        #form_update #username,
        #form_update #password,
        #form_update #email,#per {
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
        <h1 id="post-tile">Sửa người dùng</h1>
        <?php
        if (!empty($alert["success"])) {
        ?>
            <p class="success"><?php echo $alert['success'];
                                header("location:user.php"); ?> </p>
        <?php
        }
        ?>
        <form action="" id="form_update" method="POST">
            <input type="hidden" name='user_id' value="<?php echo $user_id; ?>">
            <input type="text" id="username" name="username" placeholder="Nhập username" value="<?php echo $item['username']  ?>">
            <?php
            if (!empty($error["username"])) {
            ?>
                <p><?php echo $error['username']; ?> </p>
            <?php
            }
            ?>


            <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" value="<?php echo $item['email']  ?>">
            <?php
            if (!empty($error["password"])) {
            ?>
                <p><?php echo $error['password']; ?> </p>
            <?php
            }
            ?>



            <input type="email" name="email" id="email" placeholder="Nhập email" value="<?php echo $item['email']  ?>">
            <?php
            if (!empty($error["email"])) {
            ?>
                <p><?php echo $error['email']; ?> </p>
            <?php
            }
            ?>
            <select name="per" id="per">

                <option value="">--Chọn phân quyền--</option>
                <option <?php if(isset($item['per'])&& $item['per']=='user') echo "selected ='selected'" ; ?> value="user">user</option>
                <option <?php if(isset($item['per'])&& $item['per']=='admin') echo "selected ='selected'" ; ?> value="admin">admin</option>
              
            </select>
            <?php
            if (!empty($error["per"])) {
            ?>
                <p><?php echo $error['per']; ?> </p>
            <?php
            }
            ?>




            <input type="submit" value="Sửa người dùng" name="bt_update" id="bt_update">

        </form>
    </div>
    </div>
</body>

</html>