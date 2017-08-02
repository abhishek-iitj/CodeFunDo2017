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

//connection  established

$mobile=$_POST['mobile'];
$password=$_POST['password'];
// $mobile="8003457479";
// $password="jarvis";

try{
    
    $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "select * from merchant_table where mobile='$mobile' and password='$password'";
    
    $stmt=$conn->query($sql);
    $ids = $stmt->fetchAll(); 
    if(count($ids)>0){

        foreach($ids as $id) {
            $resultStr=$id['name']."+".$id['address']."+".$id['room'] ;
        }
        echo $resultStr;
    }
    else
        echo"failure";
     
 }

 catch(Exception $e){

    echo"failure";
     die(print_r($e));
 
 }
 
?>

