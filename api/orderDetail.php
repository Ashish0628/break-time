<?php
    require_once 'DbConnect.php';
    $db = new DbConnect();
    $con = $db->connect();
    session_start();
    extract($_POST);
    $uname=$_SESSION['uname'];

    $stmt = $con->prepare("INSERT INTO `order_history` (`username`, `order_detail`,`total_price`) VALUES ('$uname', '$detail','$totalPrice');");
	if($stmt->execute()){
     return 1;
	    }else{
	return 0; 
    }

?>