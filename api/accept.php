<?php
    require_once 'DbConnect.php';
    $db = new DbConnect();
    $con = $db->connect();
    session_start();
    extract($_POST);
    
    $stmt = $con->prepare("UPDATE `order_history` SET `status` = '$status' WHERE `order_history`.`order_id` = '$id';");
	if($stmt->execute()){
     return 1;
	    }else{
	return 0; 
    }

?>