<?php
define('authKey','138462A61k4lZWuO9588764be');
define('SENDERID','DEMOOO');
try{
    $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

$connectionInfo = array("UID" => "fun_do@codefundof9", "pwd" => "Jarvis101", "Database" => "jarvis", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "codefundof9.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

if(!$conn)
     echo "failure";
//connection  established



$mobile=	$_POST['mobile'];
$name=$_POST['name']; 
$city=$_POST['city'];
$password=	$_POST['password'];
$dob=$_POST['dob'];



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
	
	
	
	

try{
    
    $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "select * from users where mobile='$mobile'";
    //echo $sql;
    $stmt=$conn->query($sql);
    $ids = $stmt->fetchAll(); 
	
	//Generating a 6 Digits OTP or verification code 
		$otp = rand(100000, 999999);
		
		
    if(count($ids) > 0)
        echo "failure";
    else{
        $sql = "INSERT INTO users(name, mobile, dob, city, password, otp) VALUES('$name', '$mobile','$dob','$city','$password', '$otp')";
        $conn->query($sql);
        if ($conn){
			echo"success";
			//echo sendOtp($otp,$mobile);
		}
            
        else 
            echo "failure2";
    }
     
 }
 catch(Exception $e){
    echo"failure3";
 }
 
?>

