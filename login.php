

<?php
 session_start();
 require_once 'api/DbConnect.php';
 $db = new DbConnect();
 $connection = $db->connect();
if(isset($_SESSION['uname']))
{
	echo "<script> location.href='index.php'</script>";
		
}
else{
	
	if (isset($_POST['user']) and isset($_POST['password'])){
	
		// Assigning POST values to variables.
		$username = $_POST['user'];
		$password = $_POST['password'];
		
		// CHECK FOR THE RECORD FROM TABLE
		$query = "SELECT * FROM `user_data` WHERE username='$username' and password='$password'";
		 
		$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
		$count = mysqli_num_rows($result);
		
		if ($count == 1){
		
		//echo "Login Credentials verified";
			 $uname = $_REQUEST['user'];
			 $pass = $_REQUEST['password'];
			 $_SESSION['uname']= $uname;
			 $_SESSION['password']= $pass;
		echo "<script type='text/javascript'>alert('Login Credentials verified')</script>";
		echo "<script> location.href='index.php'</script>";
		
		}else{
		echo "<script type='text/javascript'>alert('Invalid Login Credentials')</script>";
		//echo "Invalid Login Credentials";
		}
		}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Break-Time</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,600,600i,700,700i|Satisfy|Comic+Neue:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/reg.css">

</head>

<body>


  <!-- ======= Header ======= -->
  <header style="background: black;" id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.php"><span>Break-Time</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="index.php">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="menu.php">Menu</a></li>
          <li><a href="#specials">Specials</a></li>
          <li><a href="#events">Events</a></li>
          <li><a href="#chefs">Chefs</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#contact">Contact</a></li>

          <li class="book-a-table text-center"><a href="login.php">Login/Register</a></li>
        </ul>
      </nav>

    </div>
  </header>
<head>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div><b>Break</b><span><b>Time</b></span></div>
		</div>
		<br>
		<div class="login">
			<form action="" method="POST">
				<input type="text" placeholder="Username" name="user" required><br>
				<input type="password" placeholder="Password" name="password" required><br>
				<input type="submit" value="Login" name="login">
				<p></p>
				<h3 class="text-light"><a href="register.php"><span>New User Register here !</span></a></h3>
			</form>

		</div>
	<footer id="footer">
    <div class="container">
	<div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>BreakTime</span></strong>. All Rights Reserved
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
 
        
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </body>

  </html>
