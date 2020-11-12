<?php
// Hàm include files
function inc()
{
	include 'incs/class_db.php';
	include 'incs/class_home.php';
}

// Gọi hàm inc() để bắt đầu include file
inc();

// Khởi tạo class_home.php
$homelib = new homelib();

// Kiểm tra có bấm nút Đăng ký hay không! nếu có thực hiện đăng ký
if (isset($_POST["login_action"])) {
	$message = $homelib->login();
	$error = $message[0];
	$data = $message[1];
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Đăng Nhập</title>
	<meta charset="UTF-8">
</head>

<body>
	<style>
		body {
			font-size: 14px;
			font-family: Arial, Helvetica, sans-serif;
			line-height: 23px;
			background-color: #029ef3;
		}

		#post-tile {
			font-size: 18px;
			padding: 0px 0px 0px 20px;
		}

		#wp-form-login {
			width: 265px;
			background-color: #fdfdfd;
			margin: 150px auto;
			border-radius: 3px;

			padding: 30px 20px 20px 20px;
			text-align: center;


		}



		#form-login #username,
		#form-login #password {
			display: block;
			padding: 10px 10px 10px 0px;
			width: 100%;
			margin-bottom: 9px;
			background-color: #f7f7f7;
			border: none;
		}

		#form-login #bt_lg {
			display: block;
			width: 100%;
			background-color: #029ef3;
			border: none;
			color: #fff;
			padding: 10px 0px;
			margin: 15px 0px 10px;

		}
		p{
			color: red;
		}
	</style>

	<div id="wp-form-login">
		<h1 id="post-tile">Đăng Nhập</h1>
		<p><?php echo isset($error['message']) ? $error['message'] : ''; ?></p>
		<form method="post" action="login.php" id="form-login">



			<input type="text" name="username" id="username" placeholder="Username" value="<?php echo isset($data['username']) ? $data['username'] : ''; ?>" />
			<p><?php echo isset($error['username']) ? $error['username'] : ''; ?></p>



			<input type="password" name="password" id="password" placeholder="Password" value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>" />
			<p><?php echo isset($error['password']) ? $error['password'] : ''; ?></p>


			<input type="submit" name="login_action" value="Đăng nhập" id="bt_lg">

		</form>
	</div>
</body>

</html>