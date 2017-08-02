<?php 
	
//If a post request is detected 
if($_SERVER['REQUEST_METHOD']=='POST'){

	//Getting the username and otp 
	$username = $_POST['username'];
	$otp = $_POST['otp'];

    //Importing the dbConnect script 
	//require_once('dbConnect_otp.php');
	
	try{
		 $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
		 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		 $sql = "SELECT * FROM message WHERE username = '$username' ";
		 
		 $stmt=$conn->query($sql);
		 $realotp = $stmt->fetchAll(); 
		 if (count($realotp)>0){
			 foreach($realotp as $rotp) {
				 $get_otp=$rotp['otp'];
			 }
		 }
		 else {
			 //echo 'error';
		 }
		 
		 //echo $get_otp;
		
		 if( $otp==$get_otp){
			//Creating an sql query to update the column verified to 1 for the specified user 
			$sql = "UPDATE message SET verified = 1 WHERE username ='$username'";
			
			//If the table is updated 
			if($conn->query($sql)){
				//displaying success 
				echo 'success';
			}else{
				//displaying failure 
				echo 'failure';
			}
		}else{
			//displaying failure if otp given is not equal to the otp fetched from database  
			echo 'otp not match';
		}
	 }
	 catch(Exception $e){
		 //echo 'in catch block';
		 die(print_r($e));
	 }
}
?>