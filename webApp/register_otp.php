<?php 
	//Constants for our API
	//this is applicable only when you are using Cheap SMS Bazaar
	define('SMSUSER','jarvis6');
	define('PASSWORD','jarvis6');
	define('authKey','138462A61k4lZWuO9588764be');
	define('SENDERID','DEMOOO');
			
	
	//This function will send the otp 
	function sendOtp($otp, $phone){
		//This is the sms text that will be sent via sms 
		$sms_content = "$otp is your OTP for roomz verification!\n Welcome!!";
		
		//Encoding the text in url format
		$sms_text = urlencode($sms_content);
		//echo $sms_text;

		//This is the Actual API URL concatnated with required values 
		//$api_url = 'http://login.cheapsmsbazaar.com/vendorsms/pushsms.aspx?user='.SMSUSER.'&password='.PASSWORD.'&msisdn=91'.$phone.'&sid='.SENDERID.'&msg='.$sms_text.'&fl=0';
		$api_url = 'https://control.msg91.com/api/sendhttp.php?authkey='.authKey.'&mobiles='.$phone.'&message='.$sms_text.'&sender='.SENDERID.'&route=4';
		
		//Envoking the API url and getting the response 
		return file_get_contents( $api_url);
		
		//Returning the response 
		//
	}
	
	
	
	
	
	//If a post request comes to this script 
	if($_SERVER['REQUEST_METHOD']=='POST'){	
		//getting username password and phone number 
		$username = $_POST['username'];
		$password = $_POST['password'];
		$phone = $_POST['phone'];
		
		//Generating a 6 Digits OTP or verification code 
		$otp = rand(100000, 999999);
		
		//Importing the db connection script 
		require_once('dbConnect_otp.php');
			
		$conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//Creating an SQL Query 
		$sql = "INSERT INTO message (username, password, phone, otp) values ('$username','$password','$phone','$otp')";
		
		//If the query executed on the db successfully 
		if($conn->query($sql)){
			//printing the response given by sendOtp function by passing the otp and phone number 
           echo sendOtp($otp,$phone);
		}else{
			//printing the failure message in json 
			echo '{"ErrorMessage":"Failure"}';
		}
		
		//Closing the database connection s
		
	}
?>