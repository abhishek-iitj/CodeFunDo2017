<?php
define('HOST','in-cdbr-azure-south-c.cloudapp.net');
define('USER','bd0a71283485ea');
define('PASS','250c11b5');
define('DB','acsm_9a184396f9a4cac');

$con = mysqli_connect(HOST,USER,PASS,DB);
 
if (!$conn){
	die("Connection failed".mysql_connect_error());
}
$sql = "CREATE TABLE users (slno INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, mobile VARCHAR(10) NOT NULL, password VARCHAR(30), name VARCHAR(30) NOT NULL, city VARCHAR(50), dob VARCHAR(50))";


if (mysqli_query($conn, $sql)) {
    echo "Table MyGuests created successfully";
} 
else {
    echo "Error creating table: " . mysqli_error($conn);
}


$sql = "INSERT INTO MyGuests (mobile, password,name, city,dob)
VALUES ('8003457479', 'jarvis101', 'abhishek_Sah','jodhpur','06.02.1997')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);

/*$username = $_POST['username'];
$password = $_POST['password'];
 

$sql = "select * from users where mobile='$username' and password='$password'";
 
$res = mysqli_query($con,$sql);
 
$check = mysqli_fetch_array($res);
 
if(isset($check)){
echo 'success';
}else{
echo 'failure';
}
 */
mysqli_close($con);
?>
<html>
<head></head>
<body>
	Hi there!!
</body>
</html>