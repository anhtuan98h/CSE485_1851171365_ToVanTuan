<?php
function inc()
{
  include 'incs/class_db.php';
  include 'incs/class_home.php';
}
inc();

$homelib = new homelib();

$sql = "SELECT * FROM category";
$data = $homelib->get_list($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="assets/font/fontawesome/css/all.css">
  <link rel="stylesheet" href="assets/css/reset.css">
  <link rel="stylesheet" href="assets/css/global.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <title>CSE CNTT</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/blog-home.css" rel="stylesheet">

</head>

<body>
<style>
  a.hover:hover{
       background-color: red;
  }

</style>
<div id="wrapper">
  <div id="header">

    <div class="container justify-content-between">
      <a href="index.php" id="logo">
        <img src="assets/images/15.jpg" alt="">
      </a>
      <!-- End logo -->
      <form id="search" action="">
        <input type="text" name="q" placeholder="Tìm kiếm">
        <button><i class="fas fa-search"></i></button>
      </form>
    </div>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">

      <div class="container">
        <a class="navbar-brand hover" href="index.php">Trang chủ</a>

        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">

            <?php
            for ($i = 0; $i < count($data); $i++) {
            ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?cat=<?php echo $data[$i]["category_id"]; ?>"><?php echo $data[$i]["name"]; ?></a>
              </li>

            <?php
            }
            ?>

            <?php if (isset($_COOKIE["user"])) { ?>
              <li class="nav-item">
                <span class="nav-link">Xin Chào! <?php echo $_COOKIE["user"]; ?></span>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Đăng xuất</a>
              </li>
            <?php
            } else {
            ?>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Đăng nhập</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register.php">Đăng ký</a>
              </li>
            <?php
            }
            ?>

          </ul>
        </div>
      </div>
    </nav>
  </div> 
  <hr>