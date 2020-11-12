<?php

$conn = mysqli_connect('localhost', 'root', '') or die("Không thể kết nối ");
mysqli_select_db($conn, 'tlu') or die("Không tồn tại cơ sở dữ liệu tlu");

if (isset($_POST['bt_dk'])) {
    $error = array();

    $alert = array();

    if (empty($_POST['fullname'])) {
        $error['fullname'] = "Không được để trống họ tên";
    } else {
        $fullname = $_POST['fullname'];
    }



    if (empty($_POST['gt'])) {
        $error['gt'] = "Bạn chưa chọn giới tính";
    } else {
        $gt = $_POST['gt'];
    }


    if (empty($_POST['date'])) {
        $error['date'] = "Không được để trống ngày sinh";
    } else {
        $ngaysinh = $_POST['date'];
    }


    if (empty($_POST['dt'])) {
        $error['dt'] = "Không được để trống trường dân tộc";
    } else {
        $dt = $_POST['dt'];
    }


    if (empty($_POST['tg'])) {
        $error['tg'] = "Không được để trống trường tôn giáo";
    } else {
        $tg = $_POST['tg'];
    }


    if (empty($_POST['ns'])) {
        $error['ns'] = "Bạn chưa chọn nơi sinh";
    } else {
        $ns = $_POST['ns'];
    }


    if (empty($_POST['ntn'])) {
        $error['ntn'] = "Bạn chưa chọn năm tốt nghiệp";
    } else {
        $ntn = $_POST['ntn'];
    }


    if (empty($_POST['hl'])) {
        $error['hl'] = "Bạn chưa chọn học lực";
    } else {
        $hl = $_POST['hl'];
    }

    if (empty($_POST['diemtk'])) {
        $error['diemtk'] = "Không được để trống trường điểm tổng kết";
    } else {
        $diemtk = $_POST['diemtk'];
    }


    if (empty($_POST['hk'])) {
        $error['hk'] = "Bạn chưa chọn hạnh kiểm";
    } else {
        $hk = $_POST['hk'];
    }


    if (empty($_POST['cmnd'])) {
        $error['cmnd'] = "Không được để trống trường chứng minh thư";
    } else {
        $cmnd = $_POST['cmnd'];
    }


    if (empty($_POST['dates'])) {
        $error['dates'] = "Không được để trống trường ngày cấp";
    } else {
        $ngayc = $_POST['dates'];
    }

    if (empty($_POST['noic'])) {
        $error['noic'] = "Không được để trống trường nơi cấp";
    } else {
        $noic = $_POST['noic'];
    }

    if (empty($_POST['hokhau'])) {
        $error['hokhau'] = "Không được để trống trường hộ khẩu ";
    } else {
        $hokhau = $_POST['hokhau'];
    }

    if (empty($_POST['dc'])) {
        $error['dc'] = "Không được để trống trường địa chỉ liên hệ";
    } else {
        $dc = $_POST['dc'];
    }

    if (empty($_POST['sdt'])) {
        $error['sdt'] = "Không được để trống trường số điện thoại";
    } else {
        $pattern = '/^(09|08|03|02|01[2|6|8|9])+([0-9]{8})$/';
        if (!preg_match($pattern, $_POST['sdt'])) {
            $error['sdt'] = "Số điện thoại không đúng định dạng";
        } else {

            $sdt = $_POST['sdt'];
        }
    }

    if (empty($_POST['sdt_ph'])) {
        $error['sdt_ph'] = "Không được để trống trường số điện thoại";
    } else {
        $pattern = '/^(09|08|03|02|01[2|6|8|9])+([0-9]{8})$/';
        if (!preg_match($pattern, $_POST['sdt_ph'])) {
            $error['sdt_ph'] = "Số điện thoại không đúng định dạng";
        } else {

            $sdt_ph = $_POST['sdt_ph'];
        }
    }
    if (empty($_POST['mt'])) {
        $error['mt'] = "Không được để trống trường mã tỉnh";
    } else {
        $mt = $_POST['mt'];
    }


    if (empty($_POST['mtr'])) {
        $error['mtr'] = "Không được để trống trường mã trường";
    } else {
        $mtr = $_POST['mtr'];
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

    if (empty($_POST['nganh'])) {
        $error['nganh'] = "Bạn chưa chọn ngành xét tuyển";
    } else {
        $nganh = $_POST['nganh'];
    }

    if (empty($error)) {
        $sql = "INSERT INTO thisinh (hoten, gioitinh, ngaysinh, dantoc, tongiao, noisinh, namtn, hl12,diemtk12, hk12, cmnd, ngaycap, noicap, hokhau, diachi, sdt, sdt_ph, matinh, matruong, email,nganhxt)
        VALUES('$fullname','$gt','$ngaysinh','$dt','$tg','$ns','$ntn','$hl','$diemtk','$hk','$cmnd','$ngayc','$noic','$hokhau','$dc','$sdt','$sdt_ph','$mt','$mtr','$email','$nganh')";
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

     #wp-form-dk {
         width: 250px;
         min-height: auto;
         background-color: #fdfdfd;
         margin: 10px auto;
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

     #form_dk #name,
     #form_dk #gt,
     #form_dk #date,
     #form_dk #dates,
     #form_dk #hl,
     #form_dk #hk,
     #form_dk #noic,
     #form_dk #ngayc,
     #form_dk #sdt,
     #form_dk #sdt_ph,
     #form_dk #dt,
     #form_dk #tg,
     #form_dk #ns,
     #form_dk #ntn,
     #form_dk #cmnd,
     #form_dk #dc,
     #form_dk #mt,
     #form_dk #mtr,
     #form_dk #nganh,
     #form_dk #email,
     #form_dk #diemtk,

     #hokhau {
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
     label{
         font-style: italic;
     }
 </style>
 <div id="wp-form-dk">
     <h1 id="post-tile">Đăng ký tuyển sinh</h1>
     <?php
        if (!empty($alert["success"])) {
        ?>
         <p class="success"><?php echo $alert['success']; header("location:hoso.php"); ?> </p>
     <?php
        }
        ?>
     <form action="" id="form_dk" method="POST">

         <input type="text" id="name" name="fullname" placeholder="Nhập họ và tên">
         <?php
            if (!empty($error["fullname"])) {
            ?>
             <p><?php echo $error['fullname']; ?> </p>
         <?php
            }
            ?>

         <select name="gt" id="gt">
             <option value="" selected>--Chọn giới tính--</option>
             <option value="Nam">Nam</option>
             <option value="Nữ">Nữ</option>

         </select>

         <?php
            if (!empty($error["gt"])) {
            ?>
             <p><?php echo $error['gt']; ?> </p>
         <?php
            }
            ?>
         <label for="date">Ngày sinh</label>
         <input type="date" name="date" id="date" placeholder="nhập ngày sinh">
         <?php
            if (!empty($error["date"])) {
            ?>
             <p><?php echo $error['date']; ?> </p>
         <?php
            }
            ?>

         <input type="text" name="dt" id="dt" placeholder="Dân tộc">
         <?php
            if (!empty($error["dt"])) {
            ?>
             <p><?php echo $error['dt']; ?> </p>
         <?php
            }
            ?>

         <input type="text" name="tg" id="tg" placeholder="Tôn giáo">
         <?php
            if (!empty($error["tg"])) {
            ?>
             <p><?php echo $error['tg']; ?> </p>
         <?php
            }
            ?>

         <select name="ns" id="ns">
             <option value="">--Chọn nơi sinh--</option>
             <option value="Hà Tây">Hà Tây</option>
             <option value="Hà Nội">Hà Nội</option>
             <option value="Hà Nam">Hà Nam</option>
             <option value="Hưng yên">Hưng yên</option>
             <option value="Nam định">Nam định</option>
             <option value="Hòa Bình">Hòa Bình</option>
             <option value="Bắc Ninh">Bắc Ninh</option>
             <option value="Quảng Ninh">Quảng Ninh</option>
             <option value="Ninh Bình">Ninh Bình</option>
             <option value="Thái Bình">Thái Bình</option>
             <option value="Thái Nguyên">Thái Nguyên</option>
             <option value="Tuyên Quang">Tuyên Quang</option>
             <option value="Bắc Kạn">Bắc Kạn</option>
             <option value="Lào Cai">Lào Cai</option>
             <option value="Lạng Sơn">Lạng Sơn</option>
             <option value="Bắc Giang">Bắc Giang</option>
             <option value="Hà Giang">Hà Giang</option>
             <option value="Lai Châu">Lai Châu</option>
             <option value="Hải Dương">Hải Dương</option>
             <option value="Hải Phòng">Hải Phòng</option>

         </select>
         <?php
            if (!empty($error["ns"])) {
            ?>
             <p><?php echo $error['ns']; ?> </p>
         <?php
            }
            ?>

         <select name="ntn" id="ntn">
             <option value="" selected>--Chọn năm tốt nghiệp--</option>
             <option value="2016">2016</option>
             <option value="2017">2017</option>
             <option value="2018">2018</option>
             <option value="2019">2019</option>
             <option value="2020">2020</option>
         </select>
         <?php
            if (!empty($error["ntn"])) {
            ?>
             <p><?php echo $error['ntn']; ?> </p>
         <?php
            }
            ?>

         <select name="hl" id="hl">
             <option value="" selected>--Chọn học lực--</option>
             <option value="giỏi">Giỏi</option>
             <option value="khá">Khá</option>
             <option value="tb">Trung bình</option>
         </select>
         <?php
            if (!empty($error["hl"])) {
            ?>
             <p><?php echo $error['hl']; ?> </p>
         <?php
            }
            ?>
         <input type="text" name="diemtk" placeholder="Nhập điểm tổng kết 12" id="diemtk">
         <?php
            if (!empty($error["diemtk"])) {
            ?>
             <p><?php echo $error['diemtk']; ?> </p>
         <?php
            }
            ?>

         <select name="hk" id="hk">

             <option value="">--Chọn hạnh kiểm--</option>
             <option value="tốt">Tốt</option>
             <option value="khá">Khá</option>
             <option value="tb">Trung bình</option>
         </select>
         <?php
            if (!empty($error["hk"])) {
            ?>
             <p><?php echo $error['hk']; ?> </p>
         <?php
            }
            ?>

         <input type="text" name="cmnd" placeholder="Nhập số chứng minh thư nhân dân" id="cmnd">
         <?php
            if (!empty($error["cmnd"])) {
            ?>
             <p><?php echo $error['cmnd']; ?> </p>
         <?php
            }
            ?>
              <label for="dates">Ngày cấp</label>
         <input type="date" name="dates" id="dates" placeholder="Ngày cấp">
         <?php
            if (!empty($error["dates"])) {
            ?>
             <p><?php echo $error['dates']; ?> </p>
         <?php
            }
            ?>

         <input type="text" name="noic" placeholder="Nơi cấp" id="noic">
         <?php
            if (!empty($error["noic"])) {
            ?>
             <p><?php echo $error['noic']; ?> </p>
         <?php
            }
            ?>

         <input type="text" name="hokhau" id="hokhau" placeholder="Nhập hộ khẩu thường trú">
         <?php
            if (!empty($error["hokhau"])) {
            ?>
             <p><?php echo $error['hokhau']; ?> </p>
         <?php
            }
            ?>

         <input type="text" name="dc" id="dc" placeholder="Nhập địa chỉ liên hệ">
         <?php
            if (!empty($error["dc"])) {
            ?>
             <p><?php echo $error['dc']; ?> </p>
         <?php
            }
            ?>

         <input type="text" name="sdt" id="sdt" placeholder="Nhập số điện thoại liên hệ">
         <?php
            if (!empty($error["sdt"])) {
            ?>
             <p><?php echo $error['sdt']; ?> </p>
         <?php
            }
            ?>

         <input type="text" name="sdt_ph" id="sdt_ph" placeholder="Nhập số điện thoại của phụ huynh">
         <?php
            if (!empty($error["sdt_ph"])) {
            ?>
             <p><?php echo $error['sdt_ph']; ?> </p>
         <?php
            }
            ?>

         <input type="text" name="mt" id="mt" placeholder="Mã tỉnh">
         <?php
            if (!empty($error["mt"])) {
            ?>
             <p><?php echo $error['mt']; ?> </p>
         <?php
            }
            ?>

         <input type="text" name="mtr" id="mtr" placeholder="Mã trường">
         <?php
            if (!empty($error["mtr"])) {
            ?>
             <p><?php echo $error['mtr']; ?> </p>
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


         <select name="nganh" id="nganh">

             <option value="" selected>--Chọn ngành xét tuyển--</option>
             <option value="Công trình thủy">Công trình thủy</option>
             <option value="Xây dựng">Xây dựng</option>
             <option value="Tài nguyên nước">Tài nguyên nước</option>
             <option value="CNTT">Công nghệ thông tin</option>
             <option value="KTPM">Kỹ Thuật Phần mềm</option>
             <option value="HTTT">Hệ thống thông tin</option>
             <option value="Kế toán">Kế toán</option>
             <option value="QTKD">Quản trị kinh doanh</option>

         </select>
         <?php
            if (!empty($error["nganh"])) {
            ?>
             <p><?php echo $error['nganh']; ?> </p>
         <?php
            }
            ?>

         <input type="submit" value="Đăng ký ứng tuyển" name="bt_dk" id="bt_dk">

     </form>
 </div>
</body>

</html>