<?php
/*define('HOST','in-cdbr-azure-south-c.cloudapp.net');
define('USER','bd0a71283485ea');
define('PASS','250c11b5');
define('DB','acsm_9a184396f9a4cac');

$con = sqlsrv_connect(HOST,USER,PASS,DB);
*/


// PHP Data Objects(PDO) Sample Code:
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
/*
$serverName = "in-cdbr-azure-south-c.cloudapp.net"; //serverName\instanceName
$connectionInfo = array( "Database"=>"acsm_9a184396f9a4cac", "UID"=>"bd0a71283485ea", "PWD"=>"250c11b5");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
*/
if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}
/*
if (!$conn){
	die("Connection failed".mysqli_connect_error());
}*/
/*
$sql = "CREATE TABLE users (slno INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, mobile VARCHAR(10) NOT NULL, password VARCHAR(30), name VARCHAR(30) NOT NULL, city VARCHAR(50), dob VARCHAR(50))";


if (mysqli_query($conn, $sql)) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
*/

$host = "codefundof9.database.windows.net";
 $user = "fun_do@codefundof9";
 $pwd = "Jarvis101";
 $db = "jarvis";

try{
     $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //$sql = "INSERT INTO users(name, mobile, dob, city, password) VALUES('akash', //'8239110707','29.12.1997','jodhpur','akash')";
     //$sql = "INSERT INTO connections(mobile,interests) VALUES('8239110707','cricket')";
     $sql = "INSERT INTO connectionsTable(mobileMerchant,mobileStudent) VALUES('5623124578','978455973')";

	 
     $conn->query($sql);
 }
 catch(Exception $e){
     die(print_r($e));
 }
 echo "<h3>Inserted</h3>";

?>
<html>
<head></head>
<body>
	Hi there!!
</body>

</html>