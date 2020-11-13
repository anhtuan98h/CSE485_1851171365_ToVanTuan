<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php
$conn = mysqli_connect('localhost', 'root', '') or die("Không thể kết nối ");
mysqli_select_db($conn, 'tlu') or die("Không tồn tại cơ sở dữ liệu tlu");
$list = array();
$sql = "SELECT *FROM user";
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

            .form-control {
                width: 300px;
            }

            .btn {
                width: 100px;
            }
        </style>

        <div id="content">

            <h1 class="text-info text-center">Danh sách người dùng</h1>
            <?php
            if (!empty($list)) {
            ?>
                <table id="list_data" class="table  table-striped table-dark">
                    <thead class="thead-dark">
                        <tr>

                            <td>STT</td>
                            <td>ID</td>
                            <td>Username</td>
                            <td>Email</td>
                            <td>Permission</td>
                            <td>Thao tác</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $temp = 0;
                        foreach ($list as $user) {
                            $temp++;
                        ?>
                            <tr>

                                <th><?php echo $temp; ?></th>
                                <td><?php echo $user['user_id']; ?></td>
                                <td><?php echo $user['username']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $user['permission']; ?></td>

                                <td> <a href="update_user.php?module=update&user_id=<?php echo $user['user_id']; ?>" target="blank"><i class="fa fa-edit"></i></a>|<a href="delete_user.php?module=delete&user_id=<?php echo $user['user_id']; ?>"><i class="fa fa-eraser"></i></a> </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>

                </table>
                <p>Có <?php echo $num; ?> người dùng</p>
            <?php
            }
            ?>
            <style>
                .btn {
                    width: 150px;

                }
            </style>
            <a href="adduser.php" target="blank">

                <input type="submit" class="btn btn-success" value=" Thêm người dùng +">
            </a>

        </div>
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<?php include 'footer.php'; ?>