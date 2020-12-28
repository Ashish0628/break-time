<?php 

	class DbOperations{

		private $con; 

		function __construct(){

			require_once dirname(__FILE__).'/DbConnect.php';

			$db = new DbConnect();
			$this->con = $db->connect();

		}

		/*CRUD -> C -> CREATE */

		public function createUser($name, $username, $password,$mobile){
		
				$stmt = $this->con->prepare("INSERT INTO `user_data` (`name`, `username`, `password`,`mobile`) VALUES ('$name','$username','$password',$mobile);");
				
			
				if($stmt->execute()){
					return 1; 
				}else{
					return 0; 
				}
			
		}

		


		

	
	}
  
	
