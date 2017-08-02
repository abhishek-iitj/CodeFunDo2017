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

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}


try{
     $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "SELECT * FROM users";
     $stmt=$conn->query($sql);
     $registrants = $stmt->fetchAll(); 
    if(count($registrants) > 0) {
         echo "<h2>People who are registered:</h2>";
         echo "<table>";
         echo "<tr><th>Name</th>";
         echo "<th>MOBILE</th>";
         echo "<th>Password</th></tr>";
         foreach($registrants as $registrant) {
             echo "<tr><td>".$registrant['name']."</td>";
             echo "<td>".$registrant['mobile']."</td>";
             echo "<td>".$registrant['password']."</td></tr>";
         }
          echo "</table>";
     } else {
         echo "<h3>Connections table is empty now.</h3>";
     }
 }
 catch(Exception $e){
     die(print_r($e));
 }

try{
     $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "SELECT * FROM connections";
     $stmt=$conn->query($sql);
     $registrants = $stmt->fetchAll(); 
    if(count($registrants) > 0) {
         echo "<h2>Connections:</h2>";
         echo "<table>";
         echo "<th>MOBILE</th>";
         echo "<th>Connections</th></tr>";
         foreach($registrants as $registrant) {
             echo "<td>".$registrant['mobile']."</td>";
             echo "<td>".$registrant['interests']."</td></tr>";
         }
          echo "</table>";
     } else {
         echo "<h3>No one is currently registered.</h3>";
     }
 }
 catch(Exception $e){
     die(print_r($e));
 }
 
 try{
     $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "SELECT * FROM message";
     $stmt=$conn->query($sql);
     $registrants = $stmt->fetchAll(); 
    if(count($registrants) > 0) {
         echo "<h2>MESSAGE:</h2>";
         echo "<table>";
         echo "<th>ID</th>";
         echo "<th>USERNAME</th>";
         echo "<th>PASSWORD</th>";
         echo "<th>MOBILE</th>";
         echo "<th>OTP</th>";
         echo "<th>VERIFIED</th></tr>";
         foreach($registrants as $registrant) {
             echo "<td>".$registrant['id']."</td>";
             echo "<td>".$registrant['username']."</td>";
             echo "<td>".$registrant['password']."</td>";
             echo "<td>".$registrant['phone']."</td>";
             echo "<td>".$registrant['otp']."</td>";
             echo "<td>".$registrant['verified']."</td></tr>";
         }
          echo "</table>";
     } else {
         echo "<h3>No one is currently registered.</h3>";
     }
 }
 catch(Exception $e){
     die(print_r($e));
 }

try{
     $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "SELECT * FROM merchant_table";
     $stmt=$conn->query($sql);
     $registrants = $stmt->fetchAll(); 
    if(count($registrants) > 0) {
         echo "<h2>Merchants Registered:</h2>";
         echo "<table>";
         echo "<th>MOBILE</th>";
         echo "<th>PASSWORD</th>";
         echo "<th>NAME</th>";
         echo "<th>ADDRESS</th>";
         echo "<th>RATINGS</th>";
         echo "<th>FARE</th>";
         echo "<th>ROOMS</th></tr>";

         foreach($registrants as $registrant) {
             echo "<td>".$registrant['mobile']."</td>";
             echo "<td>".$registrant['password']."</td>";
             echo "<td>".$registrant['name']."</td>";
             echo "<td>".$registrant['address']."</td>";
             echo "<td>".$registrant['ratings']."</td>";
             echo "<td>".$registrant['fare']."</td>";
             echo "<td>".$registrant['room']."</td></tr>";
         }
          echo "</table>";
     } else {
         echo "<h3>No one is currently registered.</h3>";
     }
 }
 catch(Exception $e){
     die(print_r($e));
 }

try{
     $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     $sql = "SELECT * FROM mess_table";
     $stmt=$conn->query($sql);
     $registrants = $stmt->fetchAll(); 
    if(count($registrants) > 0) {
         echo "<h2>Mess Registered:</h2>";
         echo "<table>";
         echo "<th>MOBILE</th>";
         echo "<th>PASSWORD</th>";
         echo "<th>NAME</th>";
         echo "<th>ADDRESS</th>";
         echo "<th>FARE</th></tr>";

         foreach($registrants as $registrant) {
             echo "<td>".$registrant['mobile']."</td>";
             echo "<td>".$registrant['password']."</td>";
             echo "<td>".$registrant['name']."</td>";
             echo "<td>".$registrant['address']."</td>";
             echo "<td>".$registrant['fare']."</td></tr>";
         }
          echo "</table>";
     } else {
         echo "<h3>No Mess is currently registered.</h3>";
     }
 }
 catch(Exception $e){
     die(print_r($e));
 }

try{
    $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//$table=5;
     $sql = "SELECT * FROM connectionsTable";
     $stmt=$conn->query($sql);
     $registrants = $stmt->fetchAll(); 
    if(count($registrants) > 0) {
         echo "<h2>for each merchant:</h2>";
         echo "<table>";
         echo "<th>Merchant</th>";
         echo "<th>Student</th></tr>";
         foreach($registrants as $registrant) {
             echo "<td>".$registrant['mobileMerchant']."</td>";
             //echo "<td>".$registrant['student_address']."</td>";
             echo "<td>".$registrant['mobileStudent']."</td></tr>";
         }
          echo "</table>";
     } else {
         echo "<h3>No one is currently registered.</h3>";
     }
 }
 catch(Exception $e){
     die(print_r($e));
 }


try{
    $conn = new PDO("sqlsrv:server = tcp:codefundof9.database.windows.net,1433; Database = jarvis", "fun_do", "Jarvis101");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$table=5;
     $sql = "SELECT * FROM uploads";
     $stmt=$conn->query($sql);
     $registrants = $stmt->fetchAll(); 
    if(count($registrants) > 0) {
         echo "<h2>Upload History</h2>";
         echo "<table>";
         echo "<th>Mobile No.</th>";
         echo "<th>URL</th></tr>";
         foreach($registrants as $registrant) {
             echo "<td>".$registrant['mobile']."</td>";
             //echo "<td>".$registrant['student_address']."</td>";
             echo "<td>".$registrant['url']."</td></tr>";
         }
          echo "</table>";
     } else {
         echo "<h3>No uploads till now</h3>";
     }
 }
 catch(Exception $e){
     die(print_r($e));
 }

 echo "<h3>Hii.</h3>";

?>

<html>
<head></head>
<body>
	Hi there!!
</body>

</html>