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

try{
	 $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "select * from mess_table";
    $stmt=$conn->query($sql);
    $ids = $stmt->fetchAll(); 
    $json = array();
    $i=0;
    $j="0";
    if(count($ids)>0){
        foreach($ids as $row) {
                array_push($json,array("Mobile"=>$row[0],"Name"=>$row[2],"Address"=>$row[3],
                    "Rating"=>$row[5],"Fare"=>$row[4], "Room"=>$j));
			}
            
        print(json_encode($json));
    }
    else
        print(json_encode("currently No Mess registered."));
     
 }

catch(Exception $e){

    echo"failure";
    die(print_r($e));
 
 }
// ?>