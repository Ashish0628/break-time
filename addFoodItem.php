<?php
$xyz="Login/Register";
session_start();
if(isset($_SESSION['uname']))
{   $xyz=($_SESSION['uname']);
   // echo "Welcome " .   $_SESSION['uname'] . " Password:" . $_SESSION['password'];
    if(isset($_GET['logout'])){
        session_unset();
        session_destroy();
        echo "<script> location.href='index.php'; </script>";
        $xyz="Login/Register";
    }
}
else{

	echo "<script> location.href='login.php'</script>";

}
require_once 'api/DbConnect.php';
$db = new DbConnect();
$con = $db->connect();
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
        <li ><a href="index.php">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="menu.php">Menu</a></li>
          <?php
            if($xyz=="admin"){
              echo "
            <li ><a href=\"onGoingOrder.php\">On Going Orders</a></li>
            <li ><a href=\"order_history.php\">Order History</a></li>
            <li class=\"active\"><a href=\"addFoodItem.php\">Add Food Item</a></li>
          ";
            }
            else{
              echo " <li><a href=\"order.php\">Order Food</a></li>
              <li ><a href=\"order_history.php\">Order History</a></li>
             ";
            }
          ?>
          <li class="book-a-table text-center"><a href="login.php"><?php echo $xyz ?></a></li>
          <?php 
          if(isset($_SESSION['uname']))
          {  
             echo "<li class=\"book-a-table text-center\"><a href=\"index.php?logout=true\">Logout</a></li>"; 
          }
          
          
          ?>
        </ul>
      </nav>

    </div>
  </header>
  <div id="register" class="register">
    <div class="container">
      <div class="headerReg">
        <h2 style="text-align:center">Update Menu</h2>
      </div>
     
      <form action="" method="post" role="form" id="form" class="form" onSubmit="return validateSubmit()">
        <div class="form-row">
         <label for="dish">Dish Name</label>  
          <input type="text" placeholder="New Dish" name="dish" id="dish" />
          <i class="fas fa-check-circle"></i>
          <i class="fas fa-exclamation-circle"></i>
          <small>Error message</small>
        </div>
        <div class="form-row">
          <label for="ingredients">Ingredients</label>
          <input type="text" placeholder="Comma seperated Ingredients" name="ingredients" id="ingredients" />
          <i class="fas fa-check-circle"></i>
          <i class="fas fa-exclamation-circle"></i>
          <small>Error message</small>
        </div>
        <div class="form-row">
          <label for="price">Price</label>
          <input type="text" placeholder="Dish Price" name="price" id="price" />
          <i class="fas fa-check-circle"></i>
          <i class="fas fa-exclamation-circle"></i>
          <small>Error message</small>  
        </div>
        <div class="form-row">
          <label for="type">Dish Type</label>
          <input type="text" placeholder="Dish Type" name="type" id="type" />
          <i class="fas fa-check-circle"></i>
          <i class="fas fa-exclamation-circle"></i>
          <small>Error message</small>  
        </div>
        <div class="loading" id="loading">Loading</div>
        
        <button id="submit" name="submit" value="submit" type="submit"><b>ADD</b></button>
      </form>
      
      
      
      <?php
      extract($_POST);

      
      $db = new DbConnect();
    $con = $db->connect();
      $msg = '';

      if($_SERVER['REQUEST_METHOD']=='POST'){
      if($_POST['dish']!='' and
       $_POST['price']!='' and
        $_POST['type']!=''  ){

            $sql="INSERT INTO `menu` (`item_name`,`price`,`ingredients`,`type`) VALUES ('$dish',$price,'$ingredients','$type');";
            $stmt = $con->prepare($sql);
	        if($stmt->execute()){
                $msg="New Dish Successfully Added!";
	            }else{
                    $msg="Dish already there in menu!";
            }


              
        }
        else{
          $msg="Please Fill All Details";
        }
      }
      echo "<div \" class=\"error-message\">$msg</div>";
      echo " <script src=\"assets/js/addmenu.js\"></script>"
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
