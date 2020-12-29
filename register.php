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
        
          <li ><a href="index.php">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="menu.php">Menu</a></li>
          <li><a href="order.php">Order Food</a></li>
          <li><a href="order_history.php">Order History</a></li>
         

          <li class="book-a-table text-center"><a href="login.php">Login/Register</a></li>
        </ul>
      </nav>

    </div>
  </header>
  <div id="register" class="register">
    <div class="container">
      <div class="headerReg">
        <h2 style="text-align:center">Create Account</h2>
      </div>
     
      <form action="" method="post" role="form" id="form" class="form" onSubmit="return validateSubmit()">
        <div class="form-row">
         <label for="name">Name</label>  
          <input type="text" placeholder="Your Name" name="name" id="name" />
          <i class="fas fa-check-circle"></i>
          <i class="fas fa-exclamation-circle"></i>
          <small>Error message</small>
        </div>
        <div class="form-row">
          <label for="username">Username</label>
          <input type="text" placeholder="Your Username" name="username" id="username" />
          <i class="fas fa-check-circle"></i>
          <i class="fas fa-exclamation-circle"></i>
          <small>Error message</small>
        </div>
        <div class="form-row">
          <label for="email">Email</label>
          <input type="email" placeholder="Your Email" name="email" id="email" />
          <i class="fas fa-check-circle"></i>
          <i class="fas fa-exclamation-circle"></i>
          <small>Error message</small>
        </div>
        <div class="form-row">
          <label for="password">Password</label>
          <input type="password" placeholder="Password" name="password" id="password" minlength="8"/>
          <i class="fas fa-check-circle"></i>
          <i class="fas fa-exclamation-circle"></i>
          <small>Error message</small>
        </div>
        <div class="form-row">
          <label for="password2">Password check</label>
          <input type="password" placeholder="Re-Enter the Password" id="password2"/>
          <i class="fas fa-check-circle"></i>
          <i class="fas fa-exclamation-circle"></i>
          <small>Error message</small>
        </div>
        <div class="form-row">
          <label for="mobile">Mobile</label>
          <input type="text" placeholder="Your Mobile Number" name="mobile" id="mobile" />
          <i class="fas fa-check-circle"></i>
          <i class="fas fa-exclamation-circle"></i>
          <small>Error message</small>
        </div>
        <div class="loading" id="loading">Loading</div>
        
        <button id="submit" name="submit" value="submit" type="submit"><b>Register</b></button>
      </form>
      
      
      
      <?php
      
      require_once 'api/DbOperation.php';
      $msg = '';

      if($_SERVER['REQUEST_METHOD']=='POST'){
      if($_POST['name']!='' and
        $_POST['username']!='' and
        $_POST['password']!='' and
        $_POST['mobile']!=''  ){

            $db = new DbOperations(); 

            $result = $db->createUser( 	$_POST['name'],
                          $_POST['username'],
                          $_POST['password'],
                          $_POST['mobile']
                        );
            if($result == 1){
            $msg="User Registered successfully";
            echo "<script> location.href='login.php'</script>";
            }
            else{
              $msg="Please Choose Different Username";						
            }
              
        }
        else{
          $msg="Please Fill All Details";
        }
      }
      echo "<div \" class=\"error-message\">$msg</div>";
      echo " <script src=\"assets/js/validate.js\"></script>"
    ?>
    </div>
     
      
  
  </div>

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Delicious</h3>
      <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
      <div class="copyright">
        &copy; Copyright <strong><span>Delicious</span></strong>. All Rights Reserved
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
