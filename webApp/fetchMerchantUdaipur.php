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
    $sql = "select * from merchant_table";
    $stmt=$conn->query($sql);
    $ids = $stmt->fetchAll(); 
    $json = array();
    $i=0;
    if(count($ids)>0){
        foreach($ids as $row) {
            if($row[4]>0){
				if (strpos($row[3], 'udaipur')!==false)
					 array_push($json,array("Mobile"=>$row[0],"Name"=>$row[2],"Address"=>$row[3],"Room"=>$row[4],
                    "Rating"=>$row[5],"Fare"=>$row[6]));
                if (strpos($row[3], 'Udaipur')!==false)
                     array_push($json,array("Mobile"=>$row[0],"Name"=>$row[2],"Address"=>$row[3],"Room"=>$row[4],
                    "Rating"=>$row[5],"Fare"=>$row[6]));
                }
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

// $i=“select * from merchant”);

// $num_rows = mysql_num_rows($i);
// while($row = mysql_fetch_array($i))
// {
// 	$r[]=$row;
// 	$check=$row['Id'];
// 	}

// 	if($check==NULL)
// 	{
// 	$r[$num_rows]=”Record is not available”;
// 	print(json_encode($r));
// 	}
// 	else
// 	{
// 	$r[$num_rows]=”success”;
// 	print(json_encode($r));
// }

// mysql_close($localhost);
// ?>