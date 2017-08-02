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

$mobile="8239110707";//$_POST["mobile"];

try{
	 $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "select * from connectionsTable where mobileMerchant='$mobile'";
    $stmt=$conn->query($sql);
    $ids = $stmt->fetchAll(); 
    $json = array();
    
    $i=0;
    if(count($ids)>0){
        foreach($ids as $row){
            
            //echo $row[1];
            $sql2="Select * from users where mobile='$row[1]'";
            $stmt2=$conn->query($sql2);
            $ids2=$stmt2->fetchAll();
            foreach($ids2 as $row2)
                $json[$i][]="Name: ".$row2[0]."+Mobile: ".$row2[1];
                    			
		}

        print(json_encode($json));

    }
    else
        print(json_encode("currently No rooms are empty."));
     
 }

catch(Exception $e){

    echo"failure";
    die(print_r($e));
 
 }
 ?>