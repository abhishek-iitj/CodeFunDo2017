<?php

try {
    $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "fun_do@codefundof9", "pwd" => "Jarvis101", "Database" => "jarvis", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "codefundof9.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);

if(!$conn)
     echo "failure";
else {
	echo "connecteddsas \n";
}
     //die( print_r( sqlsrv_errors(), true));

//connection  established

//$mobile=$_POST['mobile'];
//$password=$_POST['password'];

try{
    
     $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$sql = "CREATE TABLE enterOtp (username VARCHAR(100), password VARCHAR(100), phone VARCHAR(12), otp VARCHAR(10), verified INT(4));";
	//$sql = "CREATE TABLE merchant_table (mobile VARCHAR(13), password VARCHAR(30), name VARCHAR(30),address VARCHAR(250), room INT )";
     //$conn->query($sql);
    //$sql="DROP table merchant ;";
    //echo $sql;
    //$sql = "DELETE FROM message";
    //$sql = "CREATE TABLE devices (mobile varchar(100) NOT NULL,token text NOT NULL);";
   	//$sql = "CREATE TABLE uploads (mobile varchar(100) NOT NULL, url text NOT NULL);";
    //$sql = "CREATE TABLE mess_table (mobile VARCHAR(13), password VARCHAR(30), name VARCHAR(30),address VARCHAR(250), fare VARCHAR(13), rating VARCHAR(10))";
    $conn->query($sql);


    //echo $sql;
	
 }

 catch(Exception $e){

    echo"failure";
    die(print_r($e));
 
 }
 
?>
