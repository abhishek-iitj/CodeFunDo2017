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
$name=$_POST['name']; 
$address=$_POST['address'];
$password=$_POST['password'];
$room=$_POST['room'];

try{
    
    $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "select * from merchant_table where mobile='$mobile'";
    //echo $sql;
    $stmt=$conn->query($sql);
    $ids = $stmt->fetchAll(); 
    if(count($ids) > 0)
        echo "failure";
    else{
        $sql = "INSERT INTO merchant_table(mobile,password,name,address, room) VALUES('$mobile', '$password','$name',  '$address','$room')";
        $conn->query($sql);
        if ($conn)
            echo"success";
        else 
            echo "failure";
    }
     
 }
 catch(Exception $e){
    echo"failure";
    die(print_r($e));
 }
?>


