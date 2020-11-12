<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>

<?php
$conn = mysqli_connect('localhost', 'root', '') or die("Không thể kết nối ");
mysqli_select_db($conn, 'tlu') or die("Không tồn tại cơ sở dữ liệu tlu");
$list = array();
$sql = "SELECT *FROM thisinh";
if (isset($_POST['search'])) {
    $s=$_POST['search'];
    $sql="SELECT * FROM thisinh WHERE hoten LIKE '%$s%' Order By id ASC";
}
$result = mysqli_query($conn, $sql);
$num = mysqli_num_rows($result);
if ($num > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $list[] = $row;
    }
}


?>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <img src="assets/img/logo.PNG" alt="logo" title="logo">
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <style>
            #list_data thead tr td {
                font-weight: bold;
                border-bottom: 5px solid #f00;
                text-align: center;
            }

            #list_data tr th td {
                border: 1px solid #333;
                padding: 8px 15px;
                text-align: center;

            }

            p {
                font-style: italic;
                color: red;
                font-size: 16px;
            }

            .form-inline {
                float: right;
                
            }
            .btn{
                width: 100px;
            }
        </style>
      

        <div id="content">
        <form action="" method="POST" class="form-inline" role="form">
            <div class="form-group">
                <input type="text" class="form-control " name="search" placeholder="Bạn muốn tìm gì">
            </div>
           
            <!-- <input class="btn btn-primary" type="submit" value="Tìm" name="bt_tk"> -->
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
            </form> <br> <br>
            <h1 class="text-info text-center">Danh sách thí sinh đăng ký xét tuyển</h1>
            <?php
            if (!empty($list)) {
            ?>
                <table id="list_data" class="table  table-striped table-dark">
                    <thead class="thead-dark">
                        <tr>

                            <td>STT</td>
                            <td>ID</td>
                            <td>Họ và tên</td>
                            <td>Giới tính</td>
                            <td>Học lực năm lớp 12</td>
                            <td>Điểm tổng kết lớp 12</td>
                            <td>Hạnh kiểm năm lớp 12</td>
                            <td>Năm tốt nghiệp</td>
                            <td>Email</td>
                            <td>Nguyện vọng đăng ký</td>
                            <td>Thao tác</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $temp = 0;
                        foreach ($list as $ts) {
                            $temp++;
                        ?>
                            <tr>

                                <th><?php echo $temp; ?></th>
                                <td><?php echo $ts['id']; ?></td>
                                <td><?php echo $ts['hoten']; ?></td>
                                <td><?php echo $ts['gioitinh']; ?></td>
                                <td><?php echo $ts['hl12']; ?></td>
                                <td><?php echo $ts['diemtk12']; ?></td>
                                <td><?php echo $ts['hk12']; ?></td>
                                <td><?php echo $ts['namtn']; ?></td>
                                <td><?php echo $ts['email']; ?></td>
                                <td><?php echo $ts['nganhxt']; ?></td>
                                <td> <a href="update.php?module=update&id=<?php echo $ts['id']; ?>" target="blank"><i class="fa fa-edit"></i></a>| <a href="deletets.php?module=delete&id=<?php echo $ts['id']; ?>"><i class="fa fa-eraser"></i></a> </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
                <p>Có <?php echo $num; ?> thí sinh đăng ký xét tuyển</p>
            <?php
            }
            ?>
            <style>
                
                    .btn{
                        width:150px ;

                    }
                
            </style>
            <a href="addts.php" target="blank">

                <input type="submit" class="btn btn-success" value="+ Thêm mới thí sinh">
            </a>

        </div>
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<?php include 'footer.php'; ?>