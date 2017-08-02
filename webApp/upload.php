<?php
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
	     echo "failure1";
	//connection  established
	
	$mob=$_GET['mob'];//"9576990955";
	$url=$_GET['url'];//"www.google.com";

	echo $mob;
	echo"\n".$url;
	try{
	    
	    $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
	    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	   
	        $sql = "INSERT INTO uploads(mobile, url) VALUES('$mob', '$url')";
	        $conn->query($sql);
	        if ($conn)
	            echo"success";
	        else 
	            echo "failure2";
	     
	 }
	 catch(Exception $e){
	    echo"failure3";
	 }
?>