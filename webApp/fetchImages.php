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
     echo "failure";

$mobile=$_POST['mobile'];

try{
	 $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "select * from uploads where mobile='$mobile'";
    $stmt=$conn->query($sql);
    $ids = $stmt->fetchAll(); 
    $json = array();
    $i=0;
    if(count($ids)>0){
        foreach($ids as $row) {
                array_push($json,array($row[1])); 
                }
        print(json_encode($json, JSON_UNESCAPED_SLASHES));
    }
    else
        print(json_encode("currently No images are available from merchant."));
 }

catch(Exception $e){

    echo"failure";
    die(print_r($e));
 
 }

 ?>