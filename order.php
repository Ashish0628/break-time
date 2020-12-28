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

  <title>Order-Food BreakTime</title>
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
  <header style="background: black;" id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.php"><span>Break-Time</span></a></h1>

      </div>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li ><a href="index.php">Home</a></li>
          <li><a href="#about">About</a></li>
          <li ><a href="menu.php">Menu</a></li>
          <li class="active"><a href="order.php">Order Food</a></li>
          <li><a href="#events">Events</a></li>
          <li><a href="#chefs">Chefs</a></li>
       
          <li><a href="#contact">Contact</a></li>
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
<section id="menu" class="menu">
      <div class="container">

        <div class="section-title">
          <h2>Check our tasty <span>Menu</span></h2>
        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="menu-flters">

              <li data-filter="*" class="filter-active">SHOW ALL</li>
              <?php
                $sql="select distinct type from menu";
                $result= mysqli_query($con,$sql);
                $result= mysqli_query($con,$sql);
                while($row=mysqli_fetch_assoc($result)){
                    $t=$row['type'];
                    $st=strtoupper($t);
                    echo "<li data-filter=\".filter-$t \">$st</li>";
                }

              ?>        
            </ul>
          </div>
        </div>

        <div class="row menu-container">
          <?php
           
            $sql="select * from menu";
            $result= mysqli_query($con,$sql);
            while($row=mysqli_fetch_assoc($result)){
                menuItem($row['item_name'],$row['type'],$row['ingredients'],$row['price'],$row['item_no']);

            }

            $sql="select count(*) as tot from menu";
            $result= mysqli_query($con,$sql);
            $row=mysqli_fetch_assoc($result);
            $tot =$row['tot'];
            echo "<p id=\"tot\" hidden>$tot</p>";


            function menuItem($name,$type,$ing,$price,$item_id){
            echo "<div class=\"col-lg-6 menu-item filter-$type\">
                <div class=\"menu-content\">
                <p id=\"$item_id name\">$name</p><span id=\"$item_id price\">$price</span>
                </div>
                <div class=\"menu-ingredients\">
                    $ing
                </div>
                <div class=\"input-group\">
                <span class=\"input-group-btn\">
                    <button type=\"button\" class=\"btn btn-danger btn-number\"  data-type=\"minus\" data-field=\"$item_id\">
                      <span class=\"glyphicon glyphicon-minus\"></span>
                    </button>
                </span>
                <input type=\"text\" name=\"$item_id\"  class=\"form-control input-number\" value=\"0\" min=\"0\" max=\"100\">
                <span class=\"input-group-btn\">
                    <button type=\"button\" class=\"btn btn-success btn-number\" data-type=\"plus\" data-field=\"$item_id\">
                        <span class=\"glyphicon glyphicon-plus\"></span>
                    </button>
                </span>
             </div>
                </div>";
            }
          ?>
         
        </div>
        <script>
        var final;
            function get(){
                var final_order="";
                var tot = document.getElementById("tot").innerHTML;
                var total_price=0;
                for(var i=1;i<=tot;i++){
                   
                    var x = document.getElementsByName(i)[0].value;
                    if(x>0){
                        var item_name = document.getElementById(i+" name").innerHTML;  
                        var item_price = document.getElementById(i+" price").innerHTML;  
                        final_order=final_order+""+x+" X "+item_name+" ------------ ( "+x+" X "+item_price+" ) = "+item_price*x+"<br/>";
                        total_price=total_price+(item_price*x);
                    }
                     
                }
                final_order=final_order+"Total Price :"+total_price;
                final=final_order;   
                document.getElementById("cart").innerHTML =final_order;
                if(total_price==0){
                  document.getElementById("orderBtn").disabled = true;
                }
                if(total_price!=0){
                  document.getElementById("orderBtn").disabled = false;
                }
            }
    
            function orderClick(){
                          var orderDetail={};
                          orderDetail.detail=final;
                          console.log(orderDetail);
                          $.ajax({
                          url:'api/orderDetail.php',
                          type:'post',
                          data:orderDetail,
                          success:function(res){
                            alert("Order has been placed successfully!");
                            location.href='index.php';
                          }

                        });
                
                }
            </script>
            
             
        </div>
           <div>
       

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Please Confirm Your Order</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div id="cart" class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Modify Order</button>
                    <button style="color: #fff;
                              background: #ffb03b; "
                      type="button" id="orderBtn" onclick="orderClick()"class="btn btn-primary">Place Order</button>
              
                </div>
                </div>
            </div>
            </div>
      </div>
            </div>
    </section>
    <div style="  text-align: center;">
    <button style="margin-bottom:40px;    color: #fff;
    background: #ffb03b;    padding: 8px 16px 10px 16px;" onclick="get()" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
             <strong>Confirm Order</strong> 
            </button>
          
          </div>
    
     <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h3>Break-Time</h3>
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="assets/js/plusminus.js"></script>
  <!-- Template Main JS File -->
  
  <script src="assets/js/main.js"></script>

</body>

</html>
