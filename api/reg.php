<?php
      
      require_once './DbOperation.php';
      
    if($_SERVER['REQUEST_METHOD']=='POST'){
    
          $db = new DbOperations(); 

          $result = $db->createUser( 	$_POST['name'],
                        $_POST['username'],
                        $_POST['password'],
                        $_POST['mobile']
                      );
          if($result == 1){
           echo "User registered successfully";
          }
          else{
            echo "Please choose a different username";						
          }
             
      }
   
    ?>