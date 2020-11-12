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
if (isset($_POST["register_action"])) {
	$message = $homelib->resgister();
	$error = $message[0];
	$data = $message[1];
}

?>
<!DOCTYPE html>
<html>

<head>
	<title>Đăng ký</title>
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

		#wp-form-register {
			width: 265px;
			background-color: #fdfdfd;
			margin: 150px auto;
			border-radius: 3px;

			padding: 30px 20px 20px 20px;
			text-align: center;


		}



		#form-register #username,
		#form-register #password,
		#form-register #email {
			display: block;
			padding: 10px 10px 10px 0px;
			width: 100%;
			margin-bottom: 9px;
			background-color: #f7f7f7;
			border: none;
		}

		#form-register #bt_register {
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
	
	<div id="wp-form-register">
	<h1 id="post-tile">Đăng ký</h1>
	<form method="post" action="register.php" id="form-register">
	 
		<input type="text" name="username" id="username" placeholder="Nhập username" value="<?php echo isset($data['username']) ? $data['username'] : ''; ?>" />
		<p> <?php echo isset($error['username']) ? $error['username'] : ''; ?></p>


	 
		<input type="email" name="email" id="email" placeholder="Nhập email" value="<?php echo isset($data['email']) ? $data['email'] : ''; ?>" />
		<p> <?php echo isset($error['email']) ? $error['email'] : ''; ?></p>



		 
		<input type="password" name="password" id="password" placeholder="Nhập password" value="<?php echo isset($data['password']) ? $data['password'] : ''; ?>" />
		<p> <?php echo isset($error['password']) ? $error['password'] : ''; ?></p>


		<input type="submit" name="register_action" id="bt_register" value="Đăng ký" />

	</form>
	</div>
</body>

</html>