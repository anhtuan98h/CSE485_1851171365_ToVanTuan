<?php

$conn = mysqli_connect('localhost', 'root', '') or die("Không thể kết nối ");
mysqli_select_db($conn, 'tlu') or die("Không tồn tại cơ sở dữ liệu tlu");

if (isset($_POST['bt_dk'])) {
    $error = array();

    $alert = array();

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
    if (empty($_POST["password"])) {
        $error['password'] = "Không được để trống password";
    } else {
        if (!(strlen($_POST["password"]) >= 6 && strlen($_POST["password"]) <= 32)) {
            $error["password"] = "Số lượng bạn nhập không đủ từ 6 ->32 kí tự";
        } else {

            $partten = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
            if (!preg_match($partten, $_POST["password"])) {
                $error["password"] = "password ban nhap phai co tu 6 den 32 ki tu , duoc phep su dung cac ki tu ^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$ ";
            } else {
                $password = md5($_POST["password"]);
            }
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

    if (empty($_POST['per'])) {
        $error['per'] = "Bạn chưa chọn phân quyền";
    } else {
        $per = $_POST['per'];
    }

    if (empty($error)) {
        $sql = "INSERT INTO user (username,permission,password , email)
        VALUES('$username','$per','$password','$email')";
        if (mysqli_query($conn, $sql)) {
            $alert['success'] = 'Thêm dữ liệu thành công';
        } else {
            echo mysqli_error($error);
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form đăng ký người dùng</title>
</head>

<body>
    <style>
        body {
            font-size: 14px;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 23px;
            background-color: #029ef3;
        }

        #wp-form-dk {
            width: 250px;
            min-height: auto;
            background-color: #fdfdfd;
            margin: 150px auto;
            border-radius: 3px;

            padding: 30px 20px 20px 20px;
            text-align: center;


        }

        #form_dk #bt_dk {
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

        #form_dk #username,
        #form_dk #password,

        #form_dk #email,
        #form_dk #per {
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

        label {
            font-style: italic;
        }
    </style>
    <div id="wp-form-dk">
        <h1 id="post-tile">Đăng ký người dùng</h1>
        <?php
        if (!empty($alert["success"])) {
        ?>
            <p class="success"><?php echo $alert['success'];
                                header("location:user.php"); ?> </p>
        <?php
        }
        ?>
        <form action="" id="form_dk" method="POST">

            <input type="text" id="username" name="username" placeholder="Nhập username">
            <?php
            if (!empty($error["username"])) {
            ?>
                <p><?php echo $error['username']; ?> </p>
            <?php
            }
            ?>


            <input type="password" name="password" id="password" placeholder="Nhập mật khẩu">
            <?php
            if (!empty($error["password"])) {
            ?>
                <p><?php echo $error['password']; ?> </p>
            <?php
            }
            ?>



            <input type="email" name="email" id="email" placeholder="Nhập email">
            <?php
            if (!empty($error["email"])) {
            ?>
                <p><?php echo $error['email']; ?> </p>
            <?php
            }
            ?>

            <select name="per" id="per">

                <option value="" selected>--Chọn phân quyền--</option>
                <option value="user">user</option>
                <option value="admin">admin</option>
            </select>
            <?php
            if (!empty($error["per"])) {
            ?>
                <p><?php echo $error['per']; ?> </p>
            <?php
            }
            ?>

            <input type="submit" value="Đăng ký người dùng" name="bt_dk" id="bt_dk">

        </form>
    </div>
</body>

</html>