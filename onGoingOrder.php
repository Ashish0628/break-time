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

  <title>Delicious Bootstrap Template - Index</title>
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
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Delicious - v2.1.0
  * Template URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    

  <!-- ======= Header ======= -->
  <header style="background: black;" id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.php"><span>Break-Time</span></a></h1>

      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li ><a href="index.php">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="menu.php">Menu</a></li>
          <?php
            if($xyz=="admin"){
              echo "
            <li class=\"active\"><a href=\"onGoingOrder.php\">On Going Orders</a></li>
            <li ><a href=\"order_history.php\">Order History</a></li>
            <li ><a href=\"addFoodItem.php\">Add Food Item</a></li>
          ";
            }
            else{
              echo " <li><a href=\"order.php\">Order Food</a></li>
              <li ><a href=\"order_history.php\">Order History</a></li>
             ";
            }
          ?>
          <li class="book-a-table text-center"><a href="login.php"><?php echo $xyz?></a></li>
          <?php 
          if(isset($_SESSION['uname']))
          {  
             echo "<li class=\"book-a-table text-center\"><a href=\"index.php?logout=true\">Logout</a></li>"; 
          }
          
          
          ?>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->
         

  <section style="margin-top:15px;" id="why-us\" class="why-us">
      <div class="container">

        <div class="section-title">
          <h2 style="font-family: Yellowtail script=latin rev=2;">CURRENT <span>ORDERS</span></h2>
           </div>

        <div class="row">
     
                <?php
                $uname=$_SESSION['uname'];
                if($xyz=="admin"){
                  $sql="SELECT * FROM `order_history`WHERE `status`='PENDING' or `status`='BEING PREPARED' or `status`='READY' ;";
                }
                else{
                $sql="SELECT * FROM `order_history` WHERE `username`='$uname';";
                }
                $result= mysqli_query($con,$sql);
                $count = mysqli_num_rows($result);
                if($count==0){
                  echo "<div style=\"text-align: center;\">
                  <h5 style=\"font-family: Verdana, Geneva, Tahoma, sans-serif;\">Please Try Our Tasty Food</h5>
                
                  <br>       
                  </div>
              
                </div> ";
                }
              while($row=mysqli_fetch_assoc($result)){
                  template($row['order_id'],$row['total_price'],$row['order_detail'],$row['date'],$row['status']);

              }
            
              
              
              function template($order_id,$total_amt,$ing,$date,$status){
                $x="";
                $y="disabled";
                $z="disabled";
                if($status=="BEING PREPARED")
                {  $x="disabled";
                  $y="";
                  $z="disabled";
                }
                else
                if($status=="READY"){
                  $x="disabled";
                  $y="disabled";
                  $z="";  
                }
                else
                if($status=="COMPLETED")
                  $z="disabled";    

               
                echo "
                <div class=\"col-lg-4 mt-4 mt-lg-0\">
                    <div class=\"box\">
                      <h2 style=\"font-family: Verdana, Geneva, Tahoma, sans-serif;\"><span>ORDER ID:</span> $order_id</h2>
                      <span>ITEMS</span>
                      <strong><p style=\"color:#000;\"> $ing</p></strong>
                      <h4 style=\"font-family: Verdana, Geneva, Tahoma, sans-serif;\">TOTAL AMOUNT:  </h4>
                      <span style=\"font-size: large; color:#000;\">Rs $total_amt</span>
                      
                      <strong><p style=\"color:#000;\">ORDERED ON: $date</p></strong>
                      <span style=\"font-size:20px;\">Order Status </span>
                      <span id=\"$order_id status\"style=\"color:#540ADC; font-size:15px;\">$status</span>
                      <button type=\"button\" 
                      $x 
                      onclick=\"btnAcceptClicked($order_id,'BEING PREPARED','$order_id btnAccept')\" id=\"$order_id btnAccept\" class=\"btn btn-success btn-circle btn-lg\"><i class=\"glyphicon glyphicon-link\"></i></button>
                      <button type=\"button\" 
                      $y
                     
                      id=\"$order_id btnReady\" onclick=\"btnAcceptClicked($order_id,'READY','$order_id btnReady')\" 
                      class=\"btn btn-info btn-circle btn-lg\"><i class=\"glyphicon glyphicon-ok\"></i></button>
                      <button type=\"button\" 
                      $z 
                      onclick=\"btnAcceptClicked($order_id,'COMPLETED','$order_id btnComplete')\"
                      id=\"$order_id btnComplete\" class=\"btn btn-danger btn-circle btn-lg\"><i class=\"glyphicon glyphicon-remove\"></i></button>
                    </div>
                </div>
              ";
                /*  echo "  <div id = \"leftbox\"> 
        
       <div>
            <h5 style=\"font-family: Verdana, Geneva, Tahoma, sans-serif;\">ORDER NUMBER</h5>
            <span style=\"font-size: large;\">$order_id</span>
            <br>
            <h5 style=\"font-family: Verdana, Geneva, Tahoma, sans-serif;\">TOTAL AMOUNT</h5>
            <span style=\"font-size: large;\">Rs $total_amt</span>
            <br>
            <h5 style=\"font-family: Verdana, Geneva, Tahoma, sans-serif;\">ITEMS</h5>
            <span style=\font-size: large;\">$ing</span>
            <br>
            <h5 style=\"font-family: Verdana, Geneva, Tahoma, sans-serif;\">ORDERED ON</h5>
            <span style=\"font-size: large;\">$date</span>
            <br>
            <h5 style=\"font-family: Verdana, Geneva, Tahoma, sans-serif;\">ORDERED STATUS</h5>
            <span style=\"font-size: large;\">$status</span>
            <br>
        </div>
        
    </div> ";*/
      }
      
      ?>    
      <script>
        function btnAcceptClicked(id,status,btnId){
          var btn={};
          btn.id=id;
          btn.status=status;
          $.ajax({
              url:'api/accept.php',
              type:'post',
              data:btn,
              success:function(res){
                console.log(res);
                document.getElementById(btnId).disabled = true;
                if(btnId==(id+" btnAccept")){
                  document.getElementById(id+" btnReady").disabled = false;
                }
                if(btnId==(id+" btnReady")){
                  document.getElementById(id+" btnComplete").disabled = false;
                }
                document.getElementById(id+" status").innerHTML =status;

              }

            });
        }
        
      </script>
      </div>
   
</div>
</section>

<br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br> <br>
<br>
                  
      <script type="text/javascript">
          setTimeout(function(){
          location.reload();
      },10000);
      </script>


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

</body>
</html>